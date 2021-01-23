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
              <a href="nilai-add.php" class="btn btn-primary" style="margin-bottom: 5px;"><i class="fa fa-plus"></i> Tambah Data</a>
              <button class="btn btn-success" style="margin-bottom: 5px;" data-toggle="modal" data-target="#modalImport"><i class="fa fa-file-excel-o"></i> Import Data</button>
              <button class="btn btn-warning" style="margin-bottom: 5px;" data-toggle="modal" data-target="#modalExport"><i class="fa fa-file-excel-o"></i> Buat format Nilai</button>
              <div class="x_panel">
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                        <h2>DATA NILAI</h2>
                        <hr>
                        </p>

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Kelas</th>
                              <th>Pelajaran</th>
                              <th>Nama Siswa</th>
                              <th>Thn. Ajaran</th>
                              <th>Semester</th>
                              <th>Jenis Nilai</th>
                              <th>Nilai</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $modal = mysqli_query($db, "SELECT d.nama_kelas,a.*,b.nama_siswa,c.nama_mapel FROM tb_nilai a
                            INNER JOIN tb_siswa b ON a.nisn=b.nisn
                            INNER JOIN tb_mapel c ON a.id_mapel=c.id
                            INNER JOIN tb_kelas d ON a.id_kelas=d.id_kelas
                            WHERE a.id_mapel IN (SELECT id_mapel FROM tb_mapel_guru WHERE nip = '$_SESSION[username]' AND thn_ajaran = '$_SESSION[tahunajaran]')
                            AND a.id_kelas IN (SELECT id_kelas FROM tb_mapel_guru WHERE nip = '$_SESSION[username]' AND thn_ajaran = '$_SESSION[tahunajaran]')");
                            while ($r = mysqli_fetch_assoc($modal)) {
                            ?>
                              <tr>
                                <td><?php echo  $r['nama_kelas']; ?></td>
                                <td><?php echo  $r['nama_mapel']; ?></td>
                                <td><?php echo  $r['nama_siswa']; ?></td>
                                <td><?php echo  $r['thn_ajaran']; ?></td>
                                <td><?php echo  $r['semester']; ?></td>
                                <td><?php echo  $r['jns_nilai']; ?></td>
                                <td><?php echo  $r['nilai']; ?></td>
                                <td align="center">
                                  <a href="nilai-edit.php?id_nilai=<?php echo $r['id_nilai']; ?>" class="fa fa-edit" -></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a href="nilai-delete.php?&id_nilai=<?php echo  $r['id_nilai']; ?>" class="fa fa-trash-o"></a>
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

      <!-- Modal Import -->
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
                  <select name="semester" class="form-control" required>
                    <option value="">-- Pilih Semester --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Masukkan file excel</label>
                  <input type="file" name="berkas_excel" class="form-control">
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

      <!-- Modal Export -->
      <div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Buat Format Nilai Siswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <select name="kelas" id="kelas" class="form-control" required>
                    <option value="">-- Pilih Kelas --</option>
                    <?php
                    $query = mysqli_query($db, "SELECT * FROM tb_kelas WHERE thn_ajaran = '$_SESSION[tahunajaran]'");
                    while ($r = mysqli_fetch_array($query)) { ?>
                      <option value="<?= $r['id_kelas'] ?>"><?= $r['nama_kelas'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="export" class="btn btn-primary">Proses</button>
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
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Writer;

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

    $id_mapel   = $_POST['id_mapel'];
    $semester   = $_POST['semester'];
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

    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);

    $sheetData = $spreadsheet->getActiveSheet()->toArray();

    $xDataKebawah = count($sheetData);
    $xDataKekanan = 15;
    // loop sebanyak 8x utk tiap nilai
    for ($i = 3; $i <= $xDataKekanan; $i++) {

      for ($j = 4; $j < $xDataKebawah; $j++) {
        if (isset($sheetData['2'][$i]) && isset($sheetData[$j][$i])) {
          $nisn       = $sheetData[$j]['1'];
          $jns_nilai  = $sheetData['2'][$i];
          $nilai      = $sheetData[$j][$i];
          mysqli_query($db, "INSERT INTO tb_nilai (id_kelas,id_mapel,nisn,jns_nilai,nilai,thn_ajaran,semester) VALUES ('$idkls', '$idmpl','$nisn','$jns_nilai','$nilai','$thn','$semester')") or die($db->error);
          echo "<script>alert('Import nilai siswa berhasil!');window.location='nilai.php';</script>";
        }
      }
    }
  } else {
    echo "<script>alert('Maaf type file yang anda masukkan tidak disupport!');window.location='nilai.php';</script>";
  }
}

if (isset($_POST['export'])) {

  $reader = new Xlsx();
  $spreadsheet = $reader->load('../../src/template_nilai.xlsx');
  $sheet = $spreadsheet->getActiveSheet();

  $query = mysqli_query($db, "SELECT * FROM tb_siswa WHERE kelas = '$_POST[kelas]'");
  $row = 5;
  $no = 1;
  while ($r = mysqli_fetch_array($query)) {

    $sheet->setCellValue('A' . $row, $no++);
    $sheet->setCellValue('B' . $row, $r['nisn']);
    $sheet->setCellValue('C' . $row, $r['nama_siswa']);
    $row += 1;
  }

  $query = mysqli_query($db, "SELECT * FROM tb_kelas WHERE id_kelas = '$_POST[kelas]'");
  $kls = mysqli_fetch_assoc($query);
  $sheet->setCellValue('D1', 'Kelas ' . $kls['nama_kelas']);

  $writer = new Writer($spreadsheet);
  // $writer->save("php://output");
  $file = 'Nilai_Kelas_' . $_POST['kelas'] . '.xlsx';
  $writer->save($file);

  echo "<script>window.location='download.php?file=" . $file . "';</script>";
}
?>