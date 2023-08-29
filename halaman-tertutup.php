<?php
session_start();

// Memeriksa apakah pengguna telah masuk
if (!isset($_SESSION['user_id'])) {
    // Pengguna belum login, mengarahkan kembali ke halaman login.php atau halaman awal
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Tertutup</title>
</head>
<body>
    <h1>Halaman Tertutup</h1>
    <p>Hanya pengguna yang telah login yang dapat mengakses halaman ini.</p>
    <!-- Konten halaman tertutup lainnya -->
</body>
</html>
