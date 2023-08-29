<?php
// Mengambil ID riwayatobat dari URL
$id_riwayat = $_GET['id_riwayat'];

// Koneksi ke database (diambil dari variabel $koneksi yang sudah didefinisikan di koneksi.php)
include_once '../../koneksi.php';

// Mengambil data riwayatobat dari database berdasarkan ID
$sql = "SELECT * FROM tb_riwayats WHERE id_riwayat = $id_riwayat";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    // Data ditemukan, menampilkan hasil
    $data = mysqli_fetch_assoc($result);

    // Mengambil data pasien berdasarkan kode_pasien
    $kode_pasien = $data['kode_pasien'];
    $sql_pasien = "SELECT nama_lengkap FROM datapasien WHERE kode_pasien = '$kode_pasien'";
    $result_pasien = mysqli_query($koneksi, $sql_pasien);
    $data_pasien = mysqli_fetch_assoc($result_pasien);
    $nama_pasien = $data_pasien['nama_lengkap'];

    // Mengambil data dokter berdasarkan kode_dokter
    $kode_dokter = $data['kode_dokter'];
    $sql_dokter = "SELECT nama_dokter FROM tb_dokter WHERE kode_dokter = '$kode_dokter'";
    $result_dokter = mysqli_query($koneksi, $sql_dokter);
    $data_dokter = mysqli_fetch_assoc($result_dokter);
    $nama_dokter = $data_dokter['nama_dokter'];

    // Mengambil data obat berdasarkan kode_obat


    // Tampilkan hasil dalam bentuk pop-up modal
    echo '<style>';
    echo '.modal {';
    echo '    display: block;';
    echo '    position: fixed;';
    echo '    z-index: 9999;';
    echo '    left: 0;';
    echo '    top: 0;';
    echo '    width: 100%;';
    echo '    height: 100%;';
    echo '    overflow: auto;';
    echo '    background-color: rgba(0, 0, 0, 0.8);';
    echo '}';
    echo '.modal-content {';
    echo '    background-color: #fefefe;';
    echo '    margin: 15% auto;';
    echo '    padding: 20px;';
    echo '    border: 1px solid #888;';
    echo '    width: 600px;';
    echo '}';
    echo '.logo-klinik {';
    echo '    color: red;';
    echo '    font-size: 32px;';
    echo '    font-weight: bold;';
    echo '    text-align: center;';
    echo '    margin-bottom: 20px;';
    echo '}';
    echo '.judul-riwayat {';
    echo '    color: #333;';
    echo '    font-size: 24px;';
    echo '    font-weight: bold;';
    echo '    text-align: center;';
    echo '    margin-bottom: 10px;';
    echo '}';
    echo '.tgl-pemeriksaan {';
    echo '    color: #999;';
    echo '    font-size: 14px;';
    echo '    text-align: right;';
    echo '}';
    echo '.tombol-tutup {';
    echo '    background-color: #f44336;';
    echo '    color: white;';
    echo '    border: none;';
    echo '    padding: 10px 20px;';
    echo '    text-align: center;';
    echo '    text-decoration: none;';
    echo '    display: inline-block;';
    echo '    font-size: 14px;';
    echo '    margin-top: 20px;';
    echo '    cursor: pointer;';
    echo '}';
    echo '</style>';
    echo '<div id="popupModal" class="modal">';
    echo '    <div class="modal-content">';
    echo '        <h1 class="logo-klinik">KLINIK BINA MEDIKA</h1>';
    echo '        <h2 class="judul-riwayat">Riwayat Obat Pasien Bina Medika</h2>';
    echo '        <p class="tgl-pemeriksaan">Tanggal Pemeriksaan Pasien: ' . $data['tgl_periksa'] . '</p>';
    echo '        <p>Nama Pasien: ' . $nama_pasien . '</p>';
    echo '        <p>Jenis Pasien: ' . $data['jenis_pasien'] . '</p>';
    echo '        <p>Nama Dokter: ' . $nama_dokter . '</p>';
    echo '        <p>Diagnosa Pasien: ' . $data['diagnosa'] . '</p>';
    $sql_details = "SELECT kode_obat, jmlh_obat FROM detail_riwayat WHERE id_riwayat = '$id_riwayat'";
    $result_details = mysqli_query($koneksi, $sql_details);
    
    while ($data_detail = mysqli_fetch_assoc($result_details)) {
        $kode_obat = $data_detail['kode_obat'];
        $jmlh_obat = $data_detail['jmlh_obat'];
    
        $sql_obat = "SELECT nama_obat FROM dataobat WHERE kode_obat = '$kode_obat'";
        $result_obat = mysqli_query($koneksi, $sql_obat);
        $data_obat = mysqli_fetch_assoc($result_obat);
        $nama_obat = $data_obat['nama_obat'];
    
        // Tampilkan informasi obat dalam riwayat
        echo "<p>Kode Obat: $kode_obat</p>";
        echo "<p>Nama Obat: $nama_obat</p>";
        echo "<p>Jumlah Obat: $jmlh_obat</p><br>";
    }
    
    echo '        <p>Aturan Pemakaian Obat: ' . $data['aturan_pakai'] . '</p>';
    echo '<p>Total Harga Obat yang dijual/dikeluarkan: Rp ' . number_format($data['tot_harga_jual'], 0, ',', '.') . '</p>';
    echo '        <button onclick="closeModal()" class="tombol-tutup" style="background-color: #f44336;">Tutup</button>';
    echo '    </div>';
    echo '</div>';
    echo '<script>';
    echo 'function closeModal() {';
    echo '    var modal = document.getElementById("popupModal");';
    echo '    modal.style.display = "none";';
    echo '    window.history.back();';
    echo '}';
    echo '</script>';
} else {
    // Data tidak ditemukan
    echo 'Data riwayat obat tidak ditemukan.';
}

