<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Hapus Barang
      <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Yakin Ingin Destroy ?</h3>
          </div>
          <div class="box-body">
            <p>Dengan Destroy, semua data mutasi yang berhubungan dengan barang ini akan ikut dihapus.</p>
            <br/>
            <a href="barang_aktif.php" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
            <?php 
            $idd = $_GET['id'];
            ?>
            <a href="barang_aktif_destroy_act.php?id=<?php echo $idd; ?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-check"></i> &nbsp Hapus</a> 
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>