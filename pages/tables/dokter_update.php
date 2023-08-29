<?php 
include '../../koneksi.php';
$kode_dokter  = $_POST['kode_dokter'];
$nama_dokter  = $_POST['nama_dokter'];
$no_hp = $_POST['no_hp'];
$no_sip = $_POST['no_sip'];

mysqli_query($koneksi, "update tb_dokter set kode_dokter='$kode_dokter', nama_dokter='$nama_dokter', no_hp='$no_hp',no_sip='$no_sip' where kode_dokter='$kode_dokter'");

header("location:datadokter.php");

?>