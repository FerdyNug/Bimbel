<?php
require 'inc/session.php';
require 'header.php';

// dapetin ID barang yang dioper di halaman sebelumnya
$idto = $_GET['id']; //ged id barang
// get informasi barang berdasarkan database
$get = mysqli_query($conn, "select * from t_ptryout where idto='$idto'");
$fetch = mysqli_fetch_array($get);
// set variable
$judul = $fetch['judul'];
$tipe = $fetch['tipe'];
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
    <div class="container-fluid">
    <div class="card mb-4 mt-4  ">
    <div class="card-body">
        <a type="button" class="btn btn-secondary mt-3 px-5" href="../tryout.php">
            <i class="fas fa-solid fa-backward"></i>
        </a>
        <div class="">
            <table class="m-0 my-4 mx-4">
                <tr>
                    <td></td>
                    <td><?= $img; ?></td>
                </tr>
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
                        <span class="font-bold">Tipe</span>
                    </td>
                    <td class="">
                        <b class="pl-2">:</b> <input class="p-1 pl-2 rounded font-bold m-3" type="text" placeholder="<?= $tipe; ?>" readonly>
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

        
                <p class="font-bold text-3xl mb-3">Bundling</p>
                <div class="table-responsive">
                    <table class="table table-bordered" id="bundling" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bundling</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $data = mysqli_query($conn, "select * from t_bptryout where idto='$idto'");
                            $i = 1;

                            while ($fetch = mysqli_fetch_array($data)) {
                                $bundling = $fetch['bundling'];
                            ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $bundling; ?> </td>
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