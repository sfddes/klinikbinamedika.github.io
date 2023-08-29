<?php 
include '../../koneksi.php';

$id_riwayat = $_POST['id_riwayat'];
$kode_pasien = $_POST['kode_pasien'];
$jenis_pasien = $_POST['jenis_pasien'];
$kode_dokter = $_POST['kode_dokter'];
$diagnosa = $_POST['diagnosa'];
$kode_obat = $_POST['kode_obat'];
$jmlh_obat = $_POST['jmlh_obat'];
$aturan_pakai = $_POST['aturan_pakai'];
$tgl_periksa = $_POST['tgl_periksa'];
$tot_harga_jual = $_POST['tot_harga_jual'];

// Check if kode_pasien already exists in tb_riwayats
$check_query = "SELECT COUNT(*) FROM tb_riwayats WHERE kode_pasien='$kode_pasien' AND id_riwayat <> '$id_riwayat'";
$check_result = mysqli_query($koneksi, $check_query);
$count = mysqli_fetch_array($check_result)[0];
if ($count > 0) {
    echo "Kode Pasien tidak dapat diubah karena sudah ada dalam database.";
    exit;
}

// Validasi tanggal pada sisi server
$current_date = date('Y-m-d'); // Tanggal hari ini

if (strtotime($tgl_periksa) > strtotime($current_date)) {
    echo "Tanggal periksa tidak boleh melebihi hari ini.";
    exit; // Stop eksekusi skrip jika tanggal tidak valid
}

$update_query = "UPDATE tb_riwayats SET kode_pasien='$kode_pasien', jenis_pasien='$jenis_pasien', kode_dokter='$kode_dokter', diagnosa='$diagnosa', kode_obat='$kode_obat', jmlh_obat='$jmlh_obat', aturan_pakai='$aturan_pakai', tgl_periksa='$tgl_periksa', tot_harga_jual='$tot_harga_jual' WHERE id_riwayat='$id_riwayat'";
mysqli_query($koneksi, $update_query);

header("location:riwayatobat.php");
?>
