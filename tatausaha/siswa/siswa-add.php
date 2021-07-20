<?php
session_start();
include_once('../../helper.php');
include_once("../../koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once('../layouts/head.html')
  ?>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img src="../../production/images/lg-icn.jpg" alt="..."> <span>MA NW Kelayu</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
          </div>
          <!-- /menu profile quick info -->
          <hr>

          <!-- sidebar menu -->
          <?php include_once('../layouts/sidebar.html') ?>
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
      <?php include_once('../layouts/top_nav.html') ?>
      <!-- /top navigation -->
      <div>ex</div>
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <p class="text-muted font-13 m-b-30">
                        <h2>TAMBAH DATA SISWA</h2>
                        <hr>
                      </p>

                      <div class="x_content">
                        <!-- class="x_content" -->
                        <form action="" method="POST">
                          <div class="col-md-4">
                            <!-- FORM KIRI -->
                            <div class="form-group">
                              <select name="kelas" class="form-control" required oninvalid="this.setCustomValidity('Pilih Kelas Siswa!')" oninput="setCustomValidity('')">
                                <option value=""> -- Pilih Kelas Siswa --</option>
                                <?php
                                $modal = mysqli_query($db, "SELECT * FROM tb_kelas");
                                while ($r = mysqli_fetch_assoc($modal)) {
                                ?>
                                  <option value="<?= $r['id_kelas'] ?>"><?= $r['nama_kelas'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" placeholder="nisn" id="nisn" name="nisn" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="nama siswa" id="name" name="nama_siswa" required oninvalid="this.setCustomValidity('nama siswa tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <select name="jk" class="form-control" required oninvalid="this.setCustomValidity('Pilih Jenis Kelamin Siswa!')" oninput="setCustomValidity('')">
                                <option value=""> -- Pilih Jenis Kelamin --</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" id="tempat_lahir" class="form-control" placeholder="tempat lahir" name="tempat_lahir" required oninvalid="this.setCustomValidity('tempat lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <input type="date" id="tgl_lahir" class="form-control" placeholder="tgl lahir" name="tgl_lahir" required oninvalid="this.setCustomValidity('tgl lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <input type="text" id="agama" class="form-control" placeholder="agama" name="agama" required oninvalid="this.setCustomValidity('agama tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <input type="text" id="alamat" class="form-control" placeholder="alamat" name="alamat" required oninvalid="this.setCustomValidity('alamat tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <input type="text" id="telp_siswa" class="form-control" placeholder="telp siswa" name="telp_siswa" required oninvalid="this.setCustomValidity('telp siswa tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <input type="text" id="status_siswa" placeholder="status siswa " name="status_siswa" class="form-control" required oninvalid="this.setCustomValidity('status siswa tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div>
                              <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                            </div>
                          </div> <!-- /FORM KIRI -->

                          <div class="col-md-4">
                            <!-- FORM TENGAH -->
                            <div class="form-group">
                              <input type="text" id="nama_ayah" placeholder="nama ayah " name="nama_ayah" class="form-control" required oninvalid="this.setCustomValidity('nama ayah tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <input type="text" id="thn_lahir_ayah" placeholder="thn lhr ayah " name="thn_lahir_ayah" class="form-control" required oninvalid="this.setCustomValidity('thn lhr ayah tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <select name="pendidikan_ayah" class="form-control" required oninvalid="this.setCustomValidity('Pilih Pendidikan Terkahir Ayah!')" oninput="setCustomValidity('')">
                                <option value=""> -- Pilih Pendidikan Terkahir Ayah --</option>
                                <?php
                                foreach (getPendidikanTerakhir() as $val) { ?>
                                  <option value="<?= $val ?>"><?= $val ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" id="pekerjaan_ayah" class="form-control" placeholder="pekerjaan ayah" name="pekerjaan_ayah" required oninvalid="this.setCustomValidity('pekerjaan ayah tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <input type="text" id="penghasilan_ayah" class="form-control" placeholder="penghasilan ayah" name="penghasilan_ayah" required oninvalid="this.setCustomValidity('penghasilan ayah tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <input type="text" id="telp_ayah" class="form-control" placeholder="telp ayah" name="telp_ayah" required oninvalid="this.setCustomValidity('telp ayah tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                          </div> <!-- /FORM TENGAH -->

                          <div class="col-md-4">
                            <!-- FORM KANAN -->
                            <div class="form-group">
                              <input type="text" id="nama_ibu" placeholder="nama Ibu " name="nama_ibu" class="form-control" required oninvalid="this.setCustomValidity('nama Ibu tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <input type="text" id="thn_lahir_ibu" placeholder="thn lhr Ibu " name="thn_lahir_ibu" class="form-control" required oninvalid="this.setCustomValidity('thn lhr Ibu tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <select name="pendidikan_ibu" class="form-control" required oninvalid="this.setCustomValidity('Pilih Pendidikan Terkahir Ibu!')" oninput="setCustomValidity('')">
                                <option value=""> -- Pilih Pendidikan Terkahir Ibu --</option>
                                <?php
                                foreach (getPendidikanTerakhir() as $val) { ?>
                                  <option value="<?= $val ?>"><?= $val ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" id="pekerjaan_ibu" class="form-control" placeholder="pekerjaan Ibu" name="pekerjaan_ibu" required oninvalid="this.setCustomValidity('pekerjaan Ibu tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <input type="text" id="penghasilan_ibu" class="form-control" placeholder="penghasilan Ibu" name="penghasilan_ibu" required oninvalid="this.setCustomValidity('penghasilan Ibu tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <input type="text" id="telp_ibu" class="form-control" placeholder="telp Ibu" name="telp_ibu" required oninvalid="this.setCustomValidity('telp Ibu tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                          </div> <!-- /FORM KANAN -->
                        </form>
                        <!-- SIMPAN -->
                        <?php
                        include "../../koneksi.php";
                        if (isset($_POST['simpan'])) {

                          $nisn = $_POST['nisn'];
                          $kelas = $_POST['kelas'];
                          $nama_siswa = $_POST['nama_siswa'];
                          $jk         = $_POST['jk'];
                          $tempat_lahir   = $_POST['tempat_lahir'];
                          $tgl_lahir      = $_POST['tgl_lahir'];
                          $agama      = $_POST['agama'];
                          $alamat      = $_POST['alamat'];
                          $telp_siswa      = $_POST['telp_siswa'];
                          $status_siswa   = $_POST['status_siswa'];
                          $nama_ayah   = $_POST['nama_ayah'];
                          $thn_lahir_ayah   = $_POST['thn_lahir_ayah'];
                          $pendidikan_ayah   = $_POST['pendidikan_ayah'];
                          $pekerjaan_ayah   = $_POST['pekerjaan_ayah'];
                          $penghasilan_ayah   = $_POST['penghasilan_ayah'];
                          $telp_ayah   = $_POST['telp_ayah'];

                          $nama_ibu   = $_POST['nama_ibu'];
                          $thn_lahir_ibu   = $_POST['thn_lahir_ibu'];
                          $pendidikan_ibu   = $_POST['pendidikan_ibu'];
                          $pekerjaan_ibu   = $_POST['pekerjaan_ibu'];
                          $penghasilan_ibu   = $_POST['penghasilan_ibu'];
                          $telp_ibu   = $_POST['telp_ibu'];

                          $query = mysqli_query($db, "SELECT * FROM tb_siswa WHERE nisn = '$nisn' ");
                          $cek = mysqli_num_rows($query);
                          if ($cek >= 1) {
                            echo "<script> alert('NISN sudah pernah diinput, Masukkan NISN lain!');</script>";
                          } else {
                            mysqli_query($db, "INSERT INTO tb_siswa (nisn,nama_siswa,jk,tempat_lahir,tgl_lahir,agama,alamat,telp_siswa,status_siswa,nama_ayah,thn_lahir_ayah,pendidikan_ayah,pekerjaan_ayah,penghasilan_ayah,telp_ayah,nama_ibu,thn_lahir_ibu,pendidikan_ibu,pekerjaan_ibu,penghasilan_ibu,telp_ibu,kelas,username,password) 
                              VALUES ('$nisn','$nama_siswa','$jk','$tempat_lahir','$tgl_lahir','$agama','$alamat','$telp_siswa','$status_siswa','$nama_ayah','$thn_lahir_ayah','$pendidikan_ayah','$pekerjaan_ayah','$penghasilan_ayah','$telp_ayah','$nama_ibu','$thn_lahir_ibu','$pendidikan_ibu','$pekerjaan_ibu','$penghasilan_ibu','$telp_ibu','$kelas','$nisn','$nisn')") or die($db->error);
                            echo "<script>alert('Data berhasil disimpan!');window.location='siswa.php';</script>";
                          }
                        }
                        ?>
                        <!-- /SIMPAN -->
                      </div> <!-- /class="x_content" -->


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <?php include_once('../layouts/footer.html') ?>
      <!-- /footer content -->
    </div>
  </div>
  <?php include_once('../layouts/scripts.html') ?>

</body>

</html>