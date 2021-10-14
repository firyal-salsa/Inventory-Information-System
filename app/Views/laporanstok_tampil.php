<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title"> <?=  $title; ?> </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"> <?=  $title; ?> </li>
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
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <h3><b>Laporan Stok</b> <span class="pull-right">#</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">NICESO Padalarang</b></h3>
                                    <p class="text-muted ml-1">Jalan Raya Padalarang No. 40,
                                        <br/> Desa Kertamulya,
                                        <br/> Kecamatan Padalarang,
                                        <br/> Kabupaten Bandung Barat</p>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive mt-5" style="clear: both;">
                                <table id="file_export" class="table datatable-select-inputs">
                                    <thead>
                                        <tr>
                                          <th>No. </th>
                                          <th>SKU</th>
                                          <th>Nama Barang</th>
                                          <th>Satuan</th>
                                          <th>Stok Masuk</th>
                                          <th>Stok Keluar</th>
                                          <th>Sisa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no = 1;
                                      foreach($permintaanproduk as $row):?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->produk_sku;?></td>
                                            <td><?= $row->produk_nama;?></td>
                                            <td><?= $row->produk_satuan;?></td>
                                            <td><?= $row->permintaan_jumlah;?></td>
                                            <td><?= $row->k_jumlah_terjual;?></td>
                                            <td><?= $row->permintaan_jumlah-$row->k_jumlah_terjual;?></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <div class="text-right">
                                <button id="print" class="btn btn-purple btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">

      <script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
      <!-- start - This is for export functionality only -->
      <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
      <script src="../../dist/js/pages/datatable/datatable-advanced.init.js"></script>\
      <script src="/js/jquery.min.js"></script>
      <script src="/js/bootstrap.bundle.min.js"></script>
      <!--This page plugins -->
      <script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
      <script src="../../dist/js/pages/datatable/datatable-api.init.js"></script>

<?= $this->endSection(); ?>
