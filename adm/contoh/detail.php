<?php
require 'function.php';
require 'cek.php';

// dapetin ID barang yang dioper di halaman sebelumnya
$idbarang = $_GET['id']; //ged id barang
// get informasi barang berdasarkan database
$get = mysqli_query($conn, "select * from stock where idbarang='$idbarang'");
$fetch = mysqli_fetch_array($get);
// set variable
$namabarang = $fetch['namabarang'];
$deskripsi = $fetch['deskripsi'];
$stock = $fetch['stock'];

// cek ada gambar atau tidak
$gambar = $fetch['image']; //ambil gambar
if($gambar==null){
    // Jika tidak ada gambar
    $img = 'No Photo';
} else {
    // Jika ada gambar
    $img = '<img src="images/'.$gambar.'" class="zoomable">';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SB Ferdy</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        .zoomable{
            width: 200px;
            height: 200px;

        }
        .zoomable:hover{
            transform: scale(1.5);
            transition: 0.3s ease;
        }
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Lala</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>


    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Stok Barang
                        </a>
                        <a class="nav-link" href="masuk.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Barang Masuk
                        </a>
                        <a class="nav-link" href="keluar.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Barang Keluar
                        </a>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Kelola Admin
                        </a>
                        <a class="nav-link" href="logout.php">
                            Logout
                        </a>


                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Detail Barang</h1>

                    <div class="card mb-4 mt-4  ">
                        <div class="card-header">
                           <h2><?=$namabarang; ?></h2> <br>
                           <?=$img; ?>
                        </div>
                        <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">Deskripsi</div>
                            <div class="col-md-9">: <?=$deskripsi; ?></div>
                        </div>

                        <div class="mb-5 row">
                            <div class="col-md-3">Stock</div>
                            <div class="col-md-9">: <?=$stock; ?></div>
                        </div>

                            <h3>Barang Masuk</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="barangmasuk" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $ambildatamasuk = mysqli_query($conn, "select * from masuk where idbarang='$idbarang'");
                                        $i = 1;

                                        while($fetch=mysqli_fetch_array($ambildatamasuk)){
                                            $tanggal = $fetch['tanggal'];
                                            $keterangan = $fetch['keterangan'];
                                            $quantity = $fetch['qty'];
                                        ?>
                                        <tr>
                                            <td><?=$i++; ?></td>
                                            <td><?=$tanggal;?> </td>
                                            <td><?=$keterangan;?> </td>
                                            <td><?=$quantity;?> </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>

                            <h3>Barang Keluar</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="barangkeluar" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Penerima</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $ambildatakeluar = mysqli_query($conn, "select * from keluar where idbarang='$idbarang'");
                                        $i = 1;

                                        while($fetch=mysqli_fetch_array($ambildatakeluar)){
                                            $tanggal = $fetch['tanggal'];
                                            $penerima = $fetch['penerima'];
                                            $quantity = $fetch['qty'];
                                        ?>
                                        <tr>
                                            <td><?=$i++; ?></td>
                                            <td><?=$tanggal;?> </td>
                                            <td><?=$penerima;?> </td>
                                            <td><?=$quantity;?> </td>
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
require 'footer.php';
?>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                 <form method="post" enctype="multipart/form-data">
                <div class="modal-body" >
                    <input type="text" name="namabarang" placeholder="Nama Barang" class="mb-3 form-control mb" required>
                    <input type="text" name="deskripsi" placeholder="Deskripsi Barang" class="mb-3 form-control mb" required>
                    <input type="number" name="stock" class="mb-3 form-control" placeholder="Stok Barang" required>
                    <input type="file" name="file" class="mb-3"> 
                    <br>
                    <button type="submit" class=" btn btn-primary mb" name="tambahbarangbaru">Tambah</button>
                </div>
                </form>

            </div>
        </div>
    </div>


</html>