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
                <option value="01" <?php if ($bulan == '01') {
                                      echo 'selected';
                                    } ?>>Januari</option>
                <option value="02" <?php if ($bulan == '02') {
                                      echo 'selected';
                                    } ?>>Februari</option>
                <option value="03" <?php if ($bulan == '03') {
                                      echo 'selected';
                                    } ?>>Maret</option>
                <option value="04" <?php if ($bulan == '04') {
                                      echo 'selected';
                                    } ?>>April</option>
                <option value="05" <?php if ($bulan == '05') {
                                      echo 'selected';
                                    } ?>>Mei</option>
                <option value="06" <?php if ($bulan == '06') {
                                      echo 'selected';
                                    } ?>>Juni</option>
                <option value="07" <?php if ($bulan == '07') {
                                      echo 'selected';
                                    } ?>>Juli</option>
                <option value="08" <?php if ($bulan == '08') {
                                      echo 'selected';
                                    } ?>>Agustus</option>
                <option value="09" <?php if ($bulan == '09') {
                                      echo 'selected';
                                    } ?>>September</option>
                <option value="10" <?php if ($bulan == '10') {
                                      echo 'selected';
                                    } ?>>Oktober</option>
                <option value="11" <?php if ($bulan == '11') {
                                      echo 'selected';
                                    } ?>>November</option>
                <option value="12" <?php if ($bulan == '12') {
                                      echo 'selected';
                                    } ?>>Desember</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <label>Tahun</label>
            <div class="input-group">
              <select name="tahun" class="form-control">
                <option value="2020" <?php if ($tahun == '2020') {
                                        echo 'selected';
                                      } ?>>2020</option>
                <option value="2021" <?php if ($tahun == '2021') {
                                        echo 'selected';
                                      } ?>>2021</option>
                <option value="2022" <?php if ($tahun == '2022') {
                                        echo 'selected';
                                      } ?>>2022</option>
              </select>
              <span class="input-group-btn">
                <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i> Cari</button>
              </span>
            </div>
          </div>
        </div>
      </form>
      <a href="<?= base_url('Laporan/cetak2/' . $bulan . '/' . $tahun); ?>" class="btn btn-secondary" target="_blank"><i class="fa fa-print"></i> Cetak</a>
      <table id="example1" class="table table-bordered table-striped">
        <!-- <input type="text" value=""> -->
        <?php
        // dd($caridata);
        if ($caridata) { ?>
          <thead>
            <tr>
              <th>No</th>
              <th>Produk</th>
              <th>Harga</th>
              <th>Tanggal Pembelian</th>
              <th>jumlah</th>
              <th>Total Penjualan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // dd($caridata);
            $no = 1;
            $total = 0;
            $totalharga = 0;
            foreach ($caridata as $data) {
              $total = $data['harga'] * $data['jumlah'];
              $totalharga += $total;
              // foreach($data2 as $aa){
              $id = $data['id_produk'];
              $nama = $db->query("select * from produk where id_produk='$id'")->getRowArray();
              // dd($data);
            ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $nama['nama_produk']; ?></td>
                <td>Rp<?= number_format($data['harga']); ?></td>
                <td><?= $data['tgl_pembelian']; ?></td>
                <td><?= $data['jumlah']; ?></td>
                <td>Rp<?= number_format($total); ?></td>
              </tr>
            <?php
            } ?>
            <tr class="bg-secondary">
              <td colspan="5" align="center"><b>Total</b></td>
              <td><b>Rp<?= number_format($totalharga) ?></b></td>
            </tr>
          <?php } else { ?>
            <div class="alert alert-danger">Data yang anda cari tidak ada</div>
          <?php } ?>
          </tbody>
      </table>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>