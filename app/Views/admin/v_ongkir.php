<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Biaya Ongkir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Ongkir</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('/admin/tambahOngkir') ?>" class=" btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="penomeran">No</th>
                    <th>Nama Kota</th>
                    <th>Tarif</th>
                    <th class="aksi">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach($getOngkir as $ongkir) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $ongkir['nama_kota']; ?></td>
                    <td>Rp. <?= number_format($ongkir['tarif']); ?></td>
                    <td>
                    <a href="<?= base_url('admin/ubahOngkir/'. $ongkir['id_ongkir']); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="<?= base_url('admin/hapusOngkir/'. $ongkir['id_ongkir']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin manghapus data!!\n Data yang dihapus tidak bisa dikembalikan')"><i class="fa fa-trash-alt"></i></a>
                </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>