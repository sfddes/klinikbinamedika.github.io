<?php 
include '../../koneksi.php';
$kode_obat = $_POST['kode_obat'];
$tgl_masuk = $_POST['tgl_masuk'];
$nama_obat = $_POST['nama_obat'];
$satuan = $_POST['satuan'];
$penyimpanan = $_POST['penyimpanan'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$kadaluwarsa = $_POST['kadaluwarsa'];
$min_stock = $_POST['min_stock'];
$stock = $_POST['stock'];



mysqli_query($koneksi, "update dataobat set kode_obat='$kode_obat', tgl_masuk='$tgl_masuk', nama_obat='$nama_obat', satuan='$satuan', penyimpanan='$penyimpanan', harga_beli='$harga_beli',harga_jual='$harga_jual', kadaluwarsa='$kadaluwarsa', min_stock='$min_stock', stock='$stock' where kode_obat='$kode_obat'");

header("location:dataobat.php");
?>