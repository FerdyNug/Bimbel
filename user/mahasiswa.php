<?php

require 'header.php';
$user = query("SELECT * FROM t_user");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $user = cari($_POST["keyword"]);
}

// Tambah Mahasiswa
if (isset($_POST["tambahUser"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'mahasiswa.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'mahasiswa.php';
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

                        <a href="export.php" class="btn btn-info text-white">Export Data</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Nama Panggilan</th>
                                    <th>Nama Lengkap</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($user as $row) : ?>
                                    <tr>
                                        <td><?= $i; ?> </td>
                                        <td><?= $row["email"]; ?></td>
                                        <td><?= $row["nama_panggilan"]; ?></td>
                                        <td><?= $row["nama_lengkap"]; ?></td>
                                        <td><?= $row["provinsi"]; ?></td>
                                        <td><?= $row["kabupaten"]; ?></td>
                                        <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="60"></td>
                                        <td>
                                            <!-- Ubah Mahasiswa -->
                                            <a type="button" class="btn btn-warning" href="ubahMahasiswa.php?id=<?= $row["id"]; ?>">
                                                Ubah
                                            </a> <br>

                                            <!-- Hapus Mahasiswa -->
                                            <a type="button" class="btn btn-danger mt-1" href="hapusMahasiswa.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin hapus data user ini?');">
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
                            <input type="email" name="email" class="mb-3 form-control" placeholder="Email" required>
                            <input type="text" name="nama_panggilan" placeholder="Nama Panggilan" class="mb-3 form-control mb" required>
                            <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="mb-3 form-control mb" required>
                            <input type="text" name="provinsi" placeholder="Provinsi" class="mb-3 form-control mb" required>
                            <input type="text" name="kabupaten" placeholder="Kabupaten" class="mb-3 form-control mb" required>
                            <input type="file" name="gambar" class="mb-3">
                            <br>
                            <button type="submit" class=" btn btn-primary mb" name="tambahUser">Tambah</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>