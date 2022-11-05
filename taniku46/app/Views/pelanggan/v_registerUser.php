
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Icon -->
  <link rel="icon" type="image/png" href="<?= base_url(); ?>/img/logo/icon.png">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <img src="<?= base_url(); ?>/img/logo/logo.png" alt="Logo Toko Hikmah">
  </div>

  <div class="card">
    <div class="card-body register-card-body">
    <?php if(session()->getFlashdata('sukses')) : ?>
      <div class="alert alert-success">
        <?= session()->getFlashdata('sukses'); ?>
      </div>
    <?php endif; ?>
      <p class="login-box-msg">Buat Akun</p>

      <form action="<?= base_url('/Login/registerUserAksi'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="nama_user" class="form-control <?= ($validation->hasError('nama_user') ? 'is-invalid' : ''); ?>" 
          placeholder="Nama Lengkap" value="<?= old('nama_user'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <div class="invalid-feedback">
            <?= $validation->getError('nama_user'); ?>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>" 
          placeholder="Email" value="<?= old('email'); ?>">
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
          <input type="password" class="form-control <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" 
           placeholder="Password" name="password" value="<?= old('password'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div class="invalid-feedback">
            <?= $validation->getError('password'); ?>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="number" name="telpon" class="form-control <?= ($validation->hasError('telpon') ? 'is-invalid' : ''); ?>" 
          placeholder="Nomor Telpon" value="<?= old('telpon'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
          <div class="invalid-feedback">
            <?= $validation->getError('telpon'); ?>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Daftar</button>
            <a href="/login/loginUser" class="btn btn-warning text-white">Kembali</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/template/assets/js/adminlte.min.js"></script>
</body>
</html>
