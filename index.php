<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bimbel Tryout CPNS, BUMN, Kedinasan, PPPK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="Bootstrap" width="30" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-evenly flex-grow-1">
                        <li class="nav-item me-5">
                            <a class="nav-link" href="index.php"><span>Beranda</span> </a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" href="#produk">Produk Kami</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" href="#keunggulan">Keunggulan</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" href="#">Testimoni</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" href="#paket">Pilihan Paket</a>
                        </li>
                        <li class="nav-item">
                            <a href="masuk.php" class="text-white text-decoration-none masuk">Masuk</a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Highlight -->
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-7 text-start">
                    <p class="fs-1 fw-bold">Bergabung Bersama<br>
                        Peserta Lainnya Untuk<br>
                        Persiapkan Diri<br>
                        Menghadapi Ujian</p>
                    <div class="grid text-start">
                        <div class="g-col btn btn-success fw-bold fs-5" href="login.php">Gabung Sekarang</div>
                        <div class="g-col btn btn-success fw-bold fs-5" href="login.php">Masuk</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Highlight -->

    <!-- Tentang -->
    <section id="tentang" class="tentang">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-5 text-center">
                </div>
                <div class="col-md-7 text-start">
                    <p class="title-section">Tentang Kami</p>
                    <p class="text-tentang">Adalah website layanan belajar dan tryout CPNS dan Sekolah Kedinasan untuk persiapan tes CPNS dan Sekolah Kedinasan.<br><br>
                        juga tersedia informasi, materi, soal, dan tryout online CPNS dan Sekolah Kedinasan gratis untuk mempersiapkan diri dalam menghadapi seleksi CPNS dan Sekolah Kedinasan.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Tentang -->

    <!-- Produk -->
    <section id="produk" class="produk">
        <div class="container mt-5">
            <div class="row text-center mb-3">
                <div class="col" id="produk">
                    <h2 class="title-section">Produk Kami</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="item-produk pb-5">
                        <h1 class="title-produk">Tryout Gratis</h1>
                        <p class="text-produk">Ikuti tryout gratis setiap minggu serentak bersama peserta di seluruh Indonesia</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item-produk">
                        <h1 class="title-produk">Tryout Premium</h1>
                        <p class="text-produk">Asah kemampuan Anda dengan tryout premium yang menyediakan fitur-fitur lengkap seperti ranking, pembahasan, grafik analisa, dll yang dapat membantu mengasah kemampuan kamu lebih dalam lagi</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item-produk pb-5">
                        <h1 class="title-produk">Bimbel</h1>
                        <p class="text-produk">Ingin belajar lebih intensif lagi? Ikuti kelas bimbel dengan mentor-mentor ahli dibidangnya dan terbukti telah lulus menjadi ASN.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Produk -->

    <!-- Keunggulan -->
    <section id="keunggulan" class="keunggulan">
        <div class="container mt-5">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2 class="title-section">Keunggulan</h2>
                </div>
            </div>
            <div class="bg-success pb-5 pt-5 text-white border border-5 rounded border-white shadow">
                <div class="row text-center justify-content-evenly mb-3">
                    <div class="col-md-3 itemUnggul">
                        <h2 class="title-keunggulan">Tryout Gratis</h2>
                        <p class="text-keunggulan">Tryout CPNS dan Sekolah Kedinasan online setiap minggu yang dapat Anda ikuti secara gratis.</p>
                    </div>
                    <div class="col-md-3 itemUnggul">
                        <h2 class="title-keunggulan">Hasil instan</h2>
                        <p class="text-keunggulan">Hasil ujian dapat langsung dilihat setelah peserta selesai mengerjakan paket tryout CPNS / Sekolah Kedinasan.</p>
                    </div>
                    <div class="col-md-3 itemUnggul">
                        <h2 class="title-keunggulan">Peringkat Nasional</h2>
                        <p class="text-keunggulan">Peserta dapat melihat peringkat antar peserta seluruh Indonesia.</p>
                    </div>
                </div>
                <div class="row text-center justify-content-evenly">
                    <div class="col-md-3 itemUnggul">
                        <h2 class="title-keunggulan">Fitur Lengkap</h2>
                        <p class="text-keunggulan">Fitur-fitur yang kami berikan akan dapat membantu Anda dalam mengasah kemampuan untuk menghadapi seleksi CPNS dan Sekolah Kedinasan yang akan datang.</p>
                    </div>
                    <div class="col-md-3 itemUnggul">
                        <h2 class="title-keunggulan">Bimbel Terstruktur</h2>
                        <p class="text-keunggulan">Bimbel IDCPNS disusun seefektif mungkin agar materi-materi yang dipelajari sangat terarah sesaui kisi-kisi yang akan diujikan.</p>
                    </div>
                    <div class="col-md-3 itemUnggul">
                        <h2 class="title-keunggulan">Soal Terbaru</h2>
                        <p class="text-keunggulan">Paket soal CPNS dan Sekolah Kedinasan yang kami berikan selalu diperbaharui sesuai kisi-kisi yang diberikan pemerintah, sehingga dapat meningkatkan kemampuan peserta secara optimal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Keunggulan -->

    <!-- Testimoni -->

    <!-- Akhir Testimoni -->

    <!-- Paket -->
    <section id="paket">
        <div class="container mt-5">
            <div class="row text-center mb-3">
                <div class="col" id="produk">
                    <h2 class="title-section">Pilihan Paket</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="shadow border border-white border-5 rounded itemPaket">
                        <p class="title-paket">Tryout Gratis</p>
                        <h1 class="price-paket">Gratis</h1>
                        <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Sistem CAT/CBT</span></div>
                        <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Timer Ujian</span></div>
                        <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Nilai Langsung Keluar</span></div>
                        <div class="item-isi"><i class="bi bi-x-square-fill text-danger"></i> <span>Perankingan Nasional,Provinsi, Instansi</span></div>
                        <div class="item-isi"><i class="bi bi-x-square-fill text-danger"></i> <span>Grafik Evaluasi</span></div>
                        <div class="item-isi"><i class="bi bi-x-square-fill text-danger"></i> <span>Review Pembahasan</span></div>
                        <div class="item-isi"><i class="bi bi-x-square-fill text-danger"></i> <span>Dikerjakan Berulang Kali</span></div>
                        <div class="item-isi"><i class="bi bi-x-square-fill text-danger"></i> <span>Tidak Perlu Repost / Comment Post IG</span></div>
                        <a href="#" class="text-white text-decoration-none">
                            <div class="btn-paket">Ikuti Tryout</div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shadow border border-white border-5 rounded itemPaket">
                        <p class="title-paket">Tryout Premium</p>
                        <h1 class="price-paket">Rp 30.000</h1>
                        <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Sistem CAT/CBT</span></div>
                        <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Timer Ujian</span></div>
                        <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Nilai Langsung Keluar</span></div>
                        <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Perankingan Nasional,Provinsi, Instansi</span></div>
                        <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Grafik Evaluasi</span></div>
                        <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Review Pembahasan</span></div>
                        <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Dikerjakan Berulang Kali</span></div>
                        <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Tidak Perlu Repost / Comment Post IG</span></div>
                        <a href="tryout.php" class="text-white text-decoration-none">
                            <div class="btn-paket">Beli Tryout</div>
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow border border-white border-5 rounded itemPaket">
                        <div class="col-md-6">
                            <p class="title-paket">Bimbel</p>
                            <h1 class="price-paket">Rp 199.000</h1>
                            <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>13x Pertemuan Live Via Zoom</span></div>
                            <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>3 Paket Tryout Premium</span></div>
                            <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Channel Mentoring</span></div>
                            <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Tersedia Rekaman</span></div>
                            <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Menggunakan Ketentuan Terbaru</span></div>
                            <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Fitur Tryout Terlengkap</span></div>
                            <div class="item-isi"><i class="bi bi-check-square-fill text-success"></i> <span>Penilaian, Pembahasan Ranking Nasional</span></div>
                            <a href="bimbel.php" class="text-white text-decoration-none">
                                <div class="btn-paket">Beli Bimbel</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Paket -->

    <!-- Footer -->
    <section>
        <div class="container-fluid bg-dark mt-5">
            <div class="container">
                <div class="row pt-5 pb-5">
                    <div class="col-md-6">
                        <img src="img/logoputih.png" alt="" width="120" height="130">
                        <p class="deskripsiFooter">Adalah website layanan belajar dan tryout CPNS dan Sekolah Kedinasan untuk persiapan tes CPNS dan Sekolah Kedinasan. Di sini juga tersedia informasi, materi, soal, dan tryout online CPNS dan Sekolah Kedinasan gratis untuk mempersiapkan diri dalam menghadapi seleksi CPNS dan Sekolah Kedinasan</p>
                    </div>
                    <div class="col-md-3 text-white">
                        <h2 class="fw-bold mb-3">Lebih Lengkap</h2>
                        <a href="#" style="text-decoration: none;">
                            <p class="fs-5 text-white mt-4">Blog</p>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <p class="fs-5 text-white mt-4">Sitemap</p>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <p class="fs-5 text-white mt-4">Syarat dan Ketentuan</p>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <p class="fs-5 text-white mt-4">Kebijakan Privasi</p>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <p class="fs-5 text-white mt-4">Kebijakan Pengembalian Dana</p>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <p class="fs-5 text-white mt-4">Kontak Kami</p>
                        </a>
                        <a href="#" style="text-decoration: none;">
                            <p class="fs-5 text-white mt-4">FAQ</p>
                        </a>
                    </div>
                    <div class="col-md-3 text-white">
                        <h2 class="fw-bold mb-3">Find Us On</h2>
                        <p class="fs-1"><i class="bi bi-tiktok text-white"></i></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>Education Squad &copy 2024</p>
        </div>
    </section>
    <!-- Akhir Footer -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>