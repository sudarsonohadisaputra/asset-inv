<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>


  <section class="content">

    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $barang = mysqli_query($koneksi,"SELECT * FROM barang");
            ?>
            <h3><?php echo mysqli_num_rows($barang); ?></h3>
            <p>Stock Gudang</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="barang_wh.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $barang = mysqli_query($koneksi,"SELECT * FROM barang_inv WHERE state='0'");
            ?>
            <h3><?php echo mysqli_num_rows($barang); ?></h3>
            <p>Data Barang Stock</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="barang.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <?php 
            $barang = mysqli_query($koneksi,"SELECT * FROM barang_inv where state='1' AND part='0'");
            ?>
            <h3><?php echo mysqli_num_rows($barang); ?></h3>
            <p>Data Barang Aktif</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="barang_aktif.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $bekas = mysqli_query($koneksi,"SELECT * FROM barang_inv where state='2' AND part='0'");
            ?>
            <h3><?php echo mysqli_num_rows($bekas); ?></h3>
            <p>Data Barang Bekas</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="barang_bekas.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $brgmasuk = mysqli_query($koneksi,"SELECT * FROM barang_masuk");
            ?>
            <h3><?php echo mysqli_num_rows($brgmasuk); ?></h3>
            <p>Barang Masuk</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="barang_masuk.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <?php 
            $brgkeluar= mysqli_query($koneksi,"SELECT * FROM barang_keluar");
            ?>
            <h3><?php echo mysqli_num_rows($brgkeluar); ?></h3>
            <p>Barang Keluar</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-list"></i>
          </div>
          <a href="barang_keluar.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


        <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <?php 
            $brgmutasi= mysqli_query($koneksi,"SELECT * FROM mutasi");
            ?>
            <h3><?php echo mysqli_num_rows($brgmutasi); ?></h3>
            <p>Mutasi Barang</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-list"></i>
          </div>
          <a href="mutasi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <?php 
            $sku= mysqli_query($koneksi,"SELECT * FROM barang_sku");
            ?>
            <h3><?php echo mysqli_num_rows($sku); ?></h3>
            <p>Master SKU</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-list"></i>
          </div>
          <a href="barang_sku.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <?php 
            $suplier= mysqli_query($koneksi,"SELECT * FROM suplier");
            ?>
            <h3><?php echo mysqli_num_rows($suplier); ?></h3>
            <p>Data Supplier</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-list"></i>
          </div>
          <a href="Suplier.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <?php 
            $lokasi= mysqli_query($koneksi,"SELECT * FROM lokasi");
            ?>
            <h3><?php echo mysqli_num_rows($lokasi); ?></h3>
            <p>Data Lokasi</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-list"></i>
          </div>
          <a href="lokasi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


    </div>

    <div class="row">    
      <section class="col-lg-7">

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Detail Login</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Nama</th>
                <td><?php echo $_SESSION['nama']; ?></td>
              </tr>
              <tr>
                <th>Username</th>
                <td><?php echo $_SESSION['username']; ?></td>
              </tr>
              <tr>
                <th>Level Hak Akses</th>
                <td>
                  <span class="label label-success text-uppercase"><?php echo $_SESSION['level']; ?></span>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </section>
    </div>

  </section>

</div>
<?php include 'footer.php'; ?>