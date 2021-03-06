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
                      <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                          <h2>LAPORAN JADWAL PELAJARAN</h2>
                          <hr>
                          <form class="d-flex m-b-30 m-t-20" method="POST">
                            <div class="input-daterange input-group col-2" id="date-range">
                              <select name="kelas" id="kelas" class="form-control">
                                <option value="">-- Pilih Kelas --</option>
                                <?php
                                include "../../koneksi.php";

                                $klsid = isset($_POST['kelas']) ? $_POST['kelas'] : '';
                                $modal = mysqli_query($db, "SELECT * FROM tb_kelas WHERE thn_ajaran = '$_SESSION[tahunajaran]'");
                                while ($r = mysqli_fetch_assoc($modal)) { ?>
                                <option <?= ($klsid == $r['id_kelas']) ? 'selected' : '' ?> value="<?=$r['id_kelas']?>"><?=$r['nama_kelas']?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-12">
                              <!-- <button type="submit" class="btn btn-danger btn-lg"><i class="fas fa-search-minus"></i> Tampilkan</button> -->
                              <button type="submit" id="submitKelas" class="d-none"></button>
                              <?php if (isset($_POST['kelas'])) { ?>
                                <a target="_blank" href="./jadwal_pdf.php?idkls=<?= $_POST['kelas'] ?>" class="btn btn-danger waves-effect waves-light m-b-30"><i class="fas fa-file-pdf"></i> Cetak PDF</a>
                              <?php } ?>
                            </div>
                          </form>
                        </p>
                        <?php if (isset($_POST['kelas'])) { ?>
                        <table id="datatable-responsive" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                              <th>Nama Guru</th>
                              <th>Kelas</th>
                              <th>Mata Pelajaran</th>
                              <th>Hari</th>
                              <th>Jam</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $modal = mysqli_query($db, "SELECT a.hari,a.jam, e.nama,c.nama_kelas, b.nama_mapel FROM tb_japel a
                            INNER JOIN tb_mapel b ON a.mapel_id=b.id
                            INNER JOIN tb_kelas c ON a.kelas_id=c.id_kelas
                            INNER JOIN tb_mapel_guru d ON a.kelas_id=d.kelas_id AND a.mapel_id=d.mapel_id
                            INNER JOIN tb_pegawai e ON d.nip=e.nip WHERE a.kelas_id = '$_POST[kelas]' ORDER BY nama_kelas, FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')");
                            while ($r = mysqli_fetch_assoc($modal)) {
                            ?>
                              <tr>
                                <td><?= $r['nama']; ?></td>
                                <td><?= $r['nama_kelas']; ?></td>
                                <td><?= $r['nama_mapel']; ?></td>
                                <td><?= $r['hari']; ?></td>
                                <td><?= $r['jam']; ?></td>

                                
                              </tr> <?php } ?>
                          </tbody>
                        </table>
                        <?php } ?>

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
    $('#kelas').on('change', function(){
      var kelas = $('#kelas').val();
      if(kelas !== ''){
        console.log(kelas);
        $('#submitKelas').click();
      }
    })
  </script>

</body>

</html>