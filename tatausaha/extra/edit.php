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
                      <p class="text-muted font-13 m-b-30">
                        <h2>EDIT DATA EXTRAKURIKULER</h2>
                        <hr>
                      </p>

                      <div class="x_content">
                        <!-- class="x_content" -->
                        <?php
                        include "../../koneksi.php";
                        $id_extra = @$_GET['id_extra'];
                        $modal = mysqli_query($db, "SELECT * FROM tb_extra WHERE id='$id_extra' ");
                        while ($r = mysqli_fetch_array($modal)) {
                        ?>
                          <form action="" method="POST">
                            <div class="col-md-4">
                              <!-- FORM KIRI -->
                              <input type="hidden" name="id_extra" value="<?= $r['id']; ?>" required readonly>
                              <div class="form-group">
                                <label for="nama_extra">Nama Kegiatan Extrakurikuler</label>
                                <input type="text" id="nama_extra" placeholder="Nama Kegiatan Extrakurikuler" name="nama_extra" class="form-control" value="<?php echo $r['nama_extra']; ?>" required oninvalid="this.setCustomValidity('Nama Kegiatan Extrakurikuler tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div>
                                <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                              </div>
                            </div> <!-- /FORM KIRI -->

                          </form> <?php } ?>
                        <!-- SIMPAN -->
                        <?php
                        if (isset($_POST['simpan'])) {
                          $id_extra     = $_POST['id_extra'];
                          $nama_extra   = $_POST['nama_extra'];

                          $save = mysqli_query($db, "UPDATE tb_extra SET nama_extra='$nama_extra' WHERE id='$id_extra' ");

                          if ($save) {
                            echo "<script>window.location='extra.php';</script>";
                          } else {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Pelajaran Gagal Di simpan !</div>';
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