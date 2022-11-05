<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Laporan Penjualan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
          <li class="breadcrumb-item active">Laporan Penjualan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-body">
      <form action="<?= base_url('/Laporan/carilaporan/'); ?>" methos="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Bulan</label>
              <select name="bulan" class="form-control">
                <option value="">- Bulan -</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <label>Tahun</label>
            <div class="input-group">
              <select name="tahun" class="form-control">
                <option value="">- Tahun -</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
              </select>
              <span class="input-group-btn">
                <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i> Cari</button>
              </span>
            </div>
          </div>
        </div>
      </form>
      <a href="<?= base_url('Laporan/cetak1'); ?>" class="btn btn-secondary" target="_blank"><i class="fa fa-print"></i> Cetak</a>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>jumlah</th>
            <th>Total Penjualan</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $no = 1;
          $total = 0;
          $totalharga = 0;
          foreach ($data as $value) {
            $total = $value['harga'] * $value['jumlah'];
            $totalharga += $total;
            // foreach($data2 as $aa){
            $id = $value['id_produk'];
            $nama = $db->query("select * from produk where id_produk='$id'")->getRowArray();
            // dd($caridata);
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $nama['nama_produk']; ?></td>
              <td>Rp<?= number_format($value['harga']); ?></td>
              <td><?= $value['jumlah'] ?></td>
              <td>Rp<?= number_format($total); ?></td>
            </tr>
          <?php
          }
          ?>
          <tr class="bg-secondary">
            <td colspan="4" align="center"><b>Total</b></td>
            <td><b>Rp<?= number_format($totalharga) ?></b></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>