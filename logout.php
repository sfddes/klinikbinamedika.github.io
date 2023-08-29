<?php

session_start();

// Menyimpan informasi logout ke dalam $_SESSION
$_SESSION['logout'] = true;

// Mengarahkan pengguna ke halaman login
header("Location: login.php");
exit;
?>
