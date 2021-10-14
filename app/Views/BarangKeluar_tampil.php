<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-5 align-self-center">
        <h4 class="page-title">Barang Keluar</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Data Transaksi</a></li>
              <li class="breadcrumb-item active" aria-current="page">Barang Keluar</li>
            </ol>
          </nav>
        </div>
      </div>

    </div>
  </div>
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->

<!-- ============================================================== -->
<!-- Favicon icon -->
<link rel="icon" type="image/png"  href="../../assets/images/favicon.png">
<title>PT. Nice So Indonesia</title>
<!-- Custom CSS -->
<link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
<link href="../../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="../../dist/css/style.min.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
  <!-- ============================================================== -->


<div class="container-fluid">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">Barang Keluar</h4>
              <h6 class="card-subtitle">Barang yang sudah terjual setiap harinya di Nice So Padalarang</h6>
              <button type="button" class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i>Tambah Barang Keluar</button>
              <br> <br>
        <div class="table-responsive">
          <table id="file_export" class="table datatable-select-inputs">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Tanggal</th>
                      <th>Nama Produk</th>
                      <th>Jumlah Terjual</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
              <?php
              $no = 1;
              foreach($barangkeluar as $row):?>
                  <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row->k_tanggal_transaksi;?></td>
                      <td><?= $row->produk_nama;?></td>
                      <td><?= $row->k_jumlah_terjual;?></td>
                      <td>
                          <button type="button" class="btn btn-outline-warning btn-sm btn-edit" data-toggle="modal" data-target="#editModal" data-id="<?= $row->k_id;?>" data-tanggal="<?= $row->k_tanggal_transaksi;?>" data-produk_id="<?= $row->k_produk_id;?>" data-jumlah_terjual="<?= $row->k_jumlah_terjual;?>"> <li class="fa fa-edit"></li> Edit</button>
                          <button type="button" class="btn btn-outline-danger btn-sm btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="<?= $row->k_id;?>"> <li class="fa fa-trash"></li> Hapus</button>
                      </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
          </table>

    </div>
    <!-- Modal Add Product-->
    <form action="/barangkeluar/simpan" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penjualan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control" name="k_tanggal_transaksi">
              </div>

              <div class="form-group">
                  <label>Produk</label>
                  <select name="k_produk" class="form-control">
                      <option value="">-Pilih-</option>
                      <?php foreach($produk as $row):?>
                      <option value="<?= $row->produk_id;?>"><?= $row->produk_nama;?></option>
                      <?php endforeach;?>
                  </select>
              </div>

                <div class="form-group">
                    <label>Jumlah Terjual</label>
                    <input type="number" class="form-control" name="k_jumlah_terjual">
                </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </div>
          </div>
          </div>
      </form>
    <!-- End Modal Add Product-->

    <!-- Modal Edit Product-->
    <form action="/barangkeluar/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Barang Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control k_tanggal_transaksi" name="k_tanggal_transaksi">
              </div>

              <div class="form-group">
                  <label>Produk</label>
                  <select name="k_produk" class="form-control k_produk">
                      <option value="">-Pilih-</option>
                      <?php foreach($produk as $row):?>
                      <option value="<?= $row->produk_id;?>"><?= $row->produk_nama;?></option>
                      <?php endforeach;?>
                  </select>
              </div>

                <div class="form-group">
                    <label>Jumlah Terjual</label>
                    <input type="number" class="form-control k_jumlah_terjual" name="k_jumlah_terjual">
                </div>

              </div>
            <div class="modal-footer">
                <input type="hidden" name="k_id" class="k_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan perubahan</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->

    <!-- Modal Delete Product-->
    <form action="/barangkeluar/hapus" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Barang Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <h4>Apakah anda yakin untuk menghapus barang keluar ini?</h4>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="k_id" class="productID">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Ya</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
    </div>

    </div>
    </div>
    </div>
    </div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<!--This page plugins -->
<script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="../../dist/js/pages/datatable/datatable-api.init.js"></script>
<script>
    $(document).ready(function(){

        // get Edit Product
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const tanggal = $(this).data('tanggal');
            const produk = $(this).data('produk');
            const jumlah = $(this).data('jumlah');
            // Set data to Form Edit
            $('.k_id').val(id);
            $('.k_tanggal_transaksi').val(tanggal);
            $('.produk_id').val(produk).trigger('change');
            $('.k_jumlah_terjual').val(jumlah);
            // Call Modal Edit
            $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.productID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });

    });
</script>
<?= $this->endSection(); ?>
