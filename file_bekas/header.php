<?php
require 'inc/functions.php';
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

<body>
    <!-- Navbar -->
    <!-- Akhir Navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container my-2">
            <a href="index.php">
                <img src="img/logo.png" alt="Bootstrap" width="30" height="40">
            </a>
            <div class="btn-group">
                <a href="#"><i class="bi bi-bell-fill text-primary me-4 align-middle fs-3"></i></a>
                <a href="#menudropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                    <img class="rounded-circle" src="img/deadPool.png" alt="" style="width: 40px; height: 40px;">
                </a>
                <ul class="dropdown-menu" id="menudropdown">
                    <li><a class="dropdown-item" href="#">Akun</a></li>
                    <li><a class="dropdown-item" href="keluar.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>