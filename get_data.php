<?php
include 'koneksi.php';
// Mendapatkan jumlah pasien dari database
// $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_pasien FROM datapasien");
// $result = mysqli_fetch_assoc($query);
// $jumlahPasien = $result['total_pasien'];

// Mendapatkan jumlah pasien dari database
$queryPasien = mysqli_query($koneksi, "SELECT COUNT(*) AS total_pasien FROM datapasien");
$resultPasien = mysqli_fetch_assoc($queryPasien);
$jumlahPasien = $resultPasien['total_pasien'];

// Mendapatkan jumlah dokter dari database
$queryDokter = mysqli_query($koneksi, "SELECT COUNT(*) AS total_dokter FROM tb_dokter");
$resultDokter = mysqli_fetch_assoc($queryDokter);
$jumlahDokter = $resultDokter['total_dokter'];

// Mendapatkan jumlah obat dari database
$queryObat = mysqli_query($koneksi, "SELECT COUNT(*) AS total_obat FROM dataobat");
$resultObat = mysqli_fetch_assoc($queryObat);
$jumlahObat = $resultObat['total_obat'];

// Mendapatkan jumlah riwayat dari database
$queryRiwayat = mysqli_query($koneksi, "SELECT COUNT(*) AS total_riwayat FROM tb_riwayats");
$resultRiwayat = mysqli_fetch_assoc($queryRiwayat);
$jumlahRiwayat = $resultRiwayat['total_riwayat'];

// Mengembalikan hasil dalam bentuk JSON
header('Content-Type: application/json');
echo json_encode(['jumlah_pasien' => $jumlahPasien, 'jumlah_dokter' => $jumlahDokter,     'jumlah_obat' => $jumlahObat,
'jumlah_riwayat' => $jumlahRiwayat]);
?>
