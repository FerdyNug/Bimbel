<?php
require 'inc/session.php';
require 'header.php';

// dapetin ID barang yang dioper di halaman sebelumnya
$id = $_GET['id']; //ged id barang
// get informasi barang berdasarkan database
$get = mysqli_query($conn, "select * from t_user where id='$id'");
$fetch = mysqli_fetch_array($get);
// set variable
$email = $fetch['email'];

$nama_panggilan = $fetch['nama_panggilan'];
if ($nama_panggilan == null) {
    // Jika tidak ada gambar
    $nama_panggilan = 'Belum memasukkan data';} 

$nama_lengkap = $fetch['nama_lengkap'];
if ($nama_lengkap == null) {
    // Jika tidak ada gambar
    $nama_lengkap = 'Belum memasukkan data';} 
$provinsi = $fetch['provinsi'];
if ($provinsi == null) {
    // Jika tidak ada gambar
    $provinsi = 'Belum memasukkan data';} 
$kabupaten = $fetch['kabupaten'];
if ($kabupaten == null) {
    // Jika tidak ada gambar
    $kabupaten = 'Belum memasukkan data';} 

// cek ada gambar atau tidak
$gambar = $fetch['gambar']; //ambil gambar
if ($gambar == null) {
    // Jika tidak ada gambar
    $img = '<img src="../banner/defpic.png" class="zoomable">';
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
            

            <table class="m-0 my-4 mx-4">
                <tr>
                    <td></td>
                    <td><?= $img; ?></td>
                </tr>
            
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
                <tr>
                    <td>

                    </td>
                    <td>
                        <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $id; ?>">
                            Ubah
                        </a>
                    </td>
                </tr>
            </table>
        </div>


    </div>
</main>
<?php
require('footer.php');
?>

<!-- Modal Edit Paket Tryout -->
<div class="modal fade" id="edit<?= $id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" name="gambar" class="mb-3">
                    <input type="email" name="email" value="<?= $email; ?>" class="mb-3 form-control mb" required>
                    <input type="text" name="nama_lengkap" value="<?= $nama_lengkap; ?>" class="mb-3 form-control mb" required>
                    <input type="text" name="nama_panggilan" value="<?= $nama_panggilan; ?>" class="mb-3 form-control mb" required>
                    <input type="text" name="provinsi" value="<?= $provinsi; ?>" class="mb-3 form-control mb" required>
                    <input type="text" name="kabupaten" value="<?= $kabupaten; ?>" class="mb-3 form-control mb" required>

                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <button type="submit" class="mb-3 btn btn-primary mb" name="ubahUser">Ubah</button>
                </div>
            </form>

        </div>
    </div>
</div>