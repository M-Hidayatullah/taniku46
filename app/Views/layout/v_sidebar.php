
</aside><aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(154, 205, 49);">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>/template/index3.html" class="brand-link" style="background-color: rgb(154, 205, 49);">
        <center><h3><font color='white'><i class="fas fa-store"></i><b> Taniku46</b></h3></font></center>
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
                    <font color='white'><?= session()->get('nama_admin'); ?> &nbsp;&nbsp;&nbsp;</font>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-header"><font color='white'><b> MENU</b></li></font>
            <?php if(session()->get('level') == 'admin'){ ?>
           <li class="nav-item">
            <a href="<?= base_url('/admin/index'); ?>" class="nav-link">
                <font color='white'><i class="nav-icon fas fa-home"></i>
                    <p>
                        Beranda
                    </p>
                </a>
            </li></font> 
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link text-white">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Data Master 
                        <i class="right fas fa-angle-left" ></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                     <a href="<?= base_url('/admin/produk'); ?>" class="nav-link">
                         <font color='white'><i class="far fa-circle nav-icon"></i>
                           <p>
                             Data Produk
                         </p>
                     </a>
                 </li></font>
                 <li class="nav-item">
                    <a href="<?= base_url('/admin/pembelian'); ?>" class="nav-link">
                        <font color='white'> <i class="far fa-circle nav-icon"></i>
                            <p>
                                Data Pesanan
                            </p>
                        </a>
                    </li></font>

                    <li class="nav-item">
                        <a href="<?= base_url('/admin/kategori'); ?>" class="nav-link">
                            <font color='white'><i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Kategori
                                </p>
                            </a>
                        </li></font>

                        <li class="nav-item">
                            <a href="<?= base_url('/admin/suplier'); ?>" class="nav-link">
                                <font color='white'><i class="far fa-circle nav-icon"></i>
                                    <p>
                                     Data Pengepul
                                 </p>
                             </a>
                         </li></font>

                         <li class="nav-item">
                            <a href="<?= base_url('/admin/ongkir'); ?>" class="nav-link">
                                <font color='white'><i class="far fa-circle nav-icon"></i>
                                    <p>
                                     Data Ongkir
                                 </p>
                             </a>
                         </li></font>
                         
                     </ul>
                     </li
                     <li class="nav-item">
                        <a href="<?= base_url('/admin/pembayaran'); ?>" class="nav-link">
                            <font color='white'><i class="nav-icon fas fa-money-bill-alt"></i>
                                <p>
                                   Pembayaran
                               </p>
                           </a>
                       </li></font>

                       <li class="nav-item">
                        <a href="<?= base_url('/admin/review'); ?>" class="nav-link">
                            <font color='white'><i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Review Pelanggan
                                </p>
                            </a>
                        </li></font>

                        <li class="nav-item">
                        <a href="<?= base_url('/admin/cetakLaporan'); ?>" class="nav-link">
                            <font color='white'><i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li></font>
                        
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link text-white">
                              <p>
                                Akun
                                <i class="right fas fa-angle-left" ></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('/admin/admin'); ?>" class="nav-link">
                                 <font color='white'> <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Admin
                                    </p>
                                </a>
                            </li></font>
                            <li class="nav-item">
                                <a href="<?= base_url('/admin/pelanggan'); ?>" class="nav-link">
                                    <font color='white'><i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Pelanggan
                                        </p>
                                    </a>
                                </li></font>
                            </ul>
                            <hr>
                            <?php }else if(session()->get('level') == 'supplier'){ ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/produk'); ?>" class="nav-link">
                                        <font color='white'><i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Data Produk
                                        </p>
                                    </a>
                                </li></font>
                                <li class="nav-item">
                                    <a href="<?= base_url('/admin/pembelian'); ?>" class="nav-link">
                                        <font color='white'> <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Data Pesanan
                                            </p>
                                        </a>
                                </li></font>
                            <?php } ?>
                            <li class="nav-item">
                                <a href= "<?= base_url('/Login/logout'); ?>" class="nav-link">
                                    <font color='white'><i class="fa fa-sign-out-alt"></i>
                                        <p>
                                            Logout
                                        </p>
                                    </a>
                                </li></font>
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>