<?php
require('../assets/fpdf/fpdf.php');
require('../koneksi.php');
require('../helper.php');
session_start();

class PDF extends FPDF
{

    /**
     * Draws text within a box defined by width = w, height = h, and aligns
     * the text vertically within the box ($valign = M/B/T for middle, bottom, or top)
     * Also, aligns the text horizontally ($align = L/C/R/J for left, centered, right or justified)
     * drawTextBox uses drawRows
     *
     * This function is provided by TUFaT.com
     */
    function drawTextBox($strText, $w, $h, $align = 'L', $valign = 'T', $border = true)
    {
        $xi = $this->GetX();
        $yi = $this->GetY();

        $hrow = $this->FontSize;
        $textrows = $this->drawRows($w, $hrow, $strText, 0, $align, 0, 0, 0);
        $maxrows = floor($h / $this->FontSize);
        $rows = min($textrows, $maxrows);

        $dy = 0;
        if (strtoupper($valign) == 'M')
            $dy = ($h - $rows * $this->FontSize) / 2;
        if (strtoupper($valign) == 'B')
            $dy = $h - $rows * $this->FontSize;

        $this->SetY($yi + $dy);
        $this->SetX($xi);

        $this->drawRows($w, $hrow, $strText, 0, $align, false, $rows, 1);

        if ($border)
            $this->Rect($xi, $yi, $w, $h);
    }

    function drawRows($w, $h, $txt, $border = 0, $align = 'J', $fill = false, $maxline = 0, $prn = 0)
    {
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n")
            $nb--;
        $b = 0;
        if ($border) {
            if ($border == 1) {
                $border = 'LTRB';
                $b = 'LRT';
                $b2 = 'LR';
            } else {
                $b2 = '';
                if (is_int(strpos($border, 'L')))
                    $b2 .= 'L';
                if (is_int(strpos($border, 'R')))
                    $b2 .= 'R';
                $b = is_int(strpos($border, 'T')) ? $b2 . 'T' : $b2;
            }
        }
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $ns = 0;
        $nl = 1;
        while ($i < $nb) {
            //Get next character
            $c = $s[$i];
            if ($c == "\n") {
                //Explicit line break
                if ($this->ws > 0) {
                    $this->ws = 0;
                    if ($prn == 1) $this->_out('0 Tw');
                }
                if ($prn == 1) {
                    $this->Cell($w, $h, substr($s, $j, $i - $j), $b, 2, $align, $fill);
                }
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $ns = 0;
                $nl++;
                if ($border && $nl == 2)
                    $b = $b2;
                if ($maxline && $nl > $maxline)
                    return substr($s, $i);
                continue;
            }
            if ($c == ' ') {
                $sep = $i;
                $ls = $l;
                $ns++;
            }
            $l += $cw[$c];
            if ($l > $wmax) {
                //Automatic line break
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                    if ($this->ws > 0) {
                        $this->ws = 0;
                        if ($prn == 1) $this->_out('0 Tw');
                    }
                    if ($prn == 1) {
                        $this->Cell($w, $h, substr($s, $j, $i - $j), $b, 2, $align, $fill);
                    }
                } else {
                    if ($align == 'J') {
                        $this->ws = ($ns > 1) ? ($wmax - $ls) / 1000 * $this->FontSize / ($ns - 1) : 0;
                        if ($prn == 1) $this->_out(sprintf('%.3F Tw', $this->ws * $this->k));
                    }
                    if ($prn == 1) {
                        $this->Cell($w, $h, substr($s, $j, $sep - $j), $b, 2, $align, $fill);
                    }
                    $i = $sep + 1;
                }
                $sep = -1;
                $j = $i;
                $l = 0;
                $ns = 0;
                $nl++;
                if ($border && $nl == 2)
                    $b = $b2;
                if ($maxline && $nl > $maxline)
                    return substr($s, $i);
            } else
                $i++;
        }
        //Last chunk
        if ($this->ws > 0) {
            $this->ws = 0;
            if ($prn == 1) $this->_out('0 Tw');
        }
        if ($border && is_int(strpos($border, 'B')))
            $b .= 'B';
        if ($prn == 1) {
            $this->Cell($w, $h, substr($s, $j, $i - $j), $b, 2, $align, $fill);
        }
        $this->x = $this->lMargin;
        return $nl;
    }
}

