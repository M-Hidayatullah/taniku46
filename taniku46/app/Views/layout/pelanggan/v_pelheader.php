<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $title; ?></title>

  <!-- Icon -->
  <link rel="icon" type="image/png" href="<?= base_url(); ?>/img/logo/16.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-lime">
      <div class="container">
        <a href="<?= base_url('/pelanggan'); ?>" class="navbar-brand">
          <center>
            <h3>
              <font color='white'><i class="fas fa-store"></i><b> TANIKU</b></font>
            </h3>
          </center>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->

          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="<?= base_url('/pelanggan'); ?>" class="nav-link">
                <font color='white'>Beranda</font>
              </a>
            </li>
            <li class="nav-item dropdown text-white">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <font color='white'>Shop
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="<?= base_url('/pelanggan/kbelanja'); ?>">Keranjang Belanja</a>
                <a class="dropdown-item" href="<?= base_url('/pelanggan/Review'); ?>">Review</a>
              </div>
            </li>
            </font>
            <li class="nav-item">
              <a href="<?= base_url('/pelanggan/semuaTransaksi'); ?>" class="nav-link">
                <font color='white'>Semua Transaksi</font>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/pelanggan/DaftarProduk'); ?>" class="nav-link">
                <font color='white'>Daftar Produk</font>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/pelanggan/Kontak'); ?>" class="nav-link">
                <font color='white'>Kontak</font>
              </a>
            </li>
          </ul>


          <!-- SEARCH FORM -->
          <form class="form-inline ml-0 ml-md-3">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Akun
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

              <a class="dropdown-item" href="<?= base_url('/Login/registrasiUser'); ?>">Daftar Pelanggan</a>
              <a class="dropdown-item" href="<?= base_url('/Login/registrasisup'); ?>">Daftar Supplier</a>

              <?php if (session()->get('log_inp') == true) { ?>
                <a class="dropdown-item" href="<?= base_url('/Login/logout'); ?>">Logout</a>
              <?php } else { ?>

                <a class="dropdown-item" href="<?= base_url('/Login'); ?>">Masuk Log</a>
              <?php } ?>
            </div>
          </div>
          <!-- Notifications Menu -->
          <?php if (session()->get('log_in') != true) {
            //mengambil isi dari keranjang
            $keranjang = $cart->contents();
            $jumlahItem = null;

            //membuat perulangan isi keranjang
            foreach ($keranjang as $value) {
              $jumlahItem = $jumlahItem + $value['qty'];
            }

            //Melakukan pengecekan keranjang belanjan
            if (empty($keranjang)) {
          ?>
              <li class="nav-item">
                <a class="nav-link" onclick="return alert('Keranjang belanja masih kosong. \nSilahkan lakukan pembelian barang untuk mengisi keranjang belanja anda ')" href="<?= base_url('/pelanggan'); ?>">
                  <font color='white'><i class="fa fa-shopping-cart"></i></font>
                  <span class="badge badge-danger badge-pill navbar-badge text-bold"><?= $jumlahItem; ?></span>
                </a>
              </li>
              <li class="nav-item">
              <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/pelanggan/kbelanja'); ?>">
                  <font color='white'><i class="fa fa-shopping-cart"></i></font>
                  <span class="badge badge-danger badge-pill navbar-badge text-bold"><?= $jumlahItem; ?></span>
                </a>
              </li>
              <li class="nav-item">
                <!-- Notifications Menu End -->

            <?php
            }
          }

            ?>

              </li>
        </ul>

      </div>
    </nav>
    <!-- /.navbar -->