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
    <h4>LAPORAN SUPLIER</h4>
    <h4>Sistem Informasi Inventaris Sarana & Prasarana</h4>
  </center>

  <?php include '../koneksi.php'; ?>
  
  <table class="table">
    <thead>
      <tr>
        <th width="1%">NO</th>
        <th>NAMA SUPLIER</th>
        <th>ALAMAT</th>
        <th>TELEPON</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      include '../koneksi.php';
      $no=1;
      $data = mysqli_query($koneksi,"SELECT * FROM suplier");
      while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['suplier_nama']; ?></td>
        <td><?php echo $d['suplier_alamat']; ?></td>
        <td><?php echo $d['suplier_telepon']; ?></td>
      </tr>

      <?php 
    }
    ?>
  </tbody>
</table>

<?php 
require_once("../library/dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$dompdf->stream("Laporan_suplier.pdf");    
?>

</body>
</html>
