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
