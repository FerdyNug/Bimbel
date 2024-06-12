<?php

require 'header.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

// Tambah Mahasiswa
if (isset($_POST["tambahMahasiswa"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'user.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'user.php';
            </script>
        ";
    }
}

?>

<div id="layoutSidenav">

    <?php
    require('sidebar.php');
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data User</h1>
                <div class="card mb-4 mt-5">
                    <div class="card-header">

                        <!-- Button to Open Modal Tambah-->
                        <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah User
                        </button>

                        <a href="export/export.php" class="btn btn-info text-white">Export Data</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Nama Panggilan</th>
                                    <th>Password</th>
                                    <th>Nama Lengkap</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($mahasiswa as $row) : ?>
                                    <tr>
                                        <td><?= $i; ?> </td>
                                        <td><?= $row["nrp"]; ?></td>
                                        <td><?= $row["nama"]; ?></td>
                                        <td><?= $row["email"]; ?></td>
                                        <td><?= $row["jurusan"]; ?></td>
                                        <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="60"></td>
                                        <td>
                                            <!-- Ubah Mahasiswa -->
                                            <a type="button" class="btn btn-warning" href="ubahUser.php?id=<?= $row["id"]; ?>">
                                                Ubah
                                            </a> <br>

                                            <!-- Hapus Mahasiswa -->
                                            <a type="button" class="btn btn-danger mt-1" href="hapus/hapusUser.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin hapus data user ini?');">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>

                                    <?php $i++; ?>
                                <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?php
        require('footer.php');
        ?>

        <!-- Modal Tambah Mahasiswa -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah User</h4>
                    </div>

                    <!-- Modal body -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="number" name="nrp" class="mb-3 form-control" placeholder="NRP" required>
                            <input type="text" name="nama" placeholder="Nama Mahasiswa" class="mb-3 form-control mb" required>
                            <input type="email" name="email" placeholder="Email" class="mb-3 form-control mb" required>
                            <input type="text" name="jurusan" placeholder="Jurusan" class="mb-3 form-control mb" required>
                            <input type="file" name="gambar" class="mb-3">
                            <br>
                            <button type="submit" class=" btn btn-primary mb" name="tambahMahasiswa">Tambah</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>