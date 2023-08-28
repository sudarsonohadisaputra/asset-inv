<?php 
include '../koneksi.php';
$bk_id = $_GET['id'];

mysqli_query($koneksi, "delete from barang_ex where bk_id='$bk_id'");

header("location:barang_ex.php");
