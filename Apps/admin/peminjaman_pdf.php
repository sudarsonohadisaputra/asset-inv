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
    <h4>LAPORAN PEMINJAMAN</h4>
    <h4>Sistem Informasi Inventaris Sarana & Prasarana</h4>
  </center>

  <?php include '../koneksi.php'; ?>
  
  <table class="table table-bordered table-striped" id="table-datatable">
    <thead>
      <tr>
        <th width="1%">NO</th>
        <th>NAMA</th>
        <th>BARANG</th>
        <th>JUMLAH</th>
        <th>KONDISI</th>
        <th>TGL.PINJAM</th>
        <th>TGL.KEMBALI</th>
        <th>STATUS</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      include '../koneksi.php';
      $no=1;
      $data = mysqli_query($koneksi,"SELECT * FROM pinjam,barang where pinjam_barang=barang_id");
      while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $d['pinjam_peminjam']; ?></td>
          <td><?php echo $d['barang_nama']; ?></td>
          <td><?php echo $d['pinjam_jumlah']; ?></td>
          <td><?php echo $d['pinjam_kondisi']; ?></td>
          <td><?php echo $d['pinjam_tgl_pinjam']; ?></td>
          <td><?php echo $d['pinjam_tgl_kembali']; ?></td>
          <td>
            <?php 
            if($d['pinjam_status'] == "Dikembalikan"){
              echo "Di Kembalikan";
            }elseif($d['pinjam_status'] == "Dipinjam"){
              echo "Di Pinjam";
            }
            ?>

          </td>
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
  $dompdf->stream("Laporan_peminjaman.pdf");    
  ?>

</body>
</html>
