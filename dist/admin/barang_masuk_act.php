<?php 
include '../koneksi.php';
$barang  = $_POST['barang'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];
$suplier = $_POST['suplier'];
$sj = $_POST['surat'];
$keterangan = $_POST['keterangan'];


$b = mysqli_query($koneksi,"select * from barang_sku where brg_id='$barang'");
$bb = mysqli_fetch_assoc($b);
$nama_barang = $bb['brg_nama'];

$b = mysqli_query($koneksi,"select * from barang_sku where brg_id='$barang'");
$bb = mysqli_fetch_assoc($b);
$part = $bb['part'];

$spek_barang = $_POST['spek'];

$s = mysqli_query($koneksi,"select * from suplier where suplier_id='$suplier'");
$ss = mysqli_fetch_assoc($s);
$nama_suplier = $ss['suplier_nama'];

// tambah jumlah data barang
$c = mysqli_query($koneksi,"select * from barang where brg_id='$barang'");
$cc = mysqli_fetch_assoc($c);
$jumlah_lama = $cc['brg_jumlah'];
$jumlah_baru = $jumlah_lama+$jumlah;
$serial='0';
$status='0';




$query=mysqli_query($koneksi,"select * from barang where brg_id='$barang'"); 
$num_rows=mysqli_num_rows($query);
if($num_rows > '0') {
mysqli_query($koneksi,"update barang set brg_jumlah='$jumlah_baru' where brg_id='$barang'");
}
else {
	
	mysqli_query($koneksi, "insert into barang values ('$barang','$nama_barang','$jumlah','$keterangan')");
}

$x=1;

$query=mysqli_query($koneksi,"select max(bm_id) as id from barang_masuk"); 
$data=mysqli_fetch_array($query); 
$kode=$data['id']; 
$nourut=(int) substr($kode,0,6); 
$nourut++; 
$newbm=sprintf("%06s", $nourut)."/IN/IZ/".date('m').".".date('y'); 
mysqli_query($koneksi, "insert into barang_masuk values ('$newbm','$barang','$nama_barang','$spek_barang','$tanggal','$jumlah','$suplier','$nama_suplier','$sj','$keterangan')");



$lokasi_id='1001';
$lokasi_query= mysqli_query($koneksi,"SELECT * from lokasi where lokasi_id='$lokasi_id'");
$lokasi_row=mysqli_fetch_assoc($lokasi_query);
$lokasi=$lokasi_row['lokasi_nama'];


if($part == '1') {
while($x <= $jumlah) {
$posttime=strtotime(now);
$qty="1";
$stloc="1001";
$print="0";
$query=mysqli_query($koneksi,"select max(inv_id) as id from barang_inv"); 
$data=mysqli_fetch_array($query); 
$kode=$data['id']; 
$nourut=(int) substr($kode,0,6); 
$nourut++; 
$newinv=sprintf("%06s", $nourut)."/PRT/IZ/".date('m').".".date('y'); 
mysqli_query($koneksi, "insert into barang_inv values ('$newinv','$barang','$nama_barang','$spek_barang','$serial','$tanggal','$suplier','$nama_suplier','$sj','$keterangan','$status','$part','$qty','$stloc')");
mysqli_query($koneksi, "insert into mutasi values ('$newbm','$newinv','$barang','$nama_barang','$tanggal','$suplier','$nama_suplier','$lokasi_id','$lokasi','$keterangan','$posttime','$sj','$print')");
$x++;
}
 }else{
while($x <= $jumlah) {
$posttime=strtotime(now);
$qty="1";
$stloc="1001";
$print="0";
$query=mysqli_query($koneksi,"select max(inv_id) as id from barang_inv"); 
$data=mysqli_fetch_array($query); 
$kode=$data['id']; 
$nourut=(int) substr($kode,0,6); 
$nourut++; 
$newinv=sprintf("%06s", $nourut)."/INV/IZ/".date('m').".".date('y'); 
mysqli_query($koneksi, "insert into barang_inv values ('$newinv','$barang','$nama_barang','$spek_barang','$serial','$tanggal','$suplier','$nama_suplier','$sj','$keterangan','$status','$part','$qty','$stloc')");
mysqli_query($koneksi, "insert into mutasi values ('$newbm','$newinv','$barang','$nama_barang','$tanggal','$suplier','$nama_suplier','$lokasi_id','$lokasi','$keterangan','$posttime','$sj','$print')");
$x++;
}
 }

header("location:barang_masuk.php");

