<?php
session_start();
//koneksi ke database
$conn = mysqli_connect("localhost","root","","lala");


//Menambah barang
if(isset($_POST['tambahbarangbaru'])){
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    //Gambar
    $allowed_extension = array('png','jpg','jpeg');
    $nama = $_FILES['file']['name']; //ngambil nama file gambar
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot)); //mengambil ekstensi
    $ukuran = $_FILES['file']['size']; // mengambil size file
    $file_tmp = $_FILES['file']['tmp_name']; //mengambil lokasi filenya

    //penamaan file -> enkripsi
    $image = md5(uniqid($nama,true) . time()).'.'.$ekstensi; // menggabungkan nama file yang dienkripsi dengan ekstensinya

    // validasi udah ada atau belum
    $cek = mysqli_query($conn,"select * from stock where namabarang='$namabarang'");
    $hitung = mysqli_num_rows($cek);

    if($hitung<1){
        // Jika belum ada
        
        //proses upload gambar
        if(in_array($ekstensi, $allowed_extension) === true){
            //  Validasi ukuran file
            if($ukuran < 15000000){
                move_uploaded_file($file_tmp, 'images/'.$image);

                $addtotable = mysqli_query($conn, "insert into stock (namabarang, deskripsi, stock, image) values ('$namabarang','$deskripsi','$stock','$image')");
                if($addtotable){
                    header('location:masuk.php');
                } else {
                    echo 'Gagal memasukkan data ke database';
                    header('location:login.php');
                }
            } else {
                // Jika file lebih dari 15mb
                echo '
                <script>
                    alert("Ukuran file tidak boleh lebih dari 15mb");
                    widow.location.href="login.php";
                </script>
                ';
            }
        } else {
            // Jika file tidak png/jpg/jpeg
            echo '
            <script>
                alert("File harus png/jpg/jpeg");
                widow.location.href="login.php";
            </script>
                ';
        }

    } else {
        // Jika nama barang sudah terdaftar
        echo '
        <script>
            alert("Nama barang sudah terdaftar");
            widow.location.href="login.php";
        </script>
        ';
    }

    
};

//Menambah Barang Masuk
if (isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang+$qty;

    $addtomasuk = mysqli_query($conn,"insert into masuk (idbarang, keterangan, qty) values ('$barangnya','$penerima', '$qty')");
    $updatestockmasuk = mysqli_query($conn,"update stock set stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
    if($addtomasuk&&$updatestockmasuk){
        header('location:masuk.php');
    } else {
        echo 'Gagal memasukkan data ke database';
        header('location:masuk.php');
    }
}

//Menambah Barang Keluar
if (isset($_POST['barangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];

    if($stocksekarang >= $qty){
        //Jika barangnya cukup 
        $tambahkanstocksekarangdenganquantity = $stocksekarang-$qty;

        $addtokeluar = mysqli_query($conn,"insert into keluar (idbarang, penerima, qty) values ('$barangnya','$penerima', '$qty')");
        $updatestockmasuk = mysqli_query($conn,"update stock set stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
        if($addtokeluar&&$updatestockmasuk){
            header('location:keluar.php');
        } else {
            echo 'Gagal memasukkan data ke database';
            header('location:keluar.php');
        }
    } else {
        // Jika barang tidak cukup
        echo '
        <script>
            alert("Stock saat ini tidak mencukupi");
            window.location.href = "keluar.php";
        </script>
        ';
    }

}

//Update info barang
if(isset($_POST['updatebarang'])){
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];

    //Gambar
    $allowed_extension = array('png','jpg','jpeg');
    $nama = $_FILES['file']['name']; //ngambil nama file gambar
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot)); //mengambil ekstensi
    $ukuran = $_FILES['file']['size']; // mengambil size file
    $file_tmp = $_FILES['file']['tmp_name']; //mengambil lokasi filenya

    //penamaan file -> enkripsi
    $image = md5(uniqid($nama,true) . time()).'.'.$ekstensi; // menggabungkan nama file yang dienkripsi dengan ekstensinya

    if($ukuran==0){
        //jika tidak ingin upload
        $update = mysqli_query($conn, "update stock set namabarang='$namabarang', deskripsi='$deskripsi' where idbarang='$idb'");
        if($update){
            header('location:index.php');
        } else {
            echo 'Gagal memasukkan data ke database';
            header('location:index.php');
        }
    } else {
        //Jika ingin upload
        move_uploaded_file($file_tmp, 'images/'.$image);
        $update = mysqli_query($conn, "update stock set namabarang='$namabarang', deskripsi='$deskripsi', image='$image' where idbarang='$idb'");
        if($update){
            header('location:index.php');
        } else {
            echo 'Gagal memasukkan data ke database';
            header('location:index.php');
        }
        }
}

//Hapus barang dari stock
if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb'];
    
    $gambar = mysqli_query($conn, "select * from stock where idbarang='$idb'");
    $get = mysqli_fetch_array($gambar);
    $img = 'images/'.$get['image'];
    unlink($img);

    $hapus = mysqli_query($conn, "delete from stock where idbarang='$idb'");
    if($hapus){
        header('location:index.php');
    } else {
        echo 'Gagal memasukkan data ke database';
        header('location:index.php');
    }
};

