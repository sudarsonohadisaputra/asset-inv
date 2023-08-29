 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">


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
    <h4>Data Barang Aktif</h4>
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
                    <th width="1%">NO</th>
                    <th>INVENTORY NO</th>
                    <th>SKU</th>
                    <th>NAMA</th>
                    <th>SPESIFIKASI</th>
                    <th>SERIAL NO</th>
                    <th>LOKASI</th>                    
                    <th>KETERANGAN</th>
          </tr>
        </thead>
        <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM barang_inv where state='1' AND part='0'");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['inv_id']; ?></td>
                      <td><?php echo $d['brg_id']; ?></td>
                      <td><?php echo $d['brg_nama']; ?></td>
                      <td><?php echo $d['brg_spek']; ?></td>
                      <td><?php echo $d['serial_no']; ?></td>
                      <td><?php $inv=$d['inv_id'];
                       $lokasi = mysqli_query($koneksi,"SELECT * FROM mutasi where mu_inv_id='$inv' order by mu_post_time DESC LIMIT 1");
                      $lok = mysqli_fetch_assoc($lokasi); 
                      echo $lok['mu_lokasi_to']; ?>
                      </td>
                      <td><?php echo $d['brg_keterangan']; ?></td>
            </tr>
            <?php 
          }
          ?>
        </tbody>
      </table>
    </div>

  </br>

  </center>



</body>
</html>
