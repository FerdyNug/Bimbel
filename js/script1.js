// ambil elemen2 yang dibutuhkan
var tombolSoal = document.getElementById('tombol-soal');
var container = document.getElementById('container');

// tambahkan event ketika keyword ditulis
tombolSoal.addEventListener('click', function() {

    // buat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;

        }
    }

    // eksekusi ajax
    xhr.open('GET', 'ajax/soal.php?keyword=' + tombolSoal, true);
    xhr.send();

});