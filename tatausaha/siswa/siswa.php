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
              <button class="btn btn-success" style="margin-bottom: 5px;" data-toggle="modal" data-target="#modalImport"><i class="fa fa-file-excel-o"></i> Import Data</button>
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
                              <th>Alamat</th>
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
                                <td><?php echo  $r['alamat']; ?></td>
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

      <!-- Modal -->
      <div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Import Data Siswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputFile">Tentukan Kelas</label>
                  <select name="kelas" class="form-control" required oninvalid="this.setCustomValidity('Pilih Kelas Siswa!')" oninput="setCustomValidity('')">
                    <option value=""> -- Pilih Kelas --</option>
                    <?php
                    $modal = mysqli_query($db, "SELECT * FROM tb_kelas");
                    while ($r = mysqli_fetch_assoc($modal)) {
                    ?>
                      <option value="<?= $r['id_kelas'] ?>">Kelas <?= $r['nama_kelas'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Masukkan file excel</label>
                  <input type="file" name="berkas_excel" class="form-control" id="exampleInputFile">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="import" class="btn btn-primary">Proses</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- footer content -->
      <?php include_once('../layouts/footer.html') ?>
      <!-- /footer content -->
    </div>
  </div>
  <?php include_once('../layouts/scripts.html') ?>

</body>

</html>

<?php

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_POST['import'])) {
  $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

  if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);

    if ('csv' == $extension) {
      $reader = new Csv();
    } else {
      $reader = new Xlsx();
    }

    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);

    $sheetData = $spreadsheet->getActiveSheet()->toArray();
    for ($i = 2; $i < count($sheetData) - 1; $i++) {
      $jk = '';

      if ($sheetData[$i]['2'] == 'L') {
        $jk = 'Laki-Laki';
      } else {
        $jk = 'Perempuan';
      }

      $nama_siswa     = $sheetData[$i]['1'];
      $nisn           = $sheetData[$i]['3'];
      $kelas          = $_POST['kelas'];
      $jk             = $jk;
      $tempat_lahir   = $sheetData[$i]['4'];
      $tgl_lahir      = $sheetData[$i]['5'];
      $agama          = $sheetData[$i]['6'];
      $alamat         = $sheetData[$i]['7'];
      $telp_siswa     = $sheetData[$i]['8'];
      $nama_ayah      = $sheetData[$i]['9'];
      $thn_lahir_ayah   = $sheetData[$i]['10'];
      $status_siswa   = $_POST['status_siswa'];
      $pendidikan_ayah  = $sheetData[$i]['11'];
      $pekerjaan_ayah   = $sheetData[$i]['12'];
      $penghasilan_ayah = $sheetData[$i]['13'];
      $telp_ayah        = $sheetData[$i]['8'];

      $nama_ibu         = $sheetData[$i]['14'];
      $thn_lahir_ibu    = $sheetData[$i]['15'];
      $pendidikan_ibu   = $sheetData[$i]['16'];
      $pekerjaan_ibu    = $sheetData[$i]['17'];
      $penghasilan_ibu  = $sheetData[$i]['18'];
      $telp_ibu         = $sheetData[$i]['8'];
      mysqli_query($db, "INSERT INTO tb_siswa (nisn,nama_siswa,jk,tempat_lahir,tgl_lahir,agama,alamat,telp_siswa,status_siswa,nama_ayah,thn_lahir_ayah,pendidikan_ayah,pekerjaan_ayah,penghasilan_ayah,telp_ayah,nama_ibu,thn_lahir_ibu,pendidikan_ibu,pekerjaan_ibu,penghasilan_ibu,telp_ibu,kelas,username,password) 
                              VALUES ('$nisn','$nama_siswa','$jk','$tempat_lahir','$tgl_lahir','$agama','$alamat','$telp_siswa','$status_siswa','$nama_ayah','$thn_lahir_ayah','$pendidikan_ayah','$pekerjaan_ayah','$penghasilan_ayah','$telp_ayah','$nama_ibu','$thn_lahir_ibu','$pendidikan_ibu','$pekerjaan_ibu','$penghasilan_ibu','$telp_ibu','$kelas','$nisn','$nisn')") or die($db->error);
      mysqli_query($db, "DELETE FROM tb_siswa_excel WHERE nisn = ''");
      echo "<script>alert('Import data siswa berhasil!'); window.location='siswa.php';</script>";
    }
  }
}
?>