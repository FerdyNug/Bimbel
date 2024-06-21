<?php
require 'inc/session.php';
require 'header.php';
$bundling = query("SELECT * FROM t_bptryout");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Bundling</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-solid fa-plus"></i> Bundling
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tipe</th>
                                    <th>Bundling</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                    <?php 
                                $data = mysqli_query($conn, "select * from t_ptryout p, t_bptryout b where p.idto=b.idto");
                                $i = 1; 
                                while($row=mysqli_fetch_array($data)){
                                    $idb = $row['idbundl'];
                                    $idto = $row['idto'];
                                    $tipe = $row['tipe'];
                                    $bundling = $row['bundling'];
                                ?>
                                        <td><?= $i++; ?></td>
                                        <td><?= $tipe; ?></td>
                                        <td><?= $bundling; ?></td>
                                        <td>

                                            <!-- Detail tryout -->
                                            <!-- <a type="button" class="btn btn-light" href="">
                                            <i class="fas fa-solid fa-circle-info"></i>
                                            </a> -->

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

    <!-- Modal Tambah Bundling -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Bundling</h4>
                </div>

                <!-- Modal body -->
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <select class="form-control" name="tipe" id="tipe">
                            <?php
                            $data = mysqli_query($conn, "select * from t_ptryout");
                            while ($fetcharray = mysqli_fetch_array($data)){
                                $tipe = $fetcharray['tipe'];
                                $idto = $fetcharray['idto'];
                            ?>
                            <option value="<?=$idto?>"><?=$tipe;?></option>
                            <?php                                
                            }
                            ?>
                        </select>
                        <input type="text" name="bundling" id="bundling" placeholder="Bundling" class="mt-3 form-control" required>
                        <br>
                        <button type="submit" class=" btn btn-primary" name="tambahBundling">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>