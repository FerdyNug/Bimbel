<?php

require 'header.php';
$admin = query("SELECT * FROM user");

// ambil data di URL
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$adm = query("SELECT * FROM user WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubahAdmin"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubahAdmin($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'admin.php';
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
                <h1 class="mt-4">Ubah data Administrator</h1>
                <!-- Button to Open Modal Tambah-->
                <a type="button" class="btn btn-primary text-white mt-2 mb-2" href="admin.php">
                    Kembali ke halaman Kelola Admin
                </a>
                
                <table>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $adm["id"]; ?>">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" id="username" value="<?= $adm["username"] ?>" name="username">
            </div>
            <input type="submit" name="ubahAdmin" value="Simpan Data" class="btn btn-info mt-5" />

        </form>
    </table>

        <?php
        require('footer.php');
        ?>