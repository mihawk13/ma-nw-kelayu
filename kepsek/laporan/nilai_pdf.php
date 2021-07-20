<?php
require('../../assets/fpdf/fpdf.php');
require('../../koneksi.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // $this->SetFont('Times', '', 11);
        // $this->SetX(4);
        // $this->SetX(4);
        // $this->SetFont('Arial', 'B', 12);
        // $this->MultiCell(14, 0.5, 'Manatuto Kota', 0, 'C');
        // $this->MultiCell(20, 0.5, 'Laporan Arus Kas', 0, 'C');
        // $this->ln(1);

        $this->SetX(4);
        $this->SetFont('Arial', 'B', 12);
        // $this->Image('../../production/images/lg-big.jpg', 90, 8, 15, 15);
        $this->Cell(287, 0, 'MADRASAH ALIYAH NW KELAYU', 0, 0, 'C');
        $this->ln(10);
        $this->SetX(4);
        $this->Cell(287, 0, 'LAPORAN NILAI SISWA', 0, 0, 'C');
        $this->ln(10);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-10);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

$pdf->Cell(15, 10, 'Kelas', 1, 0, 'C');
$pdf->Cell(30, 10, 'NISN', 1, 0, 'C');
$pdf->Cell(50, 10, 'Nama Siswa', 1, 0, 'C');
$pdf->Cell(100, 10, 'Pelajaran', 1, 0, 'C');
$pdf->Cell(50, 10, 'Thn. Ajaran / Semester', 1, 0, 'C');
$pdf->Cell(30, 10, 'Nilai', 1, 0, 'C');

$modal = mysqli_query($db, "SELECT d.nama_kelas,a.*,b.nama_siswa,c.nama_mapel, (SUM(a.nilai) / COUNT(a.nisn)) rata FROM tb_nilai a
INNER JOIN tb_siswa b ON a.nisn=b.nisn
INNER JOIN tb_mapel c ON a.id_mapel=c.id
INNER JOIN tb_kelas d ON a.id_kelas=d.id_kelas
WHERE a.id_kelas = '$_GET[idkls]'
GROUP BY id_kelas, nisn, id_mapel, thn_ajaran, semester");
while ($r = mysqli_fetch_assoc($modal)) {
    $pdf->ln(10);
    $pdf->Cell(15, 10, $r['nama_kelas'], 1, 0, 'C');
    $pdf->Cell(30, 10, $r['nisn'], 1, 0, 'C');
    $pdf->Cell(50, 10, $r['nama_siswa'], 1, 0, 'C');
    $pdf->Cell(100, 10, $r['nama_mapel'], 1, 0, 'C');
    $pdf->Cell(50, 10, $r['thn_ajaran'] . ' / ' . $r['semester'], 1, 0, 'C');
    $pdf->Cell(30, 10, $r['rata'], 1, 0, 'C');
}

$pdf->ln(100);

$pdf->SetFont('Arial', 'B', 10);

$modal = mysqli_query($db, "SELECT * FROM tb_data_sekolah");
$r = mysqli_fetch_assoc($modal);

$modal = mysqli_query($db, "SELECT b.nama,b.nip FROM tb_kelas a
INNER JOIN tb_pegawai b ON a.wali_kelas=b.nip
WHERE a.id_kelas = '$_GET[idkls]'");
$s = mysqli_fetch_assoc($modal);

// kiri
$kepsek = $r['nama_kepsek'];
$nipkepsek = $r['nip_kepsek'];
$walikelas = $s['nama'];
$nipwali = $s['nip'];

$pdf->SetY(-50);
$pdf->Cell(60, 0, 'Kepala Sekolah', 0, 0, 'C');
$pdf->SetY(-27);
$pdf->SetFont('Arial', 'UB', 10);
$pdf->Cell(60, 0, $kepsek, 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetY(-22);
$pdf->Cell(60, 0, 'NIP: ' . $nipkepsek, 0, 0, 'C');


$pdf->SetY(-50);
$pdf->SetX(-77);
$pdf->Cell(60, 0, 'Wali Kelas', 0, 0, 'C');
$pdf->SetY(-27);
$pdf->SetX(-77);
$pdf->SetFont('Arial', 'UB', 10);
$pdf->Cell(60, 0, $walikelas, 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetY(-22);
$pdf->SetX(-77);
$pdf->Cell(60, 0, 'NIP: ' . $nipwali, 0, 0, 'C');

$pdf->Output('Laporan_Data_Siswa.pdf', 'I');
