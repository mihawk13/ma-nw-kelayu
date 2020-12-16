<?php
include "../../koneksi.php";
$data = [];
$idkls = $_GET['idkls'];

$query = mysqli_query($db, "SELECT a.nisn, b.nama_kelas, a.nama_siswa FROM tb_siswa a
INNER JOIN tb_kelas b ON a.kelas=b.id_kelas WHERE kelas = '$idkls' ORDER BY nama_siswa");
while ($r = mysqli_fetch_array($query)) {
  // array_push($data, $r['nisn'], $r['nama_kelas'], $r['nama_siswa']);
  $data[] = [$r['nisn'], $r['nama_kelas'], $r['nama_siswa']];
  // $data .= [$r['nisn'], $r['kelas'], $r['nama_siswa']] . ',';
}
// mysqli_fetch_all($query);
// $data = ["falcon", "sky", "cloud", "orange", "wood", "forest"];
$hasil = ['data' => $data];
echo json_encode($hasil);
