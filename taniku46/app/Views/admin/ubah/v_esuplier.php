<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Ubah Data Suplier</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url('admin/suplier') ?>">Suplier</a></li>
          <li class="breadcrumb-item active">Ubah Data Suplier</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card mx-auto" style="width: 70%;">
    <div class="card-header text-center">
      Form Ubah Data Suplier
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <form action="<?= base_url('admin/ubahSuplierAksi'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_suplier" value="<?= $getSuplier->id_suplier; ?>">
            <div class="form-group">
              <label for="Nama Suplier">Nama Suplier</label>
              <input type="text" name="nama_suplier" class="form-control <?= ($validation->hasError('nama_suplier') ? 'is-invalid' : ''); ?>" value="<?= $getSuplier->nama_suplier; ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('nama_suplier'); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="Produk">Produk</label>
              <input type="text" name="produk" class="form-control <?= ($validation->hasError('produk') ? 'is-invalid' : ''); ?>" value="<?= $getSuplier->produk; ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('produk'); ?>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
              <a href="<?= base_url('/admin/suplier'); ?>" class="btn btn-danger">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>