<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Detail Pembayaran Produk</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('/admin/index') ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('/admin/pembyaran') ?>">Pembayaran</a></li>
          <li class="breadcrumb-item active">Detail Pembayaran Produk</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-9">
          <h4>
            <i class="fas fa-shopping-cart"></i></i> Taniku46
          </h4>
        </div>
        <div class="col-md-3 float-right">
          <h4>
            Tanggal : <?= date('d/m/Y'); ?>
          </h4>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-6">
          <table>
            <tr>
              <th>Kode</th>
              <td>:</td>
              <td><?= 'PL' . $idInvoice->id_invoice; ?></td>
            </tr>
            <tr>
              <th>Nama Pemesan</th>
              <td>:</td>
              <td><?= $idInvoice->nama_pem; ?></td>
            </tr>
            <tr>
              <th>Tanggal Pesanan</th>
              <td>:</td>
              <td><?= $idInvoice->tgl_beli; ?></td>
            </tr>
            <tr>
              <th>Metode Pembayaran</th>
              <td>:</td>
              <td><?= $idInvoice->metode_pembayaran; ?></td>
            </tr>
          </table>
        </div>
        <div class="col-6">
          <?php
          if ($idInvoice->aksi == 1) {
          ?>
            <a href="<?= base_url('/admin/cetakDetailPembayaran/' . $idInvoice->id_invoice) ?>" target="_blank" class="btn btn-default btn-sm mb-1  float-right ml-1"><i class="fa fa-print"></i> Cetak</a>
          <?php } ?>
          <a href="<?= base_url('/admin/pembayaran') ?>" class="btn btn-primary mb-1 btn-sm  float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
      </div>
      <br>
      <table class="table table-stripped table-bordered">
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Harga Satuan</th>
          <th>Jumlah</th>
          <th>Sub Total</th>
        </tr>
        <?php
        $no = 1;
        $subtotal = 0;
        foreach ($idPembelian as $pembelian) {
          // $subtotal = $pembelian['tarif'] + $pembelian['total_pembelian'];
          // $total+=$subtotal;

          // $subtotal = $pembelian['total_pembelian'] + $pembelian['total_pembelian'];
          $subtotal += $pembelian['total_pembelian'];
        ?>

          <tr>
            <td><?= $no++; ?></td>
            <td><?= $pembelian['nama_produk'] ?></td>
            <td><?= number_format($pembelian['harga']); ?></td>
            <td><?= $pembelian['jumlah'] ?></td>
            <td><?= number_format($pembelian['total_pembelian']); ?></td>
          </tr>
        <?php } ?>
      </table>
      <div class="row">
        <div class="col-md-6">
          <?php if ($idInvoice->metode_pembayaran == "transfer") { ?>
            <img src="<?= base_url('img/' . $idInvoice->bukti_transfer); ?>" class="img-thumbnails" width="200px" alt="bukti transfer">
          <?php } ?>
        </div>
        <div class="col-md-6 float-right">

          <div class="table-responsive">
            <table class="table mt-3" width="100%">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>Rp<?= number_format($subtotal); ?></td>
              </tr>
              <tr>
                <th>Ongkir</th>
                <td>Rp<?= number_format($pembelian['tarif']); ?></td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>Rp<?= number_format($subtotal + $pembelian['tarif']); ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
    </div>
  </div>
</section><br>
<?= $this->endSection(); ?>