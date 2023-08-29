<?php
include '../../koneksi.php';

if (isset($_GET['patientId'])) {
    $patientId = $_GET['patientId'];

    // Ambil data pasien dari database
    $query_pasien = "SELECT * FROM datapasien WHERE kode_pasien = '$patientId'";
    $result_pasien = mysqli_query($koneksi, $query_pasien);
    $pasien = mysqli_fetch_assoc($result_pasien);

    // Ambil riwayat obat pasien dari database
    $query_riwayat = "SELECT * FROM tb_riwayats WHERE kode_pasien = '$patientId' ORDER BY id_riwayat DESC";
    $result_riwayat = mysqli_query($koneksi, $query_riwayat);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Riwayat Obat Pasien - <?php echo $pasien['nama_lengkap']; ?></title>
    <!-- Tambahkan CSS atau styles yang sesuai di sini -->
</head>
<body>
    <h2>Detail Riwayat Obat Pasien: <?php echo $pasien['nama_lengkap']; ?></h2>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jenis Pasien</th>
                <th>Kode Dokter</th>
                <th>Diagnosa</th>
                <th>Kode Obat</th>
                <th>Jumlah Obat</th>
                <th>Aturan Pakai</th>
                <th>Total Harga Obat</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result_riwayat)) { ?>
                <tr>
                    <td><?php echo $row['tgl_periksa']; ?></td>
                    <td><?php echo $row['jenis_pasien'] ?></td>
                    <td><?php echo $row['kode_dokter'] ?></td>
                    <td><?php echo $row['diagnosa'] ?></td>
                    <td><?php echo $row['kode_obat'] ?></td>
                    <td><?php echo $row['jmlh_obat'] ?></td>
                    <td><?php echo $row['aturan_pakai'] ?></td>
                    <td><?php echo 'Rp ' . number_format($row['tot_harga_jual'], 0, ',', '.'); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Tambahkan konten lain yang diperlukan -->
</body>
</html>
