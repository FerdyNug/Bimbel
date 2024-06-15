<?php
function url_dasar(){
    //$_SERVER['SERVER_NAME'] : alamat website, misal websiteku.com
    //$_SERVER['SCRIPT_NAME'] : directory website, websiteku.com/blog/ $_SERVER['SCRIPT_NAME'] : blog
    $url_dasar = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);
    return $url_dasar;
}

function ambil_gambar($id_tulisan){
    global $koneksi;
    $sql1   = "select * from beranda where id = '$id_tulisan'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $text   = $r1['isi'];

    preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $text, $img);
    $img = $img[1]; // ../img/filename.jpg
    $img = str_replace("../img/",url_dasar()."/img/",$img);

    return $img;
}

function ambil_judul($id_tulisan){
    global $koneksi;
    $sql1   = "select * from beranda where id = '$id_tulisan'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $text   = $r1['judul'];
    return $text;
}

function ambil_isi($id_tulisan){
    global $koneksi;
    $sql1   = "select * from beranda where id = '$id_tulisan'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $text   = strip_tags($r1['isi']);
    return $text;
}

function bersihkan_judul($judul){
    $judul_baru     = strtolower($judul);
    $judul_baru     = preg_replace("/[^a-zA-Z0-9\s]/","",$judul_baru);
    $judul_baru     = str_replace(" ", "-",$judul_baru);
    return $judul_baru;
}

function buat_link_info($id){
    global $koneksi;
    $sql1   = "select * from info where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $lokasi  = bersihkan_judul($r1['lokasi']);
    // http://localhost/Skripsi/info.php/4/judul
    return url_dasar()."/info.php/$id/$lokasi";
}

function buat_link_sejarah($id){
    global $koneksi;
    $sql1   = "select * from sejarah where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $judul  = bersihkan_judul($r1['judul']);
    // http://localhost/Skripsi/info.php/4/judul
    return url_dasar()."/sejarah.php/$id/$judul";
}

function buat_link_kontak($id){
    global $koneksi;
    $sql1   = "select * from kontak where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $tingkat  = bersihkan_judul($r1['tingkat']);
    // http://localhost/Skripsi/info.php/4/judul
    return url_dasar()."/kontak.php/$id/$tingkat";
}

function dapatkan_id(){
    $id     = "";
    if(isset($_SERVER['PATH_INFO'])){
        $id = dirname($_SERVER['PATH_INFO']);
        $id = preg_replace("/[^0-9]/","",$id);
    }
    return $id;
}

function set_isi($isi){
    $isi    = str_replace("../img/",url_dasar()."/img/",$isi);
    return $isi;
}

function maksimum_kata($isi,$maksimum){
    $array_isi = explode(" ",$isi);
    $array_isi = array_slice($array_isi,0,$maksimum);
    $isi = implode(" ",$array_isi);
    return $isi;
}

function sejarah_foto($id){
    global $koneksi;
    $sql1   = "select * from sejarah where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $foto   = $r1['foto'];

    if($foto){
        return $foto;
    }else{
        return 'default_picture.jpg';
    }
}

function berita_foto($id){
    global $koneksi;
    $sql1   = "select * from berita where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $foto   = $r1['foto'];
    

    if($foto){
        return $foto;
    }else{
        return 'default_picture.png';
    }
}

function info_banner($id){
    global $koneksi;
    $sql1   = "select * from info where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $banner   = $r1['banner'];
    

    if($banner){
        return $banner;
    }else{
        return 'default_picture.jpg';
    }
}

function buat_link_konten_sejarah($id){
    global $koneksi;
    $sql1   = "select * from sejarah where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $judul  = bersihkan_judul($r1['judul']);
    // http://localhost/Skripsi/info.php/4/judul
    return url_dasar()."/konten_sejarah.php/$id/$judul";
}

function buat_link_konten_berita($id){
    global $koneksi;
    $sql1   = "select * from berita where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $judul  = bersihkan_judul($r1['judul']);
    // http://localhost/Skripsi/info.php/4/judul
    return url_dasar()."/konten_berita.php/$id/$judul";
}

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

function kirim_email($email_penerima, $nama_penerima, $judul_email, $isi_email){

    $email_pengirim    = "akunskripsi45@gmail.com";
    $nama_pengirim     = "Padepokan Pencak Silat Laskar Adat Betawi";

    //Load Composer's autoloader
    require getcwd().'/vendor/autoload.php';

    //Instaantiation and passing 'true' enables exceptions
    $mail = new PHPMailer(true);

    try{
        //Server settings
        $mail->SMTPDebug = 0;                  //Enable verbose debug output
        $mail->isSMTP();                                        //Send using SMTP
        $mail->Host         = 'smtp.gmail.com';                 //Set the SMTP server to send through
        $mail->SMTPAuth     = true;                             // Enable SMTP authentication
        $mail->Username     = $email_pengirim;               //SMTP username
        $mail->Password     = 'iawh osge cjvi xbvl';                         //SMTP password
        $mail->SMTPSecure   = 'ssl';   //Enable TLS encryption; 'PHPMailer::ENCRYPTION_SMTPS' encouraged
        $mail->Port         = 465;                              //TCP port to connect to, use 465 for 'PHPMailer::ENCRYPTION_SMTPS' above

        //Recipients
        $mail->setFrom($email_pengirim,$nama_pengirim);
        $mail->addAddress($email_penerima,$nama_penerima);        //Add a recipients


       //Content
       $mail->isHTML(true);                 //Set email format to HTML
       $mail->Subject = $judul_email;
       $mail->Body    = $isi_email;
       
       $mail->send();
       return "sukses";
    } catch(Exception $e){
        return "Gagal: ($mail->ErrorInfo)";
    }
}