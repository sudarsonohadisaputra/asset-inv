<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang
      <small>Barang Keluar Mutasi</small>
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
            <h3 class="box-title">Barang Keluar Mutasi</h3>
            <a href="barang.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="barang_mutasi_act.php" method="post">
              <?php 
              $id = $_GET['id'];
              $data = mysqli_query($koneksi, "select * from barang_inv where inv_id='$id'");
              while($d = mysqli_fetch_array($data)){
                ?>
                <div class="form-group">
                  <label>Inventory No</label>
                  <input type="hidden" class="form-control" name="inv_no" value="<?php echo $d['inv_id'] ?>" >
                  <input type="text" class="form-control" name="invno" required="required" placeholder="Masukkan SKU .." value="<?php echo $d['inv_id'] ?>" disabled="disabled">
                </div>

                <div class="form-group">
                  <label>SKU</label>
                  <input type="hidden" class="form-control" name="sku" value="<?php echo $d['brg_id'] ?>" >
                  <input type="text" class="form-control" name="skuid" required="required" placeholder="Masukkan SKU .." value="<?php echo $d['brg_id'] ?>" disabled="disabled">
                </div>

                <div class="form-group">
                  <label>Nama</label>
                  <input type="hidden" name="id" value="<?php echo $d['barang_id'] ?>">
                  <input type="text" class="form-control" name="barang" required="required" placeholder="Masukkan Nama .." value="<?php echo $d['brg_nama'] ?>" disabled="disabled">
                </div>

                <div class="form-group">
                  <label>Serial No</label>
                  <input type="text" class="form-control" name="serial" required="required" placeholder="Masukkan Serial No .." value="<?php echo $d['serial_no'] ?>" disabled="disabled">
                </div>

                <div class="form-group">
                    <label>Tanggal Keluar</label>
                    <input type="text" class="form-control datepicker2" autocomplete="off" name="tanggal" required="required" placeholder="Masukkan Tanggal keluar ..">
                  </div>

                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" class="form-control" name="jumlah" required="required" placeholder="Masukkan jumlah .." value="1" disabled="disabled">
                </div>

                 <div class="form-group">
                    <label>Lokasi</label>
                    <select class="form-control" name="lokasi" required="required">
                      <option value=""> - Pilih Lokasi - </option>
                      <?php 
                      $lokasi = mysqli_query($koneksi,"SELECT * from lokasi");
                      while($b=mysqli_fetch_array($lokasi)){
                        ?>
                        <option value="<?php echo $b['lokasi_id']; ?>"><?php echo $b['lokasi_id']." ".$b['lokasi_nama']; ?></option>
                        <?php 
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                  <label>Approval No</label>
                  <input type="text" class="form-control" name="approval" required="required" placeholder="Masukkan Approval ..">
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