<?php

require 'inc/functions.php';
$jml_soal = query("SELECT * FROM t_soal");

$id = intval($_GET["tombolSoal"]);
$soal = query("SELECT * FROM t_soal WHERE no_soal = $id")[0];

?>

<h3>Soal No. <?= $soal["no_soal"]; ?></h3>
<h4>Tes Wawasan Kebangsaan (TWK)</h4>
<p>Subtema Nasionalisme</p>
<hr>
<div class="text-center">Waktu Pengerjaan: 19 detik | Ganti Jawaban 0 Kali</div>
<hr>
<p><?= $soal["soal"] ?></p>
<div class="rounded border my-2 p-2"><?= $soal["pil_a"]; ?></div>
<div class="rounded border my-2 p-2"><?= $soal["pil_b"]; ?></div>
<div class="rounded border my-2 p-2"><?= $soal["pil_c"]; ?></div>
<div class="rounded border my-2 p-2"><?= $soal["pil_d"]; ?></div>
<div class="rounded border my-2 p-2"><?= $soal["pil_e"]; ?></div>