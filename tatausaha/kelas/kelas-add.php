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
                        <h2>TAMBAH DATA KELAS</h2>
                        <hr>
                      </p>

                      <div class="x_content">
                        <!-- class="x_content" -->
                        <form action="" method="POST">
                          <div class="col-md-4">
                            <!-- FORM KIRI -->
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Tahun Ajaran" name="tahun_ajaran" required readonly value="<?= $_SESSION['tahunajaran'] ?>">
                            </div>
                            <div class="form-group">
                              <select name="nip" id="" class="form-control select2">
                                <option value="">-- Pilih Wali Kelas --</option>
                                <?php
                                $query = mysqli_query($db, "SELECT * FROM tb_pegawai WHERE LEVEL = 'Guru' AND nip NOT IN(SELECT nip_wali FROM tb_kelas WHERE thn_ajaran ='$_SESSION[tahunajaran]') ORDER BY nama");
                                while ($r = mysqli_fetch_array($query)) { ?>
                                  <option value="<?= $r['nip'] ?>"><?= $r['nama'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" id="nama_kelas" class="form-control" placeholder="nama kelas" name="nama_kelas" required oninvalid="this.setCustomValidity('nama kelas tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>

                            <div>
                              <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                            </div>
                          </div> <!-- /FORM KIRI -->
                        </form>
                        <!-- SIMPAN -->
                        <?php
                        if (isset($_POST['simpan'])) {

                          $nip          = $_POST['nip'];
                          $nama_kelas   = $_POST['nama_kelas'];

                          mysqli_query($db, "INSERT INTO tb_kelas (nama_kelas,thn_ajaran,wali_kelas) VALUES ('$nama_kelas','$_SESSION[tahunajaran]','$nip')") or die($db->error);
                          echo "<script>alert('Data berhasil disimpan!');window.location='kelas.php';</script>";
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