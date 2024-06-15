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
    $img = '<img src="../img/' . $gambar . '" class="zoomable">';
}

?>


        <main>
            <div class="container-fluid px-4">

                <a type="button" class="btn btn-secondary mt-3 px-5" href="../user.php">
                <i class="fas fa-solid fa-backward"></i> 
                </a>
                <div class="w-full ">
                <h1 class="mt-4"><?= $img; ?> </h1>

                <table class="m-0 my-4 mx-4">
                    <tr>
                        <td>
                            <span class="font-bold">Email</span>
                        </td>
                        <td class="">
                            <b class="pl-2">:</b> <input class="p-1 pl-2 rounded font-bold m-3" type="text" placeholder="<?= $email; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="font-bold">Nama Lengkap</span>
                        </td>
                        <td>
                            <b class="pl-2">:</b> <input class="p-1 pl-2 rounded font-bold m-3" type="text" placeholder="<?= $nama_lengkap; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="font-bold">Nama Panggilan</span>
                        </td>
                        <td>
                            <b class="pl-2">:</b> <input class="p-1 pl-2 rounded font-bold m-3" type="text" placeholder="<?= $nama_panggilan; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="font-bold">Provinsi</span>
                        </td>
                        <td>
                            <b class="pl-2">:</b> <input class="p-1 pl-2 rounded font-bold m-3" type="text" placeholder="<?= $provinsi; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="font-bold">Kabupaten</span>
                        </td>
                        <td>
                            <b class="pl-2">:</b> <input class="p-1 pl-2 rounded font-bold m-3" type="text" placeholder="<?= $kabupaten; ?>" readonly>
                        </td>
                    </tr>
                </table>
                </div>


            </div>
        </main>
        <?php
        require('footer.php');
        ?>