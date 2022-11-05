<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Halaman Utama</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Halaman Utama</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $produk; ?></h3>

                    <p>Produk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-store"></i>
                </div>
                <a href="<?= base_url('admin/produk') ?>" class="small-box-footer">Jumlah Produk <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $jmlhPelanggan ?></h3>

                    <p>Pelanggan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="<?= base_url('admin/pelanggan') ?>" class="small-box-footer">Jumlah pelanggan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $jmlhpsn ?></h3>

                    <p>Pesanan</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cart-plus"></i>
                </div>
                <a href="<?= base_url('admin/pembelian') ?>" class="small-box-footer">Jumlah pesanan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <?php
                    $total = 0;
                    foreach ($totalpembelian as $data) {
                        $jumlah = $data['total_pembelian'];
                        // $ongkir = $data['tarif'];
                        // $jmlh = $jumlah + $ongkir;
                        $total += $jumlah;
                    ?>
                    <?php } ?>
                    <h3>Rp<?= number_format($total); ?></h3>
                    <p>Pendapatan</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-money-bill-alt"></i>
                </div>
                <a href="#" class="small-box-footer">Total Pendapatan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
    <!-- /.card -->

</section>

<?= $this->endSection(); ?>