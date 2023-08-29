<?php
// Masukkan file koneksi.php
include 'koneksi.php';

function getJumlahData($table) {

    // Query untuk mengambil jumlah data dari tabel yang ditentukan
    $sql = "SELECT COUNT(*) as total FROM $table";
    var_dump($sql); // Tampilkan query untuk memastikan benar
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $jumlahData = $row["total"];
    } else {
        $jumlahData = 0;
    }

    // Tutup koneksi
    $conn->close();

    // Kembalikan data dalam bentuk array
    return array('table' => $table, 'jumlah_data' => $jumlahData);
}

// Panggil fungsi getJumlahData untuk masing-masing tabel yang ingin ditampilkan
$dataPasien = getJumlahData("datapasien");
$dataDokter = getJumlahData("tb_dokter");
$dataObat = getJumlahData("dataobat");
$dataRiwayatObat = getJumlahData("tb_riwayat");


// Kembalikan data dalam bentuk JSON
header('Content-Type: application/json');
echo json_encode(array(
    'data_pasien' => $dataPasien,
    'data_dokter' => $dataDokter,
    'data_obat' => $dataObat,
    'data_riwayat_obat' => $dataRiwayatObat
));
?>
