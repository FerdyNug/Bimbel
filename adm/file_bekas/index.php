<?php
require 'header.php';
?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Stok Barang</h1>

                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Barang
                            </button>
                            <a href="export.php" class="btn btn-info">Export Data</a>
                        </div>
                        <div class="card-body">
                            <?php
                            $ambildatastock = mysqli_query($conn, "select * from stock where stock < 1");

                            while($fetch=mysqli_fetch_array($ambildatastock)){
                                $barang = $fetch['namabarang'];
                            
                            ?>
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Perhatian!</strong> Stok <?= $barang ?> Telah Habis.
                        </div>
                            <?php
                            }
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Deskripsi</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $ambilsemuadatastock = mysqli_query($conn, "select * from stock");
                                        $i = 1;
                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                            
                                            $namabarang = $data['namabarang'];
                                            $deskripsi = $data['deskripsi'];
                                            $stock = $data['stock'];
                                            $idb = $data['idbarang'];

                                            // cek ada gambar atau tidak
                                            $gambar = $data['image']; //ambil gambar
                                            if($gambar==null){
                                                // Jika tidak ada gambar
                                                $img = 'No Photo';
                                            } else {
                                                // Jika ada gambar
                                                $img = '<img src="images/'.$gambar.'" class="zoomable">';
                                            }

                                        ?>
                                        <tr>
                                            <td><?=$i++;?> </td>
                                            <td><?=$img; ?></td>
                                            <td><strong> <a href="detail.php?id=<?=$idb;?>"> <?=$namabarang;?> </a></strong></td>
                                            <td><?=$deskripsi;?> </td>
                                            <td><?=$stock;?> </td>
                                            <td>
                                                <!-- Button to Open the Modal -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?> ">
                                                    Edit
                                                </button>
                                                <!-- Button to Open the Modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                                    Delete
                                                </button>
                                                
                                            </td>
                                        </tr>
                                        <!-- Modal Edit Barang -->
                                        <div class="modal fade" id="edit<?=$idb;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <input type="text" name="namabarang" value="<?=$namabarang;?>" class="mb-3 form-control mb" required>
                                                        <input type="text" name="deskripsi" value="<?=$deskripsi;?>" class="mb-3 form-control mb" required>
                                                        <input type="file" name="file" class="mb-3">
                                                        <br>
                                                        <input type="hidden" name="idb" value="<?=$idb;?>">
                                                        <button type="submit" class="mb-3 btn btn-primary mb" name="updatebarang">Submit</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Modal Delete Barang -->
                                        <div class="modal fade" id="delete<?=$idb;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus barang?</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus <?=$namabarang;?>?
                                                        <input type="hidden" name="idb" value="<?=$idb;?>">
                                                        <br> <br>
                                                        <button type="submit" class="mb-3 btn btn-danger mb" name="hapusbarang">Submit</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

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