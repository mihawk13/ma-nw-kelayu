<?php
	include "../../koneksi.php";
	$id_absen=$_GET['id_absen'];
	$modal=mysqli_query($db,"DELETE FROM tb_absen WHERE id_absen='$id_absen'");
	echo "<script>window.location='absen.php';</script>";
?>