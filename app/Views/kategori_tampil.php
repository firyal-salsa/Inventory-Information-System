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
        <h4 class="page-title">kategori</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Data Produk</a></li>
              <li class="breadcrumb-item active" aria-current="page">Kategori</li>
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
              <h4 class="card-title">Daftar Kategori</h4>
              <h6 class="card-subtitle">Buat kategori dari produk yang ada di toko Nice So cabang Padalarang</h6>

                <button type="button" class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i>Tambah Kategori</button>
                  <br> <br>
                <div class="table-responsive">
                    <table id="zero_config" class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php
                         $no = 1;
                        foreach($kategori as $row):?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->kategori_nama;?></td>
                                <td>
                                    <a href="#" class="btn btn-outline-warning btn-sm btn-edit" data-id="<?= $row->kategori_id;?>" data-name="<?= $row->kategori_nama;?>" > <li class="fa fa-edit"></li> Edit</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm btn-delete" data-id="<?= $row->kategori_id;?>"> <li class="fa fa-trash"></li> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>

                </div>
                </div>

                <!-- Modal Add Category-->
                <form action="/kategori/simpan" method="post">
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" class="form-control" name="kategori_nama" placeholder="Masukan nama kategori produk..">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan dan tutup</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
                <!-- End Modal Add Category-->

                <!-- Modal Edit Category-->
                <form action="/kategori/update" method="post">
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" class="form-control kategori_nama" name="kategori_nama">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="kategori_id" class="kategori_id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
                <!-- End Modal Edit Category-->

                <!-- Modal Delete Category-->
                <form action="/kategori/hapus" method="post">
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <h4>Apakah kamu yakin untuk menghapus kategori ini?</h4>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="kategori_id" class="categoryID">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
                <!-- End Modal Delete Category-->
            </div>
            </div>
            </div>
            </div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<!--This page plugins -->
<script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="../../dist/js/pages/datatable/datatable-basic.init.js"></script>
<script>
    $(document).ready(function(){

        // get Edit Category
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            // Set data to Form Edit
            $('.kategori_id').val(id);
            $('.kategori_nama').val(nama);
            // Call Modal Edit
            $('#editModal').modal('show');
        });

        // get Delete Category
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.categoryID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });

    });
</script>
<?= $this->endSection(); ?>
