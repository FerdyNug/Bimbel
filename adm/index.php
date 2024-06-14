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
            <h1 class="mt-4">Halaman Utama Admin</h1>
        </div>
    </main>
    <?php
    require('footer.php');
    ?>