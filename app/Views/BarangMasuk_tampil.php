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
        <h4 class="page-title">Barang Masuk</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Data Transaksi</a></li>
              <li class="breadcrumb-item active" aria-current="page">Barang Masuk</li>
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
              <h4 class="card-title">Barang Masuk</h4>
              <h6 class="card-subtitle">Permintaan produk yang sudah memiliki status selesai, akan otomatis berada di tabel dibawah ini</h6>

        <div class="table-responsive">
        <table id="file_export" class="table datatable-select-inputs">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Satuan</th>
                    <th>Stok Tersedia</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach($permintaanproduk as $row):?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->permintaan_tanggal;?></td>
                    <td><?= $row->produk_nama;?></td>
                    <td><?= $row->produk_satuan;?></td>
                    <td><?= $row->permintaan_jumlah;?></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </tbody>

        </table>

    </div>
    </div>

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
            const nama = $(this).data('nama');
            const harga = $(this).data('harga');
            const kategori = $(this).data('kategori_id');
            const gambar = $(this).data('gambar');
            // Set data to Form Edit
            $('.permintaan_id').val(id);
            $('.produk_nama').val(nama);
            $('.produk_harga').val(harga);
            $('.produk_kategori').val(kategori).trigger('change');
            $('.produk_gambar').val(gambar);
            // Call Modal Edit
            $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.mID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });

    });
</script>
<?= $this->endSection(); ?>
