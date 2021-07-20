<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIAKAD | MA NW Kelayu</title>

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
                                <li><a href="rapot.php"><i class="fa fa-clone"></i>Rapot Siswa</a></li>
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
                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p class="text-muted font-13 m-b-30">
                                                <h2>CETAK RAPOT SISWA</h2>
                                                <hr>
                                                <div class="col-md-4">
                                                    <form action="rapot_pdf.php" method="post" target="_blank">
                                                        <div class="form-group">
                                                            <label>Tahun Ajaran</label>
                                                            <select name="thn" class="form-control">
                                                                <option value="">-- Pilih Tahun Ajaran --</option>
                                                                <?php
                                                                include "../koneksi.php";
                                                                $query = mysqli_query($db, "SELECT DISTINCT(thn_ajaran) FROM tb_nilai WHERE nisn = '$_SESSION[username]'");
                                                                while ($r = mysqli_fetch_array($query)) { ?>
                                                                    <option value="<?= $r['thn_ajaran'] ?>"><?= $r['thn_ajaran'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Semester</label>
                                                            <select name="smt" class="form-control">
                                                                <option value="">-- Pilih Semester --</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-success" value="SIMPAN" name="simpan">Cetak Rapot</button>
                                                    </form>
                                                </div>

                                            </p>
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
                    SIAKAD - MA NW Kelayu <a href="#">V-15.07</a>
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>