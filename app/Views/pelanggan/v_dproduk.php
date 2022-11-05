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
    <div class="container">
        <div class="row">
        <?php foreach($data as $produk) : ?>
        <div class="col-md-3 mb-4">
              <a href="">
              <div class="card h-100 card-pelanggan">
                  <div class="card-body">
                  <img height="200" src="<?= base_url('/img/'. $produk['foto_produk']); ?>" alt="<?= $produk['nama_produk']; ?>" class="img-pelanggan">
                  </div>
              </div>
            </div>
              </a>
            <?php endforeach; ?>
        </div><!-- Row -->


  

      </div>
    </div>


  </div>


</div>
  <!-- /.content-wrapper -->
<?= $this->endSection(); ?>