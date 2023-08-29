<?php 
include '../koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$spesifikasi = $_POST['spesifikasi'];
$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "update barang set barang_nama='$nama', barang_spesifikasi='$spesifikasi', barang_jumlah='$jumlah', barang_keterangan='$keterangan' where barang_id='$id'");
header("location:barang.php");