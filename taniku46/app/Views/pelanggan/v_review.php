<?= $this->extend('layout/pelanggan/v_peltemplate'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">

    <?php if(session()->get('log_inp') == true){ ?>

      <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                <?php
                // dd($gg);
                if(session()->getFlashdata('pesan')){
                ?>
                <div class="alert alert-success">
                <?= session()->getFlashdata('pesan'); ?>
                </div>
                <?php } ?>
                    <form action="<?= base_url('pelanggan/aksiReview'); ?>" method="post">
                    <div class="form-group">
                    <label>Judul Review</label>
                    <input type="text" name="judul" class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Pesanan</label>
                    <select name="pesanan" class="form-control">
                    <?php foreach($review as $value){ ?>
                        <option value="<?= $value['id_pembelian'] ?>"><?= $value['nama_produk'] ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Review</label>
                    <textarea name="review" cols="10" rows="5" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tulis Review</button>
                    </form>

                
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

  </div>


</div>
  <!-- /.content-wrapper -->
<?= $this->endSection(); ?>