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
                          <h2>EDIT DATA KELAS</h2>
                          <hr>
                        </p>

                        <div class="x_content">
                          <!-- class="x_content" -->
                          <?php
                          include "../../koneksi.php";
                          $id_kelas = @$_GET['id_kelas'];
                          $modal = mysqli_query($db, "SELECT * FROM tb_kelas WHERE id_kelas='$id_kelas' ");
                          while ($r = mysqli_fetch_array($modal)) {
                          ?>
                            <form action="" method="POST">
                              <div class="col-md-4">
                                <!-- FORM KIRI -->
                                <div class="form-group">
                                  <input type="hidden" name="id_kelas" class="form-control" value="<?= $r['id_kelas']; ?>" required readonly>
                                </div>
                                <div class="form-group">
                                  <label for="nip">Tahun Ajaran</label>
                                  <input type="text" class="form-control" placeholder="Tahun Ajaran" name="thn_ajaran" required readonly value="<?= $r['thn_ajaran'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="nip">Nama Wali Kelas <?=$r['wali_kelas']?></label>
                                  <select name="nip" class="form-control">
                                    <?php
                                    $query = mysqli_query($db, "SELECT * FROM tb_pegawai WHERE LEVEL = 'Guru' ORDER BY nama");
                                    while ($ed = mysqli_fetch_array($query)) { ?>
                                     <option <?= $ed['nip'] == $r['nip_wali'] ? 'selected' : '' ?> value="<?= $ed['nip'] ?>"><?= $ed['nama'] ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="nama_kelas">Nama Kelas</label>
                                  <input type="text" id="nama_kelas" placeholder="nama kelas" name="nama_kelas" class="form-control" value="<?= $r['nama_kelas']; ?>" required oninvalid="this.setCustomValidity('nama kelas tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div>
                                  <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                                </div>
                              </div> <!-- /FORM KIRI -->

                            </form> <?php } ?>
                          <!-- SIMPAN -->
                          <?php
                          if (isset($_POST['simpan'])) {
                            $id_kelas    = $_POST['id_kelas'];
                            $nama_kelas         = $_POST['nama_kelas'];
                            $thn_ajaran   = $_POST['thn_ajaran'];
                            $nip   = $_POST['nip'];

                            $save = mysqli_query($db, "UPDATE tb_kelas SET nama_kelas='$nama_kelas',thn_ajaran='$thn_ajaran',wali_kelas='$nip' WHERE id_kelas='$id_kelas' ");

                            if ($save) {
                              echo "<script>alert('Data berhasil disimpan!');window.location='kelas.php';</script>";
                            } else {
                              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Kelas Gagal Di simpan !</div>';
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