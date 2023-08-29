<?php
include '../../koneksi.php';

$kode_pasien  = $_POST['kode_pasien'];
$no_kartu  = $_POST['no_kartu'];
$jenis_pasien = $_POST['jenis_pasien'];
$nama_lengkap = $_POST['nama_lengkap'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$umur = $_POST['umur'];
$tgl_lahir = $_POST['tgl_lahir'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];

// Check if the code already exists in the database
$sql_check = "SELECT * FROM datapasien WHERE kode_pasien = '$kode_pasien'";
$query_check = mysqli_query($koneksi, $sql_check);

if (mysqli_num_rows($query_check) > 0) {
    // If the code already exists, show a notification and stop the process
    echo '<script>alert("Kode pasien sudah ada dalam database. Silakan gunakan kode lain."); window.location.href = "datapasien.php";</script>';
} else {
    // Code doesn't exist, proceed with inserting the data
    $sql = "INSERT INTO datapasien (kode_pasien, no_kartu, jenis_pasien, nama_lengkap, jenis_kelamin, umur, tgl_lahir, no_hp, alamat) VALUES ('$kode_pasien','$no_kartu', '$jenis_pasien',  '$nama_lengkap', '$jenis_kelamin', '$umur', '$tgl_lahir', '$no_hp', '$alamat')";
    
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        // Data successfully inserted
        echo '<script>alert("Data berhasil disimpan!"); window.location.href = "datapasien.php";</script>';
    } else {
        // Error in data insertion
        echo '<script>alert("Terjadi kesalahan saat menyimpan data. Silakan coba lagi."); window.location.href = "datapasien.php";</script>';
    }
}
?>
