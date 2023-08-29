<?php 
include '../../koneksi.php';
$kode_dokter = $_GET['kode_dokter'];

// Menghapus data dokter berdasarkan id_dokter
mysqli_query($koneksi, "delete from tb_dokter where ko'de_dokter='$kode_dokter'");

// Cek apakah data berhasil dihapus
if (mysqli_affected_rows($koneksi) > 0) {
    // Data berhasil dihapus
    echo '<script>alert("Data telah berhasil dihapus."); window.location.href = "datadokter.php";</script>';
} else {
    // Data gagal dihapus
    echo '<script>alert("Gagal menghapus data."); window.location.href = "datadokter.php";</script>';
}
?>
