<?php
require 'header.php';
$pbimbel = query("SELECT * FROM t_pbimbel");

// input paket tryout ke database
if (isset($_POST["tambahPB"])) {

    if (tambahPT($_POST) > 0) {
        echo "<script>
                alert('Paket Tryout baru berhasil ditambahkan');
                document.location.href = 'bimbel.php';
                </script>";
    } else {
        echo 'eror';
    }
}
?>
<div id="layoutSidenav">
    <?php
    require('sidebar.php');
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Bimbel</h1>
                <div class="card mb-4 mt-4">

                    <div class="card-header">
                        <h1 class="mt-4">Paket Bimbel</h1>
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Tambah Paket
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th>Rating</th>
                                            <th>Peserta</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pbimbel as $row) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row["gambar"]; ?></td>
                                            <td><?= $row["judul"]; ?></td>
                                            <td><?= $row["rank"]; ?></td>
                                            <td><?= $row["peserta"]; ?></td>
                                            <td>99.<?= $row["harga"]; ?></td>
                                            <td>
                                                <!-- Ubah Mahasiswa -->
                                                <a type="button" class="btn btn-warning" href="ubahTryout.php">
                                                    Ubah
                                                </a> <br>

                                                <!-- Hapus Mahasiswa -->
                                                <a type="button" class="btn btn-danger mt-1" href="../user/hapusMahasiswa.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin hapus data mahasiswa ini?');">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    </main>

</div>

</main>
<?php
require('footer.php');
?>

<!-- Modal Tambah Admin -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Paket Tryout</h4>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <input type="file" name="gambar" id="gambar">
                    <input type="text" name="judul" id="judul" class="mb-3 form-control" placeholder="Judul" required>
                    <select class="form-group" name="rating" id="rating">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select>
                    <input type="number" name="peserta" id="peserta" placeholder="Peserta" class="mb-3 form-control mb" required>
                    <input type="number" name="harga" id="harga" placeholder="Harga" class="mb-3 form-control mb" required>
                    <br>
                    <button type="submit" class=" btn btn-primary mb" name="tambahPB">Tambah</button>
                </div>
            </form>

        </div>
    </div>
</div>