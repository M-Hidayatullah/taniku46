<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('/admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Data Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('/admin/tambahAdmin'); ?>" class=" btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="penomeran">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th class="aksi">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($getAdmin as $admin) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $admin['nama_admin']; ?></td>
                    <td><?= $admin['email_admin']; ?></td>
                    <td>
                    <a href="<?= base_url('admin/ubahAdmin/'.$admin['id_admin']); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="<?= base_url('admin/hapusAdmin/'.$admin['id_admin']); ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin ingin menghapus data ini?? \n Data yang sudah dihapus tidak bisa dikembalikan')"><i class="fa fa-trash-alt"></i></a>
                </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>