//Mengubah data barang masuk
if(isset($_POST['updatebarangmasuk'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn,"select * from masuk where idmasuk='$idm'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg){
        $selisih = $qty-$qtyskrg;
        $kurangin = $stockskrg + $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update masuk set qty='$qty', keterangan='$keterangan' where idmasuk='$idm'");
            if($kurangistocknya&&$updatenya){
                header('location:masuk.php');
            } else {
                echo 'Gagal mengubah data';
                header('location:masuk.php');

            }
    } else {
        $selisih = $qtyskrg-$qty;
        $kurangin = $stockskrg - $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update masuk set qty='$qty', keterangan='$keterangan' where idmasuk='$idm'");
            if($kurangistocknya&&$updatenya){
                header('location:masuk.php');
            } else {
                echo 'Gagal mengubah data';
                header('location:masuk.php');

            }
    }
}

// Menghapus barang masuk
if(isset($_POST['hapusbarangmasuk'])){
    $idb = $_POST['idb'];
    $qty = $_POST['qty'];
    $idm = $_POST['idm'];

    $getdatastock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['stock'];

    $selisih = $stok - $qty;

    $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn, "delete from masuk where idmasuk='$idm'");
    if($update&&$hapusdata){
        header('location:masuk.php');
    } else {
        header('location:masuk.php');
    };
}

//Mengubah data barang keluar
if(isset($_POST['updatebarangkeluar'])){
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    // Mengambil stock barang saat ini
    $lihatstock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    // Qty barang keluar saat ini
    $qtyskrg = mysqli_query($conn,"select * from keluar where idkeluar='$idk'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg){
        $selisih = $qty-$qtyskrg;
        $kurangin = $stockskrg - $selisih;
        if($selisih <= $stockskrg){
            //Stock cukup, keluarin stock
            //Update table keluar, stock
            $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
            $updatenya = mysqli_query($conn, "update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
            if($kurangistocknya&&$updatenya){
                header('location:keluar.php');
            } else {
                echo 'Gagal mengubah data';
                header('location:keluar.php');

            }
        } else {
            //Stock tidak cukup
            //Alert
            echo '
            <script>
            alert("Stock tidak mencukupi"):
            widow.location.href="keluar.php";
            </script>
            ';
        }


        
    } else {
        $selisih = $qtyskrg-$qty;
        $kurangin = $stockskrg + $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
            if($kurangistocknya&&$updatenya){
                header('location:keluar.php');
            } else {
                echo 'Gagal mengubah data';
                header('location:keluar.php');

            }
    }
}

// Menghapus barang keluar
if(isset($_POST['hapusbarangkeluar'])){
    $idb = $_POST['idb'];
    $qty = $_POST['qty'];
    $idk = $_POST['idk'];

    $getdatastock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['stock'];

    $selisih = $stok + $qty;

    $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn, "delete from keluar where idkeluar='$idk'");
    if($update&&$hapusdata){
        header('location:keluar.php');
    } else {
        header('location:keluar.php');
    };
}

//Menambah Admin Baru
if(isset($_POST['tambahadmin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryinsert = mysqli_query($conn, "insert into login (email, password) values ('$email','$password')");

    if($queryinsert){
        // Jika berhasil
        header('location:admin.php');
    } else {
        echo 'Gagal menambah admin';
        header('location:admin.php');
    };
}

// Edit Data Admin
if(isset($_POST['updateadmin'])){
    $emailbaru = $_POST['emailadmin'];
    $passwordbaru = $_POST['passwordbaru'];
    $idnya = $_POST['idu'];

    $queryupdate = mysqli_query($conn, "update login set email='$emailbaru', password='$passwordbaru' where iduser='$idnya'");
    if($queryupdate){
        // Jika Berhasil
        header('location:admin.php');
    } else {
        // Jika Gagal
        echo 'Gagal mengupdate admin';
        header('location:admin.php');
    }
}

// Hapus Admin
if(isset($_POST['hapusadmin'])){
    $id = $_POST['idu'];

    $querydelete = mysqli_query($conn, "delete from login where iduser='$id'");
    if($querydelete){
        // Jika Berhasil
        header('location:admin.php');
    } else {
        // Jika Gagal
        echo 'Gagal menghapus admin';
        header('location:admin.php');
    }
}


?>