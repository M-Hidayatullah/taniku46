
  </aside><aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(0,0,255);">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>/template/index3.html" class="brand-link" style="background-color: rgb(0,0,255);">
        <center><h3><font color='white'><b>TANIKU 46</b></h3></font></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-4 d-flex">
                <div class="image">
                    <img src="<?php Base_url(); ?>/img/user.png" alt="Gambar" class="img-circle elevation-4" alt="User Image" >
                </div>
                <div class="info">
                <font color='white'><?= session()->get('nama_pelanggan'); ?> &nbsp;&nbsp;&nbsp;</font>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

             <li class="nav-header"><font color='white'><b> MENU</b></li></font>

             <li class="nav-item">
                <a href="<?= base_url('/pelanggan/index'); ?>" class="nav-link">
                <font color='white'><i class="nav-icon fas fa-home"></i>
                    <p>
                        Beranda
                    </p>
                </a>
            </li></font> 
            <li class="nav-item">
            <a href="<?= base_url('/pelanggan/pembelian'); ?>" class="nav-link">
            <font color='white'><i class="nav-icon fas fa-money-bill-alt"></i>
                <p>
                 Pesanan
                </p>
            </a>
           </li></font>
            <li class="nav-item">
            <a href="<?= base_url('/pelanggan/pembayaran'); ?>" class="nav-link">
            <font color='white'><i class="nav-icon fas fa-money-bill-alt"></i>
                <p>
                 Pembayaran
                </p>
            </a>
           </li></font>

                <li class="nav-item">
                    <a href="<?= base_url('/pelanggan/review'); ?>" class="nav-link">
                    <font color='white'><i class="nav-icon fas fa-edit"></i>
                        <p>
                            Review 
                        </p>
                    </a>
                </li></font>
                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-white">
                      <p>
                        <b>Akun</b>
                        <i class="right fas fa-angle-left" ></i>
                    </p>
                </a>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>