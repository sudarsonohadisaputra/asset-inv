<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang Keluar
      <small>Data Barang Keluar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">

       <?php 
       if(isset($_GET['alert'])){
        if($_GET['alert'] == "lebih"){
          echo "<div class='alert alert-danger'><b>GAGAL!</b> Jumlah barang keluar terlalu besar atau melebihi stok barang yang ada.</div>";
        }
      }
      ?>


      <div class="box box-info">

        <div class="box-header">
          <h3 class="box-title">Barang Keluar</h3>

          <!--<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#modal_suplier">
           <i class="fa fa-plus"></i> &nbsp Barang Keluar Baru
         </button> -->

         

      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
              <tr>
                <th width="1%">NO</th>
                <th>KODE MUTASI</th>
                <th>INVENTARIS NO</th>
                <th>SKU</th>
                <th>NAMA BARANG</th>
                <th>TANGGAL KELUAR</th>
                <th>JUMLAH</th>
                <th>KODE LOKASI</th>
                <th>LOKASI</th>
                <th>KETERANGAN</th>
                <th width="10%">OPSI</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              include '../koneksi.php';
              $no=1;
              $data = mysqli_query($koneksi,"SELECT * FROM barang_keluar");
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['bk_id']; ?></td>
                  <td><?php echo $d['bk_inv_id']; ?></td>
                  <td><?php echo $d['bk_brg_id']; ?></td>
                  <td><?php echo $d['bk_brg_nama']; ?></td>
                  <td><?php echo $d['bk_tgl_keluar']; ?></td>
                  <td><?php echo $d['bk_jumlah_keluar']; ?></td>
                  <td><?php echo $d['bk_id_lokasi']; ?></td>
                  <td><?php echo $d['bk_nama_lokasi']; ?></td>
                  <td><?php echo $d['bk_keterangan']; ?></td>
                  <td>                        
                    <a class="btn btn-danger btn-sm" href="barang_keluar_hapus.php?id=<?php echo $d['bk_id'] ?>"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php 
              }
              ?>
            </tbody>
          </table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

        </div>
      </div>

    </div>
  </section>
</div>
</section>

</div>
<?php include 'footer.php'; ?>