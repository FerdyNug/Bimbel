<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bimbel");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $email = htmlspecialchars($data["email"]);
    $nama_panggilan = htmlspecialchars($data["nama_panggilan"]);
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $provinsi = htmlspecialchars($data["provinsi"]);
    $kabupaten = htmlspecialchars($data["kabupaten"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // validasi udah ada atau belum
    $cek = mysqli_query($conn, "SELECT * FROM t_user WHERE email='$email'");
    $hitung = mysqli_num_rows($cek);

    if ($hitung < 1) {
        // query insert data
        $query = "INSERT INTO t_user VALUES ('', '$email', '$nama_panggilan', '', '$gambar', '$nama_lengkap', '$provinsi', '$kabupaten')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFIle = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
             alert('pilih gambar terlebih dahulu!');
             </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
             alert('yang anda upload bukan gambar');
             </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFIle > 30000000) {
        echo "<script>
             alert('ukuran gambar terlalu besar!');
             </script>";
        return false;
    }

    // lolos pengecekan, gambar siap upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapus($id)
{
    global $conn;
    // hapus data dari tabel
    mysqli_query($conn, "DELETE FROM t_user WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $email = htmlspecialchars($data["email"]);
    $nama_panggilan = htmlspecialchars($data["nama_panggilan"]);
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $provinsi = htmlspecialchars($data["provinsi"]);
    $kabupaten = htmlspecialchars($data["kabupaten"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // query insert data
    $query = "UPDATE t_user SET email = '$email', nama_panggilan = '$nama_panggilan', nama_lengkap = '$nama_lengkap', provinsi = '$provinsi',kabupaten = '$kabupaten', gambar = '$gambar' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE
            nama LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";
    return query($query);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM t_admin WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar');
             </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
             </script>";
        return false;
    }

    // enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan t_admin baru ke database
    mysqli_query($conn, "INSERT INTO t_admin VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function hapusAdmin($id)
{
    global $conn;
    // hapus data dari tabel
    mysqli_query($conn, "DELETE FROM t_admin WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubahAdmin($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $username = htmlspecialchars($data["username"]);

    // query insert data
    $query = "UPDATE t_admin SET username = '$username' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// TRYOUT

//Tambah Paket Tryout
if (isset($_POST['tambahPT'])) {
    $judul = $_POST['judul'];
    $rank = $_POST['rating'];
    $peserta = $_POST['peserta'];
    $harga = $_POST['harga'];

    //Gambar
    $allowed_extension = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['gambar']['name']; //ngambil nama file gambar
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot)); //mengambil ekstensi
    $ukuran = $_FILES['gambar']['size']; // mengambil size file
    $file_tmp = $_FILES['gambar']['tmp_name']; //mengambil lokasi filenya

    //penamaan file -> enkripsi
    $image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi; // menggabungkan nama file yang dienkripsi dengan ekstensinya

    // validasi sudah ada atau belum
    $cek = mysqli_query($conn, "select * from t_ptryout where judul='$judul'");
    $hitung = mysqli_num_rows($cek);

    if ($hitung < 1) {
        // Jika belum ada
        //proses upload gambar
        if (in_array($ekstensi, $allowed_extension) === true) {
            //  Validasi ukuran file
            if ($ukuran < 15000000) {
                move_uploaded_file($file_tmp, 'img/' . $image);
                $addtotable = mysqli_query($conn, "insert into t_ptryout (gambar, judul, rank, peserta, harga) values ('$image','$judul','$rank','$peserta', '$harga')");
                if ($addtotable) {
                    echo '
                    <script>
                        alert("Berhasil memasukkan Paket Tryout");
                        widow.location.href="tryout.php";
                    </script>
                    ';
                } else {
                    echo 'Gagal memasukkan paket ke database';
                    header('location:tryout.php');
                }
            } else {
                // Jika file lebih dari 15mb
                echo '
                <script>
                    alert("Ukuran gambar tidak boleh lebih dari 15mb");
                    widow.location.href="tryout.php";
                </script>
                ';
            }
        } else {
            // Jika gambar tidak png/jpg/jpeg
            echo '
            <script>
                alert("gambar harus png/jpg/jpeg");
                widow.location.href="tryout.php";
            </script>
                ';
        }
    } else {
        // Jika judul sudah terdaftar
        echo '
        <script>
            alert("judul sudah terdaftar");
            widow.location.href="tryout.php";
        </script>
        ';
    }
};

//Hapus Paket Tryout
if (isset($_POST['hapusPT'])) {
    $id = $_POST['id'];

    $gambar = mysqli_query($conn, "select * from t_ptryout where id='$id'");
    $get = mysqli_fetch_array($gambar);
    $img = 'img/' . $get['gambar'];
    unlink($img);

    $hapus = mysqli_query($conn, "delete from t_ptryout where id='$id'");
    if ($hapus) {
        echo '
        <script>
            alert("Berhasil menghapus Paket Tryout");
            widow.location.href="tryout.php";
        </script>
        ';
    } else {
        echo '
        <script>
            alert("Gagal menghapus Paket Tryout");
            widow.location.href="tryout.php";
        </script>
        ';
    }
};

//Update Paket Tryout
if (isset($_POST['updatePT'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $rating = $_POST['rating'];
    $peserta = $_POST['peserta'];
    $harga = $_POST['harga'];

    //Gambar
    $allowed_extension = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['gambar']['name']; //ngambil nama file gambar
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot)); //mengambil ekstensi
    $ukuran = $_FILES['gambar']['size']; // mengambil size file
    $file_tmp = $_FILES['gambar']['tmp_name']; //mengambil lokasi filenya

    //penamaan file -> enkripsi
    $image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi; // menggabungkan nama file yang dienkripsi dengan ekstensinya

    if ($ukuran == 0) {
        //jika tidak ingin upload
        $update = mysqli_query($conn, "update t_ptryout set judul='$judul', rank='$rating', peserta='$peserta', harga='$harga' where id='$id'");
        if ($update) {
            echo '
            <script>
                alert("Berhasil Mengupdate Paket Tryout");
                widow.location.href="tryout.php";
            </script>
            ';
        } else {
            echo '
            <script>
                alert("Gagal Mengupdate Paket Tryout");
                widow.location.href="tryout.php";
            </script>
            ';
        }
    } else {
        //Jika ingin upload
        $gambar = mysqli_query($conn, "select * from t_ptryout where id='$id'");
        $get = mysqli_fetch_array($gambar);
        $img = 'img/' . $get['gambar'];
        unlink($img);

        move_uploaded_file($file_tmp, 'img/' . $image);
        $update = mysqli_query($conn, "update t_ptryout set gambar='$image', judul='$judul', rank='$rating', peserta='$peserta', harga='$harga' where id='$id'");
        if ($update) {
            echo '
            <script>
                alert("Berhasil Mengupdate Paket Tryout");
                widow.location.href="tryout.php";
            </script>
            ';
        } else {
            echo '
            <script>
                alert("Gagal Mengupdate Paket Tryout");
                widow.location.href="tryout.php";
            </script>
            ';
        }
    }
}



// BIMBEL

//Tambah Paket Bimbel
if (isset($_POST['tambahPB'])) {
    $judul = $_POST['judul'];
    $rank = $_POST['rating'];
    $peserta = $_POST['peserta'];
    $harga = $_POST['harga'];

    //Gambar
    $allowed_extension = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['gambar']['name']; //ngambil nama file gambar
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot)); //mengambil ekstensi
    $ukuran = $_FILES['gambar']['size']; // mengambil size file
    $file_tmp = $_FILES['gambar']['tmp_name']; //mengambil lokasi filenya

    //penamaan file -> enkripsi
    $image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi; // menggabungkan nama file yang dienkripsi dengan ekstensinya

    // validasi sudah ada atau belum
    $cek = mysqli_query($conn, "select * from t_pbimbel where judul='$judul'");
    $hitung = mysqli_num_rows($cek);

    if ($hitung < 1) {
        // Jika belum ada
        //proses upload gambar
        if (in_array($ekstensi, $allowed_extension) === true) {
            //  Validasi ukuran file
            if ($ukuran < 15000000) {
                move_uploaded_file($file_tmp, 'img/' . $image);
                $addtotable = mysqli_query($conn, "insert into t_pbimbel (gambar, judul, rank, peserta, harga) values ('$image','$judul','$rank','$peserta', '$harga')");
                if ($addtotable) {
                    echo '
                    <script>
                        alert("Berhasil memasukkan Paket Bimbel");
                        widow.location.href="bimbel.php";
                    </script>
                    ';
                } else {
                    echo 'Gagal memasukkan Paket Bimbel';
                    header('location:bimbel.php');
                }
            } else {
                // Jika file lebih dari 15mb
                echo '
                <script>
                    alert("Ukuran gambar tidak boleh lebih dari 15mb");
                    widow.location.href="bimbel.php";
                </script>
                ';
            }
        } else {
            // Jika gambar tidak png/jpg/jpeg
            echo '
            <script>
                alert("gambar harus png/jpg/jpeg");
                widow.location.href="bimbel.php";
            </script>
                ';
        }
    } else {
        // Jika judul sudah terdaftar
        echo '
        <script>
            alert("judul sudah terdaftar");
            widow.location.href="bimbel.php";
        </script>
        ';
    }
};

//Hapus Paket Bimbel
if (isset($_POST['hapusPB'])) {
    $id = $_POST['id'];

    $gambar = mysqli_query($conn, "select * from t_pbimbel where id='$id'");
    $get = mysqli_fetch_array($gambar);
    $img = 'img/' . $get['gambar'];
    unlink($img);

    $hapus = mysqli_query($conn, "delete from t_pbimbel where id='$id'");
    if ($hapus) {
        echo '
        <script>
            alert("Berhasil menghapus Paket Bimbel");
            widow.location.href="bimbel.php";
        </script>
        ';
    } else {
        echo '
        <script>
            alert("Gagal menghapus Paket Bimbel");
            widow.location.href="bimbel.php";
        </script>
        ';
    }
};

//Update Paket Bimbel
if (isset($_POST['updatePB'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $rating = $_POST['rating'];
    $peserta = $_POST['peserta'];
    $harga = $_POST['harga'];

    //Gambar
    $allowed_extension = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['gambar']['name']; //ngambil nama file gambar
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot)); //mengambil ekstensi
    $ukuran = $_FILES['gambar']['size']; // mengambil size file
    $file_tmp = $_FILES['gambar']['tmp_name']; //mengambil lokasi filenya

    //penamaan file -> enkripsi
    $image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi; // menggabungkan nama file yang dienkripsi dengan ekstensinya

    if ($ukuran == 0) {
        //jika tidak ingin upload
        $update = mysqli_query($conn, "update t_pbimbel set judul='$judul', rank='$rating', peserta='$peserta', harga='$harga' where id='$id'");
        if ($update) {
            echo '
            <script>
                alert("Berhasil Mengupdate Paket Bimbel");
                widow.location.href="bimbel.php";
            </script>
            ';
        } else {
            echo '
            <script>
                alert("Gagal Mengupdate Paket Bimbel");
                widow.location.href="bimbel.php";
            </script>
            ';
        }
    } else {
        //Jika ingin upload
        $gambar = mysqli_query($conn, "select * from t_pbimbel where id='$id'");
        $get = mysqli_fetch_array($gambar);
        $img = 'img/' . $get['gambar'];
        unlink($img);

        move_uploaded_file($file_tmp, 'img/' . $image);
        $update = mysqli_query($conn, "update t_pbimbel set gambar='$image', judul='$judul', rank='$rating', peserta='$peserta', harga='$harga' where id='$id'");
        if ($update) {
            echo '
            <script>
                alert("Berhasil Mengupdate Paket Bimbel");
                widow.location.href="bimbel.php";
            </script>
            ';
        } else {
            echo '
            <script>
                alert("Gagal Mengupdate Paket Bimbel");
                widow.location.href="bimbel.php";
            </script>
            ';
        }
    }
}


// BANNER

// Tambah Banner
if (isset($_POST['tambahB'])) {

    //Gambar 1
    $allowed_extension = array('png', 'jpg', 'jpeg');

    $nama1 = $_FILES['banner1']['name']; //ngambil nama file gambar
    $nama2 = $_FILES['banner2']['name']; //ngambil nama file gambar
    $nama3 = $_FILES['banner3']['name']; //ngambil nama file gambar

    $dot1 = explode('.', $nama1);
    $ekstensi1 = strtolower(end($dot1)); //mengambil ekstensi
    $ukuran1 = $_FILES['banner1']['size']; // mengambil size file
    $file_tmp1 = $_FILES['banner1']['tmp_name']; //mengambil lokasi filenya

    $dot2 = explode('.', $nama2);
    $ekstensi2 = strtolower(end($dot2)); //mengambil ekstensi
    $ukuran2 = $_FILES['banner2']['size']; // mengambil size file
    $file_tmp2 = $_FILES['banner2']['tmp_name']; //mengambil lokasi filenya

    $dot3 = explode('.', $nama3);
    $ekstensi3 = strtolower(end($dot3)); //mengambil ekstensi
    $ukuran3 = $_FILES['banner3']['size']; // mengambil size file
    $file_tmp3 = $_FILES['banner3']['tmp_name']; //mengambil lokasi filenya

    //penamaan file -> enkripsi
    $image1 = md5(uniqid($nama1, true) . time()) . '.' . $ekstensi1; // menggabungkan nama file yang dienkripsi dengan ekstensinya
    $image2 = md5(uniqid($nama2, true) . time()) . '.' . $ekstensi2; // menggabungkan nama file yang dienkripsi dengan ekstensinya
    $image3 = md5(uniqid($nama3, true) . time()) . '.' . $ekstensi3; // menggabungkan nama file yang dienkripsi dengan ekstensinya

    // validasi sudah ada atau belum
    $cek = mysqli_query($conn, "select * from highlight where banner1='$image1'");
    $hitung = mysqli_num_rows($cek);

    if ($hitung < 1) {
        // Jika belum ada
        //proses upload gambar
        if (in_array($ekstensi1, $allowed_extension) === true) {
            move_uploaded_file($file_tmp1, 'banner/' . $image1);
            if (in_array($ekstensi2, $allowed_extension) === true) {
                move_uploaded_file($file_tmp2, 'banner/' . $image2);
                if (in_array($ekstensi3, $allowed_extension) === true) {
                    move_uploaded_file($file_tmp3, 'banner/' . $image3);
                    if ($ukuran1 = $ukuran2 = $ukuran3 < 15000000) {
                        $addtotable = mysqli_query($conn, "insert into highlight (banner1, banner2, banner3) values ('$image1','$image2','$image3')");
                        if ($addtotable) {
                            echo '
                            <script>
                                alert("Berhasil memasukkan Banner");
                                widow.location.href="landpage.php";
                            </script>
                            ';
                        } else {
                            echo 'Gagal memasukkan banner ke database';
                            header('location:landpage.php');
                        }
                    } else {
                        // Jika file lebih dari 15mb
                        echo '
                        <script>
                            alert("Ukuran gambar tidak boleh lebih dari 15mb");
                            widow.location.href="landpage.php";
                        </script>
                        ';
                    }
                } else {
                    // Jika gambar tidak png/jpg/jpeg
                    echo '
                    <script>
                        alert("gambar harus png/jpg/jpeg");
                        widow.location.href="landpage.php";
                    </script>
                        ';
                }
            } else {
                // Jika gambar tidak png/jpg/jpeg
                echo '
                <script>
                    alert("gambar harus png/jpg/jpeg");
                    widow.location.href="landpage.php";
                </script>
                    ';
            }
        } else {
            // Jika gambar tidak png/jpg/jpeg
            echo '
            <script>
                alert("gambar harus png/jpg/jpeg");
                widow.location.href="landpage.php";
            </script>
                ';
        }
    } else {
        // Jika judul sudah terdaftar
        echo '
        <script>
            alert("judul sudah terdaftar");
            widow.location.href="landpage.php";
        </script>
        ';
    }
};

// Ganti Banner
//Update Paket Bimbel
if (isset($_POST['gantiB'])) {
    $id = $_POST['id'];

    //Gambar
    $allowed_extension = array('png', 'jpg', 'jpeg');

    $nama1 = $_FILES['banner1']['name']; //ngambil nama file gambar
    $nama2 = $_FILES['banner2']['name']; //ngambil nama file gambar
    $nama3 = $_FILES['banner3']['name']; //ngambil nama file gambar

    $dot1 = explode('.', $nama1);
    $ekstensi1 = strtolower(end($dot1)); //mengambil ekstensi
    $ukuran1 = $_FILES['banner1']['size']; // mengambil size file
    $file_tmp1 = $_FILES['banner1']['tmp_name']; //mengambil lokasi filenya

    $dot2 = explode('.', $nama2);
    $ekstensi2 = strtolower(end($dot2)); //mengambil ekstensi
    $ukuran2 = $_FILES['banner2']['size']; // mengambil size file
    $file_tmp2 = $_FILES['banner2']['tmp_name']; //mengambil lokasi filenya

    $dot3 = explode('.', $nama3);
    $ekstensi3 = strtolower(end($dot3)); //mengambil ekstensi
    $ukuran3 = $_FILES['banner3']['size']; // mengambil size file
    $file_tmp3 = $_FILES['banner3']['tmp_name']; //mengambil lokasi filenya

    //penamaan file -> enkripsi
    $image1 = md5(uniqid($nama1, true) . time()) . '.' . $ekstensi1; // menggabungkan nama file yang dienkripsi dengan ekstensinya
    $image2 = md5(uniqid($nama2, true) . time()) . '.' . $ekstensi2; // menggabungkan nama file yang dienkripsi dengan ekstensinya
    $image3 = md5(uniqid($nama3, true) . time()) . '.' . $ekstensi3; // menggabungkan nama file yang dienkripsi dengan ekstensinya

    if ($ukuran1 == 0) {
        //jika tidak ingin upload Banner1
        $banner2 = mysqli_query($conn, "select * from highlight where id='$id'");
        $get = mysqli_fetch_array($banner2);
        $banner2 = 'banner/' . $get['banner2'];
        unlink($banner2);

        $banner3 = mysqli_query($conn, "select * from highlight where id='$id'");
        $get = mysqli_fetch_array($banner3);
        $banner3 = 'banner/' . $get['banner3'];
        unlink($banner3);

        move_uploaded_file($file_tmp2, 'banner/' . $image2);
        move_uploaded_file($file_tmp3, 'banner/' . $image3);
        $update = mysqli_query($conn, "update highlight set banner2='$image2', banner3='$image3' where id='$id'");
        if ($update) {
            echo '
            <script>
                alert("Berhasil mengganti banner2 dan banner3");
                widow.location.href="landpage.php";
            </script>
            ';
        }
    }

    if ($ukuran2 == 0) {
        //jika tidak ingin upload Banner1
        $banner1 = mysqli_query($conn, "select * from highlight where id='$id'");
        $get = mysqli_fetch_array($banner1);
        $banner1 = 'banner/' . $get['banner1'];
        unlink($banner1);

        $banner3 = mysqli_query($conn, "select * from highlight where id='$id'");
        $get = mysqli_fetch_array($banner3);
        $banner3 = 'banner/' . $get['banner3'];
        unlink($banner3);

        move_uploaded_file($file_tmp1, 'banner/' . $image1);
        move_uploaded_file($file_tmp3, 'banner/' . $image3);
        $update = mysqli_query($conn, "update highlight set banner1='$image1', banner3='$image3' where id='$id'");
        if ($update) {
            echo '
            <script>
                alert("Berhasil mengganti banner1 dan banner3");
                widow.location.href="landpage.php";
            </script>
            ';
        }
    }

    if ($ukuran3 == 0) {
         //jika tidak ingin upload Banner1
         $banner1 = mysqli_query($conn, "select * from highlight where id='$id'");
         $get = mysqli_fetch_array($banner1);
         $banner1 = 'banner/' . $get['banner1'];
         unlink($banner1);
 
         $banner2 = mysqli_query($conn, "select * from highlight where id='$id'");
         $get = mysqli_fetch_array($banner2);
         $banner2 = 'banner/' . $get['banner2'];
         unlink($banner2);
 
         move_uploaded_file($file_tmp1, 'banner/' . $image1);
         move_uploaded_file($file_tmp2, 'banner/' . $image2);
         $update = mysqli_query($conn, "update highlight set banner1='$image1', banner2='$image2' where id='$id'");
         if ($update) {
             echo '
             <script>
                 alert("Berhasil mengganti banner1 dan banner2");
                 widow.location.href="landpage.php";
             </script>
             ';
         }
    }

    if ($ukuran1 = $ukuran2 = $ukuran3 < 15000000) {
        //Jika ingin upload
        $banner1 = mysqli_query($conn, "select * from highlight where id='$id'");
        $get = mysqli_fetch_array($banner1);
        $banner1 = 'banner/' . $get['banner1'];
        unlink($banner1);

        $banner2 = mysqli_query($conn, "select * from highlight where id='$id'");
        $get = mysqli_fetch_array($banner2);
        $banner2 = 'banner/' . $get['banner2'];
        unlink($banner2);

        $banner3 = mysqli_query($conn, "select * from highlight where id='$id'");
        $get = mysqli_fetch_array($banner3);
        $banner3 = 'banner/' . $get['banner3'];
        unlink($banner3);

        move_uploaded_file($file_tmp1, 'banner/' . $image1);
        move_uploaded_file($file_tmp2, 'banner/' . $image2);
        move_uploaded_file($file_tmp3, 'banner/' . $image3);
        $update = mysqli_query($conn, "update highlight set banner1='$image1', banner2='$image2', banner3='$image3' where id='$id'");
        if ($update) {
            echo '
            <script>
                alert("Berhasil mengganti seluruh banner");
                widow.location.href="landpage.php";
            </script>
            ';
        } else {
            echo '
            <script>
                alert("Gagal mengganti banner");
                widow.location.href="landpage.php";
            </script>
            ';
        }
    }
}
