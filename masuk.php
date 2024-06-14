<?php
session_start();
require 'inc/functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT email FROM t_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['email'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: landpage.php");
    exit;
}

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $pass_login = $_POST["pass_login"];

    $result = mysqli_query($conn, "SELECT * FROM t_user WHERE email = '$email'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass_login, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST["remember"])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['email']), time() + 60);
            }
            header("Location: landpage.php");
            exit;
        }
    }
    $error = true;
}

// jika menekan tombol daftar
if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
                document.location.href = 'masuk.php';
                </script>";
    } else {
        echo 'eror';
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bimbel Tryout CPNS, BUMN, Kedinasan, PPPK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/custom.css" />
</head>

<body class="bodyLogin">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4 fw-bold">MASUK</h3>
                                </div>
                                <div class="card-body">

                                    <form action="" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="email" name="email" id="email">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="password" name="pass_login" id="pass_login">
                                            <label for="pass_login">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" name="remember" id="remember">
                                            <label for="remember">Remember me</label>
                                        </div>
                                        <div class="d-inline-flex">
                                            <button class="btn btn-primary" type="submit" name="login">Login</button>
                                        </div>

                                        <!-- Button to Open Modal Tambah-->
                                        <button type="button" class="btn btn-primary text-white mb-1" data-bs-toggle="modal" data-bs-target="#myModal">
                                            Daftar
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal Tambah Admin -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Form Pendaftaran</h4>
                </div>

                <!-- Modal body -->
                <form method="post">
                    <div class="modal-body">
                        <input type="email" name="email" id="email" class="mb-3 form-control" placeholder="Email" required>
                        <input type="password" name="password" id="password" placeholder="Password" class="mb-3 form-control mb" required>
                        <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" class="mb-3 form-control mb" required>
                        <br>
                        <button type="submit" class=" btn btn-primary mb" name="register">Daftar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<?php
require 'footer.php';
?>