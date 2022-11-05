<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Icon -->
  <link rel="icon" type="image/png" href="<?= base_url(); ?>/img/logo/16.png">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    .body-background {
      background-image: url(<?= Base_url('/img/bg_6.jpg'); ?> );
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<body class="hold-transition login-page body-background">
  <div class="login-box">

    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <?php if (session()->getFlashdata('gagal')) : ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('gagal'); ?>
          </div>
        <?php endif; ?>

        <h2 class="login-box-msg"><b>
            <font color='blue'><b>TANIKU 46</b></font>
          </b></h2>
        <form action="<?= base_url('/Login/cekLoginPelanggan'); ?>" method="post">
          <div class="input-group mb-4">
            <input type="email" name="email" class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              <?= $validation->getError('email'); ?>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <div class="invalid-feedback">
              <?= $validation->getError('password'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary btn-block"><b>LOGIN</b></button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mt-3">
          <center>PUSAT HASIL TANI </center>
        </p>
      </div>



      <!-- /.login-card-body -->
    </div>
    <footer>
      <center>
        <font color='white'><b>&copy; 2021 TANIKU 46</b></font></a>
      </center>
      </font>
    </footer>
  </div>

  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>/template/dist/js/adminlte.min.js"></script>

</body>

</html>