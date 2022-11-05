<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('/admin/tambahProduk'); ?>" class=" btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Suplier</th>
                    <th>Foto</th>
                    <th class="aksi">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                  foreach($data as $produk) :
                ?>
                <tr>
                    <td class="penomeran"><?= $no++; ?></td>
                    <td width="150px"><?= $produk['nama_produk']; ?></td>
                    <td>Rp. <?= number_format($produk['harga_beli']); ?></td>
                    <td>Rp. <?= number_format($produk['harga_jual']); ?></td>
                    <td><?= $produk['nama_suplier']; ?></td>
                    <td class="tengah"><img src="<?= base_url('img/'.$produk['foto_produk']); ?>" alt="<?= $produk['foto_produk']; ?>" class="gambar"></td>
                    <td>
                    <a href="<?= base_url('admin/detail/'.$produk['id_produk']); ?>" class="btn btn-primary btn-sm">Detail</a>
                    <a href="<?= base_url('admin/editProduk/'.$produk['id_produk']); ?>" class="btn btn-warning btn-sm mt-1 mb-1"><i class="fa fa-edit"></i></a>
                    <a href="<?= base_url('admin/hapus/'.$produk['id_produk']); ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('Pemberitahuan, \nData yang dihapus tidak bisa dikemblikan')"><i class="fa fa-trash-alt"></i></a>
                </td>
                </tr>
                <?php endforeach; ?>
                
                </tbody>
                </table>
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>