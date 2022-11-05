<?= $this->extend('layout/pelanggan/v_peltemplate'); ?>
<?= $this->section('isi'); ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Profile</h1>
		</div>

		<div class="section-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Lengkapi Profile</h4>
                        </div>

                        <div class="card-body">
                            <form action="<?=base_url('/pengguna/updateProfile'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>Nama</strong></label>
                                            <input type="text" name="nama" value="<?= $data->nama; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                        <label text><strong>Email</strong></label>
                                            <input type="email" name="email" value="<?= $data->email; ?>" class="form-control" readonly>
                                            <small>Hubungi admin untuk mengubah Email.</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="d-block"><strong>Jenis Kelamin</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk" <?php if(($data->jk) == "Laki-Laki"){echo "checked";} ?> value="Laki-Laki" id="exampleRadios1">
                                                <label class="form-check-label" for="exampleRadios1">Laki - Laki</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk" <?php if(($data->jk) == "Perempuan"){echo "checked";} ?> value="Perempuan" id="exampleRadios2">
                                                <label class="form-check-label" for="exampleRadios2">Perempuan</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label><strong>No Hp</strong></label>
                                            <input type="number" name="no_hp" value="<?= $data->no_hp; ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><strong>Alamat</strong></label>
                                    <textarea name="alamat" cols="30" rows="10" class="form-control"><?= $data->alamat; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-5">
                    <div class="card card-success">
                        <div class="card-body">
                            <div class="avatar-item">
                                <div class="col-6 col-sm-5 col-lg-5 mb-4 mb-md-0 mx-auto">
                                    <input type="hidden" name="gambarLama" value="<?= $data->poto; ?>">
                                    <img alt="image" src="<?= base_url('/gambar/'.$data->poto); ?>" class="img-thumbnail img-preview" data-toggle="tooltip">
                                </div>
                                <div class="form-group">
                                    <label>Ganti Poto</label>
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('poto') ? 'is-invalid' : ''); ?>" name="poto" id="sampul" onchange="previewImage()">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('poto'); ?>
                                    </div>
                            </div>
                        </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
	</section>
</div>

<?= $this->endSection(); ?>