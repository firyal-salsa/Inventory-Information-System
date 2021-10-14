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

        <div class="table-responsive">
          <table id="file_export" class="table datatable-select-inputs">
              <thead>
                  <tr>
                      <th>Tanggal</th>
                      <th>Nama Produk</th>
                      <th>Jumlah Terjual</th>
                  </tr>
              </thead>
              <tbody>
              <?php foreach($barangkeluar as $row):?>
                  <tr>
                      <td><?= $row->k_tanggal_transaksi;?></td>
                      <td><?= $row->produk_nama;?></td>
                      <td><?= $row->k_jumlah_terjual;?></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
          </table>

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

<?= $this->endSection(); ?>
