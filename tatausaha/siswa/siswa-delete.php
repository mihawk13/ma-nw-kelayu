<?php
	include "../../koneksi.php";
	$nisn=$_GET['nisn'];
	$modal=mysqli_query($db,"DELETE FROM tb_siswa WHERE nisn='$nisn'");
	echo "<script>alert('Data berhasil disimpan!');window.location='siswa.php';</script>";
?>