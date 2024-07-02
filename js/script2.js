// ambil elemen2 yang dibutuhkan
var pilihPembayaran = document.getElementById('pilihPembayaran');
var metodePembayaran = document.getElementById('metodePembayaran');

// tambahkan event ketika keyword ditulis
pilihPembayaran.addEventListener('click', function() {
    console.log('OK');

    // buat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            metodePembayaran.innerHTML = xhr.responseText;

        }
    }

    // eksekusi ajax
    xhr.open('GET', 'pembayaran.php?keyword=' + pilihPembayaran.value, true);
    xhr.send();

});