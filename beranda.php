<!-- =========

	Template Name: Play
	Author: UIdeck
	Author URI: https://uideck.com/
	Support: https://uideck.com/support/
	Version: 1.1

========== -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EduSquad | Bimbel dan Tryout Online</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/svg" />

    <!-- ===== All CSS files ===== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?= filemtime('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="assets/css/animate.css?v=<?= filemtime('assets/css/animate.css'); ?>" />
    <link rel="stylesheet" href="assets/css/lineicons.css?v=<?= filemtime('assets/css/lineicons.css'); ?>" />
    <link rel="stylesheet" href="assets/css/ud-styles.css?v=<?= filemtime('assets/css/ud-styles.css'); ?>" />
    <link rel="stylesheet" href="assets/css/coba.css" />

</head>

<body>
    <!-- ====== Header Start ====== -->
    <header class="ud-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/images/logo/logo.png" alt="Logo" width="40px" class="rounded-circle" />
                        </a>
                        <button class="navbar-toggler">
                            <span class="toggler-icon"> </span>
                            <span class="toggler-icon"> </span>
                            <span class="toggler-icon"> </span>
                        </button>

                        <div class="navbar-collapse">
                            <ul id="nav" class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#beranda">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#produk">Produk Kami</a>
                                </li>
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#event">Event</a>
                                </li>
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#bantuan">Bantuan</a>
                                </li>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
                        <h1 class="ud-hero-title">
                            <span style="color:#003399;">BIMBEL</span> DAN <br> <span style="color:#003399;">TRYOUT</span> ONLINE
                        </h1>
                        <p class="ud-hero-desc">
                            Program ini membantu teman-teman untuk mempersiapkan diri mengikuti
                            tes Seleksi Kompetensi Dasar (SKD) CPNS Tahun 2024.
                        </p>
                        <ul class="ud-hero-buttons">
                            <li>
                                <a href="#produk" rel="nofollow noopener" class="ud-main-btn ud-white-btn rounded-pill">
                                    <b>Mulai</b>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="ud-hero-brands-wrapper wow fadeInUp" data-wow-delay=".3s">

                    </div>
                    <div class="ud-hero-image wow fadeInUp" data-wow-delay=".25s">
                        <img src="assets/images/hero/hero-image.png" alt="hero-image" width="300px" />
                        <img src="assets/images/hero/dotted-shape.svg" alt="shape" class="shape shape-1" />
                        <img src="assets/images/hero/dotted-shape.svg" alt="shape" class="shape shape-2" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Hero End ====== -->

    <!-- ====== Produk Start ====== -->
    <section id="produk" class="ud-pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-section-title mx-auto text-center">
                        <h2>Layanan Produk Kami</h2>
                    </div>
                </div>
            </div>

            <div class="row g-0 align-items-center justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="ud-single-pricing first-item wow fadeInUp" data-wow-delay=".15s">
                        <div class="ud-pricing-header">
                            <h2>PAKET TRYOUT <br>SKD CPNS</h2>
                            <div class="mt-3">
                                <h4>Rp 10.000</h4>
                            </div>
                        </div>
                        <div class="ud-pricing-body">
                            <ul>
                                <li class="fs-5">1 bundle soal</li>
                                <li class="fs-5">Pembahasan</li>
                                <li class="fs-5">Pemeringkatan</li>
                                <li class="fs-5">Statistik Hasil</li>
                            </ul>
                        </div>
                        <div class="ud-pricing-footer">
                            <a href="javascript:void(0)" class="ud-main-btn ud-border-btn">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="ud-single-pricing active wow fadeInUp" data-wow-delay=".1s">

                        <div class="ud-pricing-header">
                            <h2 class="text-white">PAKET TRYOUT <br>SKD CPNS</h2>
                            <div class="mt-3">
                                <h4>Rp 27.000</h4>
                            </div>
                        </div>
                        <div class="ud-pricing-body">
                            <ul>
                                <li class="fs-5">3 bundle soal</li>
                                <li class="fs-5">Pembahasan</li>
                                <li class="fs-5">Pemeringkatan</li>
                                <li class="fs-5">Statistik Hasil</li>
                            </ul>
                        </div>
                        <div class="ud-pricing-footer">
                            <a href="javascript:void(0)" class="ud-main-btn ud-white-btn">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="ud-single-pricing last-item wow fadeInUp" data-wow-delay=".15s">

                        <div class="ud-pricing-header">
                            <h2>PAKET TRYOUT <br>SKD CPNS</h2>
                            <div class="mt-3">
                                <h4>Rp 45.000</h4>
                            </div>
                        </div>
                        <div class="ud-pricing-body">
                            <ul>
                                <li class="fs-5">5 bundle soal</li>
                                <li class="fs-5">Pembahasan</li>
                                <li class="fs-5">Pemeringkatan</li>
                                <li class="fs-5">Statistik Hasil</li>
                            </ul>
                        </div>
                        <div class="ud-pricing-footer">
                            <a href="javascript:void(0)" class="ud-main-btn ud-border-btn">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 m-1">
                    <div class="ud-single-pricing active wow fadeInUp" data-wow-delay=".1s">

                        <div class="ud-pricing-header">
                            <h2 class="text-white">PAKET TRYOUT <br>SKD CPNS</h2>
                            <div class="mt-3">
                                <h4>Rp 80.000</h4>
                            </div>
                        </div>
                        <div class="ud-pricing-body">
                            <ul>
                                <li class="fs-5">10 bundle soal</li>
                                <li class="fs-5">Pembahasan</li>
                                <li class="fs-5">Pemeringkatan</li>
                                <li class="fs-5">Statistik Hasil</li>
                            </ul>
                        </div>
                        <div class="ud-pricing-footer">
                            <a href="javascript:void(0)" class="ud-main-btn ud-white-btn">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="ud-single-pricing active wow fadeInUp" data-wow-delay=".1s">

                        <div class="ud-pricing-header">
                            <h2 class="text-white">BIMBEL <br>SKD CPNS</h2>
                            <div class="mt-3">
                                <h4>Rp 99.000</h4>
                            </div>
                        </div>
                        <div class="ud-pricing-body">
                            <ul>
                                <li class="fs-5">10x Pertemuan</li>
                                <li class="fs-5">2x Tryout</li>
                                <li class="fs-5">Pembahasan + Pemeringkatan</li>
                                <li class="fs-5">Statistik Hasil</li>
                            </ul>
                        </div>
                        <div class="ud-pricing-footer">
                            <a href="javascript:void(0)" class="ud-main-btn ud-white-btn">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Produk End ====== -->

    <!-- ====== Event Start ====== -->
    <section id="event" class="ud-testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-section-title mx-auto text-center">
                        <h2 class="text-white">Event Yang Sedang Berlangsung</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="ud-single-testimonial-active wow fadeInUp" data-wow-delay=".1s">
                        <div class="ud-testimonial-content-active">
                            <div class="sedangBerlangsung">
                                Sedang Berlangsung
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <h5 class="text-white">TRYOUT SKD CPNS 2024 BATCH 1</h5>
                        </div>
                        <div class="ud-testimonial-info-active">
                            <div class="ud-testimonial-image-active">
                                <img src="assets/images/testimonials/iconTimerPutih.png" alt="author" class="timer" />
                            </div>
                            <div class="ud-testimonial-meta-active">
                                <h5>Pelaksanaan:</h5>
                                <p>22 Juni - 23 Juni 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ud-single-testimonial wow fadeInUp" data-wow-delay=".15s">
                        <div class="ud-testimonial-content">
                            <div class="segeraHadir">
                                Segera Hadir
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5 class="text-black">TRYOUT SKD CPNS 2024 BATCH 2</h5>
                        </div>
                        <div class="ud-testimonial-info">
                            <div class="ud-testimonial-image">
                                <img src="assets/images/testimonials/icon.png" alt="author" class="timer" />
                            </div>
                            <div class="ud-testimonial-meta">
                                <h5>Pelaksanaan:</h5>
                                <p>22 Juni - 23 Juni 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ud-single-testimonial wow fadeInUp" data-wow-delay=".2s">
                        <div class="ud-testimonial-content">
                            <div class="segeraHadir">
                                Segera Hadir
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5 class="text-black">TRYOUT SKD CPNS 2024 BATCH 3</h5>
                        </div>
                        <div class="ud-testimonial-info">
                            <div class="ud-testimonial-image">
                                <img src="assets/images/testimonials/icon.png" alt="author" class="timer" />
                            </div>
                            <div class="ud-testimonial-meta">
                                <h5>Pelaksanaan</h5>
                                <p>22 Juni - 23 Juni 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Event End ====== -->

    <!-- ====== Bantuan Start ====== -->
    <section id="bantuan" class="ud-faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-section-title text-center mx-auto">
                        <h2>Ada Pertanyaan?</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="ud-single-faq wow fadeInUp" data-wow-delay=".1s">
                        <div class="accordion">
                            <button class="ud-faq-btn collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                <span class="icon flex-shrink-0">
                                    <i class="lni lni-chevron-down"></i>
                                </span>
                                <span>Bagaimana cara mengikuti tryout gratis?</span>
                            </button>
                            <div id="collapseOne" class="accordion-collapse collapse">
                                <div class="ud-faq-body">
                                    Untuk mengikuti tryout gratis peserta bisa melakukan login terlebih dahulu dan memilih event tryout gratis pada pilihan event. Klik dan ikuti prosedur pendaftarannya!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ud-single-faq wow fadeInUp" data-wow-delay=".15s">
                        <div class="accordion">
                            <button class="ud-faq-btn collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                <span class="icon flex-shrink-0">
                                    <i class="lni lni-chevron-down"></i>
                                </span>
                                <span>Bagaimana cara mengubah tryout gratis menjadi tryout premium?</span>
                            </button>
                            <div id="collapseTwo" class="accordion-collapse collapse">
                                <div class="ud-faq-body">
                                    Jika kalian sudah memilih tryout gratis kalian juga bisa memilih tryout premium dengan cara memilih produk tryout premium. Klik dan ikuti prosedur pendaftarannya.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ud-single-faq wow fadeInUp" data-wow-delay=".2s">
                        <div class="accordion">
                            <button class="ud-faq-btn collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                <span class="icon flex-shrink-0">
                                    <i class="lni lni-chevron-down"></i>
                                </span>
                                <span>Bagaimana cara membeli tryout premium?</span>
                            </button>
                            <div id="collapseThree" class="accordion-collapse collapse">
                                <div class="ud-faq-body">
                                    Klik pada produk yang ingin anda pilih kemudian ikuti langkah-langkah pendaftarannya!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ud-single-faq wow fadeInUp" data-wow-delay=".1s">
                        <div class="accordion">
                            <button class="ud-faq-btn collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                <span class="icon flex-shrink-0">
                                    <i class="lni lni-chevron-down"></i>
                                </span>
                                <span>Bagaimana cara kerja tryout premium?</span>
                            </button>
                            <div id="collapseFour" class="accordion-collapse collapse">
                                <div class="ud-faq-body">
                                    Peserta mengerjakan tryout seperti biasanya dengan waktu yang disesuaikan dengan tes aslinya. Setelah selesai mengerjakan tryout peserta diperlihatkan hasil dari tryout yang sudah dikerjakan disertai juga pembahasan dan perankingan untuk bahan evaluasi peserta. Peserta juga bisa mengerjakan ulang tryout dengan mereset ulang hasil tryout.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ud-single-faq wow fadeInUp" data-wow-delay=".2s">
                        <div class="accordion">
                            <button class="ud-faq-btn collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix">
                                <span class="icon flex-shrink-0">
                                    <i class="lni lni-chevron-down"></i>
                                </span>
                                <span>Apakah diberikan sertifikat saat mengerjakan tryout gratis?</span>
                            </button>
                            <div id="collapseSix" class="accordion-collapse collapse">
                                <div class="ud-faq-body">
                                    Untuk tryout gratis peserta bisa melihat nilai dan perankingan dari hasil tryout yang sudah dikerjakan.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Bantuan End ====== -->

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

    <!-- ====== Back To Top Start ====== -->
    <a href="javascript:void(0)" class="back-to-top">
        <i class="lni lni-chevron-up"> </i>
    </a>
    <!-- ====== Back To Top End ====== -->

    <!-- ====== All Javascript Files ====== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        // ==== for menu scroll
        const pageLink = document.querySelectorAll(".ud-menu-scroll");

        pageLink.forEach((elem) => {
            elem.addEventListener("click", (e) => {
                e.preventDefault();
                document.querySelector(elem.getAttribute("href")).scrollIntoView({
                    behavior: "smooth",
                    offsetTop: 1 - 60,
                });
            });
        });

        // section menu active
        function onScroll(event) {
            const sections = document.querySelectorAll(".ud-menu-scroll");
            const scrollPos =
                window.pageYOffset ||
                document.documentElement.scrollTop ||
                document.body.scrollTop;

            for (let i = 0; i < sections.length; i++) {
                const currLink = sections[i];
                const val = currLink.getAttribute("href");
                const refElement = document.querySelector(val);
                const scrollTopMinus = scrollPos + 73;
                if (
                    refElement.offsetTop <= scrollTopMinus &&
                    refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
                ) {
                    document
                        .querySelector(".ud-menu-scroll")
                        .classList.remove("active");
                    currLink.classList.add("active");
                } else {
                    currLink.classList.remove("active");
                }
            }
        }

        window.document.addEventListener("scroll", onScroll);
    </script>
</body>

</html>