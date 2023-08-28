<?php 
include '../koneksi.php';
$sku  = $_POST['sku'];
$nama  = $_POST['nama'];
$spesifikasi = $_POST['spesifikasi'];
$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];



mysqli_query($koneksi, "insert into barang values ('$sku ','$nama ','$spesifikasi','$jumlah','$keterangan')");
header("location:barang_sku.php");