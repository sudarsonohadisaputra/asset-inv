<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang
      <small>Data Mutasi Barang</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Mutasi Barang</h3>
          </div>
          <div class="box-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>KODE TRANSAKSI</th>
                    <th>INVENTARIS NO</th>
                    <th>SKU BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>TANGGAL TRANSAKSI</th>
                    <th>LOKASI AWAL</th>
                    <th>LOKASI AKHIR</th>
                    <th>KETERANGAN</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM mutasi");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['mu_trx_id']; ?></td>
                      <td><?php echo $d['mu_inv_id']; ?></td>
                      <td><?php echo $d['mu_brg_id']; ?></td>
                      <td><?php echo $d['mu_brg_nama']; ?></td>
                      <td><?php echo $d['mu_trx_tgl']; ?></td>
                      <td><?php echo $d['mu_lokasi_fr']; ?></td>
                      <td><?php echo $d['mu_lokasi_to']; ?></td>
                      <td><?php echo $d['mu_keterangan']; ?></td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>