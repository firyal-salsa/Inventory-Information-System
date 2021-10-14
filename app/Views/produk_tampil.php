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
        <h4 class="page-title">Produk</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Data Produk</a></li>
              <li class="breadcrumb-item active" aria-current="page">Produk</li>
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
              <h4 class="card-title">Daftar Produk</h4>
              <h6 class="card-subtitle">Kelola data produk disni yang ada di toko Nice So cabang Padalarang</h6>


        <button type="button" class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i>Tambah Produk</button>
        <br> <br>
        <div class="table-responsive">
            <table id="zero_config" class="table">
            <thead>
                <tr>
                  <th>No.</th>
                  <th>SKU</th>
                  <th>Gambar</th>
                  <th>Nama Produk</th>
                  <th>Rak</th>
                  <th>Kategori</th>
                  <th>Satuan</th>
                  <th>Aksi</th>
                </tr>
            </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach($produk as $row):?>
                      <tr>
                        </td>
                          <td><?= $no++; ?></td>
                          <td><?= $row->produk_sku;?></td>
                          <td><img src="../../assets/images/product/<?= $row->produk_gambar;?>" style="width:100px;height:150px;"></td>
                          <td><?= $row->produk_nama;?></td>
                          <td><?= $row->produk_rak;?></td>
                          <td><?= $row->kategori_nama;?></td>
                          <td><?= $row->produk_satuan;?></td>
                            <td>
                                <button type="button" class="btn btn-outline-warning btn-sm btn-edit" data-toggle="modal" data-target="#editModal" data-id="<?= $row->produk_id;?>" data-name="<?= $row->produk_nama;?>" data-kategori_id="<?= $row->produk_kategori_id;?>"> <li class="fa fa-edit"></li> Edit</button>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="<?= $row->produk_id;?>"> <li class="fa fa-trash"></li> Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

        </div>
        </div>

      </div>
        <!-- Modal Add Product-->
        <form action="/produk/simpan" method="post">
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                  <div class="form-group">
                      <label>SKU</label>
                      <input type="text" class="form-control"  name="produk_sku" placeholder="Masukan sku produk...">
                  </div>

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="produk_nama" placeholder="Masukan nama produk...">
                    </div>

                    <div class="form-group">
                        <label>Lokasi / Nomor Rak</label>
                        <input type="number" class="form-control" name="produk_rak" min="0">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="produk_kategori" class="form-control">
                            <option value="">-Pilih-</option>
                            <?php foreach($kategori as $row):?>
                            <option value="<?= $row->kategori_id;?>"><?= $row->kategori_nama;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Satuan</label>
                        <select name="produk_satuan" class="form-control">
                            <option value="">-Pilih-</option>
                            <option value="pcs">pcs</option>
                            <option value="set">set</option>
                            <option value="buah">buah</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="produk_gambar" value="">
                            <label class="custom-file-label" for="customFile">Pilih Gambar..</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" >Simpan</button>
                </div>
                </div>
            </div>
            </div>
        </form>
        <!-- End Modal Add Product-->

        <!-- Modal Edit Product-->
        <form action="/produk/update" method="post">
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                  <div class="form-group">
                      <label>SKU</label>
                      <input type="text" class="form-control produk_sku" name="produk_sku">
                  </div>

                    <div class="form-group">
                        <label>Produk Nama</label>
                        <input type="text" class="form-control produk_nama" name="produk_nama">
                    </div>

                    <div class="form-group">
                        <label>Lokasi / Nomor Rak</label>
                        <input type="number" class="form-control produk_rak" name="produk_rak" min="0">
                    </div>


                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="produk_kategori" class="form-control produk_kategori">
                            <option value="">-Pilih-</option>
                            <?php foreach($kategori as $row):?>
                            <option value="<?= $row->kategori_id;?>"><?= $row->kategori_nama;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Satuan</label>
                        <select name="produk_satuan" class="form-control produk_satuan">
                            <option value="">-Pilih-</option>
                            <option value="pcs">pcs</option>
                            <option value="set">set</option>
                            <option value="buah">buah</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="produk_gambar" value="">
                            <label class="custom-file-label" for="customFile">Pilih Gambar..</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="produk_id" class="produk_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                </div>
                </div>
            </div>
            </div>
        </form>
        <!-- End Modal Edit Product-->

        <!-- Modal Delete Product-->
        <form action="/produk/hapus" method="post">
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <h4>Apakah kamu yakin untuk menghapus produk ini?</h4>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="produk_id" class="productID">
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
  <script src="../../dist/js/pages/datatable/datatable-basic.init.js"></script>
<script>
    $(document).ready(function(){

      // get Edit Product
      $('.btn-edit').on('click',function(){
          // get data from button edit
          const id = $(this).data('id');
          const sku = $(this).data('sku');
          const nama = $(this).data('nama');
          const rak = $(this).data('rak');
          const kategori = $(this).data('kategori_id');
          const satuan = $(this).data('satuan');
          const harga = $(this).data('harga');
          const gambar = $(this).data('gambar');

          // Set data to Form Edit
          $('.produk_id').val(id);
          $('.produk_sku').val(sku);
          $('.produk_nama').val(nama);
          $('.produk_rak').val(rak);
          $('.produk_kategori').val(kategori).trigger('change');
          $('.produk_satuan').val(satuan);
          $('.produk_harga').val(harga);
          $('.produk_gambar').val(gambar);

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
