<?php

require 'header.php';

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
                    <div class="d-inline-flex p-2 rounded bg-danger">Laporkan Soal</div>
                </div>
                <div class="rounded-2 border shadow-sm mt-3 p-3">
                    <h3>Soal No. 1</h3>
                    <h4>Tes Wawasan Kebangsaan (TWK)</h4>
                    <p>Subtema Nasionalisme</p>
                    <hr>
                    <div class="text-center">Waktu Pengerjaan: 19 detik | Ganti Jawaban 0 Kali</div>
                    <hr>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae iusto, quasi error eos commodi dicta excepturi aspernatur molestias harum, consequatur repellendus laboriosam temporibus nihil, ea quidem sint eligendi. Sint pariatur enim quaerat totam minus, voluptatem repellendus eos. Repudiandae reiciendis omnis quas rem molestiae, sunt sit soluta magnam odit vitae suscipit!</p>
                    <div class="rounded border my-2 p-2">A. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, incidunt.</div>
                    <div class="rounded border my-2 p-2">A. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, incidunt.</div>
                    <div class="rounded border my-2 p-2">A. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, incidunt.</div>
                    <div class="rounded border my-2 p-2">A. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, incidunt.</div>
                    <div class="rounded border my-2 p-2">A. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, incidunt.</div>
                    <hr>
                    <h3>Pembahasan</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, eligendi? Iure ab hic ad blanditiis asperiores a quaerat maiores aliquid perferendis? Dolor, aperiam in? Aliquam dolorum ea totam porro? Corrupti dicta tenetur, blanditiis adipisci rerum dignissimos qui iure cum atque?</p>
                    <h4>Bobot Opsi Jawaban</h4>
                    <div class="bg-secondary rounded border my-2 p-2">A. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, incidunt.</div>
                    <div class="bg-secondary rounded border my-2 p-2">A. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, incidunt.</div>
                    <div class="bg-secondary rounded border my-2 p-2">A. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, incidunt.</div>
                    <div class="bg-secondary rounded border my-2 p-2">A. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, incidunt.</div>
                    <div class="bg-secondary rounded border my-2 p-2">A. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, incidunt.</div>
                </div>
            </div>
            <div class="col-md-5 p-3">
                <div class="rounded border shadow-sm p-3">
                    <h3>Nomor Soal</h3>
                    <div class="row justify-content-around mt-3">
                        <?php for ($i = 1; $i <= 110; $i++) : ?>
                            <div class="btn btn-success mb-3 me-2 rounded-3" style="width: 80px;"><?php echo $i; ?></div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav fixed-bottom bg-light container-fluid border-top mt-5 justify-content-center">
        <div class="btn py-2 px-3 btn-light my-4 me-2 rounded border">&laquo Sebelumnya</div>
        <div class="btn py-2 px-3 btn-success my-4 rounded border text-white">Selanjutnya &raquo</div>
    </div>

</body>

</html>