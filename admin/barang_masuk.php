<?php include 'header.php'; ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
</head>
<body>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang Masuk
      <small>Data Barang Masuk</small>
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
            <h3 class="box-title"><a href="masuk_print.php" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT RECEIVE</a></h3>
            
            <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#modal_suplier">
             <i class="fa fa-plus"></i> &nbsp Barang Masuk Baru
           </button>



           <!-- The Modal -->
           <div class="modal" id="modal_suplier">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Barang Masuk Baru</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form action="barang_masuk_act.php" method="post">

                    <div class="form-group">
                      <label>Barang</label>
                      <select class="form-control" name="barang" required="required">
                        <option value=""> - Pilih Barang - </option>
                        <?php 
                        $barang = mysqli_query($koneksi,"SELECT * from barang_sku order by brg_nama ASC");
                        while($b=mysqli_fetch_array($barang)){
                          ?>
                          <option value="<?php echo $b['brg_id']; ?>"><?php echo $b['brg_nama']; ?></option>
                          <?php 
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Spesifikasi</label>
                      <input type="text" class="form-control" name="spek" required="required" placeholder="Masukkan Spesifikasi ..">
                    </div>

                    <div class="form-group">
                      <label>Tanggal Masuk</label>
                      <input type="text" class="form-control datepicker2" autocomplete="off" name="tanggal" required="required" placeholder="Masukkan Tanggal Masuk ..">
                    </div>

                    <div class="form-group">
                      <label>Jumlah</label>
                      <input type="number" class="form-control" name="jumlah" required="required" placeholder="Masukkan Jumlah ..">
                    </div>

                    <div class="form-group">
                      <label>Suplier</label>
                      <select class="form-control" name="suplier" >
                        <option value=""> - Pilih Suplier - </option>
                        <?php 
                        $suplier = mysqli_query($koneksi,"SELECT * from suplier");
                        while($s=mysqli_fetch_array($suplier)){
                          ?>
                          <option value="<?php echo $s['suplier_id']; ?>"><?php echo $s['suplier_nama']; ?></option>
                          <?php 
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Surat Jalan</label>
                      <input type="text" class="form-control" name="surat" required="required" placeholder="Masukkan Surat Jalan..">
                    </div>

                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan ..">
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
                  <th>KODE MUTASI</th>
                  <th>SKU BARANG</th>
                  <th>NAMA BARANG</th>
                  <th>SPESIFIKASI BARANG</th>
                  <th>TANGGAL MASUK</th>
                  <th>JUMLAH</th>
                  <th>NAMA SUPLIER</th>
                  <th>NO SJ</th>
                  <th>KETERANGAN</th>
                  <th width="10%">OPSI</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                include '../koneksi.php';
                $no=1;
                $data = mysqli_query($koneksi,"SELECT * FROM barang_masuk");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['bm_id']; ?></td>
                    <td><?php echo $d['bm_brg_id']; ?></td>
                    <td><?php echo $d['bm_brg_nama']; ?></td>
                    <td><?php echo $d['bm_brg_spek']; ?></td>
                    <td><?php echo $d['bm_tgl_masuk']; ?></td>
                    <td><?php echo $d['bm_jumlah']; ?></td>
                    <td><?php echo $d['bm_nama_suplier']; ?></td>
                    <td><?php echo $d['bm_sj']; ?></td>
                    <td><?php echo $d['bm_keterangan']; ?></td>
                    <td>                        
                      <!-- <a class="btn btn-warning btn-sm" href="barang_masuk_edit.php?id=<?php echo $d['bm_id'] ?>"><i class="fa fa-cog"></i></a> -->
                      <a class="btn btn-danger btn-sm" href="barang_masuk_hapus.php?id=<?php echo $d['bm_id'] ?>"><i class="fa fa-trash"></i></a>
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

</body>
</html>