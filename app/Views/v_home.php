<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-5 align-self-center">
            <h4 class="page-title">Beranda</h4>
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
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="d-md-flex align-items-center">
                  <div>
                    <h4 class="card-title">Persediaan Barang</h4>
                  </div>
                </div>
                <div class="row">
                  <!-- column -->
                  <div class="col-lg-4">
                  <address>
                                    <h3> &nbsp;<b class="text-danger">NICESO Padalarang</b></h3>
                                    <p class="text-muted ml-1">Jalan Raya Padalarang No. 40,
                                        <br/> Desa Kertamulya,
                                        <br/> Kecamatan Padalarang,
                                        <br/> Kabupaten Bandung Barat</p>
                                </address>
                  </div>
                  <!-- column -->

                    <?php

                    foreach ($grafik as $key => $value) {
                      $thn[]= $value['bulan'];
                      $jumlah[]= $value['masuk'];
                      $keluar[]= $value['keluar'];
                    }
                   ?>

                  <canvas id="myChart"  height="100">
                    <script>
                  var ctx = document.getElementById('myChart');
                  var myChart = new Chart(ctx, {
                      type: 'line',
                      data: {
                          labels: <?php echo json_encode($thn) ?>,
                          datasets: [{
                              label: 'Barang Masuk',
                              data: <?php echo json_encode($jumlah) ?>,
                              backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(255, 99, 132, 1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                              ],
                              borderWidth: 1
                          }]
                      },
                      data: {
                          labels: <?php echo json_encode($thn) ?>,
                          datasets: [{
                              label: 'Barang kELUAR',
                              data: <?php echo json_encode($keluar) ?>,
                              backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(255, 99, 132, 1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                              ],
                              borderWidth: 1
                          }]
                      },
                      options: {
                          scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero: true
                                  }
                              }]
                          }
                      }
                  });
</script>
</canvas>

         
                  <!-- column -->
                </div>
              </div>
              <!-- ============================================================== -->
              <!-- Info Box -->
              <!-- ============================================================== -->
              <div class="card-body border-top">
                <div class="row mb-0">
                  <!-- col -->
                  <div class="col-lg-3 col-md-6">
                    <div class="d-flex align-items-center">
                      <div class="mr-2"><span class="text-success display-5"><i class="mdi mdi-book-plus"></i></span></div>
                      <div><span>Kategori</span>
                        <h3 class="font-medium mb-0">100</h3>
                      </div>
                    </div>
                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-md-6">
                    <div class="d-flex align-items-center">
                      <div class="mr-2"><span class="text-cyan display-5"><i class="mdi mdi-library-plus"></i></span></div>
                      <div><span>Produk</span>
                        <h3 class="font-medium mb-0">100</h3>
                      </div>
                    </div>
                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-md-6">
                    <div class="d-flex align-items-center">
                      <div class="mr-2"><span class="text-info display-5"><i class="mdi mdi-briefcase-download"></i></span></div>
                      <div><span>Barang Masuk</span>
                        <h3 class="font-medium mb-0">201</h3>
                      </div>
                    </div>
                  </div>
                  <!-- col -->
                  <!-- col -->
                  <div class="col-lg-3 col-md-6">
                    <div class="d-flex align-items-center">
                      <div class="mr-2"><span class="text-danger display-5"><i class="mdi mdi-briefcase-upload"></i></span></div>
                      <div><span>Barang Keluar</span>
                        <h3 class="font-medium mb-0">201</h3>
                      </div>
                    </div>
                  </div>
                  <!-- col -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
    </div>
<?= $this->endSection(); ?>
