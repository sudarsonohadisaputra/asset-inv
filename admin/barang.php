<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang
      <small>Data Barang Stock</small>
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
            <h3 class="box-title">Barang</h3>
          </div>
          <div class="box-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>INVENTORY NO</th>
                    <th>SKU</th>
                    <th>NAMA</th>
                    <th>SPESIFIKASI</th>
                    <th>SERIAL NO</th>
                    <th>TANGGAL MASUK</th>
                    <th>KETERANGAN</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM barang_inv where state='0'");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['inv_id']; ?></td>
                      <td><?php echo $d['brg_id']; ?></td>
                      <td><?php echo $d['brg_nama']; ?></td>
                      <td><?php echo $d['brg_spek']; ?></td>
                      <td><?php echo $d['serial_no']; ?></td>
                      <td><?php echo $d['brg_tanggal']; ?></td>
                      <td><?php echo $d['brg_keterangan']; ?></td>

                      <td>
                      <a class="btn btn-warning btn-sm" href="barang_edit.php?id=<?php echo $d['inv_id'] ?>"><i class="fa fa-cog"></i></a>                        
                        <a class="btn btn-warning btn-sm" href="barang_keluar_baru.php?id=<?php echo $d['inv_id'] ?>"><i class="fa fa-play"></i></a>
                      </td>
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