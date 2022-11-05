<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pembayaran Produk</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
          <li class="breadcrumb-item active">Pembayaran</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Pembayaran</th>
            <th>Pembeli</th>
            <th>Telpon</th>
            <th>Tgl Pesanan</th>
            <th>Batas Pembayaran</th>
            <th width="300px">Alamat</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($getPembayaran as $pembayaran) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= 'PL' . $pembayaran['id_invoice']; ?></td>
              <td><?= $pembayaran['nama_pem']; ?></td>
              <td><?= $pembayaran['telpon']; ?></td>
              <td><?= $pembayaran['tgl_beli']; ?></td>
              <td><?= $pembayaran['batas_bayar']; ?></td>
              <td width="300px"><?= $pembayaran['alamat']; ?></td>
              <?php if ($pembayaran['aksi'] != true) { ?>
                <td>
                  <div class="badge badge-warning">Belum Lunas</div>
                </td>
              <?php } else { ?>
                <td>
                  <div class="badge badge-success">Lunas</div>
                </td>
              <?php } ?>
              <td width="30px">
                <a href="<?= base_url('/admin/detailPembayaran/' . $pembayaran['id_invoice']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                <?php if ($pembayaran['aksi'] != true) { ?>
                  <a href="<?= base_url('/admin/updateStatus/' . $pembayaran['id_invoice']); ?>" class="btn btn-success btn-sm mt-1 mb-1"><i class="fa fa-check"></i></a>
                <?php } ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>