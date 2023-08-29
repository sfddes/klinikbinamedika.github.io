<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sertakan koneksi.php untuk menghubungkan ke database
    include 'koneksi.php';

    // Lindungi dari SQL Injection dengan menggunakan prepared statement
    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Periksa apakah ada hasil yang cocok
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['level'] = $data['level'];

        // Set notifikasi selamat datang sesuai level user
        if ($data['level'] == 'admin') {
            $_SESSION['pesan_selamat_datang'] = "Selamat datang, Admin!";
            header('Location: index.php');
            exit;
        } elseif ($data['level'] == 'petugas') {
            $_SESSION['pesan_selamat_datang'] = "Selamat datang, Petugas!";
            header('Location: petugas/petugas.php');
            exit;
        }
    } else {
        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        echo "<script>
        alert('Maaf, login gagal. Silahkan ulangi lagi.');
        window.location.assign('login.php');
        </script>";
        exit;
    }
} else {
    // Jika data POST tidak lengkap, kembalikan ke halaman login
    header('Location: login.php');
    exit;
}
?>
