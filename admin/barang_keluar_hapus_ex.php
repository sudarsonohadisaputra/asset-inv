<?php 
include '../koneksi.php';
$id = $_GET['id'];



$bk = mysqli_query($koneksi,"select * from barang_keluar where bk_id='$id'");
$barang_keluar = mysqli_fetch_assoc($bk);
$barang_id = $barang_keluar['bk_id_barang'];
$bk_id = $barang_keluar['bk_id'];
$barang_nama = $barang_keluar['bk_nama_barang'];
$barang_spesifikasi = $barang_keluar['bk_id_barang'];
$jumlah_barang_keluar = $barang_keluar['bk_jumlah_keluar'];
$barang_keterangan = $barang_keluar['bk_keterangan'];


mysqli_query($koneksi,"insert into barang_ex values ('$barang_id','$bk_id','$barang_nama',NULL,'$jumlah_barang_keluar','$barang_keterangan')");

mysqli_query($koneksi, "delete from barang_keluar where bk_id='$id'");
header("location:barang_ex.php");
