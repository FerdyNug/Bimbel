<?php
require 'inc/session.php';
require 'header.php';
$admin = query("SELECT * FROM t_admin");

?>
<?php
require('sidebar.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Kelola Admin</h1>

            <?php
            if (isset($_POST["tambahAdmin"])) {
                $sukses = 'Berhasil menambah Admin';
                $error = 'Gagal menambah Admin';
            ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $sukses ?>
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_POST["hapusAdmin"])) {
                $sukses = 'Berhasil menghapus Admin';
                $error = 'Gagal menghapus Admin';
            ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $sukses ?>
                </div>
            <?php
            }
            ?>

            <div class="card mb-4 mt-5">
                <div class="card-header">

                    <!-- Button to Open Modal Tambah-->
                    <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="fas fa-solid fa-plus"></i> Admin
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                            <!-- <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $adm["id"]; ?>">
                                                Ubah
                                            </a> -->

                                            <!-- Hapus Paket Tryout -->
                                            <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $adm["id"]; ?>">
                                                <i class="fas fa-solid fa-trash"></i>
                                            </a>

                                        </td>
                                    </tr>

                                    <!-- Modal Edit Paket Tryout -->
                                    <div class="modal fade" id="edit<?= $adm["id"]; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Mengubah Admim</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <input type="text" name="username" class="mb-3 form-control mb" placeholder="Username" value="<?= $adm["username"]; ?>" required>
                                                        <input type="password" name="password" class="mb-3 form-control mb" placeholder="Password" required>
                                                        <input type="password" name="password2" class="mb-3 form-control mb" placeholder="Konfirmasi Password" required>
                                                        <input type="hidden" name="id" value="<?= $id; ?>">
                                                        <button type="submit" class="mb-3 btn btn-primary mb" name="ubahAdmin">Ubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal hapus Paket Tryout -->
                                    <div class="modal fade" id="delete<?= $adm["id"]; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Paket Tryout?</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus <?= $adm["username"]; ?>?
                                                        <input type="hidden" name="id" value="<?= $adm["id"]; ?>">
                                                        <br> <br>
                                                        <button type="submit" class="mb-3 btn btn-danger mb" name="hapusAdmin">Hapus</button>
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

    <!-- Modal Tambah Admin -->
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
                        <button type="submit" class=" btn btn-primary mb" name="tambahAdmin">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>