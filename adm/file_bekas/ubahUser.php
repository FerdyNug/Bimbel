<?php

require 'header.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// ambil data di URL
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubahMahasiswa"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = '../user.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = '../user.php';
            </script>
        ";
    }
}

?>

<div id="layoutSidenav">

    <?php
    require('sidebar.php');
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Ubah data User</h1>
                <!-- Button to Open Modal Tambah-->
                <a type="button" class="btn btn-primary text-white mt-2 mb-2" href="user.php">
                    Kembali ke halaman User
                </a>
                
                <table>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
            <div class="form-group">
                <label for="">NRP</label>
                <input type="text" class="form-control" id="nrp" value="<?= $mhs["nrp"] ?>" name="nrp">
            </div>
            <div class="form-group">
                <label for="">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" value="<?= $mhs["nama"] ?>" name="nama">
            </div>
            <div class="form-group">
                <label for="">Penulis</label>
                <input type="email" class="form-control" id="email" value="<?= $mhs["email"] ?>" name="email">
            </div>
            <div class="form-group">
                <label for="">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" value="<?= $mhs["jurusan"] ?>" name="jurusan">
            </div>
            <div class="form-group">
                
            </div>
            <label for="">Gambar</label> <br>
                <img src="img/<?= $mhs['gambar']; ?>" alt="" width="40">
                <input type="file" class="form-control mb-5" id="gambar" name="gambar">
            <input type="submit" name="ubahMahasiswa" value="Simpan Data" class="btn btn-info" />

        </form>
    </table>

        <?php
        require('footer.php');
        ?>