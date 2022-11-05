 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1 class="m-0 text-dark">Pembelian Berhasil</h1> -->
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container"><!-- container -->

      <!-- Main content -->
      <?php 
      if(session()->getFlashdata('sukses')) :
        ?>
      <div class="alert alert-success">
        <?= session()->getFlashdata('sukses') ?>
      </div>
    <?php endif; ?>

    <div class="row">
      <div class="col">
        <h1>Konfirmasi Pembayaran</h1>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="callout callout-info">
          <h5><i class="fa fa-info"></i> Informasi</h5>
          <p>Terimakasih telah belanja di <strong> STORE 19</strong> Pusat Buah Lokal Terpercaya <strong>Jika ada Pembatalan Pesanan</strong>.Segera lakukan komfirmasi Karna Barang yang telah dikirim tidak dapat di kembalikan lagi.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table>
          <tr>
            <td><h5>Nomor Pesanan </h5></td>
            <td><h5>:</h5></td>
            <td><h5><div class="badge badge-success"><?= $idInvoice->id_invoice; ?></div></h5></td>
          </tr>
          <tr>
            <td><h5>Nama Pembeli </h5></td>
            <td><h5>:</h5></td>
            <td><h5><?= $idInvoice->nama_pem; ?></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col mt-5 text-center mb-5">
          <a href="https://api.whatsapp.com/send?phone=6282339602354&text=STORE%2019%0A=======================%0AKonfirmasi%20Pembayaran%20Produk%0ANo.Invoice%20:%20%0ANama%20:%20" class="btn btn-success btn-lg"><i class="fa fa-phone"></i> Whatsapp</a>
          <a href="mailto:muhammadbirin19@gmail0@gmail.com?subject=Konfirmasi%20Pembayaran&body=STORE%2019%20Tulis%20No.Ivoice%20dan%20Nama%20Untuk%20Konfirmasi." class="btn btn-danger btn-lg"><i class="fa fa-envelope"></i> Email</a>
        </div>    
      </div>

    </div><!-- Container End -->
  </div>
  <!-- Content End -->

</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>