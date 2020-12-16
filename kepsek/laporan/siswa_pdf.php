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
        // $this->Image('../../production/images/lg-big.png', 90, 8, 15, 15);
        $this->Cell(287, 0, 'SD KATOLIK RENTUNG II', 0, 0, 'C');
        $this->ln(10);
        $this->SetX(4);
        $this->Cell(287, 0, 'LAPORAN DATA SISWA', 0, 0, 'C');
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

$pdf->Cell(30, 10, 'Kelas', 1, 0, 'C');
$pdf->Cell(30, 10, 'NISN', 1, 0, 'C');
$pdf->Cell(50, 10, 'Nama Siswa', 1, 0, 'C');
$pdf->Cell(30, 10, 'JK', 1, 0, 'C');
$pdf->Cell(30, 10, 'Agama', 1, 0, 'C');
$pdf->Cell(50, 10, 'Nama Wali', 1, 0, 'C');
$pdf->Cell(50, 10, 'Telp Ortu', 1, 0, 'C');

$modal = mysqli_query($db, "SELECT a.*,b.nama_kelas FROM tb_siswa a INNER JOIN tb_kelas b ON a.kelas = b.id_kelas WHERE a.kelas = '$_GET[idkls]' ORDER BY b.id_kelas");
while ($r = mysqli_fetch_assoc($modal)) {
    $pdf->ln(10);
    $pdf->Cell(30, 10, $r['nama_kelas'], 1, 0, 'C');
    $pdf->Cell(30, 10, $r['nisn'], 1, 0, 'C');
    $pdf->Cell(50, 10, $r['nama_siswa'], 1, 0, 'C');
    $pdf->Cell(30, 10, $r['jk'], 1, 0, 'C');

    $pdf->Cell(30, 10, $r['agama'], 1, 0, 'C');
    $pdf->Cell(50, 10, $r['nama_ayah'], 1, 0, 'C');
    $pdf->Cell(50, 10, $r['telp_ayah'], 1, 0, 'C');
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
