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
                      <div class="card-box">
                        <p class="text-muted font-13 m-b-30">
                        <h2>TAMBAH DATA PEGAWAI</h2>
                        <hr>
                        </p>

                        <div class="x_content">
                          <!-- class="x_content" -->
                          <form action="" method="POST">
                            <div class="col-md-4">
                              <!-- FORM KIRI -->
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Masukkan NIP" name="nip" required oninvalid="this.setCustomValidity('nip tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama" name="nama" required oninvalid="this.setCustomValidity('nama tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <select name="jk" id="jk" class="form-control" required oninvalid="this.setCustomValidity('Pilih Jenis Kelamin Pegawai!')" oninput="setCustomValidity('')">
                                  <option value=""> -- Pilih Jenis Kelamin --</option>
                                  <option value="Laki-Laki">Laki-Laki</option>
                                  <option value="Perempuan">Perempuan</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <input type="text" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" required oninvalid="this.setCustomValidity('tempat lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <input type="date" id="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tgl_lahir" required oninvalid="this.setCustomValidity('tgl lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <input type="text" id="alamat" class="form-control" placeholder="Masukkan Alamat" name="alamat" required oninvalid="this.setCustomValidity('alamat tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <input type="text" id="telp" class="form-control" placeholder="Masukkan Telp" name="telp" required oninvalid="this.setCustomValidity('telp tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <select name="level" class="form-control" required oninvalid="this.setCustomValidity('Pilih Level Pegawai!')" oninput="setCustomValidity('')">
                                  <option value=""> -- Pilih Level Pegawai --</option>
                                  <option value="Kepala Sekolah">Kepala Sekolah</option>
                                  <option value="Guru">Guru</option>
                                  <option value="Tata Usaha">Tata Usaha</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <input type="text" placeholder="Masukkan Username " name="username" class="form-control" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <input type="password" placeholder="Masukkan Password " name="password" class="form-control" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="setCustomValidity('')">
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
                            $agama      = $_POST['agama'];
                            $telp      = $_POST['telp'];
                            $level   = $_POST['level'];
                            $username      = $_POST['username'];
                            $password   = $_POST['password'];
                            $alamat   = $_POST['alamat'];


                            $query = mysqli_query($db, "SELECT * FROM tb_pegawai WHERE nip = '$nip' ");
                            $cek = mysqli_num_rows($query);
                            if ($cek >= 1) {
                              echo "<script> alert('NIP yang anda masukkan sudah pernah diinput, Coba Periksa Lagi!');window.location='pegawai.php';</script>";
                            } else {
                              mysqli_query($db, "INSERT INTO tb_pegawai (nip,nama,jk,tempat_lahir,tgl_lahir,level,alamat,telp,username,password) VALUES ('$nip','$nama','$jk','$tempat_lahir','$tgl_lahir','$level','$alamat','$telp','$username','$password')") or die($db->error);
                              echo "<script>alert('Data berhasil disimpan!');window.location='pegawai.php';</script>";
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