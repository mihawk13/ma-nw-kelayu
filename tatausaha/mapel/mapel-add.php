<?php session_start();
include "../../koneksi.php"; ?>
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
                      <p class="text-muted font-13 m-b-30">
                        <h2>TAMBAH DATA PELAJARAN</h2>
                        <hr>
                      </p>

                      <div class="x_content">
                        <!-- class="x_content" -->
                        <form action="" method="POST">
                          <div class="col-md-4">
                            <!-- FORM KIRI -->
                            <div class="form-group">
                              <label>Mata Pelajaran</label>
                              <input type="text" id="nama_mapel" class="form-control" placeholder="Masukkan Nama Mata Pelajaran" name="nama_mapel" required oninvalid="this.setCustomValidity('nama mapel tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <label>Centang Jika Mata Pelajaran Muatan Lokal</label><br>
                            <div class="form-check">
                              <input type="checkbox" id="ml" name="ml" value="1" class="form-check-input">
                              <label for="ml" class="form-check-label"> Muatan Lokal</label><br>
                            </div><br>

                            <div>
                              <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                            </div>
                          </div> <!-- /FORM KIRI -->
                        </form>
                        <!-- SIMPAN -->
                        <?php
                        if (isset($_POST['simpan'])) {

                          $nama_mapel = $_POST['nama_mapel'];
                          $mulok = $_POST['ml'];

                          mysqli_query($db, "INSERT INTO tb_mapel (nama_mapel,mulok) VALUES ('$nama_mapel','$mulok')") or die($db->error);
                          echo "<script>window.location='mapel.php';</script>";
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