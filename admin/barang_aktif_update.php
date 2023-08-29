<?php 
include '../koneksi.php';
$noinv = $_POST['inv_no'];
$spesifikasi = $_POST['spesifikasi'];
$serial = $_POST['serial'];
$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "update barang_inv set brg_spek='$spesifikasi',serial_no='$serial',brg_keterangan='$keterangan',qty='$jumlah' where inv_id='$noinv'");

header("location:barang_aktif.php");