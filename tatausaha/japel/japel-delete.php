<?php
	include "../../koneksi.php";
	$id_japel=$_GET['id_japel'];
	$modal=mysqli_query($db,"DELETE FROM tb_japel WHERE id_japel='$id_japel'");
	echo "<script>alert('Data berhasil disimpan!');window.location='japel.php';</script>";
?>