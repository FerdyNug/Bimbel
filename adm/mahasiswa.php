<?php

require 'header.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>
        <div id="layoutSidenav">
            <?php
            require('sidebar.php');
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Mahasiswa</h1>
                        <div class="card mb-4 mt-5">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#myModal">
                                    Tambah Mahasiswa
                                </button>
                                <a href="export.php" class="btn btn-info text-white">Export Data</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Jurusan</th>
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
                                            <td>$320,800</td>
                                            <td> 
                                                <!-- Button to Open the Modal -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#">
                                                    Edit
                                                </button> <br>
                                                <!-- Button to Open the Modal -->
                                                <button type="button" class="btn btn-danger mt-1" data-toggle="modal" data-target="#delete">
                                                    Delete
                                                </button>
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