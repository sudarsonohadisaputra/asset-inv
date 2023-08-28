<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang Reusable
      <small>Data Barang Reusable</small>
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
            <h3 class="box-title">Barang Reusable</h3>

          </div>
          <div class="box-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>SKU</th>
                    <th>INVENTORI NO</th>
                    <th>NAMA</th>
                    <th>SPESIFIKASI</th>
                    <th>JUMLAH</th>
                    <th>KETERANGAN</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM barang_ex");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['barang_id']; ?></td>
                      <td><?php echo $d['bk_id']; ?></td>
                      <td><?php echo $d['barang_nama']; ?></td>
                      <td><?php echo $d['barang_spesifikasi']; ?></td>
                      <td><?php echo $d['barang_ex_jumlah']; ?></td>
                      <td><?php echo $d['barang_keterangan']; ?></td>

                      <td>                        
                        <a class="btn btn-warning btn-sm" href="barang_edit.php?id=<?php echo $d['barang_id'] ?>"><i class="fa fa-cog"></i></a>
                        <a class="btn btn-danger btn-sm" href="barang_hapus_konfir_ex.php?id=<?php echo $d['bk_id'] ?>"><i class="fa fa-trash"></i></a>
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