<?php
session_start();

// Menghapus semua data sesi
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout Success</title>
    <script>
        // Mencegah pengguna kembali menggunakan tombol "Kembali" di browser
        function disableBackButton() {
            window.history.pushState(null, "", window.location.href);
            window.onpopstate = function () {
                window.history.pushState(null, "", window.location.href);
            };
        }

        // Menjalankan fungsi disableBackButton saat halaman selesai dimuat
        window.onload = function () {
            disableBackButton();
        };

        // Mengarahkan pengguna kembali ke halaman login setelah beberapa detik
        setTimeout(function () {
            window.location.href = "login.php";
        }, 5000); // Ubah angka 5000 menjadi waktu yang diinginkan (dalam milidetik)
    </script>
</head>
<body>
    <h1>Logout Success</h1>
    <p>Anda telah berhasil logout dari akun Anda.</p>
    <p>Anda akan dialihkan kembali ke halaman login dalam beberapa detik...</p>
</body>
</html>
