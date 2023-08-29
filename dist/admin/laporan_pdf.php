 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator - Sistem Informasi Inventaris Sarana & Prasarana SMK</title>

</head>
<body>

  <style type="text/css">
    body{
      font-family: sans-serif;
    }

    .table{
      width: 100%;
    }

    th,td{
    }
    .table,
    .table th,
    .table td {
      padding: 5px;
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>

  <center>
    <h4>LAPORAN <br/> Sistem Informasi Inventaris Sarana & Prasarana</h4>
  </center>

  <?php include '../koneksi.php'; ?>
  <?php 
  if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['jenis'])){
    $tgl_dari = $_GET['tanggal_dari'];
    $tgl_sampai = $_GET['tanggal_sampai'];
    $jenis = $_GET['jenis'];
    ?>

    <table>
      <tr>
        <td width="40%">DARI TANGGAL</td>
        <td width="10%" style="text-align: center;">:</td>
        <td><?php echo $tgl_dari; ?></td>
      </tr>
      <tr>
        <td>SAMPAI TANGGAL</td>
        <td style="text-align: center;">:</td>
        <td><?php echo $tgl_sampai; ?></td>
      </tr>
      <tr>
        <td>JENIS</td>
        <td style="text-align: center;">:</td>
        <td><?php echo $jenis; ?></td>
      </tr>
    </table>
    <br/>

    <?php 
    if($jenis == "barang_masuk"){
      ?>
      <table class="table">
        <thead>
          <tr>
            <th width="1%">NO</th>
            <th>KODE MUTASI</th>
            <th>SKU BARANG</th>
            <th>NAMA BARANG</th>
            <th>TANGGAL MASUK</th>
            <th>JUMLAH</th>
            <th>NAMA SUPLIER</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          include '../koneksi.php';
          $no=1;
          $data = mysqli_query($koneksi,"SELECT * FROM barang_masuk WHERE date(bm_tgl_masuk) >= '$tgl_dari' AND date(bm_tgl_masuk) <= '$tgl_sampai'");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $d['bm_id']; ?></td>
              <td><?php echo $d['bm_brg_id']; ?></td>
              <td><?php echo $d['bm_brg_nama']; ?></td>
              <td><?php echo $d['bm_tgl_masuk']; ?></td>
              <td><?php echo $d['bm_jumlah']; ?></td>
              <td><?php echo $d['bm_nama_suplier']; ?></td>
            </tr>
            <?php 
          }
          ?>
        </tbody>
      </table>

      <?php 
    }elseif($jenis == "barang_keluar"){
     ?>
     <table class="table">
      <thead>
        <tr>
          <th width="1%">NO</th>
          <th>NAMA BARANG</th>
          <th>TANGGAL KELUAR</th>
          <th>JUMLAH</th>
          <th>LOKASI</th>
          <th>PENERIMA</th>
          <th>KETERANGAN</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        include '../koneksi.php';
        $no=1;
        $data = mysqli_query($koneksi,"SELECT * FROM barang_keluar WHERE date(bk_tgl_keluar) >= '$tgl_dari' AND date(bk_tgl_keluar) <= '$tgl_sampai'");
        while($d = mysqli_fetch_array($data)){
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['bk_nama_barang']; ?></td>
            <td><?php echo $d['bk_tgl_keluar']; ?></td>
            <td><?php echo $d['bk_jumlah_keluar']; ?></td>
            <td><?php echo $d['bk_lokasi']; ?></td>
            <td><?php echo $d['bk_penerima']; ?></td>
            <td><?php echo $d['bk_keterangan']; ?></td>
          </tr>
          <?php 
        }
        ?>
      </tbody>
    </table>

    <?php 
  } 
  ?>

  <?php 
}else{
  ?>

  <div class="alert alert-info text-center">
    Silahkan Filter Laporan Terlebih Dulu.
  </div>

  <?php
}
?>

<?php 
    require_once("../library/dompdf/dompdf_config.inc.php");
    $dompdf = new DOMPDF();
    $dompdf->load_html(ob_get_clean());
    $dompdf->render();
    $dompdf->stream("Laporan.pdf");    
?>

</body>
</html>