// Menutup koneksi ke database (jika diperlukan)
// mysqli_close($koneksi);
// Mengambil kode pasien dari parameter URL
// if (isset($_GET['kode_pasien'])) {
//     $kode_pasien = $_GET['kode_pasien'];

//     // Koneksi ke database (misalnya, diambil dari berkas koneksi.php)
//     include_once 'koneksi.php';

//     // Query untuk mengambil riwayat obat berdasarkan kode pasien
//     $query = "SELECT * FROM tb_riwayats WHERE kode_pasien = '$kode_pasien'";
//     $result = mysqli_query($koneksi, $query);

//     if ($result) {
//         // Tampilkan informasi riwayat obat
//         while ($data = mysqli_fetch_assoc($result)) {
//             echo '<h2 class="judul-riwayat">Riwayat Pengobatan Pasien Bina Medika</h2>';
//             // ... (tampilkan informasi lainnya)
//                 echo '        <p class="tgl-pemeriksaan">Tanggal Pemeriksaan Pasien: ' . $data['tgl_periksa'] . '</p>';
//     echo '        <p>Nama Pasien: ' . $nama_pasien . '</p>';
//     echo '        <p>Jenis Pasien: ' . $data['jenis_pasien'] . '</p>';
//     echo '        <p>Nama Dokter: ' . $nama_dokter . '</p>';
//     echo '        <p>Diagnosa Pasien: ' . $data['diagnosa'] . '</p>';
//     echo '        <p>Nama Obat: ' . $nama_obat . '</p>';
//     echo '        <p>Jumlah Obat yang diberikan (satuan): ' . $data['jmlh_obat'] . '</p>';
//     echo '        <p>Aturan Pemakaian Obat: ' . $data['aturan_pakai'] . '</p>';
//             echo '<p>Total Harga Obat yang dijual/dikeluarkan: Rp ' . number_format($data['tot_harga_jual'], 0, ',', '.') . '</p>';
//         }
//     } else {
//         echo 'Terjadi kesalahan dalam query database.';
//     }
//     mysqli_close($koneksi);
// } else {
//     echo 'Kode pasien tidak ditemukan.';
// }

?>

<!-- <script>
function closeModal() {
    var modal = document.getElementById("popupModal");
    modal.style.display = "none";
    window.history.back();
}
</script> -->