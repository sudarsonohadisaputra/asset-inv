<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang
      <small>Tambah SKU Barang Baru</small>
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
            <h3 class="box-title">Tambah SKU Baru</h3>
            <a href="barang_sku_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="barang_sku_act.php" method="post">
              <div class="form-group">
                <label>Sku</label>
                <input type="text" class="form-control" name="sku" required="required" placeholder="Masukkan SKU .." value="<?php mysql_connect('localhost','root','Iz1@dbase'); mysql_select_db('project_inventaris'); $query=mysql_query('select max(brg_id) as id from barang_sku'); $data=mysql_fetch_array($query); $kode=$data['id']; $nourut=(int) substr($kode,4,6); $nourut++; $new="BRG".sprintf("%06s", $nourut); echo $new; ?>" >
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama ..">
              </div>

              <div class="form-group">
                <label>Part Item</label></br>
                <select id="part" name="part">
                <option value="0">No</option>
                <option value="1">Yes</option>
                </select>
              </div>

              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" placeholder="Masukkan keterangan ..">
              </div>

              

              <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
              </div>
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>