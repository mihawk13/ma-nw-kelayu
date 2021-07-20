<?php session_start();
include "../../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('../layouts/head.html') ?>
<link href="../../assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img src="../../../production/images/lg-icn.jpg" alt="..."> <span>MA NW Kelayu</span></a>
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
                          <h2>TAMBAH DATA ABSENSI</h2>
                          <hr>
                        </p>

                        <div class="x_content">
                          <!-- class="x_content" -->
                          <form action="" method="POST">
                            <div class="col-md-4">
                              <!-- FORM KIRI -->
                              <div class="form-group">
                                <label>Kelas</label>
                                <select id="kelas" class="form-control">
                                  <option value="">-- Pilih Kelas --</option>
                                  <?php
                                  $query = mysqli_query($db, "SELECT * FROM tb_kelas");
                                  while ($r = mysqli_fetch_array($query)) { ?>
                                    <option value="<?= $r['id_kelas'] ?>"><?= $r['nama_kelas'] ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="nisn">Siswa</label>
                                <select name="nisn" id="nama_siswa" class="form-control select2">
                                  <option value="">-- Pilih Siswa --</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="nisn">Tanggal</label>
                                <input type="text" id="datepicker" class="form-control" placeholder="Masukkan Tanggal Absen" name="tgl_absen" required oninvalid="this.setCustomValidity('tgl absen tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="nisn">Keterangan</label>
                                <select name="ket_absen" id="" class="form-control">
                                  <option value="">-- Pilih Keterangan --</option>
                                  <option value="Sakit">Sakit</option>
                                  <option value="Ijin">Ijin</option>
                                  <option value="Tanpa Keterangan">Tanpa Keterangan</option>
                                </select>
                              </div>

                              <div>
                                <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                              </div>
                            </div> <!-- /FORM KIRI -->
                          </form>
                          <!-- SIMPAN -->
                          <?php
                          if (isset($_POST['simpan'])) {

                            $thn        = $_SESSION['tahunajaran'];
                            $nisn       = $_POST['nisn'];
                            $tgl_absen  = $_POST['tgl_absen'];
                            $ket_absen  = $_POST['ket_absen'];


                            mysqli_query($db, "INSERT INTO tb_absen (tahun_ajaran,nisn,tgl_absen,ket_absen) VALUES ('$thn','$nisn','$tgl_absen','$ket_absen')") or die($db->error);
                            echo "<script>alert('Data berhasil disimpan!');window.location='absen.php';</script>";
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
  <script src="../../assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  <script>
    $('#kelas').change(function() {
      var kelas = $(this).val();
      console.log(kelas)

      $.ajax({
        type: 'GET',
        url: 'getNamaSiswa.php',
        data: 'kelas=' + kelas,
        success: function(response) {
          $('#nama_siswa').html(response);
        }
      });
    });
    $(document).ready(function () {
      $('#datepicker').datepicker({
          toggleActive: true,
          endDate: new Date(),
          todayBtn: 'linked',
          format: 'yyyy-mm-d'
      });
    });
  </script>
</body>

</html>