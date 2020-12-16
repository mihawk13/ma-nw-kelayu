<?php
include "../../koneksi.php";

$kelas = $_GET['kelas'];
// $tampil = mysqli_query($db, "SELECT * FROM tb_mapel WHERE id NOT IN(SELECT id_mapel FROM tb_japel WHERE tahun_ajaran = '2019/2020' AND id_kelas = '$kelas') ORDER BY nama_mapel ASC");
$tampil = mysqli_query($db, "SELECT * FROM tb_mapel ORDER BY nama_mapel ASC");
$jml    = mysqli_num_rows($tampil);
if($jml > 0){
    echo"
     <option selected> -- Pilih Mapel -- </option>";
     while($r=mysqli_fetch_assoc($tampil)){
         echo "<option value=$r[id]>$r[nama_mapel]</option>";
     }
}else{
    echo "
     <option selected>-- Data Mapel Tidak Ada, Pilih Kelas Lain --</option>";
}
?>