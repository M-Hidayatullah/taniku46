<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Data Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/admin') ?>">Admin</a></li>
              <li class="breadcrumb-item active">Ubah Data Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-auto" style="width: 70%;">
            <div class="card-header text-center">
                Form Ubah Data Admin
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url('/admin/ubahAdminAksi'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_admin" value="<?= $getAdmin->id_admin; ?>">
                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" name="namaAdmin" class="form-control
                                <?= ($validation->hasError('namaAdmin') ? 'is-invalid' : ''); ?>" value="<?= $getAdmin->nama_admin; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namaAdmin'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" name="email" class="form-control
                                <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>" value="<?= $getAdmin->email_admin; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="password" class="form-control
                                <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" value="<?= $getAdmin->password; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="<?= base_url('/admin/admin'); ?>" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection(); ?>