<?php
include "../../koneksi.php";

$kelas = $_GET['kelas'];
$tampil = mysqli_query($db, "SELECT a.nisn,a.nama_siswa FROM tb_siswa a
INNER JOIN tb_kelas b ON a.kelas = b.id_kelas
WHERE b.id_kelas = '$kelas' ORDER BY a.nama_siswa ASC");
$jml    = mysqli_num_rows($tampil);
$no = 1;
if($jml > 0){
    echo"
     <option selected> ---- Pilih Siswa ---- </option>";
     while($r=mysqli_fetch_assoc($tampil)){
         echo "<option value=$r[nisn]>" . $no++ . ". $r[nama_siswa]</option>";
     }
}else{
    echo "
     <option selected>-- Data Siswa Tidak Ada, Pilih Kelas Lain --</option>";
}
?>