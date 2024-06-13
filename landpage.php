<?php
// require 'inc/session.php';
require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Awal</title>
</head>

<body>

    <section>
        <div class="container border border-success bg-success bg-opacity-25 my-4 rounded-4" style="height: 60px;">
            <div class="mt-3">
                <ul>
                    <li>Pendaftaran <a href="#" class="text-decoration-none text-danger">Bimbel SKD CPNS 2024 Batch 8</a> Telah Dibuka!</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Highlight -->
    <section>
        <div class="container">
            <div class="row mb-3">
                <h1>Highlight</h1>
            </div>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/deadPool.png" class="d-block w-100 rounded-4" alt="..." style="height: 300px;">
                    </div>
                    <div class="carousel-item">
                        <img src="img/deadPool.png" class="d-block w-100 rounded-4" alt="..." style="height: 300px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Hgihlight -->

    <!-- Pilih Layanan -->
    <section>
        <div class="container">
            <div class="row my-3">
                <h1>Pilih Layanan</h1>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="#" class="text-decoration-none text-dark">
                        <div class="text-center rounded shadow p-2" style="height: 200px;">
                            <div class="bg-success btn btn-success fs-1 mt-5"><i class="bi bi-list-task"></i></div>
                            <div>Tryout</div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="#" class="text-decoration-none text-dark">
                        <div class="text-center rounded shadow p-2" style="height: 200px;">
                            <div class="bg-success btn btn-success fs-1 mt-5"><i class="bi bi-pencil-square"></i></div>
                            <div>Bimbel</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Pilih Layanan -->

    <!-- Pilih Kategori -->
    <section>
        <div class="container my-3">
            <div class="row">
                <h1>Pilih Kategori</h1>
            </div>
        </div>
        <div class="container shadow rounded">
            <div class="row text-center pt-4">
                <div class="col-md-3"><img src="img/deadPool.png" alt="" style="width: 100px; height: 100px;"></div>
                <div class="col-md-3"><img src="img/deadPool.png" alt="" style="width: 100px; height: 100px;"></div>
                <div class="col-md-3"><img src="img/deadPool.png" alt="" style="width: 100px; height: 100px;"></div>
                <div class="col-md-3"><img src="img/deadPool.png" alt="" style="width: 100px; height: 100px;"></div>
            </div>
            <div class="row text-center pb-4">
                <div class="col-md-3">CPNS</div>
                <div class="col-md-3">CPNS</div>
                <div class="col-md-3">CPNS</div>
                <div class="col-md-3">CPNS</div>
            </div>
        </div>
    </section>
    <!-- Akhir Pilih Kategori -->

    <!-- Event Tryout Gratis -->
    <section>
        <div class="container my-3">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <h1>Event Tryout Gratis</h1>
                    <p>Tryout gratis</p>
                </div>
                <div class="col-md-4 text-end mt-4 position-relative">
                    <input type="search" name="cari" id="cari" placeholder="Cari" class="form-control rounded border-success">
                    <div class="position-absolute end-0 bottom-50 me-4 mb-1 fs-5"><i class="bi bi-search"></i></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="div rounded bg-secondary p-2">
                        <div class="div p-1">
                            <h3>Tryout SKD</h3>
                            <p>15 - 16 Juni 2024</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="div rounded bg-secondary p-2">
                        <div class="div p-1">
                            <h3>Tryout SKD</h3>
                            <p>15 - 16 Juni 2024</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="div rounded bg-secondary p-2">
                        <div class="div p-1">
                            <h3>Tryout SKD</h3>
                            <p>15 - 16 Juni 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Event Tryout Gratis -->

    <!-- Bantuan Cepat -->
    <!-- Akhir Bantuan Cepat -->
</body>

</html>

<?php
require 'footer.php';
?>