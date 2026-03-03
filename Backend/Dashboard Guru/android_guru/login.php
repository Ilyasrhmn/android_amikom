<?php 
include 'koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  </head>
  <body class="bg-light">
    <section class="py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4 offset-md-4 bg-white p-5 shadow rounded">
                    <div class="text-center">
                        <img src="image/logo.png" width="100">
                        <h6>Login Guru SMA Amikom</h6>
                    </div>
                    <form method="POST">
                        <div class="mb-3">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button class="btn btn-primary" name="login">Login</button>
                    </form>
                    </div>
            </div>
        </div>
    </section>
  </body>
</html>
<?php
 if (isset($_POST['login'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    $ambil = $koneksi->query("SELECT * FROM guru WHERE nik_guru='$nik' AND password_guru='$password'");
    $cekguru = $ambil->fetch_assoc();

    if (empty($cekguru)) {
        echo "<script>alert('Login Gagal, NIK atau Password salah')</script>";
        echo "<script>location='login.php';</script>";
        exit();
    } else {
        $_SESSION['guru'] = $cekguru;
        echo "<script>alert('Login Sukses, Selamat datang')</script>";
        echo "<script>location='index.php';</script>";
    }
 }