<?php

require 'header.php';

?>

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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <?php 
                                $user = mysqli_query($conn, "select * from t_user");
                                $i = 1; 
                                while($row=mysqli_fetch_array($user)){
                                            
                                    $email = $row['email'];
                                    $nama_panggilan = $row['nama_panggilan'];
                                    if($nama_panggilan==null){
                                        // Jika tidak ada gambar
                                        $nama_panggilan = 'Tidak ada data';
                                    }

                                    $nama_lengkap = $row['nama_lengkap'];
                                    if($nama_lengkap==null){
                                        // Jika tidak ada gambar
                                        $nama_lengkap = 'Tidak ada data';
                                    }
                                    $provinsi = $row['provinsi'];
                                    if($provinsi==null){
                                        // Jika tidak ada gambar
                                        $provinsi = 'Tidak ada data';
                                    }
                                    $kabupaten = $row['kabupaten'];
                                    if($kabupaten==null){
                                        // Jika tidak ada gambar
                                        $kabupaten = 'Tidak ada data';
                                    }

                                    // cek ada gambar atau tidak
                                    $gambar = $row['gambar']; //ambil gambar
                                    if($gambar==null){
                                        // Jika tidak ada gambar
                                        $image = '<img src="img/defpic.png" width="80" class="zoomable">';
                                    } else {
                                        // Jika ada gambar
                                        $image = '<img src="img/'.$gambar.'" width="80" class="zoomable">';
                                    }

                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $email; ?></td>
                                        <td><?= $nama_panggilan; ?></td>
                                        <td><?= $nama_lengkap; ?></td>
                                        <td><?= $provinsi; ?></td>
                                        <td><?= $kabupaten; ?></td>
                                        <td><?= $image; ?></td>

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
                                    <?php 
                                    } 
                                    ?>
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