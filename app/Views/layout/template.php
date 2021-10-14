<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
  <link href="../../assets/libs/footable/css/footable.bootstrap.min.css" rel="stylesheet">
  <title>NICESO Cabang Padalarang</title>
  <!-- This page plugin CSS -->
  <link href="../../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/libs/select2/dist/css/select2.min.css">
  <!-- Custom CSS -->
  <link href="../../dist/css/style.min.css" rel="stylesheet">
  <script src="<?= base_url() ?>/chart/dist/Chart.min.js"></script>
  <script src="<?= base_url() ?>/chart/test/utils.js"></script>
  <script src="<?= base_url() ?>/chart/samples/utils.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/dataTableStyles.css" />
<!---Load the CSS to be used by the jQuery UI Datepicker--->
<link type="text/css" href="../../assets/jquery-ui-1.8.4.custom/css/blitzer/jquery-ui-1.8.4.custom.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../assets/css/demoStyles.css" />
<!---Load the styles for the table.  This stylesheet points to the images used in the table controls--->
<link rel="stylesheet" type="text/css" href="../../assets/css/dataTableStyles.css" />
<!---Load the CSS to be used by the jQuery UI Datepicker--->
<link type="text/css" href="../../assets/jquery-ui-1.8.4.custom/css/blitzer/jquery-ui-1.8.4.custom.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../../assets/css/demoStyles.css" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style media="screen">
canvas{
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
}
</style>
</head>
<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="#">
              <!-- Logo icon -->
              <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="../../assets/images/niceso1.ico" alt="homepage" class="dark-logo" style="width:50px;"/>
                <!-- Light Logo icon -->
                <img src="../../assets/images/logo-light-icon.png" sizes="10x10" alt="homepage" class="light-logo" />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text">
                <!-- dark Logo text -->
                <img src="../../assets/images/logo--text.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo text -->
                <img src="../../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
              </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation"><i class="ti-more"></i></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">
              <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
              <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <p class='ucapan'>Selamat Datang, <?= session()->get('nama_user') ?>! (<?php if (session()->get('level')==1){
                echo 'Kepala toko';
              } else if (session()->get('level')==2){
                echo 'Pegawai gudang';
              } else {
                echo 'Manajer Penjualan';
              }
              ?>)</p>
              <li class="nav-item dropdown">
                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                  <span class="with-arrow"><span class="bg-primary"></span></span>
                  <div class="d-flex no-block align-items-center p-15 bg-primary text-white mb-2">
                    <div class=""><img src="<?= base_url('foto/'.session()->get('foto_user')) ?>" alt="user" class="img-circle" width="60"></div>
                    <div class="ml-2">
                      <h4 class="mb-0"><?= session()->get('nama_user'); ?></h4>
                      <p class=" mb-0">
                        <?php if (session()->get('level')==1){
                          echo 'Kepala toko';
                        } else if (session()->get('level')==2){
                          echo 'Pegawai gudang';
                        } else {
                          echo 'Manajer Penjualan';
                        }
                        ?>
                      </p>
                    </div>
                  </div>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href"<?= base_url('auth/login') ?>"><i class="fa fa-power-off mr-1 ml-1"></i> Keluar</a>
                  <div class="dropdown-divider"></div>
                </div>
              </li>
              <p id="p"></p>
              <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('foto/'.session()->get('foto_user')) ?>" alt="user" class="rounded-circle"
                  width="31"></a>
              <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                <span class="with-arrow"><span class="bg-primary"></span></span>
                <div class="d-flex no-block align-items-center p-15 bg-primary text-white mb-2">
                  <div class=""><img src="<?= base_url('foto/'.session()->get('foto_user')) ?>" alt="user" class="img-circle" width="60"></div>
                  <div class="ml-2">
                    <h4 class="mb-0"><?= session()->get('nama_user') ?></h4>
                    <p class=" mb-0">
                      <?php if (session()->get('level')==1){
                        echo 'Kepala toko';
                      } else if (session()->get('level')==2){
                        echo 'Pegawai gudang';
                      } else {
                        echo 'Manajer Penjualan';
                      }
                      ?>
                    </p>
                  </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('auth/logout')?>"><i class="fa fa-power-off mr-1 ml-1"></i> Keluar</a>
                <div class="dropdown-divider"></div>
              </div>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            </ul>
          </div>
        </nav>
      </header>
