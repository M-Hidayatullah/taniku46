<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/produk') ?>">Produk</a></li>
              <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-auto" style="width: 70%;">
            <div class="card-header text-center">
                Form Pengisian Data Produk
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url('/admin/simpanProduk'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="Nama Produk">Nama Produk</label>
                                <input type="text" name="namaProduk" class="form-control
                                <?= ($validation->hasError('namaProduk')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('namaProduk'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('namaProduk'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Id Kategori">Kategori</label>
                                <select class="form-control <?= ($validation->hasError('id_kategori')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="id_kategori">
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php foreach($getKategori as $kategori) : ?>
                                    <option value="<?= $kategori['id_kategori']; ?>"><?= $kategori['kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('id_kategori'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Id Suplier">Suplier</label>
                                <select class="form-control <?= ($validation->hasError('id_suplier')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="id_suplier">
                                    <option value="">-- Pilih Suplier --</option>
                                    <?php foreach($getSuplier as $suplier) : ?>
                                    <option value="<?= $suplier['id_suplier']; ?>"><?= $suplier['nama_suplier']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('id_suplier'); ?>
                                </div>
                            </div>

                            <label for="Harga Beli">Harga Beli</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control <?= ($validation->hasError('berat')) ? 'is-invalid' : ''; ?>" name="harga_beli" aria-describedby="basic-addon1">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('harga_beli'); ?>
                                </div>
                            </div>

                            <label for="Harga Jual">Harga Jual</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control <?= ($validation->hasError('berat')) ? 'is-invalid' : ''; ?>" name="harga_jual" aria-describedby="basic-addon1">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('harga_jual'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Berat">Stok</label>
                                <input type="text" name="berat" class="form-control
                                <?= ($validation->hasError('berat')) ? 'is-invalid' : ''; ?>" value="<?= old('berat'); ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('berat'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="customFile">Gambar</label>

                                <div class="custom-file">
                                <input type="file" name="gambar" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="text-sm text-red">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Deskripsi">Deskripsi</label>
                                <textarea class="textarea <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" name="deskripsi" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('deskripsi'); ?>
                                </div>
                            </div>
                            
                            <div class="card-footer">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/produk'); ?>" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection(); ?>