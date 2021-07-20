<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title>SIAKAD | MA NW Kelayu</title>

  <!-- Bootstrap -->
  <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../assets/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../assets/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../assets/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="../assets/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.css" rel="stylesheet">
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
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li>
                  <a href="index.php"><i class="fa fa-home"></i> Dashboard </a>
                </li>
                <li>
                  <a href="pegawai/pegawai.php"><i class="fa fa-users"></i> Data Pegawai </a>
                </li>
                <li>
                  <a href="siswa/siswa.php"><i class="fa fa-user"></i> Data Siswa </a>
                </li>
                <li>
                  <a href="mapel/mapel.php"><i class="fa fa-book"></i> Data Pelajaran </a>
                </li>
                <li>
                  <a href="kelas/kelas.php"><i class="fa fa-bank"></i> Data Kelas </a>
                </li>
                <li>
                  <a href="japel/japel.php"><i class="fa fa-calendar-o"></i> Data Jadwal Pelajaran </a>
                </li>
                <li><a><i class="fa fa-cog"></i>Setting <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="tahunajaran/tahunajaran.php">Tahun Ajaran</a></li>
                    <li><a href="datasekolah/datasekolah.php">Data Sekolah</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /menu_section -->
          </div><!-- /sidebar menu -->

        </div><!-- left_col scroll-view -->
      </div><!-- col-md-3 left_col -->

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
                  <img src="../../production/images/lg-icn.jpg" alt=""><?= $_SESSION['nama'] ?>
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

        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <?php include './dashboard.php' ?>
          </div><!-- /class="col-md-8 col-sm-8 " -->
        </div> <!-- /class="row" -->
      </div> <!-- /class="right_col" role="main" -->
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          S.I.A.K V15.07 - MA NW Kelayu
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
  <!-- Chart.js -->
  <script src="../assets/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="../assets/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="../assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="../assets/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="../assets/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="../assets/Flot/jquery.flot.js"></script>
  <script src="../assets/Flot/jquery.flot.pie.js"></script>
  <script src="../assets/Flot/jquery.flot.time.js"></script>
  <script src="../assets/Flot/jquery.flot.stack.js"></script>
  <script src="../assets/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="../assets/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="../assets/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="../assets/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="../assets/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="../assets/jqvmap/dist/jquery.vmap.js"></script>
  <script src="../assets/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../assets/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="../assets/moment/min/moment.min.js"></script>
  <script src="../assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>

</html>