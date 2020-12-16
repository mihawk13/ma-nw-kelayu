<?php
	include "../../koneksi.php";
	$id_extra=$_GET['id_extra'];
	$modal=mysqli_query($db,"DELETE FROM tb_extra WHERE id='$id_extra'");
	echo "<script>window.location='extra.php';</script>";
?>