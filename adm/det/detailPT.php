<?php
require 'inc/session.php';
require 'header.php';

// dapetin ID barang yang dioper di halaman sebelumnya
$id = $_GET['id']; //ged id barang
// get informasi barang berdasarkan database
$get = mysqli_query($conn, "select * from t_ptryout where id='$id'");
$fetch = mysqli_fetch_array($get);
// set variable
$judul = $fetch['judul'];
$rating = $fetch['rank'];
$peserta = $fetch['peserta'];
$harga = $fetch['harga'];

// cek ada gambar atau tidak
$gambar = $fetch['gambar']; //ambil gambar
if ($gambar == null) {
    // Jika tidak ada gambar
    $img = 'No Photo';
} else {
    // Jika ada gambar
    $img = '<img src="../img/' . $gambar . '" class="zoomable">';
}

?>


<main>
    <div class="container-fluid px-4">

        <a type="button" class="btn btn-secondary mt-3 px-5" href="../tryout.php">
            <i class="fas fa-solid fa-backward"></i>
        </a>
        <div class="w-full ">
            <h1 class="mt-4"><?= $img; ?> </h1>

            <table class="m-0 my-4 mx-4">
                <tr>
                    <td>
                        <span class="font-bold">Judul</span>
                    </td>
                    <td class="">
                        <b class="pl-2">:</b> <input class="p-1 pl-2 rounded font-bold m-3" type="text" placeholder="<?= $judul; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="font-bold">Rating</span>
                    </td>
                    <td>
                        <b class="pl-2">:</b> <input class="p-1 pl-2 rounded font-bold m-3" type="text" placeholder="<?= $rating; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="font-bold">Peserta</span>
                    </td>
                    <td>
                        <b class="pl-2">:</b> <input class="p-1 pl-2 rounded font-bold m-3" type="text" placeholder="<?= $peserta; ?>+" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="font-bold">Harga</span>
                    </td>
                    <td>
                        <b class="pl-2">:</b> <input class="p-1 pl-2 rounded font-bold m-3" type="text" placeholder="<?= $harga; ?>.000" readonly>
                    </td>
                </tr>
            </table>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#myModal">
                    Tambah Paket
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tes</th>
                                <th>Fitur</th>
                                <th>Keterangan 1</th>
                                <th>Keterangan 2</th>
                                <th>Materi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>Tes apa</td>
                                    <td>Fitur-fiturnya</td>
                                    <td>Keterangan pertama</td>
                                    <td>Keterangan Kedua</td>
                                    <td>Materi Tes</td>
                                    <td>
                                        <!-- Detail tryout -->
                                        <a type="button" class="btn btn-light" href="det/detailPT.php?id=<?= $row["id"]; ?>">
                                            <i class="fas fa-solid fa-circle-info"></i>
                                        </a>

                                        <!-- Ubah Paket Tryout -->
                                        <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $id; ?>">
                                            <i class="fas fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <!-- Hapus Paket Tryout -->
                                        <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id; ?>">
                                            <i class="fas fa-solid fa-trash"></i>
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
                                                    <input type="text" name="judul" value="<?= $judul; ?>" class="mb-3 form-control mb" required>
                                                    <select class="form-control mb-3" name="rating" id="rating">
                                                        <option value="">Rating Sebelumnya: <?= $rating; ?></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                    <input type="number" name="peserta" value="<?= $peserta; ?>" class="mb-3 form-control mb" required>
                                                    <input type="number" name="harga" value="<?= $harga; ?>" class="mb-3 form-control mb" required>

                                                    <input type="hidden" name="id" value="<?= $id; ?>">
                                                    <button type="submit" class="mb-3 btn btn-primary mb" name="updatePT">Ubah</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal hapus Paket Tryout -->
                                <div class="modal fade" id="delete<?= $id; ?>">
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
                                                    Apakah Anda yakin ingin menghapus <?= $judul; ?>?
                                                    <input type="hidden" name="id" value="<?= $id; ?>">
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