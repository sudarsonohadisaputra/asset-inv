<?php 
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from lokasi where lokasi_id='$id'");
header("location:lokasi.php");
