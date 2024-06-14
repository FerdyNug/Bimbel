<?php
require 'header.php';


?>

<?php
require('sidebar.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Tryout</h1>
            <div class="card mb-4">
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
                                <?php 
                                $ptryout = mysqli_query($conn, "select * from t_ptryout");
                                $i = 1; 
                                while($row=mysqli_fetch_array($ptryout)){
                                            
                                    $judul = $row['judul'];
                                    $rating = $row['rank'];
                                    $peserta = $row['peserta'];
                                    $harga = $row['harga'];
                                    $idb = $row['id'];

                                    // cek ada gambar atau tidak
                                    $gambar = $row['gambar']; //ambil gambar
                                    if($gambar==null){
                                        // Jika tidak ada gambar
                                        $img = 'No Photo';
                                    } else {
                                        // Jika ada gambar
                                        $img = '<img src="img/'.$gambar.'" class="zoomable">';
                                    }

                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><img src="img/<?= $gambar; ?>" width="120" height="80"></td>
                                        <td> <b> <a href="detailPT.php?id=<?= $row["id"]; ?>" class="text-white text-decoration-none"> <?= $judul; ?> </a> </b> </td>
                                        <td><?= $rating; ?></td>
                                        <td><?= $peserta; ?></td>
                                        <td><?= $harga; ?></td>
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
                                    <?php
                                    }
                                    ?>

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

    <!-- Modal Tambah Paket Tryout -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Paket Tryout</h4>
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
                        <button type="submit" class=" btn btn-primary mb" name="tambahPT">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>