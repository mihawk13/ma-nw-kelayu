<?php
	include "../../koneksi.php";
	$id_nilai=$_GET['id_nilai'];
	$modal=mysqli_query($db,"DELETE FROM tb_nilai WHERE id_nilai='$id_nilai'");
	echo "<script>alert('Data berhasil dihapus!');window.location='nilai.php';</script>";
?>