<?php
include_once "koneksi.php";

// Fungsi untuk mengambil jumlah data dari hasil query
function getRowCount($result) {
    if ($result) {
        $data = $result->fetch_assoc();
        return $data['jumlah_pasien']; // Ubah 'jumlah' menjadi 'jumlah_pasien'
    } else {
        return 0;
    }
}

// Query untuk mengambil jumlah data pada masing-masing tabel
$queryPasien = "SELECT COUNT(*) as jumlah_pasien FROM datapasien";
$resultPasien = $koneksi->query($queryPasien);

$queryDokter = "SELECT COUNT(*) as jumlah_dokter FROM tb_dokter";
$resultDokter = $koneksi->query($queryDokter);

$queryObat = "SELECT COUNT(*) as jumlah_obat FROM dataobat";
$resultObat = $koneksi->query($queryObat);

$queryRiwayatObat = "SELECT COUNT(*) as jumlah_riwayat_obat FROM tb_riwayat";
$resultRiwayatObat = $koneksi->query($queryRiwayatObat);

// Menghitung jumlah data pada masing-masing tabel
$jumlahPasien = getRowCount($resultPasien);
$jumlahDokter = getRowCount($resultDokter);
$jumlahObat = getRowCount($resultObat);
$jumlahRiwayatObat = getRowCount($resultRiwayatObat);

// Tutup koneksi ke database
$koneksi->close();

// Simpan hasil hitungan dalam bentuk array
$data = array(
    "jumlahPasien" => $jumlahPasien,
    "jumlahDokter" => $jumlahDokter,
    "jumlahObat" => $jumlahObat,
    "jumlahRiwayatObat" => $jumlahRiwayatObat,
);

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
