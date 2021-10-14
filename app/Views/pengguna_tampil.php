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
        <h4 class="page-title">Daftar Pengguna</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active" aria-current="page">Daftar Pengguna</li>
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
              <h4 class="card-title">Daftar Pengguna</h4>
              <h6 class="card-subtitle">Daftar pengguna web ini beserta data personal</h6>
        <div class="table-responsive">
          <table id="zero_config" class="table">
            <thead>
              <tr>
                <th>No. </th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>No. Telepon</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
              foreach($tbl_user as $key =>$value) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><img src="../../assets/images/users/<?= $value['foto_user'];?>" alt="user" class="rounded-circle" width="30" /><?= $value['nama_user']; ?></td>
                <td><?= $value['jabatan']; ?></td>
                <td><?= $value['no_hp']; ?></td>
              </tr>
            <?php } ?>
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
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<!--This page plugins -->
<script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="../../dist/js/pages/datatable/datatable-basic.init.js"></script>

<?= $this->endSection(); ?>
