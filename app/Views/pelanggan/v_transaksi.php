<?= $this->extend('layout/pelanggan/v_peltemplate'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Semua Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <!-- container -->

            <div class="row">
                <div class="col-md-7 mx-auto">

                    <?php
                    // dd($cekTransaksi);
                    if ($cekTransaksi) {
                        if ($cekTransaksi->id_pembeli == session()->get('id_pelanggan')) {
                    ?>
                            <!-- card -->
                            <?php foreach ($getPembayaran as $Pembayaran) { ?>
                                <div class="card">
                                    <div class="card-body">
                                        <input type="hidden" name="idInvoice" value="<?= $Pembayaran['id_invoice']; ?>">
                                        <div class="row">
                                            <div class="col-md-4 text-bold">
                                                Nomor Invoice
                                            </div>
                                            <div class="col-md-6">
                                                <?= 'PL' . $Pembayaran['id_invoice'] ?>
                                            </div>
                                            <?php
                                            if ($Pembayaran['aksi'] == true) {
                                            ?>
                                                <div class="col-md-2">
                                                    <a href="<?= base_url('/pelanggan/print/' . $Pembayaran['id_invoice']) ?>" class="float-right text-dark" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 text-bold">
                                                Tanggal Pemesanan
                                            </div>
                                            <div class="col-md-8">
                                                <?= $Pembayaran['tgl_beli'] ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 text-bold">
                                                Metode Pembayaran
                                            </div>
                                            <div class="col-md-8">
                                                <?= $Pembayaran['metode_pembayaran'] ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <table id="example1" class="table table-sm table-striped mt-3">
                                            <tbody>
                                                <tr>
                                                    <th>Status</th>
                                                    <?php if ($Pembayaran['aksi'] != true) { ?>
                                                        <td><span class="badge badge-warning">Sedang Diproses</span></td>
                                                    <?php } else { ?>
                                                        <td><span class="badge badge-success">Berhasil</span></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Taniku 46</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $db = \Config\Database::connect();
                                                    $total = 0;
                                                    $data = $db->table('pembelian')
                                                        ->join('ongkir', 'ongkir.id_ongkir = pembelian.id_ongkir')
                                                        ->getwhere(['id_invoice' => $Pembayaran['id_invoice']])->getResultArray();
                                                    foreach ($data as $value) {
                                                        $subtotal = $value['tarif'] + $value['total_pembelian'];
                                                        $total += $subtotal;
                                                    }

                                                    ?>
                                                    <th>Total Belanja</th>
                                                    <td>Rp<?= number_format($total) ?></td>

                                                </tr>
                                                <td>
                                                    <a href="<?= base_url('/pelanggan/hapusPembelian/' . $Pembayaran['id_invoice']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin membatalkan pesanan ini?')" title="Batalkan Pesanan">Batal</i></a>

                                                </td>
                                                <?php
                                                if ($Pembayaran['bukti_transfer'] == "") {
                                                ?>
                                                    <td>
                                                        <form action="<?= base_url(); ?>/pelanggan/tf" method="POST" enctype="multipart/form-data">
                                                            <input type="file" name="file" required>
                                                            <input type="hidden" name="id" value="<?= $Pembayaran['id_invoice'] ?>">
                                                            <input type="submit" name="upload" value="Upload Bukti" class="btn btn-primary">
                                                        </form>
                                                    </td>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Card End -->
                        <?php
                            }
                        }
                    } else {
                        ?>

                        <div class="alert alert-danger text-center">
                            <h3>Opps, Belum ada transaksi yang dilakukan Ayok Belanja</h3>
                        </div>
                    <?php } ?>
                </div>

            </div>

        </div><!-- Container End -->

    </div>
    <!-- Content End -->


</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>