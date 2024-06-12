<?php
require 'header.php';
$admin = query("SELECT * FROM t_admin");

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('admin baru berhasil ditambahkan');
                document.location.href = 'admin.php';
                </script>";
    } else {
        echo 'eror';
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
                <h1 class="mt-4">Kelola Admin</h1>
                <div class="card mb-4 mt-5">
                    <div class="card-header">

                        <!-- Button to Open Modal Tambah-->
                        <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah Admin
                        </button>

                        <a href="export.php" class="btn btn-info text-white">Export Data</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($admin as $adm) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $adm["username"]; ?></td>
                                        <td>
                                            <!-- Ubah Admin -->
                                            <a type="button" class="btn btn-warning" href="ubahAdmin.php?id=<?= $adm["id"]; ?>">
                                                Ubah
                                            </a>

                                            <!-- Hapus Mahasiswa -->
                                            <a type="button" class="btn btn-danger ml-1" href="hapusAdmin.php?id=<?= $adm["id"]; ?>" onclick="return confirm('Yakin hapus data admin ini?');">
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
                        <h4 class="modal-title">Tambah Admin</h4>
                    </div>

                    <!-- Modal body -->
                    <form method="post">
                        <div class="modal-body">
                            <input type="text" name="username" id="username" class="mb-3 form-control" placeholder="Username" required>
                            <input type="password" name="password" id="password" placeholder="Password" class="mb-3 form-control mb" required>
                            <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" class="mb-3 form-control mb" required>
                            <br>
                            <button type="submit" class=" btn btn-primary mb" name="register">Register</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>