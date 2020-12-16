<?php
include "../../koneksi.php";

$nisn = $_POST['nisn'];
$kelas = $_POST['kelas'];
foreach ($nisn as $n) {
    $modal = mysqli_query($db, "UPDATE tb_siswa SET kelas = '$kelas' WHERE nisn = '$n'");
}

echo "<script>alert('Kelas siswa berhasil diperbaharui!'); window.location='naikkelas.php';</script>";