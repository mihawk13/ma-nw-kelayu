<?php session_start();
include "../../koneksi.php"; ?>
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
            <a href="index.php" class="site_title"><img src="../../../production/images/lg-icn.png" alt="..."> <span>SDK Rentung II</span></a>
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
                        <h2>TAMBAH DATA NILAI</h2>
                        <hr>
                      </p>

                      <div class="x_content">
                        <!-- class="x_content" -->
                        <form action="" method="POST">
                          <div class="col-md-4">
                            <!-- FORM KIRI -->
                            <div class="form-group">
                              <select name="id_mapel" id="id_mapel" class="form-control" required>
                                <option value="">-- Pilih Mapel --</option>
                                <?php
                                $query = mysqli_query($db, "SELECT a.id_kelas, a.id_mapel, b.nama_mapel,c.nama_kelas FROM tb_mapel_guru a
                                  INNER JOIN tb_mapel b ON a.id_mapel=b.id
                                  INNER JOIN tb_kelas c ON a.id_kelas=c.id_kelas
                                  WHERE a.nip = '$_SESSION[username]' AND a.thn_ajaran = '$_SESSION[tahunajaran]'");
                                while ($r = mysqli_fetch_array($query)) { ?>
                                  <option value="<?= $r['id_kelas'] . '-' . $r['id_mapel'] ?>"><?= $r['nama_kelas'] . ' | ' . $r['nama_mapel'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <select name="nisn" id="siswa" class="form-control select2" required>
                                <option value="">-- Pilih Siswa --</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <select name="semester" class="form-control" required>
                                <option value="">-- Pilih Semester --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" id="jns_nilai" class="form-control" placeholder="Jenis Nilai" name="jns_nilai" required oninvalid="this.setCustomValidity('jenis nilai tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                              <input type="text" id="nilai" class="form-control" placeholder="Nilai" name="nilai" required oninvalid="this.setCustomValidity('nilai tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>

                            <div>
                              <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                            </div>
                          </div> <!-- /FORM KIRI -->
                        </form>
                        <!-- SIMPAN -->
                        <?php
                        if (isset($_POST['simpan'])) {

                          $id_mapel   = $_POST['id_mapel'];
                          $nisn       = $_POST['nisn'];
                          $semester   = $_POST['semester'];
                          $jns_nilai  = $_POST['jns_nilai'];
                          $nilai      = $_POST['nilai'];
                          $thn        = $_SESSION['tahunajaran'];

                          $idkls;
                          $idmpl;
                          if (strlen($id_mapel) == 3) {
                            $idkls = substr($id_mapel, 0, 1);
                            $idmpl = substr($id_mapel, 2);
                          } elseif (strlen($id_mapel) > 3) {
                            $idkls = substr($id_mapel, 0, 2);
                            $idmpl = substr($id_mapel, 3);
                          }

                          mysqli_query($db, "INSERT INTO tb_nilai (id_kelas,id_mapel,nisn,jns_nilai,nilai,thn_ajaran,semester) VALUES ('$idkls', '$idmpl','$nisn','$jns_nilai','$nilai','$thn','$semester')") or die($db->error);
                          echo "<script>window.location='nilai.php';</script>";
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
  <script>
    $('#id_mapel').change(function() {
      var kelas = $(this).val();
      let idkls;
      let idmpl;
      // console.log(kelas.length)

      if (kelas.length == 3) {
        idkls = kelas.substr(0, 1);
        idmpl = kelas.substr(2);
      } else if (kelas.length > 3) {
        idkls = kelas.substr(0, 2);
        idmpl = kelas.substr(3);
      }
      // console.log(idkls, idmpl)

      $.ajax({
        type: 'GET',
        url: 'getNamaSiswa.php',
        data: 'kelas=' + idkls,
        success: function(response) {
          $('#siswa').html(response);
        }
      });
    });
  </script>
</body>

</html>