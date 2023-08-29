<?php 
include '../koneksi.php';
$iid = $_GET['id'];

mysqli_query($koneksi, "delete from barang where barang_id='$iid'");

mysqli_query($koneksi, "delete from barang_masuk where bm_id_barang='$iid'");
mysqli_query($koneksi, "delete from barang_keluar where bk_id_barang='$iid'");

header("location:barang_aktif.php");
