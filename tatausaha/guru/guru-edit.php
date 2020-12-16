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
                          <h2>EDIT DATA GURU</h2>
                          <hr>
                        </p>

                        <div class="x_content">
                          <!-- class="x_content" -->
                          <?php
                          include "../../koneksi.php";
                          $nip = @$_GET['nip'];
                          $modal = mysqli_query($db, "SELECT * FROM tb_guru WHERE nip='$nip' ");
                          while ($r = mysqli_fetch_array($modal)) {
                          ?>
                            <form action="" method="POST">
                              <div class="col-md-4">
                                <!-- FORM KIRI -->
                                <div class="form-group">
                                  <label for="nip">NIP</label>
                                  <input type="text" id="nip" placeholder="nip" name="nip" class="form-control" value="<?php echo $r['nip']; ?>" required readonly>
                                </div>
                                <div class="form-group">
                                  <label for="nama">Nama Guru</label>
                                  <input type="text" id="nama" placeholder="nama guru" name="nama" class="form-control" value="<?php echo $r['nama']; ?>" required oninvalid="this.setCustomValidity('nama guru tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                  <label for="jk">Jenis Kelamin</label>
                                  <select name="jk" id="jk" class="form-control" required oninvalid="this.setCustomValidity('Pilih jenis kelamin Anda!')" oninput="setCustomValidity('')">
                                    <option value="laki-laki" <?php if ($r['jk'] == "laki-laki") {
                                                                echo "selected";
                                                              } ?>>laki-laki</option>
                                    <option value="perempuan" <?php if ($r['jk'] == "perempuan") {
                                                                echo "selected";
                                                              } ?>>perempuan</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="tempat_lahir">Tempat Lahir</label>
                                  <input type="text" id="tempat_lahir" placeholder="tempat lahir " name="tempat_lahir" class="form-control" value="<?php echo $r['tempat_lahir']; ?>" required oninvalid="this.setCustomValidity('tempat lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                  <label for="tgl_lahir">Tanggal Lahir</label>
                                  <input type="date" id="tgl_lahir" placeholder="tgl lahir " name="tgl_lahir" class="form-control" value="<?php echo $r['tgl_lahir']; ?>" required oninvalid="this.setCustomValidity('tgl lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                  <label for="status_kerja">Status Kerja</label>
                                  <input type="text" id="status_kerja" placeholder="status kerja " name="status_kerja" class="form-control" value="<?php echo $r['status_kerja']; ?>" required oninvalid="this.setCustomValidity('status kerja tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                  <label for="agama">Agama</label>
                                  <input type="text" id="agama" placeholder="agama " name="agama" class="form-control" value="<?php echo $r['agama']; ?>" required oninvalid="this.setCustomValidity('agama tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                  <label for="alamat">Alamat</label>
                                  <input type="text" id="alamat" placeholder="telp siswa " name="alamat" class="form-control" value="<?php echo $r['alamat']; ?>" required oninvalid="this.setCustomValidity('alamat tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                  <label for="telp">Telp</label>
                                  <input type="text" id="telp" placeholder="status siswa " name="telp" class="form-control" value="<?php echo $r['telp']; ?>" required oninvalid="this.setCustomValidity('telp tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="text" id="email" placeholder="status siswa " name="email" class="form-control" value="<?php echo $r['email']; ?>" required oninvalid="this.setCustomValidity('email tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div>
                                  <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                                </div>
                              </div> <!-- /FORM KIRI -->

                            </form> <?php } ?>
                          <!-- SIMPAN -->
                          <?php
                          if (isset($_POST['simpan'])) {
                            $nip    = $_POST['nip'];
                            $nama = $_POST['nama'];
                            $jk         = $_POST['jk'];
                            $tempat_lahir   = $_POST['tempat_lahir'];
                            $tgl_lahir      = $_POST['tgl_lahir'];
                            $status_kerja   = $_POST['status_kerja'];
                            $agama      = $_POST['agama'];
                            $alamat      = $_POST['alamat'];
                            $telp   = $_POST['telp'];
                            $email   = $_POST['email'];

                            mysqli_query($db, "UPDATE tb_user SET nama = '$nama' WHERE username = '$nip'") or die($db->error);
                            $save = mysqli_query($db, "UPDATE tb_guru SET nip='$nip',nama='$nama',jk='$jk',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',status_kerja='$status_kerja',agama='$agama',alamat='$alamat',telp='$telp',email='$email' WHERE nip='$nip' ");

                            if ($save) {
                              echo "<script>window.location='guru.php';</script>";
                            } else {
                              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Guru Gagal Di simpan !</div>';
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