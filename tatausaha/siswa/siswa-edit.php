<?php
session_start();
include_once('../../helper.php');
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
            <a href="index.php" class="site_title"><img src="../../production/images/lg-icn.jpg" alt="..."> <span>MA NW Kelayu</span></a>
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
                        <h2>EDIT DATA SISWA</h2>
                        <hr>
                      </p>

                      <div class="x_content">
                        <!-- class="x_content" -->
                        <?php
                        include "../../koneksi.php";
                        $nisn = @$_GET['nisn'];
                        $modal = mysqli_query($db, "SELECT * FROM tb_siswa WHERE nisn='$nisn' ");
                        while ($r = mysqli_fetch_array($modal)) {
                        ?>
                          <form action="" method="POST">
                            <div class="col-md-4">
                              <!-- FORM KIRI -->
                              <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" id="nisn" placeholder="nisn" name="nisn" class="form-control" value="<?= $r['nisn']; ?>" required readonly>
                              </div>
                              <div class="form-group">
                                <label>Kelas</label>
                                <select name="kelas" class="form-control" required oninvalid="this.setCustomValidity('Pilih Kelas Siswa!')" oninput="setCustomValidity('')">
                                  <option value=""> -- Pilih Kelas Siswa --</option>
                                  <?php
                                  include "../../koneksi.php";
                                  $kls = mysqli_query($db, "SELECT * FROM tb_kelas");
                                  while ($kl = mysqli_fetch_assoc($kls)) {
                                    if ($r['kelas'] == $kl['id_kelas']) { ?>
                                      <option selected value="<?= $kl['id_kelas'] ?>"><?= $kl['nama_kelas'] ?></option>
                                    <?php } else { ?>
                                      <option value="<?= $kl['id_kelas'] ?>"><?= $kl['nama_kelas'] ?></option>
                                  <?php }
                                  } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" id="nama_siswa" placeholder="nama_siswa " name="nama_siswa" class="form-control" value="<?= $r['nama_siswa']; ?>" required oninvalid="this.setCustomValidity('nama siswa tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control" required oninvalid="this.setCustomValidity('Pilih jenis kelamin Anda!')" oninput="setCustomValidity('')">
                                  <option value="Laki-Laki" <?php if ($r['jk'] == "Laki-Laki") {
                                                              echo "selected";
                                                            } ?>>Laki-Laki</option>
                                  <option value="Perempuan" <?php if ($r['jk'] == "Perempuan") {
                                                              echo "selected";
                                                            } ?>>Perempuan</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" id="tempat_lahir" placeholder="tempat lahir " name="tempat_lahir" class="form-control" value="<?= $r['tempat_lahir']; ?>" required oninvalid="this.setCustomValidity('tempat lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" id="tgl_lahir" placeholder="tgl lahir " name="tgl_lahir" class="form-control" value="<?= $r['tgl_lahir']; ?>" required oninvalid="this.setCustomValidity('tgl lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text" id="agama" placeholder="agama " name="agama" class="form-control" value="<?= $r['agama']; ?>" required oninvalid="this.setCustomValidity('agama tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" id="alamat" placeholder="alamat " name="alamat" class="form-control" value="<?= $r['alamat']; ?>" required oninvalid="this.setCustomValidity('alamat tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="telp_siswa">Telp Siswa</label>
                                <input type="text" id="telp_siswa" placeholder="telp siswa " name="telp_siswa" class="form-control" value="<?= $r['telp_siswa']; ?>" required oninvalid="this.setCustomValidity('telp siswa tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="status_siswa">Status Siswa</label>
                                <input type="text" id="status_siswa" placeholder="status siswa " name="status_siswa" class="form-control" value="<?= $r['status_siswa']; ?>" required oninvalid="this.setCustomValidity('status siswa tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div>
                                <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan">
                              </div>
                            </div> <!-- /FORM KIRI -->

                            <div class="col-md-4">
                              <!-- FORM TENGAH -->
                              <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" id="nama_ayah" placeholder="nama ayah " name="nama_ayah" class="form-control" value="<?= $r['nama_ayah']; ?>" required oninvalid="this.setCustomValidity('nama ayah tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="thn_lahir_ayah">Thn.Lhr. Ayah</label>
                                <input type="text" id="thn_lahir_ayah" placeholder="thn lhr ayah " name="thn_lahir_ayah" class="form-control" value="<?= $r['thn_lahir_ayah']; ?>" required oninvalid="this.setCustomValidity('thn lhr ayah tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="pendidikan_ayah">Pendidikan Ayah</label>
                                <select name="pendidikan_ayah" class="form-control" required oninvalid="this.setCustomValidity('Pilih Pendidikan Terkahir Ibu!')" oninput="setCustomValidity('')">
                                  <option value=""> -- Pilih Pendidikan Terkahir Ayah --</option>
                                  <?php
                                  foreach (getPendidikanTerakhir() as $val) { ?>
                                    <option <?= ($r['pendidikan_ayah'] == $val) ? 'selected' : '' ?> value="<?= $val ?>"><?= $val ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input type="text" id="pekerjaan_ayah" class="form-control" placeholder="pekerjaan ayah" name="pekerjaan_ayah" value="<?= $r['pekerjaan_ayah']; ?>" required oninvalid="this.setCustomValidity('pekerjaan ayah tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="penghasilan_ayah">Penghasilan Ayah</label>
                                <input type="text" id="penghasilan_ayah" class="form-control" placeholder="penghasilan ayah" name="penghasilan_ayah" value="<?= $r['penghasilan_ayah']; ?>" required oninvalid="this.setCustomValidity('penghasilan ayah tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="telp_ayah">Telp Ayah</label>
                                <input type="text" id="telp_ayah" class="form-control" placeholder="telp ayah" name="telp_ayah" value="<?= $r['telp_ayah']; ?>" required oninvalid="this.setCustomValidity('telp ayah tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                            </div> <!-- /FORM TENGAH -->

                            <div class="col-md-4">
                              <!-- FORM KANAN -->
                              <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" id="nama_ibu" placeholder="nama Ibu " name="nama_ibu" class="form-control" value="<?= $r['nama_ibu']; ?>" required oninvalid="this.setCustomValidity('nama Ibu tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="thn_lahir_ibu">Thn.Lhr. Ibu</label>
                                <input type="text" id="thn_lahir_ibu" placeholder="thn lhr Ibu " name="thn_lahir_ibu" class="form-control" value="<?= $r['thn_lahir_ibu']; ?>" required oninvalid="this.setCustomValidity('thn lhr Ibu tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="pendidikan_ibu">Pendidikan Ibu</label>
                                <select name="pendidikan_ibu" class="form-control" required oninvalid="this.setCustomValidity('Pilih Pendidikan Terkahir Ibu!')" oninput="setCustomValidity('')">
                                  <option value=""> -- Pilih Pendidikan Terkahir Ibu --</option>
                                  <?php
                                  foreach (getPendidikanTerakhir() as $val) { ?>
                                    <option <?= ($r['pendidikan_ibu'] == $val) ? 'selected' : '' ?> value="<?= $val ?>"><?= $val ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <input type="text" id="pekerjaan_ibu" class="form-control" placeholder="pekerjaan Ibu" name="pekerjaan_ibu" value="<?= $r['pekerjaan_ibu']; ?>" required oninvalid="this.setCustomValidity('pekerjaan Ibu tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="penghasilan_ibu">Penghasilan Ibu</label>
                                <input type="text" id="penghasilan_ibu" class="form-control" placeholder="penghasilan Ibu" name="penghasilan_ibu" value="<?= $r['penghasilan_ibu']; ?>" required oninvalid="this.setCustomValidity('penghasilan Ibu tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label for="telp_ibu">Telp Ibu</label>
                                <input type="text" id="telp_ibu" class="form-control" placeholder="telp Ibu" name="telp_ibu" value="<?= $r['telp_ibu']; ?>" required oninvalid="this.setCustomValidity('telp Ibu tidak boleh kosong')" oninput="setCustomValidity('')">
                              </div>
                            </div> <!-- /FORM KANAN -->
                          </form> <?php } ?>
                        <!-- SIMPAN -->
                        <?php
                        if (isset($_POST['simpan'])) {
                          $nisn    = $_POST['nisn'];
                          $kelas    = $_POST['kelas'];
                          $nama_siswa = $_POST['nama_siswa'];
                          $jk         = $_POST['jk'];
                          $tempat_lahir   = $_POST['tempat_lahir'];
                          $tgl_lahir      = $_POST['tgl_lahir'];
                          $agama      = $_POST['agama'];
                          $alamat      = $_POST['alamat'];
                          $telp_siswa      = $_POST['telp_siswa'];
                          $status_siswa   = $_POST['status_siswa'];

                          $nama_ayah   = $_POST['nama_ayah'];
                          $thn_lahir_ayah   = $_POST['thn_lahir_ayah'];
                          $pendidikan_ayah   = $_POST['pendidikan_ayah'];
                          $pekerjaan_ayah   = $_POST['pekerjaan_ayah'];
                          $penghasilan_ayah   = $_POST['penghasilan_ayah'];
                          $telp_ayah   = $_POST['telp_ayah'];

                          $nama_ibu   = $_POST['nama_ibu'];
                          $thn_lahir_ibu   = $_POST['thn_lahir_ibu'];
                          $pendidikan_ibu   = $_POST['pendidikan_ibu'];
                          $pekerjaan_ibu   = $_POST['pekerjaan_ibu'];
                          $penghasilan_ibu   = $_POST['penghasilan_ibu'];
                          $telp_ibu   = $_POST['telp_ibu'];

                          $save = mysqli_query($db, "UPDATE tb_siswa SET kelas = '$kelas', nisn='$nisn',nama_siswa='$nama_siswa',jk='$jk',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',agama='$agama',alamat='$alamat',telp_siswa='$telp_siswa',status_siswa='$status_siswa',nama_ayah='$nama_ayah',thn_lahir_ayah='$thn_lahir_ayah',pendidikan_ayah='$pendidikan_ayah',pekerjaan_ayah='$pekerjaan_ayah',penghasilan_ayah='$penghasilan_ayah',telp_ayah='$telp_ayah',nama_ibu='$nama_ibu',thn_lahir_ibu='$thn_lahir_ibu',pendidikan_ibu='$pendidikan_ibu',pekerjaan_ibu='$pekerjaan_ibu',penghasilan_ibu='$penghasilan_ibu',telp_ibu='$telp_ibu' WHERE nisn='$nisn' ");

                          if ($save) {
                            echo "<script>alert('Data berhasil disimpan!');window.location='siswa.php';</script>";
                          } else {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Siswa Gagal Di simpan !</div>';
                          }
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

</body>

</html>