<?php

require 'inc/session.php';
require 'header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tryout Saya</title>
</head>

<body>

    <section>
        <div class="container my-3">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <h1>Tryout Saya</h1>
                    <p>Jangan lupa kerjakan tryoutnya</p>
                </div>
                <div class="col-md-4 text-end mt-4 position-relative">
                    <input type="search" name="cari" id="cari" placeholder="Cari" class="form-control rounded border-success">
                    <div class="position-absolute end-0 bottom-50 me-4 mb-1 fs-5"><i class="bi bi-search"></i></div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <a href="detailTryout" class="text-decoration-none text-dark">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-flex bg-success text-white p-2 rounded-pill my-2">CPNS</div>
                                <p class="card-text">Paket Tryout SKD CPNS</p>
                                <h5 class="card-title">Tryout SKD CPNS Bundling 1</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-2">
                    <a href="detailTryout" class="text-decoration-none text-dark">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-flex bg-success text-white p-2 rounded-pill my-2">CPNS</div>
                                <p class="card-text">Paket Tryout SKD CPNS</p>
                                <h5 class="card-title">Tryout SKD CPNS Bundling 1</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-2">
                    <a href="detailTryout" class="text-decoration-none text-dark">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-flex bg-success text-white p-2 rounded-pill my-2">CPNS</div>
                                <p class="card-text">Paket Tryout SKD CPNS</p>
                                <h5 class="card-title">Tryout SKD CPNS Bundling 1</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-2">
                    <a href="detailTryout" class="text-decoration-none text-dark">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-flex bg-success text-white p-2 rounded-pill my-2">CPNS</div>
                                <p class="card-text">Paket Tryout SKD CPNS</p>
                                <h5 class="card-title">Tryout SKD CPNS Bundling 1</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php

require 'footer.php';

?>