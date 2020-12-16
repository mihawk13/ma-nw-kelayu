<?php
	include "../../koneksi.php";
	$nip=$_GET['nip'];
	$modal=mysqli_query($db,"DELETE FROM tb_guru WHERE nip='$nip'");
	echo "<script>window.location='guru.php';</script>";
?>