<!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav">
            <!-- User Profile-->
            <li>
            </li>
            <?php if(session()->get('level')==1) { ?>
            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/beranda" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda </span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-bookmark-plus-outline"></i><span class="hide-menu">Data Produk</span></a>
              <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item"><a href="<?= base_url('kategori')?>" class="sidebar-link"><i class="mdi mdi-book-multiple"></i><span class="hide-menu"> Kategori </span></a></li>
                <li class="sidebar-item"><a href="/produk" class="sidebar-link"><i class="mdi mdi-book-plus"></i><span class="hide-menu"> Produk </span></a></li>
              </ul>
            </li>
            <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/permintaanproduk" aria-expanded="false"><i class="mdi mdi-alert-box"></i><span class="hide-menu">Permintaan Produk</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-loop"></i><span class="hide-menu">Data Transaksi</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/barangmasuk" aria-expanded="false"><i class="fas fa-long-arrow-alt-left"></i><span class="hide-menu">Barang Masuk</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/barangkeluar" aria-expanded="false"><i class=" fas fa-long-arrow-alt-right"></i><span class="hide-menu">Barang Keluar </span></a></li>
            </ul>
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-line"></i><span class="hide-menu">Laporan</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/laporanbarangmasuk" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Laporan Barang Masuk</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/laporanbarangkeluar" aria-expanded="false"><i class="mdi mdi-chart-histogram"></i><span class="hide-menu">Laporan Barang Keluar</span></a></li>
            <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/laporanstok" aria-expanded="false"><i class="mdi mdi-chart-areaspline"></i><span class="hide-menu">Laporan Stok</span></a></li>
            </ul>
            <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/pengguna" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Daftar Pengguna</span></a></li>
            <?php } ?>
            <?php if(session()->get('level')==2) { ?>
              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/beranda" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda </span></a></li>
              <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/gudang" aria-expanded="false"><i class="mdi mdi-alert-box"></i><span class="hide-menu">Permintaan Produk</span></a></li>
            <?php } ?>
            <?php if(session()->get('level')==3) { ?>
              <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/beranda" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda </span></a></li>
              <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-bookmark-plus-outline"></i><span class="hide-menu">Data Transaksi</span></a>
              <ul aria-expanded="false" class="collapse  first-level">
              <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/barangmasuk" aria-expanded="false"><i class="mdi mdi-tune-vertical"></i><span class="hide-menu">Barang Masuk</span></a></li>
              <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/brgkeluar" aria-expanded="false"><i class="mdi mdi-content-copy"></i><span class="hide-menu">Barang Keluar </span></a></li>
              </ul>
              <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-line"></i><span class="hide-menu">Laporan</span></a>
              <ul aria-expanded="false" class="collapse  first-level">
              <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/laporanbarangmasuk" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Laporan Barang Masuk</span></a></li>
              <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/laporanbarangkeluar" aria-expanded="false"><i class="mdi mdi-chart-histogram"></i><span class="hide-menu">Laporan Barang Keluar</span></a></li>
              <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/laporanstok" aria-expanded="false"><i class="mdi mdi-chart-areaspline"></i><span class="hide-menu">Laporan Stok</span></a></li>
              </ul>
              <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark sidebar-link" href="/pengguna" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Daftar Pengguna</span></a></li>
              <?php } ?>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->

            <?= $this->renderSection('content'); ?>

            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a>
        <div class="customizer-body">
            <ul class="nav customizer-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="mdi mdi-wrench font-20"></i></a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="p-15 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-medium mb-2 mt-2">Pengaturan Tata Letak Template</h5>
                        <div class="custom-control custom-checkbox mt-2">
                            <input type="checkbox" class="custom-control-input" name="theme-view" id="theme-view">
                            <label class="custom-control-label" for="theme-view">Tema Gelap (Redup)</label>
                        </div>
                        <div class="custom-control custom-checkbox mt-2">
                            <input type="checkbox" class="custom-control-input sidebartoggler" name="collapssidebar" id="collapssidebar">
                            <label class="custom-control-label" for="collapssidebar">Tutup Navigasi</label>
                        </div>
                        <div class="custom-control custom-checkbox mt-2">
                            <input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
                            <label class="custom-control-label" for="boxed-layout">Persempit Tata Letak</label>
                        </div>
                    </div>
                </div>
                <!-- End Tab 1 -->
            </div>
        </div>
    </aside>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!---Load jQuery--->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <!---Load a custom jQuery UI script to power the Datepicker widget--->
    <script type="text/javascript" src="../../assets/jquery-ui-1.8.4.custom/js/jquery-ui-1.8.4.custom.min.js"></script>
    <!---Load the dataTables jQuery plugin--->
    <script type="text/javascript" src="../../assets/DataTables-1.7.4/media/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../../dist/js/app.min.js"></script>
    <script src="../../dist/js/app.init.js"></script>
    <script src="../../dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../../dist/js/pages/forms/select2/select2.init.js"></script>
    <script src="../../dist/js/pages/dashboards/dashboard1.js"></script>
    <script src="../../assets/libs/moment/moment.js" type="text/javascript"></script>
    <script src="../../assets/libs/footable/js/footable.min.js"></script>
    <script src="../../dist/js/pages/tables/footable-init.js"></script>
    <script src="../../dist/js/pages/samplepages/jquery.PrintArea.js"></script>

    <!---Load jQuery--->
    <!---Load a custom jQuery UI script to power the Datepicker widget--->
    <script type="text/javascript" src="../../assets/jquery-ui-1.8.4.custom/js/jquery-ui-1.8.4.custom.min.js"></script>
    <!---Load the dataTables jQuery plugin--->
    <script type="text/javascript" src="../../assets/DataTables-1.7.4/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>

</body>

</html>
