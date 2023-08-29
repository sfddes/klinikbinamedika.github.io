
<?php
include '../../koneksi.php';

if (isset($_GET['kode_obat'])) {
  $kode_obat = $_GET['kode_obat'];

  // Menghapus data obat dari tabel dataobat
//   $query = "DELETE FROM dataobat WHERE id_obat = '$id_obat'";
//   $result = mysqli_query($koneksi, $query);
     $data = mysqli_query($koneksi, "select * from dataobat where kode_obat='$kode_obat'");
     $d = mysqli_fetch_assoc($data);
     
     mysqli_query($koneksi, "delete from dataobat where kode_obat='$kode_obat'");


  if ($d) {
    // Jika penghapusan berhasil, periksa apakah ada data yang terpengaruh
    if (mysqli_affected_rows($koneksi) > 0) {
      // Data berhasil dihapus, arahkan kembali ke halaman dataobat.php
      header("location:dataobat.php");
      exit;
    } else {
      // Tidak ada data yang terpengaruh, tampilkan pesan bahwa data tidak ditemukan
      echo "Data obat tidak ditemukan.";
      exit;
    }
  } else {
    // Jika terjadi kesalahan saat menghapus data, tampilkan pesan error
    echo "Error: " . mysqli_error($koneksi);
    exit;
  }
} else {
  // Jika parameter id_obat tidak ditemukan, arahkan kembali ke halaman dataobat.php
  header("location:dataobat.php");
  exit;
}
?>


