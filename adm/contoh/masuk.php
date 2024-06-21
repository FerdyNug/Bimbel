<?php
require 'header.php';
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Barang Masuk</h1>                       
                        
                        <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Barang
                            </button>
                            <br>
                            <div class="row mt-4">
                                <div class="col">
                                    <form method="post" class="form-inline">
                                    <input type="date" name="tgl_mulai" class="form-control">
                                    <input type="date" name="tgl_selesai" class="form-control ml-3">
                                    <button type="submit" name="filter_tgl" class="btn btn-info ml-3">Filter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    if(isset($_POST['filter_tgl'])){
                                        $mulai = $_POST['tgl_mulai'];
                                        $selesai = $_POST['tgl_selesai'];
                                        if($mulai!=null || $selesai!=null){
                                            $ambilsemuadatamasuk = mysqli_query($conn, "select * from masuk m, stock s where s.idbarang=m.idbarang and tanggal BETWEEN '$mulai' and DATE_ADD('$selesai',INTERVAL 1 DAY)");
                                        } else {
                                            $ambilsemuadatamasuk = mysqli_query($conn, "select * from masuk m, stock s where s.idbarang=m.idbarang");
                                        }
                                        
                                    } else {
                                        $ambilsemuadatamasuk = mysqli_query($conn, "select * from masuk m, stock s where s.idbarang=m.idbarang");
                                    };
                                        while($data=mysqli_fetch_array($ambilsemuadatamasuk)){
                                            $idb = $data['idbarang'];
                                            $idm = $data['idmasuk'];
                                            $tanggal = $data['tanggal'];
                                            $namabarang = $data['namabarang'];
                                            $qty = $data['qty'];
                                            $keterangan = $data['keterangan'];

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
                                            <td><?=$tanggal;?> </td>
                                            <td><?=$img; ?></td>
                                            <td><?=$namabarang;?> </td>
                                            <td><?=$qty;?> </td>
                                            <td><?=$keterangan;?> </td>
                                            <td>
                                                <!-- Button to Open the Modal -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idm;?> ">
                                                    Edit
                                                </button>
                                                <!-- Button to Open the Modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idm;?>">
                                                    Delete
                                                </button>
                                                
                                            </td>
                                        </tr>
                                        <!-- Modal Edit Barang -->
                                        <div class="modal fade" id="edit<?=$idm;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                        <input type="text" name="keterangan" value="<?=$keterangan;?>" class="mb-3 form-control mb" required>
                                                        <input type="number" name="qty" value="<?=$qty;?>" class="mb-3 form-control mb" required>
                                                        <input type="hidden" name="idb" value="<?=$idb;?>">
                                                        <input type="hidden" name="idm" value="<?=$idm;?>">
                                                        <button type="submit" class="mb-3 btn btn-primary mb" name="updatebarangmasuk">Submit</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Delete Barang -->
                                        <div class="modal fade" id="delete<?=$idm;?>">
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
                                                        <input type="hidden" name="qty" value="<?=$qty;?>">
                                                        <input type="hidden" name="idm" value="<?=$idm;?>">
                                                        <br> <br>
                                                        <button type="submit" class="mb-3 btn btn-danger mb" name="hapusbarangmasuk">Submit</button>
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
                <form method="post">
                <div class="modal-body">
                    <select name="barangnya" class="mb-3 form-control">
                        <?php
                            $ambilsemuadatanya = mysqli_query($conn, "select * from stock");
                            while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                                $namabarangnya = $fetcharray['namabarang'];
                                $idbarangnya = $fetcharray['idbarang'];
                        ?>

                        <option value="<?=$idbarangnya?>"><?=$namabarangnya;?></option>

                        <?php                                
                            }
                        ?>
                    </select>
                    <input type="number" name="qty" class="mb-3 form-control" placeholder="Quantity" required>
                    <input type="text" name="penerima" class="mb-3 form-control" placeholder="Penerima" required>
                    <button type="submit" class="mb-3 btn btn-primary" name="barangmasuk">Tambah</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</html>
