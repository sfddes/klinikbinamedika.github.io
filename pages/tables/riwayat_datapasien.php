<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Obat Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
            
        }
        h1 {
            text-align: center;
            color: skyblue;
            margin-bottom: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .data-row {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            /* position: relative;
            overflow: auto; */
            
        }
        .data-label {
            font-weight: bold;
            margin-right: 10px;
            margin-bottom: 0px; /* Tambahkan margin bawah */
        }
        .tgl-pemeriksaan {';
            color: #999;
           font-size: 14px;
           text-align: right;
        }
        .data-label, .tgl-periksa {
            display: block;
        }
        .back-button {
            margin-top: 20px;
            text-align: right;
        }
        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Riwayat Pengobatan Pasien</h1>

    <div class="container">
        <?php
        // Memasukkan konfigurasi koneksi dari file koneksi.php
        include_once '../../koneksi.php';

        // Ambil kode_pasien dari URL
        if (isset($_GET['kode_pasien'])) {
            $kodePasien = $_GET['kode_pasien'];

            // Query untuk mengambil data riwayat pasien dari tb_riwayats berdasarkan kode_pasien
            $sql = "SELECT *
                    FROM tb_riwayats 
                    WHERE kode_pasien = '$kodePasien'";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                $num_rows = $result->num_rows;
                $counter = 0;
                while ($d = $result->fetch_assoc()) {
                    $counter++;
                    echo '<div class="data-row">';
                    echo '<span class="tgl-periksa">Tanggal Pemeriksaan:' . $d['tgl_periksa'] . '</span> ','<br>';
                    echo '<span class="data-label">Kode Pasien      :  ' . $d['kode_pasien'] . '</span> ','<br>';
                    echo '<span class="data-label">Jenis Pasien     : ' . $d['jenis_pasien'] . '</span> ','<br>';
                    echo '<span class="data-label">Kode Dokter      :  ' . $d['kode_dokter'] . '</span> ','<br>';
                    echo '<span class="data-label">Diagnosa Pasien  :  ' . $d['diagnosa'] . '</span> ','<br>';
                    // echo '<span class="data-label">Obat yang digunakan:</span> ';
        
                    // Mengambil informasi obat dari tabel detail_riwayat berdasarkan id_riwayat
                    $detail_obat_query = mysqli_query($koneksi, "SELECT * FROM detail_riwayat WHERE id_riwayat = '{$d['id_riwayat']}'");
                    $obat_info = [];
                    $jumlah_obat = [];
            
                    while ($detail_obat = mysqli_fetch_array($detail_obat_query)) {
                        // Mengambil nama obat dari tabel dataobat berdasarkan kode_obat
                        $kode_obat = $detail_obat['kode_obat'];
                        $obat_query = mysqli_query($koneksi, "SELECT * FROM dataobat WHERE kode_obat = '$kode_obat'");
                        $obat_data = mysqli_fetch_array($obat_query);
            
                        if ($obat_data) {
                            $obat_info[] = $obat_data['nama_obat'];
                            $jumlah_obat[] = $detail_obat['jmlh_obat'];

                        }
                    }
            
                    // Menampilkan informasi nama obat dari dataobat dalam satu baris pada kolom "kode_obat"
                    echo '<span class="data-label">Obat yang digunakan: ' . implode(", ", $obat_info) . '</span> <br>';
                    echo '<span class="data-label">Jumlah Obat yang di keluarkan : ' . implode(", ", $jumlah_obat) . '<br>', '/satuan' .'</span> ' ,'<br>';
                    echo '<span class="data-label">Aturan Pemakaian obat         :' . $d['aturan_pakai'] . '</span> ','<br>';
                    echo '<span class="data-label">Total Harga Obat yang terjual : Rp ' . number_format($d['tot_harga_jual'], 0, ',', '.') . '</span> ' ,'<br>';
                    // Tambahkan kolom lain yang ingin ditampilkan
                    echo '</div>';
        // Tampilkan tombol "Kembali" hanya pada data terakhir
        if ($counter === $num_rows) {
            echo '<div class="back-button">';
            echo '<a href="javascript:history.go(-1)">Kembali</a>';
            echo '</div>';
        }

                }
            } else {
                echo "Data pengobatan belum ada.";
            }
        } else {
            echo "Kode Pasien tidak ditemukan dalam URL.";
        }

        $koneksi->close();
        ?>
    </div>
</body>
</html>
