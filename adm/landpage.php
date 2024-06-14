<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'header.php';

?>
<?php
require('sidebar.php');
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Banner (Highlight)</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#myModal">
                        Tambah Banner
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Banner 1</th>
                                    <th>Banner 2</th>
                                    <th>Banner 3</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>No Banner</td>
                                    <td>No Banner</td>
                                    <td>No Banner</td>
                                    <td>
                                        <!-- Ubah Paket Tryout -->
                                        <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit">
                                            Ubah
                                        </a> <br>
                                    </td>
                                </tr>

                                <!-- Modal Edit Paket Tryout -->
                                <div class="modal fade" id="edit">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Update Paket Tryout</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="mb-1">Banner 1</label> <br>
                                                        <input type="file" name="banner1" class="mb-3">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="mb-1">Banner 2</label> <br>
                                                        <input type="file" name="banner2" class="mb-3">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="mb-1">Banner 3</label> <br>
                                                        <input type="file" name="banner3" class="mb-3">
                                                    </div>
                                                    <input type="hidden" name="id" value="">
                                                    <button type="submit" class="mb-3 btn btn-primary mb" name="updateB">Ubah</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require('footer.php');
    ?>

    <!-- Modal Tambah Paket Tryout -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Banner</h4>
                </div>

                <!-- Modal body -->
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="mb-1">Banner 1</label> <br>
                            <input type="file" name="banner1" class="mb-3">
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Banner 2</label> <br>
                            <input type="file" name="banner2" class="mb-3">
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Banner 3</label> <br>
                            <input type="file" name="banner3" class="mb-3">
                        </div>
                        <button type="submit" class=" btn btn-primary mb" name="tambahB">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>