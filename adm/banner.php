<?php
require 'inc/session.php';
require 'header.php';
require('sidebar.php');
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Banner (Highlight)</h1>
            <div class="card mb-4">
                <div class="card-header">
                <!--    <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#myModal">
                        Tambah Banner
                    </button> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Banner 1</th>
                                    <th>Banner 2</th>
                                    <th>Banner 3</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $highlight = mysqli_query($conn, "select * from highlight");
                                $i = 1; 
                                while($row=mysqli_fetch_array($highlight)){
                                    $id = $row['id'];

                                    // cek ada gambar atau tidak
                                    $banner1 = $row['banner1']; //ambil gambar
                                    if($banner1==null){
                                        // Jika tidak ada gambar
                                        $banner1 = 'No Photo';
                                    } else {
                                        // Jika ada gambar
                                        $banner1 = '<img src="banner/'.$banner1.'" width="200" height="100">';
                                    }

                                    $banner2 = $row['banner2']; //ambil gambar
                                    if($banner2==null){
                                        // Jika tidak ada gambar
                                        $banner2 = 'No Photo';
                                    } else {
                                        // Jika ada gambar
                                        $banner2 = '<img src="banner/'.$banner2.'" width="200" height="100">';
                                    }

                                    $banner3 = $row['banner3']; //ambil gambar
                                    if($banner3==null){
                                        // Jika tidak ada gambar
                                        $banner3 = 'No Photo';
                                    } else {
                                        // Jika ada gambar
                                        $banner3 = '<img src="banner/'.$banner3.'" width="200" height="100">';
                                    }

                                ?>
                                <tr>
                                    <td><?= $banner1; ?></td>
                                    <td><?= $banner2; ?></td>
                                    <td><?= $banner3; ?></td>
                                    <td>
                                        <!-- Ubah Paket Tryout -->
                                        <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $id; ?>">
                                        <i class="fas fa-solid fa-pen-to-square"></i>
                                        </a> <br>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>

                                <!-- Modal Edit Paket Tryout -->
                                <div class="modal fade" id="edit<?= $id; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ganti Banner</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="mb-1">Banner 1</label> <br>
                                                        <input type="file" name="banner1" class="mb-3" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="mb-1">Banner 2</label> <br>
                                                        <input type="file" name="banner2" class="mb-3">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="mb-1">Banner 3</label> <br>
                                                        <input type="file" name="banner3" class="mb-3">
                                                    </div>
                                                    <input type="hidden" name="id" value="<?= $id; ?>">
                                                    <button type="submit" class="mb-3 btn btn-primary mb" name="gantiB">Ganti</button>
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
                    <h4 class="modal-title">Tambah Banner</h4>
                </div>

                <!-- Modal body -->
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="mb-1">Banner 1</label> <br>
                            <input type="file" name="banner1" class="mb-3">
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Banner 2</label> <br>
                            <input type="file" name="banner2" class="mb-3">
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Banner 3</label> <br>
                            <input type="file" name="banner3" class="mb-3">
                        </div>
                        <button type="submit" class=" btn btn-primary mb" name="tambahB">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>