class PDF_1 extends FPDF
{
    // Page header
    function Header()
    {
        $this->SetFont('Arial', 'B', 10);
        $this->setFillColor(210, 210, 210);
        $this->Cell(7, 15, 'No', 1, 0, 'C', 1);

        $xPos = $this->GetX();
        $yPos = $this->GetY();

        $this->MultiCell(30, 7.5, 'Muatan Pelajaran', 1, 'C', 1);

        $this->SetXY($xPos + 30, $yPos);
        $this->Cell(77, 8, 'Pengetahuan', 1, 0, 'C', 1);
        $this->Cell(76, 8, 'Keterampilan', 1, 0, 'C', 1);
        $this->ln(8);
        $this->SetX(47);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(10, 7, 'Nilai', 1, 0, 'C', 1);
        $this->Cell(15, 7, 'Predikat', 1, 0, 'C', 1);
        $this->Cell(52, 7, 'Deskripsi', 1, 0, 'C', 1);

        $this->Cell(10, 7, 'Nilai', 1, 0, 'C', 1);
        $this->Cell(15, 7, 'Predikat', 1, 0, 'C', 1);
        $this->Cell(51, 7, 'Deskripsi', 1, 0, 'C', 1);
    }
}

$nisn = $_SESSION['username'];
$thnAjaran = $_POST['thn'];
$smt = $_POST['smt'];

$query = mysqli_query($db, "SELECT * FROM tb_siswa a INNER JOIN tb_kelas b ON a.kelas = b.id_kelas WHERE a.nisn = '$nisn'");
$dt = mysqli_fetch_assoc($query);

$query = mysqli_query($db, "SELECT * FROM tb_data_sekolah");
$dtSekolah = mysqli_fetch_assoc($query);

$modal = mysqli_query($db, "SELECT * FROM tb_raport WHERE thn_ajaran = '$_SESSION[tahunajaran]' AND semester = '$smt' AND nisn = '$nisn'");
$rpt = mysqli_fetch_assoc($modal);
$id = $rpt['id'];

$spirit = $rpt['a_sikap_spiritual'];
$sosial = $rpt['a_sikap_sosial'];
$saran = $rpt['d_saran_saran'];
$ketPendengaran = $rpt['f_pendengaran'];
$ketPenglihatan = $rpt['f_penglihatan'];
$ketGigi = $rpt['f_gigi'];

$ketTinggi = $rpt['e_tinggi_badan'];
$ketBerat = $rpt['e_berat_badan'];
$ketLainnya = '';

