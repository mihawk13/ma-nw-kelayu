<?php
	include "../../koneksi.php";
	$id=$_GET['id'];
	$modal=mysqli_query($db,"DELETE FROM tb_tahun_ajaran WHERE id='$id'");
	echo "<script>alert('Data berhasil disimpan!');window.location='tahunajaran.php';</script>";
?>