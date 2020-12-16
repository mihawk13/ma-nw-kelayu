<?php
	include "../../koneksi.php";
	$id_mapel=$_GET['id_mapel'];
	$modal=mysqli_query($db,"DELETE FROM tb_mapel WHERE id='$id_mapel'");
	echo "<script>window.location='mapel.php';</script>";
?>