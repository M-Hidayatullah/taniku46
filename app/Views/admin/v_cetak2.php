<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Icon -->
  <link rel="icon" type="image/png" href="<?= base_url(); ?>/img/logo/16.png">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/adminlte.min.css">

</head>

<body>
  <div class="row">
    <div class="col-md-12">
      <div class="card m-4">
        <div class="card-body">
          <center>
            <h3>LAPORAN PENJUALAN</h3>
          </center>
          <br>
          <table id="example1" class="table table-bordered table-striped">
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
    </div>
  </div>

  <!-- /.login-box -->
  <script>
    print();
  </script>
  <!-- jQuery -->
  <script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>/template/dist/js/adminlte.min.js"></script>

</body>

</html>