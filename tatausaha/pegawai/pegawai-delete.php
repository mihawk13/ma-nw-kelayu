<?php
	include "../../koneksi.php";
	$nip=$_GET['nip'];
	$modal=mysqli_query($db,"DELETE FROM tb_pegawai WHERE nip='$nip'");
	echo "<script>alert('Data berhasil disimpan!');window.location='pegawai.php';</script>";
?>