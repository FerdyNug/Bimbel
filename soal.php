<?php

require 'inc/functions.php';
$jml_soal = query("SELECT * FROM t_soal");

$id = intval($_GET["tombolSoal"]);
$soal = query("SELECT * FROM t_soal WHERE no_soal = $id")[0];

?>

<p><?= $soal["soal"] ?></p>
<div class="rounded border my-2 p-2"><?= $soal["pil_a"]; ?></div>
<div class="rounded border my-2 p-2"><?= $soal["pil_b"]; ?></div>
<div class="rounded border my-2 p-2"><?= $soal["pil_c"]; ?></div>
<div class="rounded border my-2 p-2"><?= $soal["pil_d"]; ?></div>
<div class="rounded border my-2 p-2"><?= $soal["pil_e"]; ?></div>
<hr>
<h3>Pembahasan</h3>
<p><?= $soal["pembahasan"] ?></p>
<h4>Bobot Opsi Jawaban</h4>
<div class="bg-secondary rounded border my-2 p-2">Opsi A: <?= $soal["skor_a"]; ?></div>
<div class="bg-secondary rounded border my-2 p-2">Opsi B: <?= $soal["skor_b"]; ?></div>
<div class="bg-secondary rounded border my-2 p-2">Opsi C: <?= $soal["skor_c"]; ?></div>
<div class="bg-secondary rounded border my-2 p-2">Opsi D: <?= $soal["skor_d"]; ?></div>
<div class="bg-secondary rounded border my-2 p-2">Opsi E: <?= $soal["skor_e"]; ?></div>