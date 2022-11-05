<?= $this->extend('layout/pelanggan/v_peltemplate'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Keranjang Belanja</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <form action="<?= base_url('/pelanggan/updateCart'); ?>" method="post">
        <!-- Form End -->
        <!-- Main content -->
        <div class="content">
            <div class="container">
                <!-- container -->
                <!-- Infor -->
                <div class="callout callout-info">
                    <h5><i class="fa fa-info"></i> Informasi</h5>
                    <p>
                        Jika anda melakukan perubahan jumlah <strong>Qty</strong> pada keranjang belanja jangan lupa klik tombol <strong>Update</strong> untuk menyimpan perubahannya,
                        jika anda tidak menekan tombol update maka perubahan pada <strong>Qty</strong> tidak akan tersimpan.
                    </p>
                </div>

                <?php
                if (session()->getFlashdata('psn')) {
                ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('psn'); ?></div>
                <?php } ?>
                <!-- Infor End -->

                <?php
                $keranjang = $cart->contents();

                if (empty($keranjang)) {
                    //echo "<script>alert('kosong');</script>";
                    echo "<script>alert('Keranjang Belanja Kosong, Silahkan lakukan pembelian untuk mengisi keranjang belanja anda.');</script>";
                    echo "<script>location='/pelanggan'</script>";
                } else {
                ?>
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-cart-plus"></i> <strong>TANI STORE</strong>
                                    <small class="float-right">Date: <?= date('d/m/Y'); ?></small>
                                </h4>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th width="90px">Qty</th>
                                            <th>Gambar</th>
                                            <th>Subtotal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $i = 1;
                                        foreach ($cart->contents() as $produk) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $produk['name']; ?></td>
                                                <td>Rp. <?= number_format($produk['price']); ?></td>
                                                <td><input type="number" name="qty<?= $i++; ?>" class="form-control form-control-sm" min="1" value="<?= $produk['qty']; ?>" width="100px"></td>
                                                <td class="text-center"><img src="<?= base_url('/img/' . $produk['options']['foto_produk']); ?>" alt="foto Produk" width="30px"></td>
                                                <td>Rp. <?= number_format($produk['subtotal']); ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('/pelanggan/hapusKeranjangId/' . $produk['rowid']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr class="text-bold">
                                            <td colspan="5">Total</td>
                                            <td colspan="2">Rp. <?= number_format($cart->total()); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button type="submit" class="btn btn-info mt-1 mb-1"><i class="fa fa-save"></i> Update Pembelian</button>
    </form><!-- Form End -->
    <div class="btn-group float-right">
        <a href="<?= base_url('/pelanggan/clear'); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Semua</a>
        <a href="<?= base_url('/pelanggan'); ?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Belanja Lagi</a>
        <?php
                    if (session()->get('log_inp') == true) {
        ?>
            <form action="<?= base_url('/pelanggan/checkout'); ?>">
                <?php
                        $i = 1;
                        foreach ($cart->contents() as $produk) {
                ?>
                    <input type="hidden" name="jj<?= $i++; ?>" class="form-control form-control-sm" min="1" value="<?= $produk['qty']; ?>" width="100px">
                <?php } ?>
                <button type="submit" class="btn btn-success"><i class="fa fa-money-check"></i> Checkout</button>
            </form>
        <?php
                    } else {
        ?>
            <a href="<?= base_url('/login'); ?>" onclick="return alert('Anda belum login \nSilahkan login terlebih dahulu untuk melanjutkan')" class="btn btn-success"><i class="fa fa-money-check"></i> Checkout</a>
        <?php
                    }
        ?>
    </div>
</div>
</div>
</div>
<!-- /.invoice -->
<?php } ?>

</div><!-- Container End -->
</div>
<!-- Content End -->
<!-- </form>Form End -->

</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>