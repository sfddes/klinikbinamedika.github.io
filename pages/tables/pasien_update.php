<?php 
include '../../koneksi.php';
$id_pasien = $_POST['id_pasien'];
$no_kartu  = $_POST['no_kartu '];
$jenis_pasien = $_POST['jenis_pasien'];
$nama_lengkap  = $_POST['nama_lengkap'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$umur = $_POST['umur'];
$tgl_lahir = $_POST['tgl_lahir'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];

mysqli_query($koneksi, "update datapasien set  no_kartu ='$no_kartu' , jenis_pasien='$jenis_pasien', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', umur='$umur', tgl_lahir='$tgl_lahir', no_hp='$no_hp',alamat='$alamat' where id_pasien='$id_pasien'");

header("location:datapasien.php");

?>