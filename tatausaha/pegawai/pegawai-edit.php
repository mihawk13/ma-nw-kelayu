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
                        <h2>EDIT DATA PEGAWAI</h2>
                        <hr>
                        </p>
                        <?php
                        include "../../koneksi.php";
                        $nip = @$_GET['nip'];
                        $modal = mysqli_query($db, "SELECT * FROM tb_pegawai WHERE nip='$nip' ");
                        while ($r = mysqli_fetch_array($modal)) {
                        ?>
                          <div class="x_content">
                            <!-- class="x_content" -->
                            <form action="" method="POST">
                              <div class="col-md-4">
                                <!-- FORM KIRI -->
                                <div class="form-group">
                                  <input type="text" class="form-control" placeholder="Masukkan NIP" name="nip" required readonly value="<?= $r['nip'] ?>">
                                </div>
                                <div class="form-group">
                                  <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama" name="nama" required oninvalid="this.setCustomValidity('nama tidak boleh kosong')" oninput="setCustomValidity('')" value="<?= $r['nama'] ?>">
                                </div>
                                <div class="form-group">
                                  <select name="jk" id="jk" class="form-control" required oninvalid="this.setCustomValidity('Pilih Jenis Kelamin Pegawai!')" oninput="setCustomValidity('')">
                                    <option value=""> -- Pilih Jenis Kelamin --</option>
                                    <option <?= $r['jk'] == 'Laki-Laki' ? 'selected' : '' ?> value="Laki-Laki">Laki-Laki</option>
                                    <option <?= $r['jk'] == 'Perempuan' ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <input type="text" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" required oninvalid="this.setCustomValidity('tempat lahir tidak boleh kosong')" oninput="setCustomValidity('')" value="<?= $r['tempat_lahir'] ?>">
                                </div>
                                <div class="form-group">
                                  <input type="date" id="tgl_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tgl_lahir" required oninvalid="this.setCustomValidity('tgl lahir tidak boleh kosong')" oninput="setCustomValidity('')" value="<?= $r['tgl_lahir'] ?>">
                                </div>
                                <div class="form-group">
                                  <input type="text" id="alamat" class="form-control" placeholder="Masukkan Alamat" name="alamat" required oninvalid="this.setCustomValidity('alamat tidak boleh kosong')" oninput="setCustomValidity('')" value="<?= $r['alamat'] ?>">
                                </div>
                                <div class="form-group">
                                  <input type="text" id="telp" class="form-control" placeholder="Masukkan Telp" name="telp" required oninvalid="this.setCustomValidity('telp tidak boleh kosong')" oninput="setCustomValidity('')" value="<?= $r['telp'] ?>">
                                </div>
                                <div class="form-group">
                                  <select name="level" class="form-control" required oninvalid="this.setCustomValidity('Pilih Level Pegawai!')" oninput="setCustomValidity('')">
                                    <option value=""> -- Pilih Level Pegawai --</option>
                                    <option <?= $r['level'] == 'Kepala Sekolah' ? 'selected' : '' ?> value="Kepala Sekolah">Kepala Sekolah</option>
                                    <option <?= $r['level'] == 'Guru' ? 'selected' : '' ?> value="Guru">Guru</option>
                                    <option <?= $r['level'] == 'Tata Usaha' ? 'selected' : '' ?> value="Tata Usaha">Tata Usaha</option>
                                  </select>
                                </div>

                                <div>
                                  <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                                </div>
                              </div> <!-- /FORM KIRI -->
                            </form> <?php } ?>
                          <!-- SIMPAN -->
                          <?php
                          include "../../koneksi.php";
                          if (isset($_POST['simpan'])) {
                            $nip    = $_POST['nip'];
                            $nama = $_POST['nama'];
                            $jk         = $_POST['jk'];
                            $tempat_lahir   = $_POST['tempat_lahir'];
                            $tgl_lahir      = $_POST['tgl_lahir'];
                            $alamat      = $_POST['alamat'];
                            $telp   = $_POST['telp'];
                            $level   = $_POST['level'];
                            $username      = $_POST['username'];
                            $password   = $_POST['password'];

                            $save = mysqli_query($db, "UPDATE tb_pegawai SET nip='$nip',nama='$nama',jk='$jk',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',level='$level', alamat='$alamat',telp='$telp' WHERE nip='$nip' ");

                            if ($save) {
                              echo "<script>alert('Data berhasil disimpan!');window.location='pegawai.php';</script>";
                            } else {
                              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data pegawai Gagal Di simpan !</div>';
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