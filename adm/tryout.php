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
                <h1 class="mt-4">Event Tryout</h1>
                <div class="card mb-4 mt-4">

                    <div class="card-header">



                        <!-- Button to Open Modal Tambah-->
                        <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah Event
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan 1</th>
                                    <th>Judul</th>
                                    <th>Waktu</th>
                                    <th>Periode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>No</td>
                                    <td>Sendang Berlangsung / Segera</td>
                                    <td>Judul Event</td>
                                    <td>Waktu Event</td>
                                    <td>Periode</td>
                                    <td>
                                        <!-- Ubah Mahasiswa -->
                                        <a type="button" class="btn btn-warning" href="ubahMahasiswa.php?id=<?= $row["id"]; ?>">
                                            Ubah
                                        </a> <br>

                                        <!-- Hapus Mahasiswa -->
                                        <a type="button" class="btn btn-danger mt-1" href="hapusMahasiswa.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin hapus data mahasiswa ini?');">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

<?php
require('footer.php');
?>