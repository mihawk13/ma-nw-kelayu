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
                      <div class="card-box">
                        <p class="text-muted font-13 m-b-30">
                          <h2>TENTUKAN MATA PELAJARAN GURU</h2>
                          <hr>
                        </p>

                        <div class="x_content">
                          <form action="" method="POST">
                            <input type="hidden" name="nip" value="<?= $_GET['nip'] ?>">
                            <?php
                            $qKelas = mysqli_query($db, "SELECT * FROM tb_kelas WHERE thn_ajaran='$_SESSION[tahunajaran]' ORDER BY nama_kelas ASC");
                            while ($kls = mysqli_fetch_array($qKelas)) {
                              $qMapel = mysqli_query($db, "SELECT * FROM tb_mapel ORDER BY nama_mapel ASC");
                              $qExtra = mysqli_query($db, "SELECT * FROM tb_extra ORDER BY nama_extra ASC");
                            ?>
                              <div class="col-md-12">
                                <div class="box-header mb-2"><b style="color:#d81b60;">KELAS <?= $kls['nama_kelas'] ?></b></div>
                                <!-- FORM KIRI -->
                                <div class="box-body">
                                  <?php
                                  while ($mpl = mysqli_fetch_array($qMapel)) {
                                    $qCheck = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM tb_mapel_guru WHERE nip = '$_GET[nip]' AND mapel_id = '$mpl[id]' AND kelas_id = '$kls[id_kelas]' AND thn_ajaran = '$_SESSION[tahunajaran]'"));
                                    $checked = ($qCheck == NULL) ? '' : 'checked';
                                  ?>
                                    <div class="col-md-4"><label><input type="checkbox" <?= $checked ?> name="mapel[]" value="<?= $kls['id_kelas'] . '-' . $mpl['id'] ?>"> <?= $mpl['nama_mapel'] ?></label></div>
                                  <?php } ?>
                                </div>
                              </div>
                            <?php } ?>
                            <div>
                              <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                            </div>
                          </form>
                          <!-- SIMPAN -->
                          <?php
                          if (isset($_POST['simpan'])) {
                            $nip = $_POST['nip'];
                            $thn = $_SESSION['tahunajaran'];
                            mysqli_query($db, "DELETE FROM tb_mapel_guru WHERE nip = '$nip' AND thn_ajaran = '$thn'") or die($db->error);
                            if (isset($_POST['mapel'])) {
                              foreach ($_POST['mapel'] as $val) {
                                $idkls;
                                $idmpl;
                                if (strlen($val) == 3) {
                                  $idkls = substr($val, 0, 1);
                                  $idmpl = substr($val, 2);
                                } elseif (strlen($val) > 3) {
                                  $idkls = substr($val, 0, 2);
                                  $idmpl = substr($val, 3);
                                }
                                mysqli_query($db, "INSERT INTO tb_mapel_guru VALUES('$nip', '$idmpl', '$idkls', '$thn')") or die($db->error);
                              }
                            }
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