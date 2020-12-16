<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('../layouts/head.html') ?>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img src="../../../production/images/lg-icn.png" alt="..."> <span>SDK Rentung II</span></a>
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
                      <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                          <h2>TAMBAH DATA GURU</h2>
                          <hr>
                        </p>

                        <div class="x_content">
                          <!-- class="x_content" -->
                          <form action="" method="POST">
                            <div class="col-md-4">
                              <!-- FORM KIRI -->
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="nip guru" name="nip" required oninvalid="this.setCustomValidity('nip guru tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <input type="text" id="nama" class="form-control" placeholder="nama guru" name="nama" required oninvalid="this.setCustomValidity('nama guru tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <select name="jk" id="jk" class="form-control" required oninvalid="this.setCustomValidity('Pilih Jenis Kelamin Anda!')" oninput="setCustomValidity('')">
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
                                <input type="text" id="status_kerja" placeholder="status kerja " name="status_kerja" class="form-control" required oninvalid="this.setCustomValidity('status kerja tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <input type="text" id="agama" class="form-control" placeholder="agama" name="agama" required oninvalid="this.setCustomValidity('agama tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <input type="text" id="alamat" class="form-control" placeholder="alamat" name="alamat" required oninvalid="this.setCustomValidity('alamat tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <input type="text" id="telp" class="form-control" placeholder="telp guru" name="telp" required oninvalid="this.setCustomValidity('telp guru tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <input type="text" id="email" placeholder="email " name="email" class="form-control" required oninvalid="this.setCustomValidity('email tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>

                              <div>
                                <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                              </div>
                            </div> <!-- /FORM KIRI -->
                          </form>
                          <!-- SIMPAN -->
                          <?php
                          include "../../koneksi.php";
                          if (isset($_POST['simpan'])) {

                            $nip = $_POST['nip'];
                            $nama = $_POST['nama'];
                            $jk         = $_POST['jk'];
                            $tempat_lahir   = $_POST['tempat_lahir'];
                            $tgl_lahir      = $_POST['tgl_lahir'];
                            $status_kerja   = $_POST['status_kerja'];
                            $agama      = $_POST['agama'];
                            $alamat      = $_POST['alamat'];
                            $telp      = $_POST['telp'];
                            $email   = $_POST['email'];


                            $query = mysqli_query($db, "SELECT * FROM tb_guru WHERE nip = '$nip' ");
                            $cek = mysqli_num_rows($query);
                            if ($cek >= 1) {
                              echo "<script> alert('Data sudah pernah diinput, Coba Periksa Lagi!');window.location='guru.php';</script>";
                            } else {
                              mysqli_query($db, "INSERT INTO tb_guru (nip,nama,jk,tempat_lahir,tgl_lahir,status_kerja,agama,alamat,telp,email) VALUES ('$nip','$nama','$jk','$tempat_lahir','$tgl_lahir','$status_kerja','$agama','$alamat','$telp','$email')") or die($db->error);
                              mysqli_query($db, "INSERT INTO tb_user (nama,username,password,level) VALUES ('$nama', '$nip', '$nip', 'Guru')") or die($db->error);
                              echo "<script>window.location='guru.php';</script>";
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