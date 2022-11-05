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
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


<body class="bg-red">
  <div class="register-logo mb-0">
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-5 col-md-9">

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-5 d-none d-lg-block"><img src="<?= base_url(); ?>/img/category-2.jpg" height="540px" width="640px" alt="Lingsar Buah"></div>
                <div class="col-lg-7 bg-white">
                  <div class="p-5">
                    <div class="text-center">
                      <b>
                        <h4 class=" text-gray-900 mb-4">BUAT AKUN PELANGGAN</h4>
                      </b>
                    </div>
                    <form action="<?= base_url('/Login/registerUserAksi'); ?>" method="post">
                      <div class="input-group mb-3">
                        <input type="text" name="nama_user" class="form-control <?= ($validation->hasError('nama_user') ? 'is-invalid' : ''); ?>" placeholder="Nama Lengkap" value="<?= old('nama_user'); ?>">
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
                        <input type="text" name="email" class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>" placeholder="Email" value="<?= old('email'); ?>">
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
                        <input type="password" class="form-control <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" placeholder="Password" name="password" value="<?= old('password'); ?>">
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
                        <input type="number" name="telpon" class="form-control <?= ($validation->hasError('telpon') ? 'is-invalid' : ''); ?>" placeholder="Nomor Telpon" value="<?= old('telpon'); ?>">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                          </div>
                        </div>
                        <div class="invalid-feedback">
                          <?= $validation->getError('telpon'); ?>
                        </div>
                      </div>

                      <div class="input-group mb-3">
                        <input type="text" name="alamat" class="form-control <?= ($validation->hasError('alamat') ? 'is-invalid' : ''); ?>" placeholder="Alamat" value="<?= old('alamat'); ?>">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-map-marker-alt"></span>
                          </div>
                        </div>
                        <div class="invalid-feedback">
                          <?= $validation->getError('alamat'); ?>
                        </div>
                      </div>
                      <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary">Daftar</button>
                          <a href="/login" class="btn btn-danger text-white">Kembali</a>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>

                  </div>
                  <p class="mt-3">
                    <b>
                      <center>TANIKU 46 </center>
                    </b>
                  </p>
                </div>
  </section>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>/template/assets/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url() ?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url() ?>/template/plugins/toastr/toastr.min.js"></script>

  <script>
    //Notifikasi Toast
    function pesan($warna, $pesan) {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      switch ($warna) {
        case "1":
          toastr.success($pesan);
          break;

      }
    }
  </script>
  <?php if (session()->getFlashdata('sukses')) { ?>
    <script>
      pesan('1', '<?= session()->getFlashdata('sukses'); ?>');
    </script>
  <?php } ?>
</body>

</html>