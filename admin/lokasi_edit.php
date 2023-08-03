<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Lokasi
      <small>Edit Lokasi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6 col-lg-offset-3">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Edit Lokasi</h3>
            <a href="lokasi.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="lokasi_update.php" method="post">
              <?php 
              $id_lokasi = $_GET['id'];
              $lokasi = mysqli_query($koneksi,"SELECT * FROM lokasi WHERE lokasi_id='$id_lokasi'");
              while($s=mysqli_fetch_array($lokasi)){
                ?>
                <div class="form-group">
                  <label>Nama Lokasi</label>
                  <input type="hidden" name="id" value="<?php echo $s['lokasi_id'] ?>">
                  <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama Lokasi.." value="<?php echo $s['lokasi_nama'] ?>">
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" required="required" placeholder="Masukkan Nomor Alamat .."><?php echo $s['lokasi_alamat'] ?></textarea>
                </div>

                <div class="form-group">
                  <label>Telepon</label>
                  <input type="number" class="form-control" name="telepon" required="required" placeholder="Masukkan Nomor Telepon .." value="<?php echo $s['lokasi_telepon'] ?>">
                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                </div>
                <?php 
              }
              ?>
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>