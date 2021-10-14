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
        <h4 class="page-title">Permintaan Produk</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active" aria-current="page">Permintaan Produk</li>
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
              <h4 class="card-title">Daftar Permintaan Produk</h4>
              <h6 class="card-subtitle">
                Jika jumlah produk mulai berkurang atau kosong di NICESO Padalarang, data akan diinput oleh kepala toko untuk meminta produk <br>
                harap klik button atur dan isi data tersebut.
              </h6>
        <table id="file_export" class="table datatable-select-inputs">
            <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
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
                        <td><?= $row->permintaan_jumlah;?></td>
                        <td><?= $row->permintaan_status;?></td>
                        <td><?= $row->permintaan_deskripsi;?></td>
                        <td>
                          <button type="button" class="btn btn-outline-primary btn-sm btn-edit" data-toggle="modal" data-target="#editModal" data-id="<?= $row->permintaan_id;?>" data-tanggal="<?= $row->permintaan_tanggal;?>" data-status="<?= $row->permintaan_status;?>" data-deskripsi="<?= $row->permintaan_deskripsi;?>"> <li class="fa fa-edit"></li> Atur</button>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

        </div>

        <!-- Modal Edit Product-->
        <form action="/gudang/update" method="post">
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Atur Permintaan Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                  <div class="form-group">
                      <label>Tanggal</label>
                      <input type="date" class="form-control permintaan_tanggal" name="permintaan_tanggal">
                  </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="permintaan_status" class="form-control permintaan_status">
                            <option value="Batal">Batal</option>
                            <option value="Terkirim">Terkirim</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="permintaan_deskripsi" class="form-control permintaan_deskripsi" rows="8" cols="80"></textarea>
                    </div>

                  </div>
                <div class="modal-footer">
                    <input type="hidden" name="permintaan_id" class="permintaan_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                </div>
                </div>
            </div>
            </div>
        </form>
        <!-- End Modal Edit Product-->

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
            const produk = $(this).data('produk_id');
            const jumlah = $(this).data('jumlah');
            const status = $(this).data('status');
            const deskripsi = $(this).data('deskripsi');
            // Set data to Form Edit
            $('.permintaan_id').val(id);
            $('.permintaan_tanggal').val(tanggal);
            $('.permintaan_produk').val(produk).trigger('change');
            $('.permintaan_jumlah').val(jumlah);
            $('.permintaan_status').val(status);
            $('.permintaan_deskripsi').val(deskripsi);

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
