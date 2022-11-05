<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>

  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/adminlte.min.css">


  <!-- SweetAlert2 -->
  <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="container-fluid">

    <br>
    <!-- Main content -->
    <section class="content">
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
              <th>Kode Pembayaran</th>
              <td>:</td>
              <td><?= $idInvoice->id_invoice; ?></td>
            </tr>
            <tr>
              <th>Nama Pembeli</th>
              <td>:</td>
              <td><?= $idInvoice->nama_pem; ?></td>
            </tr>
            <tr>
              <th>Tanggal Pesanan</th>
              <td>:</td>
              <td><?= $idInvoice->tgl_beli; ?></td>
            </tr>
          </table>
        </div>
      </div>
      <br>
      <table class="table table-stripped table-bordered">
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Foto Produk</th>
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
            <td class="tengah"><img width="150px" src="<?= base_url('img/' . $pembelian['foto_produk']); ?>" alt="<?= $pembelian['foto_produk']; ?>" class="gambar"></td>
            <td><?= number_format($pembelian['harga']); ?></td>
            <td><?= $pembelian['jumlah'] ?></td>
            <td><?= number_format($pembelian['total_pembelian']); ?></td>
          </tr>
        <?php } ?>
      </table>
      <div class="row">
        <div class="col-md-6 offset-md-6 float-right">

          <div class="table-responsive">
            <table class="table mt-3">
              <tr>
                <th style="width:50%">Subtotal</th>
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
      </div>
    </section><br>

  </div>

  <!-- Cetak -->
  <script type="text/javascript">
    print()
  </script>

</body>

</html>