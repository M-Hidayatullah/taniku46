<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Data Ongkir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/ongkir') ?>">Ongkir</a></li>
              <li class="breadcrumb-item active">Ubah Data Ongkir</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-auto" style="width: 70%;">
            <div class="card-header text-center">
                Form Ubah Data Ongkir
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url('admin/ubahOngkirAksi'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_ongkir" value="<?= $getOngkir->id_ongkir; ?>">
                            <div class="form-group">
                                <label for="Nama Kota">Nama Kota</label>
                                <input type="text" name="nama_kota" class="form-control <?= ($validation->hasError('nama_kota') ? 'is-invalid' : ''); ?>" value="<?= $getOngkir->nama_kota; ?>">
                                <div class="invalid-feedback">
                                  <?= $validation->getError('nama_kota'); ?>
                                </div>
                            </div>

                            <label for="Harga Beli">Tarif</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                <input type="number" class="form-control <?= ($validation->hasError('tarif') ? 'is-invalid' : ''); ?>" 
                                name="tarif" aria-describedby="basic-addon1" value="<?= $getOngkir->tarif; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                  <?= $validation->getError('tarif'); ?>
                                </div>
                            </div>
                          <div class="card-footer">
                              <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
                              <a href="<?= base_url('/admin/ongkir'); ?>" class="btn btn-danger">Batal</a>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection(); ?>