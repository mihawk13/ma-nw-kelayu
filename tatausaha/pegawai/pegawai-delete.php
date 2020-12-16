<?php
	include "../../koneksi.php";
	$id_pegawai=$_GET['id_pegawai'];
	$modal=mysqli_query($db,"DELETE FROM tb_pegawai WHERE id_pegawai='$id_pegawai'");
	echo "<script>window.location='pegawai.php';</script>";
?>