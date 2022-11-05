<?= $this->extend('layout/pelanggan/v_peltemplate'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Halaman Checkout</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
      </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<form action="<?= base_url('/pelanggan/addCheckout'); ?>" method="post"> <!-- Form End -->
    <!-- Main content -->
    <div class="content">
        <div class="container"><!-- container -->

            <?php 
            $keranjang = $cart->contents();

            if(empty($keranjang)){
        //echo "<script>alert('kosong');</script>";
                echo "<script>alert('Keranjang Belanja Kosong, Silahkan lakukan pembelian untuk mengisi keranjang belanja anda.');</script>";
                echo "<script>location='/pelanggan'</script>";
            }else{
                ?>
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-cart-plus"></i> Daftar Produk Yang  Dipesan.
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
                                        <th>Qty</th>
                                        <th>Gambar</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                    $i=1;
                                    foreach($cart->contents() as $produk){
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $produk['name']; ?></td>
                                            <td>Rp. <?= number_format($produk['price']); ?></td>
                                            <td><?= $produk['qty']; ?></td>
                                            <td><img src="<?= base_url('/img/'. $produk['options']['foto_produk']); ?>" alt="foto Produk" width="30px"></td>
                                            <td>Rp. <?= number_format($produk['subtotal']); ?></td>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="mx-auto" style="width:40%">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="nama" value="<?= $datap->nama_pelanggan; ?>"
                                    class="form-control form-control-sm <?= ($validation->hasError('nama') ? 'is-invalid' : ''); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telpon">Telpon</label>
                                    <input type="number" name="telpon" value="<?= $datap->telpon_pelanggan; ?>" class="form-control form-control-sm <?= ($validation->hasError('telpon') ? 'is-invalid' : ''); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telpon'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ongkir">Ongkir</label>
                                    <select name="ongkir" class="form-control form-control-sm <?= ($validation->hasError('ongkir') ? 'is-invalid' : ''); ?>" value="<?= old('ongkir'); ?>">
                                        <option value="">-- Pilih Ongkir --</option>
                                        <?php foreach($getOngkir as $ongkir) : ?>
                                            <option value="<?= $ongkir['id_ongkir']; ?>"><?= $ongkir['nama_kota']; ?> : Rp. <?= number_format($ongkir['tarif']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('ongkir'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" value="<?= $datap->alamat; ?>" class="form-control form-control-sm <?= ($validation->hasError('alamat') ? 'is-invalid' : ''); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                                <h4><strong>Metode Pembayaran</strong></h4>
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                      <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                             <div class="form-check">
                                                <input  class="form-check-input" type="radio" name="transfer" id="exampleRadios1" value="transfer" >
                                                <label class="form-check-label" for="exampleRadios1">
                                                    <font color='black'><strong>Transfer Bank</strong></font>
                                                </label>
                                            </div>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                       Jika Menggunakan Metode Ini Maka Akan Diarahkan Ke Halaman Upload Bukti Transfer
                                   </div>
                               </div>
                           </div>
                           <div class="card">
                            <div class="card-header" id="headingThree">
                              <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  <div class="form-check">
                                    <input   class="form-check-input" type="radio" name="transfer" id="exampleRadios2" value="cod">
                                    <label class="form-check-label" for="exampleRadios2">
                                        <font color='black'><strong>Cod</strong></font>
                                    </label>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body">
                        Jika Menggunakan Metode Ini Maka Anda Akan membayar setelah barang sampai ke rumah anda
                    </div>
                </div>

            </div>
            <button class="btn btn-primary">Lanjutkan</button>
        </div>

    </div>
</div>
</div>
</div>
</div>
<!-- /.invoice -->
<?php } ?>

</div><!-- Container End -->
</div>
<!-- Content End -->
</form><!-- Form End --> 

</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>