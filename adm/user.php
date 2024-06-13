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
                                            <a type="button" class="btn btn-warning me-1" href="ubahUser.php?id=<?= $row["id"]; ?>">
                                                Ubah
                                            </a>

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