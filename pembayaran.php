<?php

$keyword = $_GET['keyword'];

if ($keyword != 0) {
    echo '<p>Kirim ' . $keyword . ' ke Nomor berikut:</p>';
    echo '<h3>082314191369</h3>';
} else {
    return false;
}
