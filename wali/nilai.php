<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SIAKAD | SDK RENTUNG II</title>

  <!-- Bootstrap -->
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../assets/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../assets/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->

  <link href="../assets/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../assets/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../assets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
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
         <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li>
                  <a href="index.php"><i class="fa fa-home"></i> Home </a>
                </li>
                <li><a href="rapot.php"><i class="fa fa-clone"></i>Rapot Siswa</a></li>
                <li><a href="nilai.php"><i class="fa fa-clone"></i>Laporan Nilai</a></li>
              </ul>
            </div><!-- /menu_section -->
          </div><!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="../../production/images/lg-icn.png" alt=""><?=$_SESSION['nama']?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>
            </ul>
          </nav><!-- /nav navbar-nav -->
        </div><!-- /nav_menu -->
      </div><!-- /top navigation -->
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
                          <h2>LAPORAN DATA NILAI</h2>
                          <hr>
                        </p>

                        <table id="datatable-responsive" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Guru</th>
                              <th>Thn. Ajaran / Semester</th>
                              <th>Mapel</th>
                              <th>Jenis Nilai</th>
                              <th>Nilai</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include "../koneksi.php";
                            $modal = mysqli_query($db, "SELECT f.nama, d.nama_kelas,a.*,b.nama_siswa,c.nama_mapel FROM tb_nilai a
                            INNER JOIN tb_siswa b ON a.nisn=b.nisn
                            INNER JOIN tb_mapel c ON a.id_mapel=c.id
                            INNER JOIN tb_kelas d ON a.id_kelas=d.id_kelas
                            INNER JOIN tb_mapel_guru e ON a.id_kelas=e.id_kelas AND a.id_mapel=e.id_mapel
                            INNER JOIN tb_guru f ON e.nip=f.nip
                            WHERE a.nisn = '$_SESSION[username]'");
                            while ($r = mysqli_fetch_assoc($modal)) {
                            ?>
                              <tr>
                                <td><?php echo  $r['nama']; ?></td>
                                <td><?php echo  $r['thn_ajaran'] . ' / ' . $r['semester']; ?></td>
                                <td><?php echo  $r['nama_mapel']; ?></td>
                                <td><?php echo  $r['jns_nilai']; ?></td>
                                <td><?php echo  $r['nilai']; ?></td>
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
      <footer>
        <div class="pull-right">
          SIAKAD - SDK RENTUNG II <a href="#">V-15.07</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="../assets/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../assets/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../assets/nprogress/nprogress.js"></script>
  <!-- iCheck -->
  <script src="../assets/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="../assets/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../assets/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../assets/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../assets/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../assets/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../assets/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../assets/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../assets/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../assets/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../assets/jszip/dist/jszip.min.js"></script>
  <script src="../assets/pdfmake/build/pdfmake.min.js"></script>
  <script src="../assets/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>

</html>