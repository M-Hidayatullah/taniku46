<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Suplier</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
          <li class="breadcrumb-item active">Suplier</li>
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
            <th class="penomeran">No</th>
            <th>Nama Suplier</th>
            <th>Produk</th>
            <th class="aksi">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($getSuplier as $suplier) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $suplier['nama_suplier']; ?></td>
              <td><?= $suplier['produk']; ?></td>
              <td>
                <a href="<?= base_url('admin/ubahSuplier/' . $suplier['id_suplier']); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <a href="<?= base_url('admin/hapusSuplier/' . $suplier['id_suplier']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin manghapus data!!\n Data yang dihapus tidak bisa dikembalikan')"><i class="fa fa-trash-alt"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>