 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator - InfraSolubis</title>
  
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
    <h4>LAPORAN LOKASI</h4>
  </center>

  <?php include '../koneksi.php'; ?>
  
  <table class="table">
    <thead>
      <tr>
        <th width="1%">NO</th>
        <th>NAMA LOKASI</th>
        <th>ALAMAT</th>
        <th>TELEPON</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      include '../koneksi.php';
      $no=1;
      $data = mysqli_query($koneksi,"SELECT * FROM lokasi");
      while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['lokasi_nama']; ?></td>
        <td><?php echo $d['lokasi_alamat']; ?></td>
        <td><?php echo $d['lokasi_telepon']; ?></td>
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
$dompdf->stream("Laporan_lokasi.pdf");    
?>

</body>
</html>
