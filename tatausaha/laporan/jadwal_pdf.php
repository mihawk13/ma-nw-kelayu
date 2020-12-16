<?php
require('../../assets/fpdf/fpdf.php');
require('../../koneksi.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {

        $this->SetX(4);
        $this->SetFont('Arial', 'B', 12);
        // $this->Image('../../production/images/lg-big.png', 90, 8, 15, 15);
        $this->Cell(287, 0, 'SD KATOLIK RENTUNG II', 0, 0, 'C');
        $this->ln(10);
        $this->SetX(4);
        $this->Cell(287, 0, 'LAPORAN JADWAL PELAJARAN', 0, 0, 'C');
        $this->ln(10);
    }

    // // Page footer
    // function Footer()
    // {
    //     // Position at 1.5 cm from bottom
    //     $this->SetY(-10);
    //     // Arial italic 8
    //     $this->SetFont('Arial', 'I', 8);
    //     // Page number
    //     $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
    // }
}

$pdf = new PDF('L');
$pdf->SetMargins(35, 10, 0);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(30, 10, 'Hari', 1, 0, 'C');
$pdf->Cell(30, 10, 'Jam', 1, 0, 'C');
$pdf->Cell(100, 10, 'Mata Pelajaran', 1, 0, 'C');
$pdf->Cell(60, 10, 'Nama Guru', 1, 0, 'C');

$modal = mysqli_query($db, "SELECT a.hari,a.jam, e.nama,c.nama_kelas, b.nama_mapel FROM tb_japel a
INNER JOIN tb_mapel b ON a.id_mapel=b.id
INNER JOIN tb_kelas c ON a.id_kelas=c.id_kelas
INNER JOIN tb_mapel_guru d ON a.id_kelas=d.id_kelas AND a.id_mapel=d.id_mapel
INNER JOIN tb_guru e ON d.nip=e.nip WHERE a.id_kelas = '$_GET[idkls]' ORDER BY nama_kelas, FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')");
$pdf->SetFont('Arial', '', 10);
while ($r = mysqli_fetch_assoc($modal)) {
    $pdf->ln(10);

    $pdf->Cell(30, 10, $r['hari'], 1, 0, 'C');
    $pdf->Cell(30, 10, $r['jam'], 1, 0, 'C');
    $pdf->Cell(100, 10, $r['nama_mapel'], 1, 0, 'C');
    $pdf->Cell(60, 10, $r['nama'], 1, 0, 'C');
}

$pdf->ln(100);

$pdf->SetFont('Arial', 'B', 10);

$modal = mysqli_query($db, "SELECT * FROM tb_data_sekolah");
$r = mysqli_fetch_assoc($modal);

$modal = mysqli_query($db, "SELECT b.nama,b.nip FROM tb_kelas a
INNER JOIN tb_guru b ON a.wali_kelas=b.nip
WHERE a.id_kelas = '$_GET[idkls]'");
$s = mysqli_fetch_assoc($modal);

// kiri
$kepsek = $r['nama_kepsek'];
$nipkepsek = $r['nip_kepsek'];
$walikelas = $s['nama'];
$nipwali = $s['nip'];

$pdf->SetY(-40);
$pdf->Cell(40, 0, 'Kepala Sekolah', 0, 0, 'C');
$pdf->SetY(-27);
$pdf->SetFont('Arial', 'UB', 10);
$pdf->Cell(40, 0, $kepsek, 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetY(-22);
$pdf->Cell(40, 0, 'NIP: ' . $nipkepsek, 0, 0, 'C');


$pdf->SetY(-40);
$pdf->SetX(-77);
$pdf->Cell(40, 0, 'Wali Kelas', 0, 0, 'C');
$pdf->SetY(-27);
$pdf->SetX(-77);
$pdf->SetFont('Arial', 'UB', 10);
$pdf->Cell(40, 0, $walikelas, 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetY(-22);
$pdf->SetX(-77);
$pdf->Cell(40, 0, 'NIP: ' . $nipwali, 0, 0, 'C');

$pdf->Output('Laporan_Data_Siswa.pdf', 'I');
