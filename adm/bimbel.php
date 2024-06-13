<?php
require 'header.php';

?>
<div id="layoutSidenav">
    <?php
    require('sidebar.php');
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Paket Bimbel</h1>
                <div class="card mb-4 mt-4">
                    <div class="card-header">
                        <!-- Button to Open Modal Tambah-->
                        <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah Paket
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan 1</th>
                                    <th>Keterangan 2</th>
                                    <th>Keterangan 3</th>
                                    <th>Keterangan 4</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>No</td>
                                    <td>Keterangan 3</td>
                                    <td>Keterangan 3</td>
                                    <td>Keterangan 3</td>
                                    <td>Keterangan 3</td>
                                    <td>
                                        <!-- Ubah Mahasiswa -->
                                        <a type="button" class="btn btn-warning" href="ubahMahasiswa.php?id=<?= $row["id"]; ?>">
                                            Ubah Paket
                                        </a> <br>

                                        <!-- Hapus Mahasiswa -->
                                        <a type="button" class="btn btn-danger mt-1" href="hapusMahasiswa.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin hapus data mahasiswa ini?');">
                                            Hapus Paket
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>
</main>

<?php
require('footer.php');
?>