$modal = mysqli_query($db, "SELECT a.*, b.nama FROM tb_kelas a
INNER JOIN tb_pegawai b ON a.nip_wali=b.nip
WHERE a.id_kelas IN(SELECT kelas FROM tb_siswa WHERE nisn = '$nisn')");
$kls = mysqli_fetch_assoc($modal);

$tglCetak = 'Kelayu, ' . getTanggal();
$waliMurid = $dt['nama_ayah'];
$kelas = 'Wali ' . $kls['nama_kelas'];
$waliKelas = $kls['nama'];
$nipWali = $kls['nip_wali'];
$kepsek = $dtSekolah['nama_kepsek'];
$nipkepsek = $dtSekolah['nip_kepsek'];

$pdf = new PDF('P');

$pdf->AddPage();

// $pdf->SetFont('Arial', 'B', 10);
// $pdf->Cell(190, 0, 'IDENTITAS PESERTA DIDIK', 0, 0, 'C');
// $pdf->ln(10);


// $pdf->SetX(4);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(190, 0, 'PENCAPAIAN KOMPETENSI PESERTA DIDIK', 0, 0, 'C');
$pdf->ln(10);
// $pdf->SetX(4);
$pdf->SetFont('Arial', '', 10);
$pdf->ln(5);

$pdf->Cell(40, 0, 'Nama Peserta Didik', 0, 0, 'L');
$pdf->Cell(5, 0, ':', 0, 0, 'C');
$pdf->Cell(65, 0, $dt['nama_siswa'], 0, 0, 'L');

$pdf->Cell(50, 0, 'Kelas', 0, 0, 'L');
$pdf->Cell(5, 0, ':', 0, 0, 'C');
$pdf->Cell(25, 0, $dt['nama_kelas'], 0, 0, 'L');

$pdf->ln(7);

$pdf->Cell(40, 0, 'NISN / NIS', 0, 0, 'L');
$pdf->Cell(5, 0, ':', 0, 0, 'C');
$pdf->Cell(65, 0, $dt['nisn'], 0, 0, 'L');

$pdf->Cell(50, 0, 'Semester', 0, 0, 'L');
$pdf->Cell(5, 0, ':', 0, 0, 'C');
$pdf->Cell(25, 0, 1 . '(Satu)', 0, 0, 'L');

$pdf->ln(7);

$pdf->Cell(40, 0, 'Nama Sekolah', 0, 0, 'L');
$pdf->Cell(5, 0, ':', 0, 0, 'C');
$pdf->Cell(65, 0, $dtSekolah['nama_sekolah'], 0, 0, 'L');

$pdf->Cell(50, 0, 'Tahun Pelajaran', 0, 0, 'L');
$pdf->Cell(5, 0, ':', 0, 0, 'C');
$pdf->Cell(25, 0, $_SESSION['tahunajaran'], 0, 0, 'L');

$pdf->ln(7);

$pdf->Cell(40, 0, 'Alamat Sekolah', 0, 0, 'L');
$pdf->Cell(5, 0, ':', 0, 0, 'C');
$pdf->Cell(120, 0, $dtSekolah['alamat'], 0, 0, 'L');

$pdf->Line(10, 50, 200, 50);

#region "A. Sikap"
$pdf->ln(15);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(190, 0, 'A. Kompetensi Sikap', 0, 0, 'L');
$pdf->ln(5);

$pdf->setFillColor(210, 210, 210);
$pdf->Cell(190, 10, 'Deskripsi', 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->ln(10);
$pdf->Cell(7, 20, '1', 1, 0, 'C');
$pdf->Cell(48, 20, 'Sikap Spiritual', 1, 0, 'L');


$pdf->SetFont('Arial', 'I', 10);
$pdf->drawTextBox($spirit, 135, 20, 'L', 'M');
$pdf->ln(8.2);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(7, 20, '2', 1, 0, 'C');
$pdf->Cell(48, 20, 'Sikap Sosial', 1, 0, 'L');

$pdf->SetFont('Arial', 'I', 10);
$pdf->drawTextBox($sosial, 135, 20, 'L', 'M');
#endregion

#region "B. Pengetahuan dan Keterampilan"
$pdf->ln(20);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(190, 0, 'B. Kompetensi Pengetahuan dan Keterampilan', 0, 0, 'L');
$pdf->ln(7);

$pdf->SetFont('Arial', 'B', 10);
$pdf->setFillColor(210, 210, 210);
$pdf->Cell(7, 15, 'No', 1, 0, 'C', 1);

$xPos = $pdf->GetX();
$yPos = $pdf->GetY();

$pdf->MultiCell(30, 7.5, 'Muatan Pelajaran', 1, 'C', 1);

$pdf->SetXY($xPos + 30, $yPos);
$pdf->Cell(77, 8, 'Pengetahuan', 1, 0, 'C', 1);
$pdf->Cell(76, 8, 'Keterampilan', 1, 0, 'C', 1);
$pdf->ln(8);
$pdf->SetX(47);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(10, 7, 'Nilai', 1, 0, 'C', 1);
$pdf->Cell(15, 7, 'Predikat', 1, 0, 'C', 1);
$pdf->Cell(52, 7, 'Deskripsi', 1, 0, 'C', 1);

$pdf->Cell(10, 7, 'Nilai', 1, 0, 'C', 1);
$pdf->Cell(15, 7, 'Predikat', 1, 0, 'C', 1);
$pdf->Cell(51, 7, 'Deskripsi', 1, 0, 'C', 1);
#endregion

$pdf->ln(7);

#region "B. Nilai"
$query = mysqli_query($db, "SELECT * FROM tb_mapel a
LEFT JOIN (SELECT * FROM tb_raport_detail WHERE id_raport = '$id') b ON a.id = b.id_mapel
LEFT JOIN (SELECT c.id 'id_mapel',a.nisn,a.thn_ajaran, (SUM(a.nilai) / COUNT(a.nisn)) rata FROM tb_nilai a
                            INNER JOIN tb_siswa b ON a.nisn=b.nisn
                            INNER JOIN tb_mapel c ON a.mapel_id=c.id
                            INNER JOIN tb_kelas d ON a.kelas_id=d.id_kelas
                            WHERE a.nisn = '$nisn' AND a.thn_ajaran = '$thnAjaran' AND a.semester = '$smt'
                            GROUP BY nisn, id_mapel, thn_ajaran, semester) c ON a.id = c.id_mapel");
$no = 1;
$ml = 0;
while ($mpl = mysqli_fetch_array($query)) {

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(7, 55, $no++, 'LBT', 0, 'C');

    $xPos = $pdf->GetX();
    $yPos = $pdf->GetY();

    $pdf->drawTextBox($mpl['nama_mapel'], 30, 55, 'L', 'M');

    $pdf->SetXY($xPos + 30, $yPos);
    $pdf->Cell(10, 55, round($mpl['rata']), 'LBT', 0, 'C');
    $pdf->Cell(15, 55, getPredikat(round($mpl['rata'])), 'LBT', 0, 'C');

    $pdf->SetFont('Arial', 'I', 10);
    $xPos = $pdf->GetX();
    $yPos = $pdf->GetY();
    $pdf->drawTextBox($mpl['pengetahuan'], 52, 55, 'L', 'M');
    $pdf->SetXY($xPos + 52, $yPos);

    $pdf->SetFont('Arial', '', 10);

    $pdf->Cell(10, 55, round($mpl['rata']), 'LBT', 0, 'C');
    $pdf->Cell(15, 55, getPredikat(round($mpl['rata'])), 'LBT', 0, 'C');

    $pdf->SetFont('Arial', 'I', 10);
    $xPos = $pdf->GetX();
    $yPos = $pdf->GetY();
    $pdf->drawTextBox($mpl['keterampilan'], 51, 55, 'L', 'M');

    $pdf->SetFont('Arial', '', 10);
    $pdf->ln(24);
}
#endregion

#region "C. Saran-Saran"
$pdf->ln(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(190, 0, 'C. Saran-saran', 0, 0, 'L');
$pdf->ln(7);


// $pdf->drawTextBox('Kegiatan Ekstra Kurikuler', 190, 40, 'L', 'M');
$pdf->SetFont('Arial', 'I', 10);
$pdf->MultiCell(190, 22, $saran, 1, 'L', 1);
#endregion

#region "D. Ketidakhardiran"
$pdf->ln(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(190, 0, 'D. Ketidakhadiran', 0, 0, 'L');
$pdf->ln(5);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, 10, 'Sakit', 'TLB', 0, 'L');
$pdf->Cell(5, 10, ':', 'TB', 0, 'L');
$pdf->Cell(15, 10, '0 hari', 'TRB', 0, 'L');
$pdf->ln(10);
$pdf->Cell(60, 10, 'Ijin', 'TLB', 0, 'L');
$pdf->Cell(5, 10, ':', 'TB', 0, 'L');
$pdf->Cell(15, 10, '0 hari', 'TRB', 0, 'L');
$pdf->ln(10);
$pdf->Cell(60, 10, 'Tanpa Keterangan', 'TLB', 0, 'L');
$pdf->Cell(5, 10, ':', 'TB', 0, 'L');
$pdf->Cell(15, 10, '0 hari', 'TRB', 0, 'L');
$pdf->ln(10);
#endregion


$pdf->SetY(-80);
$pdf->Cell(60, 0, 'Mengetahui', 0, 0, 'C');
$pdf->ln(5);
$pdf->Cell(60, 0, 'Orang Tua / Wali,', 0, 0, 'C');
$pdf->SetY(-45);
$pdf->SetFont('Arial', 'UB', 10);
$pdf->Cell(60, 0, $waliMurid, 0, 0, 'C');


$pdf->SetFont('Arial', '', 10);
// $pdf->SetY(-80);
$pdf->SetXY(-77, -80);
$pdf->Cell(60, 0, $tglCetak, 0, 0, 'C');
$pdf->ln(5);
$pdf->SetXY(-77, -75);
$pdf->Cell(60, 0, $kelas, 0, 0, 'C');
$pdf->SetY(-45);
$pdf->SetX(-77);
$pdf->SetFont('Arial', 'UB', 10);
$pdf->Cell(60, 0, $waliKelas, 0, 0, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->SetY(-40);
$pdf->SetX(-77);
$pdf->Cell(60, 0, 'NIP: ' . $nipWali, 0, 0, 'C');

$pdf->ln(5);

$pdf->SetX(-180);
$pdf->SetY(-60);
$pdf->Cell(190, 0, 'Mengetahui', 0, 0, 'C');
$pdf->ln(5);
$pdf->Cell(190, 0, 'Kepala Sekolah,.', 0, 0, 'C');
$pdf->SetY(-28);
$pdf->SetFont('Arial', 'UB', 10);
$pdf->Cell(190, 0, $kepsek, 0, 0, 'C');

$pdf->SetFont('Arial', '', 10);
$pdf->SetY(-22);
$pdf->Cell(190, 0, 'NIP: ' . $nipkepsek, 0, 0, 'C');



$pdf->Output('Laporan_Data_Siswa.pdf', 'I');
