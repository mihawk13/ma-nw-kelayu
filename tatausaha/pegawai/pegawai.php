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
              <a href="pegawai-add.php" class="btn btn-primary" style="margin-bottom: 5px;"><i class="fa fa-plus"></i> Tambah Data</a>
              <div class="x_panel">
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                        <h2>DATA PEGAWAI</h2>
                        <hr>
                        </p>

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>NIP</th>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>Telp</th>
                              <th>Level</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include "../../koneksi.php";
                            $modal = mysqli_query($db, "SELECT * FROM tb_pegawai");
                            $no = 1;
                            while ($r = mysqli_fetch_assoc($modal)) {
                            ?>
                              <tr>
                                <td><?= $r['nip']; ?></td>
                                <td><?= $r['nama']; ?></td>
                                <td><?= $r['jk']; ?></td>
                                <td><?= $r['telp']; ?></td>
                                <td><?= $r['level']; ?></td>
                                <td align="center">
                                  <?php if ($r['level'] == 'Guru') { ?>
                                    <a href="guru-mapel.php?nip=<?= $r['nip']; ?>" class="fa fa-book" ->Mapel</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <?php } ?>
                                  <a href="pegawai-edit.php?nip=<?= $r['nip']; ?>" class="fa fa-edit" -></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a href="pegawai-delete.php?&nip=<?= $r['nip']; ?>" class="fa fa-trash-o"></a>
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