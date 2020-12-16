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
                      <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                          <h2>EDIT DATA PEGAWAI</h2>
                          <hr>
                        </p>
                        <?php
                          include "../../koneksi.php";
                          $id_pegawai = @$_GET['id_pegawai'];
                          $modal = mysqli_query($db, "SELECT * FROM tb_pegawai WHERE id_pegawai='$id_pegawai' ");
                          while ($r = mysqli_fetch_array($modal)) {
                            $nama = $r['nama'];
                            $username = $r['username'];
                            $password = $r['password'];
                            $jab = $r['level'];
                          }
                          ?>
                        <div class="x_content">
                          <!-- class="x_content" -->
                          <form action="" method="POST">
                            <div class="col-md-4">
                              <!-- FORM KIRI -->
                              <div class="form-group">
                                <input value="<?=$nama?>" type="text" class="form-control" placeholder="Nama Pegawai" name="nama" required oninvalid="this.setCustomValidity('nama pegawai tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <input value="<?=$username?>"  type="text" class="form-control" placeholder="Username" name="username" required oninvalid="this.setCustomValidity('username tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <input value="<?=$password?>"  type="password" class="form-control" placeholder="Password" name="password" required oninvalid="this.setCustomValidity('password tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <select name="level" class="form-control" required oninvalid="this.setCustomValidity('Pilih Level Anda!')" oninput="setCustomValidity('')">
                                  <option value=""> -- Pilih Level --</option>
                                  <option <?= $sel = ($jab == 'Tata Usaha') ? 'selected' : '' ?> value="Tata Usaha">Tata Usaha</option>
                                  <option <?= $sel = ($jab == 'Kepala Sekolah') ? 'selected' : '' ?> value="Kepala Sekolah">Kepala Sekolah</option>
                                </select>
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
                            $nama     = $_POST['nama'];
                            $level  = $_POST['level'];
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                           mysqli_query($db, "UPDATE tb_pegawai SET nama = '$nama',username = '$username',password = '$password',level = '$level' WHERE id_pegawai = '$id_pegawai'") or die($db->error);
                           echo "<script>window.location='pegawai.php';</script>";
                            
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