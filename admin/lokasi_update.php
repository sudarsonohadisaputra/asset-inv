<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

mysqli_query($koneksi, "update lokasi set lokasi_nama='$nama', lokasi_alamat='$alamat', lokasi_telepon='$telepon' where lokasi_id='$id'");
header("location:lokasi.php");