<?php 
include '../koneksi.php';
$noinv  = $_POST['inv_no'];
$barang  = $_POST['sku'];
$nama_barang = $_POST['barang'];
$serial = $_POST['serial'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];
$lokasi = $_POST['lokasi'];
$lokasi_id_to = $_POST['lokasi'];
$lok = mysqli_query($koneksi,"select * from lokasi where lokasi_id='$lokasi'");
$loknama = mysqli_fetch_assoc($lok);
$lokasi_to = $loknama['lokasi_nama'];
$approval = $_POST['approval'];
$keterangan = $_POST['keterangan'];

$print_query= mysqli_query($koneksi,"SELECT * from mutasi where mu_inv_id='$noinv'");
$print_row=mysqli_fetch_assoc($print_query);
$print=$print_row['mu_print'];

$b = mysqli_query($koneksi,"select * from barang where brg_id='$barang'");
$bb = mysqli_fetch_assoc($b);
$nama_barang = $bb['brg_nama'];
$jumlah_barang = $bb['brg_jumlah'];

// cek jika jumlah yang diinput lebih besar dari jumlah barang yang ada


	mysqli_query($koneksi,"update barang_inv set state='1' where inv_id='$noinv'");

	$query=mysqli_query($koneksi,"select max(bk_id) as id from barang_mutasi"); 
	$data=mysqli_fetch_array($query); 
	$kode=$data['id']; 
	$nourut=(int) substr($kode,0,6); 
	$nourut++; 
	$new=sprintf("%06s", $nourut)."/MU/IT/".date('m').".".date('y'); 

	mysqli_query($koneksi, "insert into barang_mutasi values ('$new','$noinv','$barang','$nama_barang','$serial','$tanggal','$jumlah','$lokasi','$lokasi_to','$approval','$keterangan')");

	$posttime=strtotime(now);
	$lokasi = mysqli_query($koneksi,"SELECT * FROM mutasi where mu_inv_id='$noinv' order by mu_post_time DESC LIMIT 1");
    $lok = mysqli_fetch_assoc($lokasi);
    $lokasi_fr=$lok['mu_lokasi_to'];
    $lokasi_id_fr=$lok['mu_id_lokasi_to'];

	mysqli_query($koneksi, "insert into mutasi values ('$new','$noinv','$barang','$nama_barang','$tanggal','$lokasi_id_fr','$lokasi_fr','$lokasi_id_to','$lokasi_to','$keterangan','$posttime','$approval','$print')");

	header("location:barang_bekas.php");




