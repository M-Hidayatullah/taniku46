<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Data Pelanggan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/pelanggan') ?>">Pelanggan</a></li>
              <li class="breadcrumb-item active">Ubah Data Pelanggan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-auto" style="width: 70%;">
            <div class="card-header text-center">
                Form Ubah Data Pelanggan
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url('/admin/ubahPelangganAksi'); ?>" method="post">
                            <input type="hidden" name="id_pelanggan" value="<?= $getPelanggan->id_pelanggan; ?>">
                            <div class="form-group">
                                <label for="Nama Pelanggan">Nama Pelanggan</label>
                                <input type="text" name="nama_pelanggan" class="form-control
                                <?= ($validation->hasError('nama_pelanggan') ? 'is-invalid' : ''); ?>" value="<?= $getPelanggan->nama_pelanggan; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_pelanggan'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Email Pelanggan">Email Pelanggan</label>
                                <input type="email" name="email_pelanggan" class="form-control
                                <?= ($validation->hasError('email_pelanggan') ? 'is-invalid' : ''); ?>" value="<?= $getPelanggan->email_pelanggan; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email_pelanggan'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Password Pelanggan">Password Pelangga</label>
                                <input type="password" name="password_pelanggan" class="form-control
                                <?= ($validation->hasError('password_pelanggan') ? 'is-invalid' : ''); ?>" value="<?= $getPelanggan->password_pelanggan; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password_pelanggan'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Telpon Pelanggan">Telpon Pelangga</label>
                                <input type="text" name="telpon_pelanggan" class="form-control
                                <?= ($validation->hasError('telpon_pelanggan') ? 'is-invalid' : ''); ?>" value="<?= $getPelanggan->telpon_pelanggan; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('telpon_pelanggan'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control
                                <?= ($validation->hasError('alamat') ? 'is-invalid' : ''); ?>" value="<?= $getPelanggan->alamat ; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                            
                            <div class="card-footer">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="<?= base_url('/admin/pelanggan'); ?>" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection(); ?>