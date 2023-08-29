<?php
include '../../koneksi.php';

if (isset($_POST['kode_obat'],$_POST['tgl_masuk'], $_POST['nama_obat'], $_POST['satuan'],$_POST['penyimpanan'], $_POST['harga_beli'], $_POST['harga_jual'], $_POST['kadaluwarsa'], $_POST['min_stock'], $_POST['stock'])) {
    $kode_obat = $_POST['kode_obat'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $nama_obat = $_POST['nama_obat'];
    $satuan = $_POST['satuan'];
    $penyimpanan = $_POST['penyimpanan'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $kadaluwarsa = $_POST['kadaluwarsa'];
    $min_stock = $_POST['min_stock'];
    $stock = $_POST['stock'];

    // Check if the code already exists in the database
$sql_check = "SELECT * FROM dataobat WHERE kode_obat = '$kode_obat'";
$query_check = mysqli_query($koneksi, $sql_check);

if (mysqli_num_rows($query_check) > 0) {
    // If the code already exists, show a notification and stop the process
    echo '<script>alert("Kode obat sudah ada dalam database. Silahkan gunakan kode lain."); window.location.href = "dataobat.php";</script>';
} else {
    // Code doesn't exist, proceed with inserting the data
    $sql = "INSERT INTO dataobat (kode_obat, tgl_masuk, nama_obat, satuan, penyimpanan, harga_beli, harga_jual, kadaluwarsa, min_stock, stock) 
    VALUES ('$kode_obat', '$tgl_masuk', '$nama_obat', '$satuan', '$penyimpanan', '$harga_beli', '$harga_jual', '$kadaluwarsa', '$min_stock', '$stock')";
    
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        // Data successfully inserted
        echo '<script>alert("Data berhasil disimpan!"); window.location.href = "dataobat.php";</script>';
    } else {
        // Error in data insertion
        echo '<script>alert("Terjadi kesalahan saat menyimpan data. Silakan coba lagi."); window.location.href = "dataobat.php";</script>';
    }
}
}
?>
