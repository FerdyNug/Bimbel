<?php

require 'header.php';
$jml_soal = query("SELECT * FROM t_soal");

$soal = query("SELECT * FROM t_soal WHERE no_soal = 1")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembahasan</title>
</head>

<body style="height: 1500px;">
    <div class="container">
        <div class="row">
            <div class="col-md-7 p-3">
                <div class="d-flex flex-row-reverse">
                    <div class="d-inline-flex p-2 rounded bg-danger text-white">Laporkan Soal</div>
                </div>
                <div class="rounded-2 border shadow-sm mt-3 p-3" id="container">
                    <h3>Soal No. 1</h3>
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
                    <hr>
                    <h3>Pembahasan</h3>
                    <p><?= $soal["pembahasan"] ?></p>
                    <h4>Bobot Opsi Jawaban</h4>
                    <div class="bg-secondary rounded border my-2 p-2">Opsi A: <?= $soal["skor_a"]; ?></div>
                    <div class="bg-secondary rounded border my-2 p-2">Opsi B: <?= $soal["skor_b"]; ?></div>
                    <div class="bg-secondary rounded border my-2 p-2">Opsi C: <?= $soal["skor_c"]; ?></div>
                    <div class="bg-secondary rounded border my-2 p-2">Opsi D: <?= $soal["skor_d"]; ?></div>
                    <div class="bg-secondary rounded border my-2 p-2">Opsi E: <?= $soal["skor_e"]; ?></div>
                </div>
            </div>
            <div class="col-md-5 p-3">
                <div class="rounded border shadow-sm p-3">
                    <h3>Nomor Soal</h3>
                    <div class="row mt-3 px-3 justify-content-around">
                        <?php $i = 1; ?>
                        <?php foreach ($jml_soal as $row) : ?>
                            <button value="<?= $row["id_soal"]; ?>" class="btn btn-success mb-3 me-2 rounded-3" style="width: 80px;"><?= $i; ?></button>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav fixed-bottom bg-light container-fluid border-top mt-5 justify-content-center">
        <!-- tombol navigasi -->
        <button id="tombol-soal" class="btn py-2 px-3 btn-light my-4 me-2 rounded border disabled" value="0">&laquo Sebelumnya</button>
        <button id="tombol-soal" class="btn py-2 px-3 btn-success my-4 rounded border" value="2">Selanjutnya &raquo</button>
    </div>

    <script src="ajax/scriptPembahasan.js"></script>
</body>

</html>