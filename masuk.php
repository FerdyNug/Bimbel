<?php
session_start();
require 'header.php';

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
    $nama_panggilan = $_POST["nama_panggilan"];

    $result = mysqli_query($conn, "SELECT * FROM t_user WHERE email = '$email'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        header("Location: landpage.php");
        exit;    
        }
    }
    $error = true;

?>

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
                                            <input class="form-control" type="text" name="nama_panggilan" id="nama_panggilan">
                                            <label for="nama_panggilan">Nama Panggilan</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" name="remember" id="remember">
                                            <label for="remember">Remember me</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="login">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php
    require('footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<?php
require 'footer.php';
?>