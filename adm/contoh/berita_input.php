<?php include("inc_sidebar.php") ?>
<?php
$foto       = "";
$foto_name  = "";
$judul      = "";
$isi        = "";
$dibuat     = "";
$penulis    = "";
$error      = "";
$sukses     = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($id != "") {
    $sql1   = "select * from berita where id = '$id'";
    $q1     = mysqli_query($koneksi, $sql1);
    $r1     = mysqli_fetch_array($q1);
    $foto   = $r1['foto'];
    $judul  = $r1['judul'];
    $isi    = $r1['isi'];
    $dibuat = $r1['dibuat'];
    $penulis = $r1['penulis'];

    if ($isi == '') {
        $error  = "Data tidak ada";
    }
}

if (isset($_POST['simpan'])) {
    $judul      = $_POST['judul'];
    $isi        = $_POST['isi'];
    $dibuat     = $_POST['dibuat'];
    $penulis    = $_POST['penulis'];

    if ($judul == '' or $isi == '') {
        $error      = "Silahkan masukkan semua data yaitu data isi dan judul.";
    }

    if ($_FILES['foto']['name']) {
        $foto_name = $_FILES['foto']['name'];
        $foto_file = $_FILES['foto']['tmp_name'];

        $detail_file = pathinfo($foto_name);
        $foto_ekstensi = $detail_file['extension'];
        //print_r($detail_file);
        $ekstensi_yang_diperbolehkan = array("jpg", "jpeg", "png", "gif");
        if (!in_array($foto_ekstensi, $ekstensi_yang_diperbolehkan)) {
            $error = "Ekstensi yang diperbolehkan adalah jpg, jpeg, png, dan gif";
        }
    }


    if (empty($error)) {
        if ($foto_name) {
            $direktori = "../img";
            @unlink($direktori . "/$foto");
            $foto_name = "Berita_" . time() . "_" . $foto_name;
            move_uploaded_file($foto_file, $direktori . "/" . $foto_name);
            $foto = $foto_name;
        } else {
            $foto_name = $foto;
        }

        if ($id != "") {
            $sql1   = "update berita set foto = '$foto_name',judul = '$judul',isi ='$isi',dibuat ='$dibuat',penulis ='$penulis',tgl_isi=now() where id = '$id'";
        } else {
            $sql1       = "insert into berita(foto,judul,isi,dibuat,penulis) values ('$foto_name','$judul','$isi','$dibuat','$penulis')";
        }

        $q1         = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses     = "Data Berhasil Masuk";
        } else {
            $error      = "Data Gagal Masuk";
        }
    }
}
?>
<div>
    <h3>Ubah Berita</h3>
    <div class="mb-3 row">
        <a href="berita.php" class="btn btn-primary">
            Kembali ke halaman admin</a>
    </div>
    <br>
    <?php
    if ($error) {
    ?>
        <div class="alert alert-warning" role="alert">
            <?php echo $error ?>
        </div>
    <?php
    }
    ?>
    <?php
    if ($sukses) {
    ?>
        <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
        </div>
    <?php
    }
    ?>
    <br><br>
    <table>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Gambar (Ilustrasi ataupun Asli)</label> <br>
                <?php
                if ($foto) {
                    echo "<img src='../img/$foto' style='max-height:100px;max-width:100px'/>";
                }
                ?>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" class="form-control" id="judul" value="<?php echo $judul ?>" name="judul">
            </div>
            <div class="form-group">
                <label for="">Isi</label>
                <textarea name="isi" class="form-control" id="summernote"><?php echo $isi ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Tgl Dibuat</label>
                <input type="text" class="form-control" id="dibuat" value="<?php echo $dibuat ?>" name="dibuat">
            </div>
            <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" class="form-control" id="penulis" value="<?php echo $penulis ?>" name="penulis">
            </div>
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-info" />

        </form>
    </table>
</div>
</div>
<?php include("inc_footer.php") ?>