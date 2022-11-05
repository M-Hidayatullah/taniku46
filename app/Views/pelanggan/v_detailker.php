<?= $this->extend('layout/pelanggan/v_peltemplate'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Detail Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/pelanggan'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Detail Produk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
    </div><!-- /.content-header -->

<div class="content"><!-- Content End --> 
<div class="container"><!-- container -->

<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card card-solid">
<div class="card-body">
    <div class="row">
    <div class="col-12 col-sm-6">
    <form action="<?= base_url('/pelanggan/addCartdetail/'.$getProduk->id_produk); ?>" method="post">
    <input type="hidden" name="id" value="<?= $getProduk->id_produk; ?>">
    <input type="hidden" name="name" value="<?= $getProduk->nama_produk; ?>">
    <input type="hidden" name="price" value="<?= $getProduk->harga_jual; ?>">
    <!-- Options -->
    <input type="hidden" name="berat" value="<?= $getProduk->berat; ?>">
    <input type="hidden" name="foto_produk" value="<?= $getProduk->foto_produk; ?>">
        <div class="col-12">
        <img src="<?= base_url('/img/'.$getProduk->foto_produk) ?>" class="product-image" alt="Product Image">
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <h3 class="my-3"><?= $getProduk->nama_produk; ?></h3>
        
        <hr>
        <p><?= $getProduk->deskripsi; ?></p>
        <table>
            <tbody>
                <tr>
                    <th>Kategori</th>
                    <td>&nbsp;</td>
                    <td><?= $getProduk->kategori; ?></td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>&nbsp;</td>
                    <td><?= $getProduk->berat; ?> Kg</td>
                </tr>
            </tbody>
        </table>

        <div class="py-2 px-3 mt-4">
        <h2 class="mb-0">
            Rp. <?= number_format($getProduk->harga_jual); ?>
        </h2>
        </div>

        <div class="mt-4">
        <button type="submit" class="btn btn-primary btn-lg btn-flat">
            <i class="fas fa-cart-plus fa-lg mr-2"></i> 
            Tambah Ke Keranjang
        </button>
        </form>

        <a href="<?= base_url('/pelanggan'); ?>" class="btn btn-info btn-lg btn-flat">
            <font color='white'><i class="fa fa-shopping-bag fa-lg mr-2"></i></font>
            Belanja Lagi
        </a>
        </div>

    </div>
    </div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

</div><!-- Container End -->
</div><!-- Content End --> 

</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>