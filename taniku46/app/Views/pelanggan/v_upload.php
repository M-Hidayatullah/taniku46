<?= $this->extend('layout/pelanggan/v_peltemplate'); ?>

<?= $this->section('isi'); ?>
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
        <h1>Upload Bukti Pembayaran</h1>
      </div>
    </div>
    <div class="row">
      <div class="col">
      <div class="callout callout-info">
          <h5><i class="fa fa-info"></i> Informasi</h5>
          <p>Terimakasih telah belanja di <strong> Taniku 46 </strong>Silahkan Transfer Ke Nomor Rekening Yang Tersedia <strong> Bank Mandiri: 220499049922</strong> setelah  Itu<strong> Upload Bukti Pembayaran</strong>.Barang yang telah dikirim tidak dapat di kembalikan lagi.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">

      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
           <table>
            <tr>
              <td><h5>Kode Pembayaran</h5></td>
              <td><h5>:</h5></td>
              <td><h5><div class="badge badge-success"><?= 'PL'.mt_rand(9,100).$idInvoice->id_invoice; ?></div></h5></td>
            </tr>
            <tr>
              <td><h5>Nama Pemesan </h5></td>
              <td><h5>:</h5></td>
              <td><h5><?= $idInvoice->nama_pem; ?></td>
              </tr>
            </table>
            <hr>
            <form action="/Pelanggan/aksi_upload/<?= $idInvoice->id_invoice; ?>" enctype="multipart/form-data" method="POST">
              <div class="form-group">
                <div class="form-line">
                  <label for="">Foto</label><br>
                  <img width="200" src="" alt="" id="output"><br><br>
                  <input required accept="image/*" type="file" name="foto" id="foto" onchange="loadFile(event)" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-info">Upload</button>
                <?php if($uri->uri->getSegment('2') == 'aksi_upload'){ ?>
                <a href="<?= base_url('/Pelanggan'); ?>" class="btn btn-danger">Kembali</a>
                <?php } ?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">

    </div>

  </div><!-- Container End -->
</div>
<!-- Content End -->

</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>