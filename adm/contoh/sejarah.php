<?php include("inc_sidebar.php")?>
<?php
        $sukses = "";
        $katakunci = (isset($_GET['katakunci']))?$_GET['katakunci']:"";
        if(isset($_GET['op'])){
            $op = $_GET['op'];
        }else{
            $op = "";
        }
        if($op == 'delete'){
            $id = $_GET['id'];
            $sql1   = "select foto from sejarah where id = '$id'";
            $q1     = mysqli_query($koneksi,$sql1);
            $r1     = mysqli_fetch_array($q1);
            @unlink("../img/".$r1['foto']);

            $sql1   = "delete from sejarah where id = '$id'";
            $q1     = mysqli_query($koneksi,$sql1);
            if($q1){
                $sukses     = "Berhasil hapus data";
            }
        }
        ?>

<h2 style="color: black;">Daftar Artikel Sejarah</h2>
<?php
if($sukses){
    ?>
<div class="alert alert-success" role="alert">
    <?php echo $sukses ?>
</div>
<?php
}
?>
<br>
<a href="sejarah_input.php" class="btn btn-primary">Tambah Sejarah</a>

<br><br>

<div class="table-responsive">
    <table class="table table-bordered" > <!--id="tableSejarah"-->
        <thead>
            <tr>
                <th scope="col" style="display: none;">No</th>
                <th scope="col">Foto</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi</th>
                <th scope="col">Tgl dibuat</th>
                <th scope="col">Penulis</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sqltambahan = "";
        $sql1   = "select * from sejarah $sqltambahan";
        $q1     = mysqli_query($koneksi,$sql1);
        while ($r1 = mysqli_fetch_array($q1)) {
            ?>
            <tr>
                <td scope="row" style="display: none;">1</td>
                <th><img src="../img/<?php echo sejarah_foto($r1['id'])?>" alt="" width="100"/> </th>
                <td><?php echo $r1['judul']?></td>
                <td><?php echo $r1['isi']?></td>
                <td><?php echo $r1['dibuat']?></td>
                <td><?php echo $r1['penulis']?></td>
                <td>
                    <a href="sejarah_input.php?id=<?php echo $r1['id'] ?>" class="btn btn-info">Ubah</a>                   
                    <a href="sejarah.php?op=delete&id=<?php echo $r1['id']?>" class="btn btn-danger" onclick="return confirm('Yakin ingin dihapus?')">Hapus</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
	</table>
</div>

<script>
    $(document).ready(function() {
        $('#tableSejarah').DataTable( {
            "order": [[ 0, "dsc" ]]
        } );
    } )
</script>            
</div>
<?php include("inc_footer.php")?>