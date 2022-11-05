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
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img style="background-size:cover;" height="400" class="d-block w-100" src="<?php echo base_url(); ?>/img/bg_2.jpg" alt="First slide">
          <div class='carousel-caption' style="bottom:100px" ;>
            <h1 style="font-zise:100%;"><b>Produk Lokal Yang Kami Jual dari hasil tani warga desa selengen</b></h1>
          </div>
        </div>
        <div class="carousel-item">
          <img style="background-size:cover;" height="400" class="d-block w-100" src="<?php echo base_url(); ?>/img/bg_1.png" alt="Second slide">
          <div class='carousel-caption' style="bottom:100px" ;>
            <h1 style="font-zise:100%;"><b>Kami Hanya Menjual produk lokal hasil pertanian warga desa selengen</b></h1>
            <h2 class="subheading mb-4"> Produk insyaalah terjamin kualitasnya</h2>
          </div>
        </div>
        <div class="carousel-item">
          <img style="background-size:cover;" height="400" class="d-block w-100" src="<?php echo base_url(); ?>/img/bg_7.jpg" alt="Third slide">
          <div class='carousel-caption' style="bottom:100px" ;>
            <h1 style="font-zise:100%;"><b>Ayok Bertani Untuk Menghasilkan Produk Lokal Yang Berkualitas</b></h1>
            <h2 class="subheading mb-4">Desa Selengen, Kec.Kayangan, jln.Raya Tanjung-Bayan, Kab.Lombok Utara</h2>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <br>
      <div class="container">
        <div class="row">
          <?php foreach ($getProduk as $produk) : ?>
            <div class="col-md-3 mb-4">
              <div class="card h-100 card-pelanggan">

                <form action="<?= base_url('/pelanggan/addCart'); ?>" method="post">
                  <input type="hidden" name="id" value="<?= $produk['id_produk']; ?>">
                  <input type="hidden" name="name" value="<?= $produk['nama_produk']; ?>">
                  <input type="hidden" name="price" value="<?= $produk['harga_jual']; ?>">
                  <!-- Options -->
                  <input type="hidden" name="berat" value="<?= $produk['berat']; ?>">
                  <input type="hidden" name="foto_produk" value="<?= $produk['foto_produk']; ?>">

                  <img height="180" src="<?= base_url('/img/' . $produk['foto_produk']); ?>" alt="<?= $produk['nama_produk']; ?>" class="img-pelanggan">
                  <div class="card-body">
                    <h2 class="card-title"><?= $produk['nama_produk']; ?></h2>
                    <?php if ($produk['berat'] != '0') { ?>
                      <p class="card-text text-sm"><span class="badge badge-success"><?= $produk['kategori']; ?></span></p>
                    <?php } else { ?>
                      <p class="card-text text-sm"><span class="badge badge-danger">Stok Habis</span></p>
                    <?php } ?>

                    <p class="card-text text-center text-bold">Rp<?= number_format($produk['harga_jual']); ?></p>
                  </div>
                  <div class="card-footer text-center">
                    <?php if ($produk['berat'] != '0') { ?>
                      <a href="<?= base_url('/pelanggan/detailker/' . $produk['id_produk']); ?>" class="btn text-center btn-sm btn-outline-primary"><span class="fa fa-eye"></span> Detail</a>
                      <?php if (session()->get('log_in') != true) : ?>
                        <button type="submit" name="keranjang" class="btn btn-primary mt-1 mb-1 btn-sm">
                          <i class="fa fa-cart-plus"></i> Keranjang</button>
                </form>
              <?php endif; ?>
            <?php } ?>
              </div>
            </div>
        </div>
      <?php endforeach; ?>

      </div><!-- Row -->

    </div>
  </div>


</div>


</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>