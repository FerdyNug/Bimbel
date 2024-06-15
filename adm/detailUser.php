<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'header.php';

// dapetin ID barang yang dioper di halaman sebelumnya
$id = $_GET['id']; //ged id barang
// get informasi barang berdasarkan database
$get = mysqli_query($conn, "select * from t_user where id='$id'");
$fetch = mysqli_fetch_array($get);
// set variable
$email = $fetch['email'];
$nama_panggilan = $fetch['nama_panggilan'];
$nama_lengkap = $fetch['nama_lengkap'];
$provinsi = $fetch['provinsi'];
$kabupaten = $fetch['kabupaten'];

// cek ada gambar atau tidak
$gambar = $fetch['gambar']; //ambil gambar
if ($gambar == null) {
    // Jika tidak ada gambar
    $img = 'No Photo';
} else {
    // Jika ada gambar
    $img = '<img src="img/' . $gambar . '" class="zoomable">';
}

?>
<?php
require('sidebar.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $img; ?> </h1>

            <table>
                <tr>
                    <td>
                        <span>Email</span>
                    </td>
                    <td>
                        <b>:</b> <input class="ml-2" type="text" value="<?= $email; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Nama Lengkap</span>
                    </td>
                    <td>
                    <b>:</b> <input class="ml-2" type="text" value="<?= $nama_lengkap; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Nama Panggilan</span>
                    </td>
                    <td>
                    <b>:</b> <input class="ml-2" type="text" value="<?= $nama_panggilan; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Provinsi</span>
                    </td>
                    <td>
                    <b>:</b> <input class="ml-2" type="text" value="<?= $provinsi; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Kabupaten</span>
                    </td>
                    <td>
                    <b>:</b> <input class="ml-2" type="text" value="<?= $kabupaten; ?>" readonly>
                    </td>
                </tr>
            </table>

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
                                    <th>Acuan</th>
                                    <th>Fitur</th>
                                    <th>Materi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>SK</td>
                                    <td>Gratis</td>
                                    <td>Pembelajaran</td>
                                    <td>
                                        <!-- Ubah Paket Tryout -->
                                        <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row["id"]; ?>">
                                            Ubah
                                        </a> <br>

                                        <!-- Hapus Paket Tryout -->
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
                                                <h4 class="modal-title">Update Paket Tryout</h4>
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
                                                    <button type="submit" class="mb-3 btn btn-primary mb" name="updatePT">Ubah</button>
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
                                                <h4 class="modal-title">Hapus Paket Tryout?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus <?= $row["judul"]; ?>?
                                                    <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                                                    <br> <br>
                                                    <button type="submit" class="mb-3 btn btn-danger mb" name="hapusPT">Hapus</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>





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