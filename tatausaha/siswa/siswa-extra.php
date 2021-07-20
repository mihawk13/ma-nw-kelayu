<?php session_start();
include "../../koneksi.php";
?>
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
            <a href="index.php" class="site_title"><img src="../../../production/images/lg-icn.jpg" alt="..."> <span>MA NW Kelayu</span></a>
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
                        <h2>TENTUKAN EXTRAKURIKULER SISWA</h2>
                        <hr>
                        </p>

                        <div class="x_content">
                          <form action="" method="POST">
                            <input type="hidden" name="nisn" value="<?= $_GET['nisn'] ?>">
                            <?php

                            $qExtra = mysqli_query($db, "SELECT * FROM tb_extra ORDER BY nama_extra ASC");
                            ?>
                            <div class="col-md-12">
                              <div class="box-header mb-2"><b style="color:#d81b60;">- Extrakurikuler</b></div>
                              <!-- FORM KIRI -->
                              <div class="box-body mb-5">
                                <?php
                                while ($mpx = mysqli_fetch_array($qExtra)) {
                                  $qCheck = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_extra_siswa WHERE nisn = '$_GET[nisn]' AND id_extra = '$mpx[id]' AND thn_ajaran = '$_SESSION[tahunajaran]'"));
                                  $checked = ($qCheck == NULL) ? '' : 'checked';
                                ?>
                                  <div class="col-md-4"><label><input type="checkbox" <?= $checked ?> name="extra[]" value="<?= $mpx['id'] ?>"> <?= $mpx['nama_extra'] ?></label></div>
                                <?php } ?>
                              </div>
                            </div>
                            <div>
                              <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                            </div>
                          </form>
                          <!-- SIMPAN -->
                          <?php
                          if (isset($_POST['simpan'])) {
                            $nisn = $_POST['nisn'];
                            $thn = $_SESSION['tahunajaran'];
                            mysqli_query($db, "DELETE FROM tb_extra_siswa WHERE nisn = '$nisn' AND thn_ajaran = '$thn'") or die($db->error);
                            if (isset($_POST['extra'])) {
                              foreach ($_POST['extra'] as $val) {
                                // $idkls;
                                // $idext;
                                // if (strlen($val) == 3) {
                                //   $idkls = substr($val, 0, 1);
                                //   $idext = substr($val, 2);
                                // } elseif (strlen($val) > 3) {
                                //   $idkls = substr($val, 0, 2);
                                //   $idext = substr($val, 3);
                                // }
                                mysqli_query($db, "INSERT INTO tb_extra_siswa VALUES('$nisn', '$val', '$thn')") or die($db->error);
                              }
                            }
                            echo "<script>alert('Extrakurikuler siswa berhasil disimpan!');window.location='siswa.php';</script>";
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