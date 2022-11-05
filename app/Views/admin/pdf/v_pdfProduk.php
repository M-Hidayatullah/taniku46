<!DOCTYPE html>
<html>
<head>
  <title><?= $title; ?></title>
</head>
<body>
<style type="text/css">
  .table{
  font-size: 10px;
}
</style>
              
<table border="1" class="table">
<tr align="center">
    <th width="30px"><strong>No</strong></th>
    <th width="50px"><strong>Id Invoice</strong> </th>
    <th width="248px"><strong>Nama Produk</strong></th>
    <th><strong>Tanggal Pembelian</strong></th>
    <th><strong>Harga</strong></th>
    <th width="50px"><strong>Jumlah</strong></th>
    <th><strong>Ongkir</strong></th>
    <th><strong>Subtotal</strong></th>
</tr>
<?php 
$no = 1;
$total=0;
foreach($getData as $p) :
  $subtotal = $p['tarif'] + $p['total_pembelian'];

  $total += $subtotal;
  ?>
<tr>
    <td width="30px" align="center"><?= $no++; ?></td>
    <td width="50px"><?= $p['id_invoice']; ?></td>
    <td width="248px"><?= $p['nama_produk']; ?></td>
    <td><?= $p['tgl_pembelian']; ?></td>
    <td><?= number_format($p['harga']); ?></td>
    <td width="50px"><?= $p['jumlah']; ?></td>
    <td><?= number_format($p['tarif']); ?></td>
    <td><?= number_format($subtotal) ?></td>
</tr>
<?php endforeach; ?>
<tr>
  <td colspan="6" class="text-bold text-center" align="center"><strong>Total</strong></td>
  <td colspan="2" class="text-bold" align="center"><strong>Rp<?= number_format($total); ?></strong></td>
</tr>
</table>
</body>
</html>