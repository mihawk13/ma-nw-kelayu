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
            <a href="index.php" class="site_title"><img src="../../../production/images/lg-icn.jpg" alt="..."> <span>SDN 6 Panjer</span></a>
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
                          <h2>DATA RAPORT SISWA</h2>
                          <hr>
                        </p>

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kelas</th>
                              <th>Nama Siswa</th>
                              <th>JK</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include "../../koneksi.php";
                            $modal = mysqli_query($db, "SELECT * FROM tb_siswa a
                            INNER JOIN tb_kelas b ON a.kelas=b.id_kelas
                            WHERE b.wali_kelas = '$_SESSION[username]' AND b.thn_ajaran = '$_SESSION[tahunajaran]' ORDER BY a.nama_siswa ASC");
                            $no=1;
                            while ($r = mysqli_fetch_assoc($modal)) {
                            ?>
                              <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $r['nama_kelas']; ?></td>
                                <td><?= $r['nama_siswa']; ?></td>
                                <td><?= $r['jk']; ?></td>

                                <td align="center">
                                  <a href="set-rapot.php?nisn=<?= $r['nisn']; ?>" class="fa fa-book" ->Tentukan Raport</a>&nbsp;&nbsp;&nbsp;
                                  <a target="_blank" href="get-rapot.php?nisn=<?= $r['nisn']; ?>" class="fa fa-eye" ->Lihat Raport</a>
                                </td>
                              </tr> <?php } ?>
                          </tbody>
                        </table>


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