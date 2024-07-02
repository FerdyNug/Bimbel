<?php
require 'inc/functions.php';

if (isset($_POST['submit'])) {
    tambahDataBayar($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/svg" />

    <!-- ===== All CSS files ===== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?= filemtime('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="assets/css/animate.css?v=<?= filemtime('assets/css/animate.css'); ?>" />
    <link rel="stylesheet" href="assets/css/lineicons.css?v=<?= filemtime('assets/css/lineicons.css'); ?>" />
    <link rel="stylesheet" href="assets/css/ud-styles.css?v=<?= filemtime('assets/css/ud-styles.css'); ?>" />
    <link rel="stylesheet" href="assets/css/coba.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <!-- ====== Header Start ====== -->
    <header class="ud-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg mt-3">
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/images/logo/logo.png" alt="Logo" width="40px" class="rounded-circle" />
                        </a>
                        <button class="navbar-toggler">
                            <span class="toggler-icon"> </span>
                            <span class="toggler-icon"> </span>
                            <span class="toggler-icon"> </span>
                        </button>

                        <div class="navbar-collapse">
                            <ul id="nav" class="navbar-nav mx-auto ud-menu">
                            </ul>
                        </div>

                        <div class="navbar-btn d-none d-sm-inline-block">
                            <a href="akun.php" class="ud-logo">
                                <img src="" alt="akun">
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ====== Header End ====== -->

    <!-- ====== Hero Start ====== -->
    <section class="ud-hero" id="beranda">
        <div class="container pb-5">
            <div class="row">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="beranda.php">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">detailProduk</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-5" id="gambarPaket">
                    <img src="assets/images/logo/logo.png" alt="">
                </div>
                <div class="col-md-7" id="deskripsiPaket">
                    <div>
                        <h2 style="color: white;">PAKET TRYOUT SKD CPNS 1 BUNDLE</h2>
                    </div>
                    <div>
                        <h3 style="color: white;">Deskripsi</h3>
                        <p style="color: white;">Paket tryout ini terdiri dari 1 bundle soal SKD CPNS (TWK, TIU, dan TKP). Terdapat total 110 soal dengan waktu pengerjaan 100 menit. Untuk skor TWK dan TIU terdapat 1 jawaban benar dengan poin 5, sedangkan skor TKP terdiri dari skala 1 sampai 5. Terdapat kunci jawaban dan pembahasan setelah peserta mengerjakan tesnya. Dan disediakan pula grafik statistik nilai akhir sebagai evaluasi peserta.</p>
                    </div>
                    <div class="mt-5">
                        <h3 style="color: white;">Rp. 10.000<span class="fs-5">/7 hari</span></h3>
                    </div>
                    <div class="mt-2">
                        <button class="p-2 col-md-3 btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Beli
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pembayaran</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Masukkan Nama" name="nama">
                                                <label for="floatingInput">Masukkan Nama</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="Masukkan Nomor WhatsApp" name="noWa">
                                                <label for="floatingInput">Masukkan Nomor WhatsApp</label>
                                            </div>
                                            <select class="form-select" aria-label="Default select example" name="metode" id="pilihPembayaran">
                                                <option selected value="0">Pilih Metode Pembayaran</option>
                                                <option value="Dana">Dana</option>
                                                <option value="Shopeepay">Shopeepay</option>
                                            </select>
                                            <div id="metodePembayaran"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary" name="submit">Bayar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Hero End ====== -->

    <!-- ====== Footer Start ====== -->
    <footer class="ud-footer wow fadeInUp" data-wow-delay=".15s">
        <div class="shape shape-1">
            <img src="assets/images/footer/shape-1.svg" alt="shape" />
        </div>
        <div class="shape shape-2">
            <img src="assets/images/footer/shape-2.svg" alt="shape" />
        </div>
        <div class="shape shape-3">
            <img src="assets/images/footer/shape-3.svg" alt="shape" />
        </div>
        <div class="ud-footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="ud-widget">
                            <a href="index.php" class="ud-footer-logo">
                                <img src="assets/images/logo/logoputih.png" alt="logo" style="width: 60px;" />
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
                        <div class="ud-widget">
                            <h5 class="ud-widget-title">Produk Kami</h5>
                            <ul class="ud-widget-links">
                                <li>
                                    <a href="#" rel="nofollow noopner" target="_blank">Tryout
                                    </a>
                                </li>
                                <li>
                                    <a href="#" rel="nofollow noopner" target="_blank">bimbel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-8 col-sm-10">
                        <div class="ud-widget">
                            <h5 class="ud-widget-title">Media Social</h5>
                            <ul class="ud-widget-socials">
                                <li>
                                    <a href="https://twitter.com/MusharofChy">
                                        <i class="lni lni-facebook-filled"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/MusharofChy">
                                        <i class="lni lni-twitter-filled"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/MusharofChy">
                                        <i class="lni lni-instagram-filled"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/MusharofChy">
                                        <i class="lni lni-linkedin-original"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ud-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="ud-footer-bottom-left">
                            <li>
                                <a href="javascript:void(0)">Privacy policy</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Support policy</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Terms of service</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <p class="ud-footer-bottom-right">
                            Designed and Developed by
                            <a href="#" rel="nofollow">EduSquad</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ====== Footer End ====== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="js/script2.js"></script>
</body>

</html>