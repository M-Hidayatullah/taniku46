<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Data Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/kategori') ?>">Kategori</a></li>
              <li class="breadcrumb-item active">Ubah Data Kategori</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-auto" style="width: 70%;">
            <div class="card-header text-center">
                Form Ubah Data Kategori
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url('/admin/ubahKategoriAksi/'. $kategori->id_kategori) ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_kategori" value="<?= $kategori->id_kategori; ?>">
                            <div class="form-group">
                                <label for="Kategori">Kategori</label>
                                <input type="text" name="kategori" class="form-control <?= ($validation->hasError('kategori') ? 'is-invalid' : ''); ?>" value="<?= $kategori->kategori; ?>">
                                <div class="invalid-feedback">
                                  <?= $validation->getError('kategori'); ?>
                                </div>
                            </div>
                        <div class="card-footer">
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="<?= base_url('/admin/kategori/');?>" class="btn btn-danger">Batal</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection(); ?>