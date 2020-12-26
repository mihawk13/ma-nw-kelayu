<?php session_start();
include "../../koneksi.php";
include "../../helper.php";
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
            <a href="index.php" class="site_title"><img src="../../../production/images/lg-icn.png" alt="..."> <span>SDN 6 Panjer</span></a>
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
                          <h2>TENTUKAN RAPORT SISWA</h2>
                          <hr>
                        </p>

                        <div class="x_content">

                          <div class="row">
                            <div class="col-md-6 col-lg-6">
                              <!-- sebelah kiri -->
                              <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <input type="text" class="form-control" readonly value="<?= $_SESSION['tahunajaran'] ?>">
                              </div>
                              <form action="" method="POST">
                                <div class="form-group">
                                  <label>Semester</label>
                                  <select id="semester" name="semester" class="form-control" required>
                                    <option value="">-- Pilih Semester --</option>
                                    <option <?= (isset($_POST['smt']) && $_POST['semester'] == 1) ? 'selected' : '' ?> value="1">1</option>
                                    <option <?= (isset($_POST['smt']) && $_POST['semester'] == 2) ? 'selected' : '' ?> value="2">2</option>
                                  </select>
                                </div>
                                <input type="submit" class="d-none" value="smt" name="smt" id="frmSmt">
                              </form>
                              <?php
                              $raport = [];

                              $modal = mysqli_query($db, "SELECT * FROM tb_raport WHERE thn_ajaran = '$_SESSION[tahunajaran]' AND semester = '$_POST[semester]' AND nisn = '$_GET[nisn]'");
                              $rpt = mysqli_fetch_assoc($modal);
                              ?>
                              <?php if (isset($_POST['smt'])) { ?>
                                <form action="" method="POST">
                                  <input type="hidden" name="nisn" value="<?= $_GET['nisn'] ?>">
                                  <input type="hidden" name="id" value="<?= $rpt['id'] ?>">
                                  <input type="hidden" name="semester" value="<?= $_POST['semester'] ?>">
                                  <div class="form-group">
                                    <label>Sikap Spiritual</label>
                                    <input type="text" class="form-control" placeholder="Sikap Spiritual" name="a_spiritual" id="a_spiritual" value="<?= $rpt['a_sikap_spiritual'] ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>Sikap Sosial</label>
                                    <input type="text" class="form-control" placeholder="Sikap Sosial" name="a_sosial" id="a_sosial" value="<?= $rpt['a_sikap_sosial'] ?>">
                                  </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                              <!-- sebelah kanan -->
                              <div class="form-group">
                                <label>Saran Saran</label>
                                <input type="text" class="form-control" placeholder="Masukkan saran-saran untuk siswa" id="saran" name="saran" value="<?= $rpt['d_saran_saran'] ?>">
                              </div>
                              <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                    <td>Extra Kurikuler</td>
                                    <td>Keterangan</td>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $modal = mysqli_query($db, "SELECT * FROM tb_extra a
                                      LEFT JOIN (SELECT * FROM tb_raport_extra WHERE id_raport = '$rpt[id]') b ON a.id = b.id_extra");
                                  while ($ext = mysqli_fetch_array($modal)) { ?>
                                    <input type="hidden" name="id_extra[]" value="<?= $ext['id'] ?>">
                                    <tr>
                                      <td><?= $ext['nama_extra'] ?></td>
                                      <td><textarea name="extra_<?= $ext['id'] ?>" rows="3"><?= $ext['keterangan'] ?></textarea></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="row">
                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <th rowspan="2">No</th>
                                  <th rowspan="2" class="text-center">Mapel</th>
                                  <th colspan="3" class="text-center">Pengetahuan</th>
                                  <th colspan="3" class="text-center">Keterampilan</th>
                                </tr>
                                <tr>
                                  <th class="text-center">Nilai</th>
                                  <th class="text-center">Predikat</th>
                                  <th class="text-center">Deskripsi</th>
                                  <th class="text-center">Nilai</th>
                                  <th class="text-center">Predikat</th>
                                  <th class="text-center">Deskripsi</th>
                                </tr>
                              </thead>

                              <tbody>
                                <?php
                                $modal = mysqli_query($db, "SELECT * FROM tb_mapel a
                                LEFT JOIN (SELECT * FROM tb_raport_detail WHERE id_raport = '$rpt[id]') b ON a.id = b.id_mapel
                                LEFT JOIN (SELECT c.id 'id_mapel',a.nisn,a.thn_ajaran, (SUM(a.nilai) / COUNT(a.nisn)) rata FROM tb_nilai a
                                                            INNER JOIN tb_siswa b ON a.nisn=b.nisn
                                                            INNER JOIN tb_mapel c ON a.id_mapel=c.id
                                                            INNER JOIN tb_kelas d ON a.id_kelas=d.id_kelas
                                                            WHERE a.nisn = '$_GET[nisn]' AND a.thn_ajaran = '$_SESSION[tahunajaran]' AND a.semester = '$_POST[semester]'
                                                            GROUP BY nisn, id_mapel, thn_ajaran, semester) c ON a.id = c.id_mapel");
                                $no = 1;
                                while ($mpl = mysqli_fetch_array($modal)) { ?>
                                  <input type="hidden" name="id_mapel[]" value="<?= $mpl['id'] ?>">
                                  <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $mpl['nama_mapel'] ?></td>
                                    <td><?= round($mpl['rata']) ?></td>
                                    <td><?= getPredikat(round($mpl['rata'])) ?></td>
                                    <td><textarea rows="3" name="pengetahuan_<?= $mpl['id'] ?>"><?= $mpl['pengetahuan'] ?></textarea></td>
                                    <td><?= round($mpl['rata']) ?></td>
                                    <td><?= getPredikat(round($mpl['rata'])) ?></td>
                                    <td><textarea rows="3" name="keterampilan_<?= $mpl['id'] ?>"><?= $mpl['keterampilan'] ?></textarea></td>
                                  </tr>
                                <?php } ?>
                              </tbody>

                            </table>

                          </div>
                          <div class="row">
                            <div>
                              <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                            </div>
                          </div>
                          </form>
                        <?php } ?>
                        <!-- SIMPAN -->
                        <?php
                        if (isset($_POST['simpan'])) {
                          $id = $_POST['id'];
                          $nisn = $_POST['nisn'];
                          $smt = $_POST['semester'];

                          // A. Sikap
                          $a_spiritual = $_POST['a_spiritual'];
                          $a_sosial = $_POST['a_sosial'];

                          $saran = $_POST['saran'];
                          $tinggi = $_POST['tinggi'];
                          $berat = $_POST['berat'];
                          $pendengaran = $_POST['pendengaran'];
                          $penglihatan = $_POST['penglihatan'];
                          $gigi = $_POST['gigi'];

                          // insert tb_raport
                          mysqli_query($db, "INSERT INTO 
                          tb_raport (thn_ajaran,semester,nisn,a_sikap_spiritual,a_sikap_sosial,d_saran_saran) 
                          VALUES ('$_SESSION[tahunajaran]','$smt','$nisn', '$a_spiritual', '$a_sosial', '$saran') 
                          ON DUPLICATE KEY UPDATE a_sikap_spiritual = '$a_spiritual', a_sikap_sosial = '$a_sosial', d_saran_saran = '$saran'") or die($db->error);

                          if ($id == '') {
                            $id = mysqli_insert_id($db);
                          }

                          // insert tb_raport_detail
                          foreach ($_POST['id_mapel'] as $val) {
                            $png = $_POST['pengetahuan_' . $val];
                            $ktr = $_POST['keterampilan_' . $val];

                            mysqli_query($db, "INSERT INTO tb_raport_detail VALUES('$id', '$val', '$png', '$ktr') 
                              ON DUPLICATE KEY UPDATE pengetahuan = '$png', keterampilan = '$ktr'") or die($db->error);
                          }

                          // insert tb_raport_extra
                          foreach ($_POST['id_extra'] as $val) {
                            $ket = $_POST['extra_' . $val];

                            mysqli_query($db, "INSERT INTO tb_raport_extra VALUES('$id', '$val', '$ket') 
                              ON DUPLICATE KEY UPDATE keterangan = '$ket'") or die($db->error);
                          }

                          echo "<script>alert('Data raport berhasil diinput');window.location='rapot.php';</script>";
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

  <script>
    $(document).ready(function() {
      $('#semester').change(function() {
        $('#frmSmt').click();

        // var extra = $('[name^="extra"]').val();


        // var smt = $(this).val();
        // var nisn = $('#nisn').val();
        // $.ajax({
        //   type: 'GET',
        //   url: 'getDataRaport.php',
        //   data: 'smt=' + smt + '&nisn=' + nisn,
        //   success: function(res) {
        //     let rest = JSON.parse(res);
        //     // console.log(rest);
        //     $('#a_spiritual').val(rest[0]);
        //     $('#a_sosial').val(rest[1]);

        //     $('#saran').val(rest[2]);

        //     $('#tinggi').val(rest[3]);
        //     $('#berat').val(rest[4]);

        //     $('#pendengaran').val(rest[5]);
        //     $('#penglihatan').val(rest[6]);
        //     $('#gigi').val(rest[7]);

        //     $('#id').val(rest[8]);
        //   }
        // });
      });
    })
  </script>

</body>

</html>