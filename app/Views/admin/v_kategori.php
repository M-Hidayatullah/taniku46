<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/tambahKategori') ?>" class=" btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="penomeran">No</th>
                  <th>Kategori</th>
                  <th class="aksi">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($getKategori as $kategori) :
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $kategori['kategori']; ?></td>
                  <td>
                    <a href="<?= base_url('/admin/ubahKategori/'.$kategori['id_kategori']); ?>" class="btn btn-warning btn-sm mt-1 mb-1"><i class="fa fa-edit"></i></a>
                    <a href="<?= base_url('/admin/hapusKategori/'.$kategori['id_kategori']); ?>" class="btn btn-danger btn-sm" onclick ="return confirm('Yakin ingin menghapus data ini!!\n Data yang sudah dihapus tidak bisa dikembalikan.')"><i class="fa fa-trash-alt"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>