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
            <a href="index.php" class="site_title"><img src="../../production/images/lg-icn.png" alt="..."> <span>SDK Rentung II</span></a>
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
                      <div class="card-box ">
                        <p class="text-muted font-13 m-b-30">
                          <h2>DATA SEKOLAH</h2>
                          <hr>
                        </p>
                        <?php
                        include "../../koneksi.php";
                        $modal = mysqli_query($db, "SELECT * FROM tb_data_sekolah WHERE id = 1");
                        while ($r = mysqli_fetch_array($modal)) {
                          $alamat = $r['alamat'];
                          $nama_sekolah = $r['nama_sekolah'];
                          $nama_kepsek = $r['nama_kepsek'];
                          $nip_kepsek = $r['nip_kepsek'];
                        }
                        ?>
                        <div class="x_content">
                          <!-- class="x_content" -->
                          <form action="" method="POST">
                            <div class="col-md-4">
                              <!-- FORM KIRI -->
                              <div class="form-group">
                                <label>Alamat Sekolah</label>
                                <input value="<?= $alamat ?>" type="text" class="form-control" placeholder="Alamat Sekolah" name="alamat" required oninvalid="this.setCustomValidity('Alamat Sekolah tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                              <label>Nama Sekolah</label>
                                <input value="<?= $nama_sekolah ?>" type="text" class="form-control" placeholder="Nama Sekolah" name="sekolah" required oninvalid="this.setCustomValidity('Nama Sekolah tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="">Nama Kepala Sekolah</label>
                                <input value="<?= $nama_kepsek ?>" type="text" class="form-control" placeholder="Nama Kepala Sekolah" name="kepsek" required oninvalid="this.setCustomValidity('Nama Kepala Sekolah tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="">NIP Kepala Sekolah</label>
                                <input value="<?= $nip_kepsek ?>" type="text" class="form-control" placeholder="NIP Kepala Sekolah" name="nip" required oninvalid="this.setCustomValidity('NIP Kepala Sekolah tidak boleh kosong')" oninput="setCustomValidity('')">
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
                            $alamat = $_POST['alamat'];
                            $nama_sekolah = $_POST['sekolah'];
                            $nama_kepsek = $_POST['kepsek'];
                            $nip_kepsek = $_POST['nip'];

                            mysqli_query($db, "UPDATE tb_data_sekolah SET alamat = '$alamat', nama_sekolah = '$nama_sekolah',nama_kepsek = '$nama_kepsek',nip_kepsek = '$nip_kepsek' WHERE id = 1") or die($db->error);
                            echo "<script>window.location='datasekolah.php';</script>";
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