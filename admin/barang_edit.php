<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang
      <small>Edit Barang</small>
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
            <h3 class="box-title">Edit Barang</h3>
            <a href="barang.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="barang_update.php" method="post">
              <?php 
              $id = $_GET['id'];              
              $data = mysqli_query($koneksi, "select * from barang_inv where inv_id='$id'");
              while($d = mysqli_fetch_array($data)){
                ?>
                <div class="form-group">
                  <label>Inventory No</label>
                  <input type="text" class="form-control" name="id" required="required"  value="<?php echo $d['inv_id'] ?>"  disabled="disabled">
                </div>

                <div class="form-group">
                  <label>SKU</label>
                  <input type="text" class="form-control" name="sku" required="required"  value="<?php echo $d['brg_id'] ?>"  disabled="disabled">
                </div>


                <div class="form-group">
                  <label>Nama</label>
                  <input type="hidden" name="inv_no" value="<?php echo $d['inv_id'] ?>">
                  <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama .." value="<?php echo $d['brg_nama'] ?>" disabled="disabled">
                </div>

                <div class="form-group">
                  <label>Spesifikasi</label>
                  <input type="text" class="form-control" name="spesifikasi" required="required" placeholder="Masukkan spesifikasi .." value="<?php echo $d['brg_spek'] ?>">
                </div>

                <div class="form-group">
                  <label>Serial No</label>
                  <input type="text" class="form-control" name="serial" required="required" placeholder="Masukkan spesifikasi .." value="<?php echo $d['serial_no'] ?>">
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" required="required" placeholder="Masukkan keterangan .." value="<?php echo $d['brg_keterangan'] ?>">
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