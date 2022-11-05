
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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/adminlte.min.css">
  <!-- css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/summernote/summernote-bs4.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Data Table -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <!-- SweetAlert2 -->
  <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: rgb(0,0,255);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><font color='white'><i class="fas fa-bars"></i></font></a>
      </li>
    </ul>
    <form class="form-inline ml-0 ml-md-6">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <font color='white'> Halo, <?= session()->get('nama_admin'); ?> &nbsp;&nbsp;&nbsp;<font color='white'><i class="far fa-user"></font></i>&nbsp;&nbsp;&nbsp;<i class="fas fa-angle-left"></i></font>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="#" class="dropdown-item"><i class="fa fa-user"></i>
          Profile
          </a>
          <a href="<?= base_url('/Login/logout'); ?>" class="dropdown-item"><i class="fa fa-sign-out-alt"></i>
          Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?= $this->include('pelanggan/layout_pelanggan/v_sidebar') ?>
  <!-- /.Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?= $this->renderSection('isi') ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?= $this->include('pelanggan/layout_pelanggan/v_footer') ?>
  <!-- /. Footer -->
