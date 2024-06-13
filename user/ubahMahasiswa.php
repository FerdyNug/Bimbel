<?php

require '../adm/header.php';
$mahasiswa = query("SELECT * FROM t_user");

// ambil data di URL
$id = $_GET["id"];
// query data user berdasarkan id
$user = query("SELECT * FROM t_user WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubahUser"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = '../adm/index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = '../adm/index.php';
            </script>
        ";
    }
}

?>

<div id="layoutSidenav">

    <?php
    require('../adm/sidebar.php');
    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Ubah Data User</h1>
                <!-- Button to Open Modal Tambah-->
                <a type="button" class="btn btn-primary text-white mt-2 mb-2" href="mahasiswa.php">
                    Kembali ke halaman User
                </a>

                <table>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $user["id"]; ?>">
                        <input type="hidden" name="gambarLama" value="<?= $user["gambar"]; ?>">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id="email" value="<?= $user["email"] ?>" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Panggilan</label>
                            <input type="text" class="form-control" id="nama_panggilan" value="<?= $user["nama_panggilan"] ?>" name="nama_panggilan">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" value="<?= $user["nama_lengkap"] ?>" name="nama_lengkap">
                        </div>
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" value="<?= $user["provinsi"] ?>" name="provinsi">
                        </div>
                        <div class="form-group">
                            <label for="">Kabupaten</label>
                            <input type="text" class="form-control" id="kabupaten" value="<?= $user["kabupaten"] ?>" name="kabupaten">
                        </div>
                        <div class="form-group">

                        </div>
                        <label for="">Gambar</label> <br>
                        <img src="img/<?= $user['gambar']; ?>" alt="" width="40">
                        <input type="file" class="form-control mb-5" id="gambar" name="gambar">
                        <input type="submit" name="ubahUser" value="Simpan Data" class="btn btn-info" />

                    </form>
                </table>

                <?php
                require('../adm/footer.php');
                ?>