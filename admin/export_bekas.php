<?php
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=Data Barang Bekas.xls");
header("Content-Transfer-Encoding: binary ");

// Tambahkan table
include("barang_bekas_export.php");

?>