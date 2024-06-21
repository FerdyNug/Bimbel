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

if (isset($_POST['addBundlCPNS'])) {
    $bundling = $_POST['bundling'];

    // validasi sudah ada atau belum
    $cek = mysqli_query($conn, "select * from t_bptryout where bundling='$bundling'");
    $hitung = mysqli_num_rows($cek);

    if ($hitung < 1) {
        // Jika belum ada
        $tambah = mysqli_query($conn, "insert into t_bptryout (bundling) values ('$bundling')");
    } else {
        echo '
                <script>
                    alert("Bundling sudah ada");
                    widow.location.href="detailPT.php";
                </script>
                ';
    }
};