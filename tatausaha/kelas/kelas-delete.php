<?php
	include "../../koneksi.php";
	$id_kelas=$_GET['id_kelas'];
	$modal=mysqli_query($db,"DELETE FROM tb_kelas WHERE id_kelas='$id_kelas'");
	echo "<script>alert('Data berhasil disimpan!');window.location='kelas.php';</script>";
?>