<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Suplier
      <small>Data Lokasi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-10 col-lg-offset-1">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Lokasi</h3>             
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_suplier">
               <i class="fa fa-plus"></i> &nbsp Tambah Lokasi Baru
             </button>
              <a href="lokasi_pdf.php" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp CETAK PDF</a>
              <a href="lokasi_print.php" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
            </div>

           <!-- The Modal -->
           <div class="modal" id="modal_suplier">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Lokasi Baru</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form action="lokasi_act.php" method="post">

                    <div class="form-group">
                      <label>Kode Lokasi</label>
                      <input type="text" class="form-control" name="kode" required="required" placeholder="Masukkan Nama Lokasi..">
                    </div>

                    <div class="form-group">
                      <label>Nama Lokasi</label>
                      <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama Lokasi..">
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat" placeholder="Masukkan Nomor Alamat .."></textarea>
                    </div>

                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" class="form-control" name="telepon" placeholder="Masukkan Nomor Telepon ..">
                    </div>

                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                      <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
              <thead>
                <tr>
                  <th width="1%">NO</th>
                  <th>KODE LOKASI</th>
                  <th>NAMA LOKASI</th>
                  <th>ALAMAT</th>
                  <th>TELEPON</th>
                  <th width="10%">OPSI</th>
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
                    <td><?php echo $d['lokasi_id']; ?></td>
                    <td><?php echo $d['lokasi_nama']; ?></td>
                    <td><?php echo $d['lokasi_alamat']; ?></td>
                    <td><?php echo $d['lokasi_telepon']; ?></td>
                    <td>           
                      <a class="btn btn-warning btn-sm" href="lokasi_edit.php?id=<?php echo $d['lokasi_id'] ?>"><i class="fa fa-cog"></i></a>
                      <a class="btn btn-danger btn-sm" href="lokasi_hapus.php?id=<?php echo $d['lokasi_id'] ?>"><i class="fa fa-trash"></i></a>
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