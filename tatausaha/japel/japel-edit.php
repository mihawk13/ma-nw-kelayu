<?php session_start();
include "../../koneksi.php";
include "../../helper.php"; ?>
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
                      <p class="text-muted font-13 m-b-30">
                        <h2>EDIT DATA JADWAL PELAJARAN</h2>
                        <hr>
                      </p>

                      <div class="x_content">
                        <!-- class="x_content" -->
                        <?php
                        $id_japel = $_GET['id_japel'];
                        $modal = mysqli_query($db, "SELECT * FROM tb_japel WHERE id='$id_japel' ");
                        while ($ed = mysqli_fetch_array($modal)) {
                        ?>
                          <form action="" method="POST">
                            <div class="col-md-4">
                              <!-- FORM KIRI -->
                              <div class="form-group">
                                <select name="id_kelas" id="idkelas" class="form-control">
                                  <option value="">-- Pilih Kelas --</option>
                                  <?php
                                  $query = mysqli_query($db, "SELECT * FROM tb_kelas WHERE thn_ajaran = '$_SESSION[tahunajaran]'");
                                  while ($r = mysqli_fetch_array($query)) { ?>
                                    <option <?= ($r['id_kelas'] == $ed['kelas_id']) ? 'selected' : '' ?> value="<?= $r['id_kelas'] ?>"><?= $r['nama_kelas'] ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <select name="id_mapel" id="mapel" class="form-control">
                                  <option value="">-- Pilih Mapel --</option>
                                  <?php
                                  $query = mysqli_query($db, "SELECT * FROM tb_mapel ORDER BY nama_mapel ASC");
                                  while ($r = mysqli_fetch_array($query)) { ?>
                                    <option <?= ($r['id'] == $ed['mapel_id']) ? 'selected' : '' ?> value="<?= $r['id'] ?>"><?= $r['nama_mapel'] ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <select name="hari" class="form-control">
                                  <option value="">-- Pilih Hari --</option>
                                  <?php
                                  foreach (getHari() as $val) { ?>
                                    <option <?= ($val == $ed['hari']) ? 'selected' : '' ?> value="<?= $val ?>"><?= $val ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <input value="<?=$ed['jam']?>" type="text" id="jam" class="form-control" placeholder="Jam" name="jam" required oninvalid="this.setCustomValidity('jam kelas tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div>
                                <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                              </div>
                            </div> <!-- /FORM KIRI -->

                          </form> <?php } ?>
                        <!-- SIMPAN -->
                        <?php
                        if (isset($_POST['simpan'])) {
                          $id_kelas = $_POST['id_kelas'];
                          $id_mapel = $_POST['id_mapel'];
                          $hari     = $_POST['hari'];
                          $jam      = $_POST['jam'];
                          
                          $save = mysqli_query($db, "UPDATE tb_japel SET id_kelas='$id_kelas',id_mapel='$id_mapel',hari='$hari',jam='$jam' WHERE id='$_GET[id_japel]' ");

                          if ($save) {
                            echo "<script>alert('Data berhasil disimpan!');window.location='japel.php';</script>";
                          } else {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Jadwal Gagal Di simpan !</div>';
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