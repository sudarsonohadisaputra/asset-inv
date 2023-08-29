 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <style type="text/css" media="print">
        @page 
        {
            size: auto;   /* auto is the main current active printer page size */
            margin: 0mm;  /* this small affects the margin in the printer IMP settings */
        }

    </style>

</head>
<body>

</br>
</br>
  <center>
    <h4>Tanda Terima - Masuk Barang</h4>
    <h4>PT.Izone Indonusa - WH ASSET</h4>


  <?php include '../koneksi.php'; ?>
     <table class="" style='margin-left: 10px;margin-right: 10px;'>
      <tr>
        <th width="40%">TANGGAL</th>
        <th width="10%" class="text-center">:</th>
        <td><?php echo date("Y-m-d"); ?></td>
      </tr>
    </table>
    <br/>

     <div class="table-responsive">
      <table class="table table-bordered" style='margin-left: 10px; margin-right: 10px;'>
        <thead>
          <tr>
            <th width="1%" style='font-size:11px'></th>
            <th width="1%" style='font-size:11px'>NO</th>
            <th style='font-size:11px'>KODE MUTASI</th>
            <th style='font-size:11px'>NO INV</th>
            <th style='font-size:11px'>SKU</th>
            <th style='font-size:11px'>NAMA BARANG</th>
            <th style='font-size:11px'>SUPPLIER</th>
            <th style='font-size:11px'>SURAT JALAN</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          include '../koneksi.php';
          $no=1;
          $data = mysqli_query($koneksi,"SELECT * FROM mutasi WHERE mu_print='0'");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td style='font-size:10px'></td>
              <td style='font-size:10px'><?php echo $no++; ?></td>
              <td style='font-size:10px'><?php echo $d['mu_trx_id']; ?></td>
              <td style='font-size:10px'><?php echo $d['mu_inv_id']; ?></td>
              <td style='font-size:10px'><?php echo $d['mu_brg_id']; ?></td>
              <td style='font-size:10px'><?php echo $d['mu_brg_nama']; ?></td>
              <td style='font-size:10px'><?php echo $d['mu_lokasi_fr']; ?></td>
              <td style='font-size:10px'><?php echo $d['mu_approval']; ?></td>
            </tr>
            <?php 
          }
          ?>
        </tbody>
      </table>
    </div>

  </br>

            <form action="masuk_print_act.php" method="post">
               <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="RECEIVED" style='margin-left: 10px;'>
  </center>

<script>

  window.print();
  $(document).ready(function(){

  });
</script>

</body>
</html>
