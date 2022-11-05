<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Review</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('pelangan/index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Review</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Pesanan</th>
                    <th>Pembeli</th>
                    <th>Tanggal</th>
                    <th>Review</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                
                foreach($getReview as $review) : ?>
                <tr>
                    <td><?= $review['id_review']; ?></td>
                    <td><?= $review['id_pembelian']; ?></td>
                    <td><?= $review['nama_pelanggan']; ?></td>
                    <td><?= $review['tanggal_review']; ?></td>
                    <td><?= $review['review']; ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>