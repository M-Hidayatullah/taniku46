<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/kategori') ?>">Kategori</a></li>
              <li class="breadcrumb-item active">Tambah Data Kategori</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
  </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-auto" style="width: 70%;">
            <div class="card-header text-center">
                Form Pengisian Data Kategori
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url('admin/tambahKategoriAksi'); ?>" method="post">
                            <div class="form-group">
                                <label for="Kategori">Kategori</label>
                                <input type="text" name="kategori" value="<?= old('kategori'); ?>"
                                class="form-control <?= ($validate->hasError('kategori') ? 'is-invalid' : ''); ?>" autofocus>
                                <div class="invalid-feedback">
                                  <?= $validate->getError('kategori'); ?>
                                </div>
                            </div>
                            <div class="card-footer">
                              <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                              <a href="<?= base_url('/admin/kategori/');?>" class="btn btn-danger">Batal</a>
                          </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection(); ?>