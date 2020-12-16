<?php
session_start();
session_destroy();
unset($_SESSION['level']);
echo "<script>window.location='../index.php';</script>";
?>