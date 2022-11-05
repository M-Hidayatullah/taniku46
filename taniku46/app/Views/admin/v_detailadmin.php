<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Detail Produk</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/produk') ?>">Produk</a></li>
                <li class="breadcrumb-item active">Detail Produk</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
            <div class="col-12">
                <img src="<?= base_url('img/'.$detail->foto_produk) ?>" class="product-image image" alt="Product Image">
                <a href="<?= base_url('admin/produk') ?>" class="btn btn-primary btn-sm mt-3"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            </div>
            <div class="col-12 col-sm-6">
                
            <h3 class="my-3"><?= $detail->nama_produk; ?></h3>
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="tdetail">Kategori</th>
                            <td id="titik">:</td>
                            <td><?= $detail->kategori; ?></td>
                        </tr>
                        <tr>
                            <th>Harga Beli</th>
                            <td>:</td>
                            <td>Rp. <?= number_format($detail->harga_beli); ?></td>
                        </tr>
                        <tr>
                            <th>Harga Jual</th>
                            <td>:</td>
                            <td>Rp. <?= number_format($detail->harga_jual); ?></td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td>:</td>
                            <td><?= $detail->berat; ?> Kg</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td></td>
                            <td id="deskripsi"><?= $detail->deskripsi ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
<?= $this->endSection(); ?>