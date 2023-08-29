<?php 
include '../../koneksi.php';
$kode_dokter  = $_POST['kode_dokter'];
$nama_dokter  = $_POST['nama_dokter'];
$no_hp = $_POST['no_hp'];
$no_sip = $_POST['no_sip'];

// Check if the code already exists in the database
$sql_check = "SELECT * FROM tb_dokter WHERE kode_dokter = '$kode_dokter'";
$query_check = mysqli_query($koneksi, $sql_check);

if (mysqli_num_rows($query_check) > 0) {
    // If the code already exists, show a notification and stop the process
    echo '<script>alert("Kode dokter sudah ada. Silakan gunakan kode lain."); window.location.href = "datadokter.php";</script>';
} else {
    // Code doesn't exist, proceed with inserting the data
    $sql = "INSERT INTO tb_dokter (kode_dokter, nama_dokter,no_hp,no_sip) VALUES ('$kode_dokter','$nama_dokter','$no_hp','$no_sip')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        // Data successfully inserted
        echo '<script>alert("Data berhasil disimpan!"); window.location.href = "datadokter.php";</script>';
    } else {
        // Error in data insertion
        echo '<script>alert("Terjadi kesalahan saat menyimpan data. Silakan coba lagi."); window.location.href = "datadokter.php";</script>';
    }
}

// $sql = "INSERT INTO tb_dokter (kode_dokter, nama_dokter,no_hp,no_sip) VALUES ('$kode_dokter','$nama_dokter','$no_hp','$no_sip')";
// $query = mysqli_query($koneksi, $sql);
// header("location:datadokter.php");


?>