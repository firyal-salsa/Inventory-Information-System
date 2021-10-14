<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/niceso1.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>NICESO Cabang Padalarang</title>

  </head>
  <body>
    <?php
      $uri = service('uri');
     ?>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
      </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
                <div class="container">
                  <div align="center">
                    <img src="../../assets/images/niceso1.ico" style="width:100px;">
                  </div>
                    <h3 class='text-center'>Masuk</h3>
                    <hr>

                    <div class="register-box-body">
                      <?php
                      //pesan validasi error
                      $errors=session()->getFlashdata('errors');
                      if (!empty($errors)) { ?>
                        <div class="alert alert-danger" role="alert">
                          <ul>
                            <?php foreach ($errors as $error) : ?>
                              <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                          </ul>
                        </div>
                      <?php }  ?>
                      <?php
                        if (session()->getFlashdata('pesan')) {
                          echo '<div class="alert alert-success" role="alert">';
                          echo session()->getFlashdata('pesan');
                          echo '</div>';
                        }
                       ?>

                      <?php
                      echo form_open('auth/cek_login');
                      ?>
                        <div class="form-group has-feedback">
                          <input type="email"  name="email" class="form-control" placeholder="Email">
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="password"  name="password" class="form-control" placeholder="Password">
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                          <div class="col-xs-8">

                          </div>
                          <!-- /.col -->
                          <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                          </div>
                          <!-- /.col -->
                        </div>
                        <?php echo form_close(); ?>

                    </div>


                </div>
            <div>
        </div>
    <div>

  </div>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script>
  window.setTimeout(function(){
    $(".alert").fadeTo(500,0).slideUp(500,function(){
      $(this).remove();
    });
  }, 3000);
</script>
</body>
</html>
