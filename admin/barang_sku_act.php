<?php 
include '../koneksi.php';
$sku  = $_POST['sku'];
$nama  = $_POST['nama'];
$part  = $_POST['part'];
$keterangan = $_POST['keterangan'];



mysqli_query($koneksi, "insert into barang_sku values ('$sku','$nama','$keterangan','$part')");
header("location:barang_sku.php");