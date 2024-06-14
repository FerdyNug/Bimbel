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

// fungsi registrasi
function registrasi($data)
{
    global $conn;

    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM t_user WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('email sudah terdaftar');
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

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO t_user VALUES('', '$email', '', '$password', '', '', '', '')");

    return mysqli_affected_rows($conn);
}
