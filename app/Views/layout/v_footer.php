<footer class="main-footer text-center">
  <strong>Copyright &copy; <?= date('Y') ?>.</strong> <b>taniku46@gmail.com</b>
</footer>

<!-- Control Sidebar
  <aside class="control-sidebar control-sidebar-dark">
  
  </aside> -->

</div>
<!-- ./wrapper -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Summernote -->
<script src="<?= base_url() ?>/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- jQuery -->
<script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>/template/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/template/assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/template/assets/js/demo.js"></script>
<!-- chart -->
<script src="<?= base_url() ?>/template/assets/chart/Chart.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Alert -->
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>/template/plugins/toastr/toastr.min.js"></script>

<script>
  <?php
  function bulan($bln)
  {
    $bulan = $bln;
    switch ($bulan) {
      case 1:
        $bulan = "Januari";
        break;
      case 2:
        $bulan = "Februari";
        break;
      case 3:
        $bulan = "Maret";
        break;
      case 4:
        $bulan = "April";
        break;
      case 5:
        $bulan = "Mei";
        break;
      case 6:
        $bulan = "Juni";
        break;
      case 7:
        $bulan = "Juli";
        break;
      case 8:
        $bulan = "Agustus";
        break;
      case 9:
        $bulan = "September";
        break;
      case 10:
        $bulan = "Oktiber";
        break;
      case 11:
        $bulan = "November";
        break;
      case 12:
        $bulan = "Desember";
        break;
    }
    return $bulan;
  }

  $db = \Config\Database::connect();
  $bln = date('m');
  $thn = date('Y');

  $b = $db->query("SELECT MONTH(tgl_pembelian) AS bulan FROM pembelian WHERE YEAR(tgl_pembelian) = '$thn' GROUP BY MONTH(tgl_pembelian)");
  $pendapatan = $db->query("SELECT SUM(total_pembelian) AS pendapatan FROM pembelian WHERE YEAR(tgl_pembelian) = '$thn' GROUP BY MONTH(tgl_pembelian)");
  $data = $b->getResultArray();
  $pdptn = $pendapatan->getResultArray();
  ?>

  // Chart
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [<?php foreach ($data as $d) { ?> "<?= bulan($d['bulan']) ?>", <?php } ?>],
      datasets: [{
        label: 'Pendapatan',
        data: [
          <?php foreach ($pdptn as $p) {
            echo '"' . $p['pendapatan'] . '",';
          } ?>
        ],
        backgroundColor: [
          <?php foreach ($data as $d) { ?> "rgba(54, 162, 235, 1)", "rgba(255, 99, 132, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          <?php } ?>

        ],
        borderColor: [
          <?php foreach ($data as $d) { ?> "rgba(54, 162, 235, 1)", "rgba(255, 99, 132, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          <?php } ?>
        ],
        borderWidth: 1
      }, ]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });

  $(function() {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

  $(function() {
    // Summernote
    $('.textarea').summernote()
  })

  //Notifikasi Toast
  function pesan($warna, $pesan) {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    switch ($warna) {
      case "1":
        toastr.success($pesan);
        break;
      case "2":
        toastr.warning($pesan);
        break;
      default:
        toastr.error($pesan);

    }

  }
</script>
<?php if (session()->getFlashdata('sukses')) { ?>
  <script>
    pesan('1', '<?= session()->getFlashdata('sukses'); ?>');
  </script>
<?php } else if (session()->getFlashdata('ubah')) { ?>
  <script>
    pesan('2', '<?= session()->getFlashdata('ubah'); ?>');
  </script>
<?php } else if (session()->getFlashdata('hapus')) { ?>
  <script>
    pesan('3', '<?= session()->getFlashdata('hapus'); ?>');
  </script>
<?php } ?>

</body>

</html>