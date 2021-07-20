<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include_once('../layouts/head.html') ?>
<link href="../../assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
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
                      <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                          <h2>EDIT DATA ABSENSI</h2>
                          <hr>
                        </p>

                        <div class="x_content">
                          <!-- class="x_content" -->
                          <?php
                          include "../../koneksi.php";
                          $id_absen = @$_GET['id_absen'];
                          $modal = mysqli_query($db, "SELECT * FROM tb_absen WHERE id_absen='$id_absen' ");
                          while ($r = mysqli_fetch_array($modal)) {
                          ?>
                            <form action="" method="POST">
                              <div class="col-md-4">
                                <!-- FORM KIRI -->
                                <div class="form-group">
                                  <label for="id_absen">ID Absen</label>
                                  <input type="text" id="id_absen" placeholder="ID Absen" name="id_absen" class="form-control" value="<?= $r['id_absen']; ?>" required readonly>
                                </div>
                                <div class="form-group">
                                  <label for="nisn">Siswa</label>
                                  <select name="nisn" id="" class="form-control">
                                    <option value="">-- Pilih Siswa --</option>
                                    <?php
                                    $query = mysqli_query($db, "SELECT * FROM tb_siswa");
                                    while ($ed = mysqli_fetch_array($query)) {
                                      if ($r['nisn'] == $ed['nisn']) { ?>
                                        <option selected value="<?= $ed['nisn'] ?>"><?= $ed['nama_siswa'] ?></option>
                                      <?php } else { ?>
                                        <option value="<?= $ed['nisn'] ?>"><?= $ed['nama_siswa'] ?></option>
                                    <?php }
                                    } ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="tgl_absen">Tgl Absen</label>
                                  <input type="text" id="datepicker" name="tgl_absen" placeholder="Masukkan Tanggal Absen" class="form-control" value="<?= $r['tgl_absen']; ?>" required oninvalid="this.setCustomValidity('tgl absen tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                  <label for="ket_absen">Ket. Absen</label>
                                  <input type="text" id="ket_absen" placeholder="tempat lahir " name="ket_absen" class="form-control" value="<?= $r['ket_absen']; ?>" required oninvalid="this.setCustomValidity('tempat lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div>
                                  <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                                </div>
                              </div> <!-- /FORM KIRI -->

                            </form> <?php } ?>
                          <!-- SIMPAN -->
                          <?php
                          if (isset($_POST['simpan'])) {
                            $id_absen    = $_POST['id_absen'];
                            $nisn = $_POST['nisn'];
                            $tgl_absen         = $_POST['tgl_absen'];
                            $ket_absen   = $_POST['ket_absen'];


                            $save = mysqli_query($db, "UPDATE tb_absen SET id_absen='$id_absen',nisn='$nisn',tgl_absen='$tgl_absen',ket_absen='$ket_absen' WHERE id_absen='$id_absen' ");

                            if ($save) {
                              echo "<script>alert('Data berhasil disimpan!');window.location='absen.php';</script>";
                            } else {
                              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Absen Gagal Di simpan !</div>';
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
  <script src="../../assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#datepicker').datepicker({
          toggleActive: true,
          endDate: new Date(),
          todayBtn: 'linked',
          format: 'yyyy-mm-d'
      });
    });
  </script>

</body>

</html>