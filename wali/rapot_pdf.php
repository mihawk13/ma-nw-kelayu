<?php
// // ini_set('memory_limit', '-1');
// // ini_set('memory_limit','1280M');
require('../assets/pdf/fpdf.php');
require_once('../koneksi.php');

class PDF extends FPDF
{
  // Page header
  function Header()
  {
    session_start();
    require('../koneksi.php');
    $nisn = $_SESSION['username'];
    $thn = $_POST['thn'];
    $smt = ($_POST['smt'] == 1) ? 'Ganjil' : 'Genap';
    $sql = mysqli_query($db, "SELECT * FROM tb_siswa a
    INNER JOIN tb_kelas b ON a.kelas = b.id_kelas WHERE a.nisn = '$nisn'");
    $sw = mysqli_fetch_assoc($sql);
    $this->SetFont('Times', '', 11);
    $this->SetX(4);
    $this->Image('../../production/images/lg-icn.png', 2, 0.8, 2, 1.6);
    $this->SetX(4);
    $this->SetFont('Arial', 'B', 12);
    $this->MultiCell(14, 0.5, 'LAPORAN HASIL BELAJAR SISWA', 0, 'C');
    $this->MultiCell(20, 0.5, 'SDK Rentung II', 0, 'C');
    $this->ln(1);
    $this->SetFont('Arial', '', 10);
    $this->Cell(4.75, 0.5, 'Nama Peserta Didik', 0, 'C');
    $this->SetFont('Arial', 'B', 10);
    $this->Cell(8, 0.5, ': ' . $sw['nama_siswa'], 0, 'C');
    $this->SetFont('Arial', '', 10);
    $this->Cell(3, 0.5, 'Tahun Pelajaran', 0, 'C');
    $this->SetFont('Arial', 'B', 10);
    $this->Cell(3.75, 0.5, ': ' . $thn, 0, 1, 'L');

    $this->SetFont('Arial', '', 10);
    $this->Cell(4.75, 0.5, 'Kelas', 0, 'C');
    $this->SetFont('Arial', 'B', 10);
    $this->Cell(8, 0.5, ': ' . $sw['nama_kelas'], 0, 'C');
    $this->SetFont('Arial', '', 10);
    $this->Cell(3, 0.5, 'Semester', 0, 'C');
    $this->SetFont('Arial', 'B', 10);
    $this->Cell(3.75, 0.5, ': ' . $smt, 0, 1, 'L');
    $this->Cell(19, 0.5, '', 0, 1, 'C');
    $this->SetFont('Arial', '', 10);
  }

  // Page footer
  function Footer()
  {
    // session_start();
    require('../koneksi.php');
    $nisn = $_SESSION['username'];
    $sql = mysqli_query($db, "SELECT a.*,b.nama_kelas,c.nama 'wali_kelas',c.nip FROM tb_siswa a
    INNER JOIN tb_kelas b ON a.kelas = b.id_kelas
    INNER JOIN tb_guru c ON b.wali_kelas=c.nip WHERE a.nisn = '$nisn'");
    $sw = mysqli_fetch_assoc($sql);
    // // Position at 1.5 cm from bottom
    $this->SetY(-5);
    // // Arial italic 8
    // $this->SetFont('Arial', 'I', 8);
    // // Page number
    // $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');

    // require('../koneksi.php');
    //TTD
    // $this->Cell(18.2, 1, 'Denpasar , ' . date('Y-m-d'), 0, 1, 'R');
    $this->SetFont('Arial', '', 12);
    $this->Cell(7, 1, 'Orangtua/Wali', 0, 0, 'C');
    $this->Cell(5, 1, '', 0, 0, 'C');
    $this->SetFont('Arial', '', 12);
    $this->Cell(7, 1, 'Wali Kelas', 0, 1, 'C');
    $this->Cell(19, 1.5, '', 0, 1, 'C');
    $this->Cell(7, 1, $sw['nama_ayah'], 0, 0, 'C');
    $this->Cell(5, 1, '', 0, 0, 'C');
    $this->SetFont('Arial', 'U', 12);
    $this->Cell(7, 1, $sw['wali_kelas'], 0, 1, 'C');
    $this->SetFont('Arial', '', 12);
    $this->Cell(7, 1, '', 0, 0, 'C');
    $this->Cell(5, 1, '', 0, 0, 'C');
    $this->Cell(7, 0.1, 'NIP. ' . $sw['nip'], 0, 1, 'C');
    // $this->Cell(19, 0, '', 0, 1, 'C');
    // $this->SetFont('Arial', '', 12);
    // $this->Cell(19, 1, 'Mengetahui Kepala Sekolah', 0, 0, 'C');
    // $this->Cell(19, 2, '', 0, 1, 'C');
    // $this->SetFont('Arial', 'U', 12);
    // $this->Cell(19, 1, 'nama kepsek', 0, 1, 'C');
    // $this->SetFont('Arial', '', 12);
    // $this->Cell(19, 0.1, 'NIP. ' . 'nip kepsek', 0, 1, 'C');
  }
}

$pdf = new PDF("P", "cm", "A4");
$pdf->SetMargins(1, 1, 1);
$pdf->AliasNbPages();

$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 10);

// $pdf->Cell(19, 1, 'Pengetahuan', 0, 1, 'L');

$pdf->Cell(1, 1.5, 'NO', 1, 0, 'C');
$pdf->Cell(6, 1.5, 'MATA PELAJARAN', 1, 0, 'C');
// $pdf->Cell(1, 1.5, 'KKM', 1, 0, 'C');
$pdf->Cell(11, 0.8, 'Pengetahuan', 1, 1, 'C');
// $pdf->Cell(5.5, 0.8, 'Keterampilan', 1, 1, 'C');

$pdf->Cell(7, 2, '', 0, 0, 'C');
$pdf->Cell(2.5, 0.7, 'Angka', 1, 0, 'C');
$pdf->Cell(2.5, 0.7, 'Predikat', 1, 0, 'C');
$pdf->Cell(6, 0.7, 'Deskripsi', 1, 0, 'C');

$nisn = $_SESSION['username'];
$thn = $_POST['thn'];
$smt = $_POST['smt'];
$sql = mysqli_query($db, "SELECT COUNT(a.id_mapel) jml, SUM(a.nilai) total,(SUM(a.nilai) / COUNT(a.id_mapel)) 'rata-rata',b.nama_mapel FROM tb_nilai a
INNER JOIN tb_mapel b ON a.id_mapel=b.id_mapel
WHERE a.nisn = '$nisn' AND a.thn_ajaran = '$thn' AND a.semester = '$smt'
GROUP BY a.nisn,a.thn_ajaran,a.semester,a.id_mapel");
$no = 1;

while ($sw = mysqli_fetch_array($sql)) {
  $pdf->Ln();
  $pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(1, 1, $no++, 1, 0, 'C');
  $pdf->Cell(6, 1, '  ' . $sw['nama_mapel'], 1, 0, 'L');
  // $pdf->Cell(1, 1, $sw['sl'], 1, 0, 'C');
  $nilainya = $sw['rata-rata'];
  //start deskripsi pengetahuan
  if ($nilainya >= 90 and $nilainya <= 100) {
    $predikat = 'A';
    $deskripsi = 'Sangat Baik Dikuasai Siswa';
  } else if ($nilainya >= 80 and $nilainya <= 89) {
    $predikat = 'B';
    $deskripsi = 'Baik Dikuasai Siswa';
  } else if ($nilainya >= 70 and $nilainya <= 79) {
    $predikat = 'C';
    $deskripsi = 'Cukup Dikuasai Siswa';
  } else if ($nilainya >= 41 and $nilainya <= 69) {
    $predikat = 'D';
    $deskripsi = 'Kurang Dikuasai Siswa';
  } else if ($nilainya >= 0 and $nilainya <= 40) {
    $predikat = 'E';
    $deskripsi = 'Tidak Dikuasai Siswa';
  } else {
    $predikat = 'F';
    $deskripsi = 'Tidak Layak';
  }
  //end deskripsi pengetahuan
  $pdf->Cell(2.5, 1, ($nilainya), 1, 0, 'C');
  $pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(2.5, 1, $predikat, 1, 0, 'C');
  $pdf->SetFont('Arial', '', 10);
  $pdf->Cell(6, 1, $deskripsi, 1, 0, 'C');
}
// $pdf->Cell(1.5, 0.7, 'Angka', 1, 0, 'C');
// $pdf->Cell(1.5, 0.7, 'Predikat', 1, 0, 'C');
// $pdf->Cell(2.5, 0.7, 'Deskripsi', 1, 1, 'C');
// $sql = mysqli_query($db, "SELECT a.*,c.nama_siswa,d.nama_kelas FROM tb_nilai a
//     INNER JOIN tb_siswa c ON a.nisn=c.nisn
//     INNER JOIN tb_kelas d ON c.kelas = d.id_kelas WHERE a.nisn = '$nisn'");
// $sw = mysqli_fetch_assoc($sql);

// $pdf->SetFont('Times', '', 11);
// $pdf->SetX(4);
// $pdf->Image('../../production/images/lg-icn.png', 2, 0.8, 2, 1.6);
// $pdf->SetX(4);
// $pdf->SetFont('Arial', 'B', 12);
// $pdf->MultiCell(14, 0.5, 'LAPORAN HASIL BELAJAR', 0, 'C');
// $pdf->MultiCell(20, 0.5, 'SDK Rentung II', 0, 'C');
// $pdf->ln(1);
// $pdf->SetFont('Arial', '', 10);
// $pdf->Cell(4.75, 0.5, 'Nama Peserta Didik', 0, 'C');
// $pdf->SetFont('Arial', 'B', 10);
// $pdf->Cell(8, 0.5, ': ' . $sw['nama_siswa'], 0, 'C');
// $pdf->SetFont('Arial', '', 10);
// $pdf->Cell(3, 0.5, 'Tahun Pelajaran', 0, 'C');
// $pdf->SetFont('Arial', 'B', 10);
// $pdf->Cell(3.75, 0.5, $sw['thn_ajaran'], 0, 1, 'L');

// $pdf->SetFont('Arial', '', 10);
// $pdf->Cell(4.75, 0.5, 'Kelas', 0, 'C');
// $pdf->SetFont('Arial', 'B', 10);
// $pdf->Cell(8, 0.5, ': ' . $sw['nama_kelas'], 0, 'C');
// $pdf->SetFont('Arial', '', 10);
// $pdf->Cell(3, 0.5, 'Semester', 0, 'C');
// $pdf->SetFont('Arial', 'B', 10);
// $pdf->Cell(3.75, 0.5, $sw['semester'], 0, 1, 'L');
// $pdf->Cell(19, 0.5, '', 0, 1, 'C');
// $pdf->SetFont('Arial', '', 10);


// $sql = mysqli_query($db, "SELECT a.*,b.nama_mapel,c.nama_siswa,d.nama_kelas FROM tb_nilai a
// INNER JOIN tb_mapel b ON a.id_mapel=b.id_mapel
// INNER JOIN tb_siswa c ON a.nisn=c.nisn
// INNER JOIN tb_kelas d ON c.kelas = d.id_kelas");
// while ($nl = mysqli_fetch_array($sql)) {
//   //
// }
$pdf->Output("rapot.pdf", "I");
