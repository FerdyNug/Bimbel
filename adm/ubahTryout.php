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
                <h1 class="mt-4">Ubah Paket Tryout</h1>
                <!-- Button to Open Modal Tambah-->
                <a type="button" class="btn btn-primary text-white mt-2 mb-2" href="tryout.php">
                    Kembali ke halaman Tryout
                </a>

                <table>
                    <form method="post" enctype="multipart/form-data">
                        <input  type="hidden" name="id" value="">
                        
                        <div class="form-group mt-2 mb-2">
                        <input type="file" name="gambar" id="gambar">
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" value="Judul Paket" name="judul">
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label for="rating">Rating</label>
                            <select class="form-select" name="rating" id="rating">
                                <option selected>Pilih Rating</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                            </select>
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label for="peserta">Peserta</label>
                            <input type="number" class="form-control" id="peserta" value="0" name="peserta">
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" value="0" name="harga">
                        </div>

                        <input type="submit" name="ubahTryout" value="Simpan Data" class="btn btn-info mt-5" />

                    </form>
                </table>

                <?php
                require('footer.php');
                ?>