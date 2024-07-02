// membuat variabel untuk mengambil nilai dari dokumen
var tombolSoal = document.getElementsByTagName('button');
var container = document.getElementById('container');
var nilaiTombol = document.querySelectorAll('button#tombol-soal');

// menambahkan event ketika tombol nomor soal diklik
for (let i = 0; i < tombolSoal.length - 2; i++) {
    tombolSoal[i].addEventListener('click', function() {
        
        // buat object ajax
        var xhr = new XMLHttpRequest();

        // cek kesiapan ajax
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;

                // pengondisian ketika selain angka pertama dan terakhir diklik
                if(i != 0 && i != tombolSoal.length - 3) {
                    tombolSoal[tombolSoal.length - 2].classList.remove("disabled");
                    tombolSoal[tombolSoal.length - 2].classList.remove("btn-light");
                    tombolSoal[tombolSoal.length - 2].classList.add("btn-success");
                    tombolSoal[tombolSoal.length - 1].classList.remove("disabled");
                    tombolSoal[tombolSoal.length - 1].classList.remove("btn-light");
                    tombolSoal[tombolSoal.length - 1].classList.add("btn-success");
                    tombolSoal[tombolSoal.length - 2].setAttribute("value",i);
                    tombolSoal[tombolSoal.length - 1].setAttribute("value",i + 2);
                }

                // pengondisian ketika angka terakhir diklik
                else if (i == tombolSoal.length - 3) {
                    tombolSoal[tombolSoal.length - 2].classList.remove("btn-light");
                    tombolSoal[tombolSoal.length - 2].classList.remove("disabled");
                    tombolSoal[tombolSoal.length - 2].classList.add("btn-success");
                    tombolSoal[tombolSoal.length - 1].classList.remove("btn-success");
                    tombolSoal[tombolSoal.length - 1].classList.add("disabled");
                    tombolSoal[tombolSoal.length - 1].classList.add("btn-light");
                    tombolSoal[tombolSoal.length - 2].setAttribute("value",i);
                    tombolSoal[tombolSoal.length - 1].setAttribute("value",i + 2);
                }

                // pengondisian ketika angka pertama diklik
                else if (i == 0) {
                    tombolSoal[tombolSoal.length - 2].classList.remove("btn-success");
                    tombolSoal[tombolSoal.length - 2].classList.add("disabled");
                    tombolSoal[tombolSoal.length - 2].classList.add("btn-light");
                    tombolSoal[tombolSoal.length - 1].classList.remove("btn-light");
                    tombolSoal[tombolSoal.length - 1].classList.remove("disabled");
                    tombolSoal[tombolSoal.length - 1].classList.add("btn-success");
                    tombolSoal[tombolSoal.length - 2].setAttribute("value",i);
                    tombolSoal[tombolSoal.length - 1].setAttribute("value",i + 2);
                }
            }
        }

        // // eksekusi ajax
        xhr.open('GET', 'soal.php?tombolSoal=' + tombolSoal[i].value, true);
        xhr.send();
    });
}

// menambahkan event ketika tombol navigasi diklik
for (let i = tombolSoal.length - 2; i < tombolSoal.length; i++) {
    tombolSoal[i].addEventListener('click', function() {
        
        
        // buat object ajax
        var xhr = new XMLHttpRequest();

        // cek kesiapan ajax
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;

                // pengondisian jika tombol selanjutnya diklik
                if (i == tombolSoal.length - 1) {
                    tombolSoal[tombolSoal.length - 2].classList.remove("disabled");
                    tombolSoal[tombolSoal.length - 2].classList.remove("btn-light");
                    tombolSoal[tombolSoal.length - 2].classList.add("btn-success");
                    tombolSoal[tombolSoal.length - 1].classList.remove("disabled");
                    tombolSoal[tombolSoal.length - 1].classList.remove("btn-light");
                    tombolSoal[tombolSoal.length - 1].classList.add("btn-success");
                    tombolSoal[tombolSoal.length - 2].setAttribute("value",Number(nilaiTombol[0].value) + 1);
                    tombolSoal[tombolSoal.length - 1].setAttribute("value",Number(nilaiTombol[1].value) + 1);

                    // pengondisian ketika soal berada di nomor terakhir
                    if (nilaiTombol[1].value == Number(tombolSoal[tombolSoal.length - 3].value) + 1) {
                        tombolSoal[tombolSoal.length - 2].classList.remove("btn-light");
                        tombolSoal[tombolSoal.length - 2].classList.remove("disabled");
                        tombolSoal[tombolSoal.length - 2].classList.add("btn-success");
                        tombolSoal[tombolSoal.length - 1].classList.remove("btn-success");
                        tombolSoal[tombolSoal.length - 1].classList.add("disabled");
                        tombolSoal[tombolSoal.length - 1].classList.add("btn-light");
                    }
                }

                // pengondisian ketika tombol sebelumnya diklik
                else if (i == tombolSoal.length - 2) {
                    tombolSoal[tombolSoal.length - 2].classList.remove("disabled");
                    tombolSoal[tombolSoal.length - 2].classList.remove("btn-light");
                    tombolSoal[tombolSoal.length - 2].classList.add("btn-success");
                    tombolSoal[tombolSoal.length - 1].classList.remove("disabled");
                    tombolSoal[tombolSoal.length - 1].classList.remove("btn-light");
                    tombolSoal[tombolSoal.length - 1].classList.add("btn-success");
                    tombolSoal[tombolSoal.length - 2].setAttribute("value",Number(nilaiTombol[0].value) - 1);
                    tombolSoal[tombolSoal.length - 1].setAttribute("value",Number(nilaiTombol[1].value) - 1);

                    // pengondisian ketika soal berada di nomor pertama
                    if (nilaiTombol[0].value == 0) {
                        tombolSoal[tombolSoal.length - 2].classList.remove("btn-success");
                        tombolSoal[tombolSoal.length - 2].classList.add("disabled");
                        tombolSoal[tombolSoal.length - 2].classList.add("btn-light");
                        tombolSoal[tombolSoal.length - 1].classList.remove("btn-light");
                        tombolSoal[tombolSoal.length - 1].classList.remove("disabled");
                        tombolSoal[tombolSoal.length - 1].classList.add("btn-success");
                    }
                }
            }
        }

        // // eksekusi ajax
        xhr.open('GET', 'soal.php?tombolSoal=' + tombolSoal[i].value, true);
        xhr.send();
    });
}

// menyiapkan tanggal countdown
var hitungMundur = document.getElementById('hitungMundur');
var batasWaktu = new Date().getTime();

// memperbarui hitungan setiap satu detik
var x = setInterval(function() {
    // mengambil tanggal dan waktu hari ini
    var sekarang = new Date().getTime();

    // menemukan jarak waktu mundur dengan waktu sekarang
    var jarak = (batasWaktu + 6000000) - sekarang;

    // menghitung waktu
    var jam = Math.floor((jarak % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var menit = Math.floor((jarak % (1000 * 60 * 60)) / (1000 * 60));
    
    // tampilkan hasil ke layar
    hitungMundur.innerHTML = "0" + jam + ":" + menit;

    // pengondisian jika waktu habis
    if (jarak < 0) {
        clearInterval(x);
        hitungMundur.innerHTML = "Waktu Habis";
    }
}, 1000);