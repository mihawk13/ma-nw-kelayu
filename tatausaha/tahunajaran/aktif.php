<?php
session_start();
include "../../koneksi.php";
$id	=	$_GET['id'];
$_SESSION['tahunajaran']	=	$_GET['thn'];
$modal = mysqli_query($db, "UPDATE tb_tahun_ajaran SET status = 'Tidak Aktif'");
$modal = mysqli_query($db, "UPDATE tb_tahun_ajaran SET status = 'Aktif' WHERE id='$id'");
echo "<script>alert('Tahun ajaran berhasil diubah!');window.location='tahunajaran.php';</script>";
