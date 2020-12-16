<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('../layouts/head.html') ?>
  <link type="text/css" href="../../assets/datatables-checkboxes/dataTables.checkboxes.css" rel="stylesheet" />
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
              <div class="x_panel">
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box">
                        <p class="text-muted font-13 m-b-30">
                          <h2>NAIK KELAS</h2>
                          <hr>
                          <div class="d-flex m-b-30 m-t-20">
                            <div class="col-2">
                              <select name="kelas" id="kelas" class="form-control">
                                <option value="">-- Pilih Kelas --</option>
                                <?php
                                include "../../koneksi.php";

                                $thnSebelumnya = substr($_SESSION['tahunajaran'], 0, 4);
                                $thnSebelumnya = $thnSebelumnya - 1 . '/' . $thnSebelumnya;

                                $modal = mysqli_query($db, "SELECT * FROM tb_kelas WHERE thn_ajaran = '$thnSebelumnya'");
                                while ($r = mysqli_fetch_assoc($modal)) { ?>
                                  <option value="<?= $r['id_kelas'] ?>"><?= $r['nama_kelas'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-12">

                              <button type="button" id="btnSetKelas" onclick="submitTable()" class="btn btn-success waves-effect waves-light m-b-30 d-none">Tentukan Kelas</button>
                              <!-- modal Naik -->
                              <div class="modal fade" id="modalNaik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <form method="POST" action="./updatekelas.php">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pilih Kelas Siswa Yang Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="col-12">
                                          <select name="kelas" id="kelas" class="form-control" required>
                                            <option value="">-- Pilih Kelas --</option>
                                            <?php

                                            $klsbaru = mysqli_query($db, "SELECT * FROM tb_kelas WHERE thn_ajaran = '$_SESSION[tahunajaran]'");
                                            while ($kls = mysqli_fetch_assoc($klsbaru)) { ?>
                                              <option value="<?= $kls['id_kelas'] ?>"><?= $kls['nama_kelas'] ?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                        <div id="newRow">
                                          <!-- <input type="text" class="form-control" id="nisn" name="nisn[]" required> -->

                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                      </div>
                                    </div>
                                </div>
                                </form>
                              </div>
                              <!-- modal Naik -->
                            </div>
                          </div>
                        </p>

                        <form id="frmTable" action="naikkelas.php" method="POST">
                          <table id="tbnaikkelas" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Nama Kelas</th>
                                <th>Nama Siswa</th>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
                          <button type="submit" id="submitTable" class="d-none">Submit</button>
                        </form>
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
  <script type="text/javascript" src="../../assets/datatables-checkboxes/dataTables.checkboxes.min.js"></script>
  <script>
    $('#kelas').on('change', function() {
      var kelas = $('#kelas').val();
      var table = $('#tbnaikkelas').DataTable().destroy();
      var newNisn = '';
      // btnSetKelas
      if (kelas !== '') {
        $('#btnSetKelas').removeClass('d-none');
        table = $('#tbnaikkelas').DataTable({
          'processing': true,
          'serverSide': true,
          'ajax': './data_siswa.php?idkls=' + kelas,
          // 'ajax': './data.json',
          'columnDefs': [{
            'targets': 0,
            'checkboxes': {
              'selectRow': true
            }
          }],
          'select': {
            'style': 'multi'
          },
          'order': [
            [2, 'asc']
          ],
          "paging": false,
        });

        $('#frmTable').on('submit', function(e) {
          e.preventDefault();
          var form = this;
          var checkIsi = '';
          newNisn = ''
          $('#newRow').empty();

          var rows_selected = table.column(0).checkboxes.selected();

          // Iterate over all selected checkboxes
          $.each(rows_selected, function(index, rowId) {
            // Create a hidden element 
            $(form).append(
              $('<input>')
              .attr('type', 'hidden')
              .attr('name', 'id[]')
              .val(rowId)
            );
            newNisn += '<input type="hidden" name="nisn[]" value="' + rowId + '">'
          });
          $('#newRow').append(newNisn);
          checkIsi = rows_selected.join("");
          if (checkIsi == '') {
            alert('Pilih siswa sebelum melanjutkan!');
          } else {
            $("#modalNaik").modal();
          }
        });
      } else {
        $('#btnSetKelas').addClass('d-none');
      }
    })

    function submitTable() {
      $('#submitTable').click();
    }
  </script>
</body>

</html>