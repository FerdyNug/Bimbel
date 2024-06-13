<?php

require 'header.php';
$user = query("SELECT * FROM t_user");

?>

<div id="layoutSidenav">
    <?php
    require('sidebar.php');
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data User</h1>
                <div class="card mb-4 mt-4">

                    <div class="card-header">
                        <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah User
                        </button>
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
                                        <td><?= $i; ?></td>
                                        <td><?= $row["email"]; ?></td>
                                        <td><?= $row["nama_panggilan"]; ?></td>
                                        <td><?= $row["nama_lengkap"]; ?></td>
                                        <td><?= $row["provinsi"]; ?></td>
                                        <td><?= $row["kabupaten"]; ?></td>
                                        <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="60"></td>

                                        <td>
                                            <!-- Ubah Mahasiswa -->
                                            <a type="button" class="btn btn-warning" href="ubahUser.php?id=<?= $row["id"]; ?>">
                                                Ubah
                                            </a> <br>

                                            <!-- Hapus Mahasiswa -->
                                            <a type="button" class="btn btn-danger" href="../user/hapusUser.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin hapus data mahasiswa ini?');">
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
    </div>
    </main>

</div>

</main>
<?php
require('footer.php');
?>

<!-- Modal Tambah Admin -->
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
                            <input type="email" name="email" id="email" class="mb-3 form-control" placeholder="Email" required>
                            <input type="password" name="password" id="password" placeholder="Password" class="mb-3 form-control mb" required>
                            <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" class="mb-3 form-control mb" required>
                            <input type="text" name="nama_panggilan" id="nama_panggilan" class="mb-3 form-control" placeholder="Nama Panggilan" required>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="mb-3 form-control" placeholder="Nama Lengkap" required>
                            <input type="text" name="provinsi" id="provinsi" class="mb-3 form-control" placeholder="Provinsi" required>
                            <input type="text" name="kabupaten" id="Kabupaten" class="mb-3 form-control" placeholder="Kabupaten" required>
                            <input type="file" name="gambar" id="gambar">
                            <br>
                            <button type="submit" class=" btn btn-primary mt-3" name="tambah">Tambah</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>