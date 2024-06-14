<?php
require 'header.php';
$pbimbel = query("SELECT * FROM t_pbimbel");
?>
<?php
require('sidebar.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Bimbel</h1>
            <div class="card mb-4 mt-4">

                <div class="card-header">
                    <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#myModal">
                        Tambah Paket
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Rating</th>
                                    <th>Peserta</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pbimbel as $row) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><img src="img/<?= $row["gambar"]; ?>" width="120" height="80"></td>
                                        <td><?= $row["judul"]; ?></td>
                                        <td><?= $row["rank"]; ?></td>
                                        <td><?= $row["peserta"]; ?></td>
                                        <td>99.<?= $row["harga"]; ?></td>
                                        <td>
                                            <!-- Ubah Paket Bimbel -->
                                            <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row["id"]; ?>">
                                                Ubah
                                            </a> <br>

                                            <!-- Hapus Paket Bimbel -->
                                            <a type="button" class="btn btn-danger mt-1" data-bs-toggle="modal" data-bs-target="#delete<?= $row["id"]; ?>">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit Paket Tryout -->
                                    <div class="modal fade" id="edit<?= $row["id"]; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update Paket Bimbel</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <input type="file" name="gambar" class="mb-3">
                                                        <input type="text" name="judul" value="<?= $row["judul"]; ?>" class="mb-3 form-control mb" required>
                                                        <select class="form-control mb-3" name="rating" id="rating">
                                                            <option value="">Rating Sebelumnya: <?= $row["rank"]; ?></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                        <input type="number" name="peserta" value="<?= $row["peserta"]; ?>" class="mb-3 form-control mb" required>
                                                        <input type="number" name="harga" value="<?= $row["harga"]; ?>" class="mb-3 form-control mb" required>

                                                        <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                                                        <button type="submit" class="mb-3 btn btn-primary mb" name="updatePB">Ubah</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal hapus Paket Tryout -->
                                    <div class="modal fade" id="delete<?= $row["id"]; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Paket Bimbel?</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus <?= $row["judul"]; ?>?
                                                        <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                                                        <br> <br>
                                                        <button type="submit" class="mb-3 btn btn-danger mb" name="hapusPB">Hapus</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <?php
    require('footer.php');
    ?>

    <!-- Modal Tambah Paket Tryout -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Paket Bimbel</h4>
                </div>

                <!-- Modal body -->
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="file" name="gambar" id="gambar" class="mb-3">
                        <input type="text" name="judul" id="judul" class="mb-3 form-control" placeholder="Judul" required>
                        <select class="form-control" name="rating" id="rating">
                            <option value="">Pilih Rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <input type="number" name="peserta" id="peserta" placeholder="Peserta" class="mb-3 mt-3 form-control" required>
                        <input type="number" name="harga" id="harga" placeholder="Harga" class="mb-3 form-control" required>
                        <br>
                        <button type="submit" class=" btn btn-primary mb" name="tambahPB">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>