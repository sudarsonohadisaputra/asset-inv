<?php 
include '../koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "update barang_sku set brg_nama='$nama', brg_keterangan='$keterangan' where brg_id='$id'");
header("location:barang_sku.php");