<?php
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=Data Barang Aktif.xls");
header("Content-Transfer-Encoding: binary ");

// Tambahkan table
include("barang_aktif_export.php");

?>