<?php 
include '../koneksi.php';
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

mysqli_query($koneksi, "insert into lokasi values ('$kode','$nama ','$alamat','$telepon')");
header("location:lokasi.php");