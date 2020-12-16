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
              <a href="siswa-add.php" class="btn btn-primary" style="margin-bottom: 5px;"><i class="fa fa-plus"></i> Tambah Data</a>
              <div class="x_panel">
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                          <h2>DATA SISWA</h2>
                          <hr>
                        </p>

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Kelas</th>
                              <th>NISN</th>
                              <th>Nama Siswa</th>
                              <th>JK</th>
                              <th>TTL</th>
                              <th>Alamat</th>
                              <th>Telp</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include "../../koneksi.php";
                            $modal = mysqli_query($db, "SELECT a.*,b.nama_kelas FROM tb_siswa a
                            INNER JOIN tb_kelas b ON a.kelas=b.id_kelas ORDER BY kelas ASC");
                            while ($r = mysqli_fetch_assoc($modal)) {
                            ?>
                              <tr>
                                <td><?php echo  $r['nama_kelas']; ?></td>
                                <td><?php echo  $r['nisn']; ?></td>
                                <td><?php echo  $r['nama_siswa']; ?></td>
                                <td><?php echo  $r['jk']; ?></td>
                                <td><?php echo  $r['tempat_lahir']; ?>, <?php echo  $r['tgl_lahir']; ?></td>
                                <td><?php echo  $r['alamat']; ?></td>
                                <td><?php echo  $r['telp_siswa']; ?></td>
                                <td align="center">
                                  <a href="siswa-edit.php?nisn=<?php echo $r['nisn']; ?>" class="fa fa-edit" -></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a href="siswa-delete.php?&nisn=<?php echo  $r['nisn']; ?>" class="fa fa-trash-o"></a>
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