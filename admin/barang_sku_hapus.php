<?php 
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from barang_mutasi where bk_brg_id='$id'");
mysqli_query($koneksi, "delete from barang_sku where brg_id='$id'");
mysqli_query($koneksi, "delete from barang_masuk where bm_brg_id='$id'");
mysqli_query($koneksi, "delete from barang_keluar where bk_brg_id='$id'");
mysqli_query($koneksi, "delete from barang_inv where brg_id='$id'");
mysqli_query($koneksi, "delete from mutasi where mu_brg_id='$id'");

header("location:barang_sku.php");
