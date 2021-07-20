<?php
session_start();
if (@$_SESSION['level'] == 'Tata Usaha') {
  echo "<script> window.location = 'tatausaha'; </script>";
} elseif (@$_SESSION['level'] == 'Guru') {
  echo "<script> window.location = 'guru'; </script>";
} elseif (@$_SESSION['level'] == 'Kepsek') {
  echo "<script> window.location = 'kepsek'; </script>";
} elseif (@$_SESSION['level'] == 'Siswa') {
  echo "<script> window.location = 'wali'; </script>";
} else {
?>
<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIAKAD | MA NW KELAYU </title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <!--       <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a> -->

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img src="production/images/lg-big.jpg" width="85%" height="85%">
            <form action="index.php" method="POST">

              <h1>MA NW KELAYU</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <input style="margin-left: 140px;" type="submit" class="btn btn-primary" value="LOGIN" name="login" />
              </div>
            </form>
            <!-- CODE LOGIN -->
            <?php

            include "koneksi.php";

            if (isset($_POST['login'])) {
              $user = mysqli_real_escape_string($db, $_POST['username']);
              $pass = mysqli_real_escape_string($db, $_POST['password']);

              $sql = mysqli_query($db, "SELECT * FROM (

                SELECT nama, username, level FROM tb_pegawai WHERE username='$user' AND PASSWORD='$pass'
                
                UNION ALL
                
                SELECT nama_siswa, username, 'Siswa' AS level FROM tb_siswa WHERE username='$user' AND PASSWORD='$pass'
                
                ) AS z");
              $data = mysqli_fetch_array($sql);
              $cek = mysqli_num_rows($sql);
              if ($cek > 0) {

                $query = mysqli_query($db, "SELECT tahun FROM tb_tahun_ajaran WHERE status = 'Aktif'");
                $r = mysqli_fetch_assoc($query);
                $_SESSION['tahunajaran'] = $r['tahun'];

                $level = $data['level'];
                $_SESSION['level'] = $level;
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['username'] = $user;
                if ($level == 'Tata Usaha') {
                  echo "<script> window.location = 'tatausaha'; </script>";
                } elseif ($level == 'Guru') {
                  $sql = mysqli_query($db, "SELECT * FROM tb_kelas WHERE nip_wali = '$user' AND thn_ajaran = '$r[tahun]'");
                  $kls = mysqli_fetch_assoc($sql);
                  if (mysqli_num_rows($sql) > 0) {
                    $_SESSION['walikelas'] = $kls['id_kelas'];
                  } else {
                    $_SESSION['walikelas'] = 0;
                  }
                  echo "<script> window.location = 'guru'; </script>";
                } elseif ($level == 'Kepala Sekolah') {
                  echo "<script> window.location = 'kepsek'; </script>";
                } elseif ($level == 'Siswa') {
                  echo "<script> window.location = 'wali'; </script>";
                }
              } else {
                echo "<script >alert('Login Gagal Silahkan periksa Username dan Password Anda');</script>";
              }
            }
            ?>
            <!-- /CODE LOGIN -->
          </section>
        </div>

      </div>
    </div>
  </body>

  </html>
<?php
}
?>