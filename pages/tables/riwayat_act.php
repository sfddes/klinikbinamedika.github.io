<?php
include '../../koneksi.php';

$kode_pasien = $_POST['kode_pasien'];
$jenis_pasien = $_POST['jenis_pasien'];
$kode_dokter = $_POST['kode_dokter'];
$diagnosa = $_POST['diagnosa'];
$aturan_pakai = $_POST['aturan_pakai'];
$tgl_periksa = $_POST['tgl_periksa'];
$tot_harga_jual = $_POST['tot_harga_jual'];
// Check if the code already exists in the database
$sql_check = "SELECT * FROM tb_riwayats WHERE kode_pasien = '$kode_pasien' AND tgl_periksa = '$tgl_periksa'";
$query_check = mysqli_query($koneksi, $sql_check);

if (mysqli_num_rows($query_check) > 0) {
    // If the code already exists, only show a notification
    echo '<script>alert("kode pasien sudah ada dengan tanggal yang sama, tolong cek kembali!"); window.location.href = "riwayatobat.php";</script>';
} else {
    // Insert main riwayat data
    $sql_riwayat = "INSERT INTO tb_riwayats (kode_pasien, jenis_pasien, kode_dokter, diagnosa, aturan_pakai, tgl_periksa, tot_harga_jual) VALUES ('$kode_pasien', '$jenis_pasien', '$kode_dokter', '$diagnosa', '$aturan_pakai', '$tgl_periksa', '$tot_harga_jual')";
    $query_riwayat = mysqli_query($koneksi, $sql_riwayat);

    // Get the ID of the inserted riwayat
    $id_riwayat = mysqli_insert_id($koneksi);

    // Insert obat details
    if (isset($_POST['kode_obat']) && isset($_POST['jmlh_obat'])) {
        $kode_obat_array = $_POST['kode_obat'];
        $jmlh_obat_string = $_POST['jmlh_obat'];

        $jmlh_obat_array = explode(', ', $jmlh_obat_string[0]); // Pecah string menjadi array
        $jmlh_obat_array = array_map('intval', $jmlh_obat_array); // Konversi elemen array menjadi integer

        foreach ($kode_obat_array as $index => $kode_obat) {
            $jmlh_obat = $jmlh_obat_array[$index];

            $sql_detail = "INSERT INTO detail_riwayat (id_riwayat, kode_obat, jmlh_obat) VALUES ('$id_riwayat', '$kode_obat', '$jmlh_obat')";
            mysqli_query($koneksi, $sql_detail);

            // Update stock
            $query_stok = mysqli_query($koneksi, "SELECT min_stock FROM dataobat WHERE kode_obat='$kode_obat'");
            $data_stok = mysqli_fetch_array($query_stok);
            $sisa_stok = $data_stok['min_stock'] - $jmlh_obat;
            mysqli_query($koneksi, "UPDATE dataobat SET min_stock='$sisa_stok' WHERE kode_obat='$kode_obat'");
        }
    } else {
        echo "Data tidak lengkap.";
    }        // Update stock
            // $query_stok = mysqli_query($koneksi, "SELECT min_stock FROM dataobat WHERE kode_obat='$kode_obat'");
            // $data_stok = mysqli_fetch_array($query_stok);
            // $sisa_stok = $data_stok['min_stock'] - $jmlh_obat;
            // mysqli_query($koneksi, "UPDATE dataobat SET min_stock='$sisa_stok' WHERE kode_obat='$kode_obat'");
echo '<script>alert("Data berhasil disimpan!"); window.location.href = "riwayatobat.php";</script>';
}

?>