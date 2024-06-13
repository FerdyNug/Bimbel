<?php


$conn = mysqli_connect("localhost", "root", "", "bimbel");

//Registrasi
if(isset($_POST['daftarUser'])){
    $email = $_POST['email'];
    $nama_panggilan = $_POST['nama_panggilan'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $provinsi = $_POST['prov'];
    $kabupaten = $_POST['kabupaten'];

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    // enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    return mysqli_affected_rows($conn);

    //Gambar
    $allowed_extension = array('png','jpg','jpeg');
    $nama = $_FILES['gambar']['name']; //ngambil nama file gambar
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot)); //mengambil ekstensi
    $ukuran = $_FILES['gambar']['size']; // mengambil size file
    $file_tmp = $_FILES['gambar']['tmp_name']; //mengambil lokasi filenya

    //penamaan file -> enkripsi
    $image = md5(uniqid($nama,true) . time()).'.'.$ekstensi; // menggabungkan nama file yang dienkripsi dengan ekstensinya

    // validasi udah ada atau belum
    $cek = mysqli_query($conn,"select * from t_user where email='$email'");
    $hitung = mysqli_num_rows($cek);

    if($hitung<1){
        // Jika belum ada
        
        //proses upload gambar
        if(in_array($ekstensi, $allowed_extension) === true){
            //  Validasi ukuran file
            if($ukuran < 15000000){
                move_uploaded_file($file_tmp, 'img/'.$image);

                $addtotable = mysqli_query($conn, "insert into t_user (email, nama_panggilan, password, gambar, nama_lengkap, provinsi, kabupaten) values ('$email','$nama_panggilan','$password','$image', '$nama_lengkap', '$provinsi', '$kabupaten')");
                if($addtotable){
                    echo '
                <script>
                    alert("Berhasil")
                    widow.location.href="masuk.php";
                </script>
                ';
                } else {
                    echo 'Gagal memasukkan data ke database';
                    header('location:daftar.php');
                }
            } else {
                // Jika file lebih dari 15mb
                echo '
                <script>
                    alert("Ukuran file tidak boleh lebih dari 15mb");
                    widow.location.href="daftar.php";
                </script>
                ';
            }
        } else {
            // Jika file tidak png/jpg/jpeg
            echo '
            <script>
                alert("File gambar harus png/jpg/jpeg");
                widow.location.href="daftar.php";
            </script>
                ';
        }

    } else {
        // Jika nama barang sudah terdaftar
        echo '
        <script>
            alert("Email sudah terdaftar");
            widow.location.href="daftar.php";
        </script>
        ';
    }

    
};
