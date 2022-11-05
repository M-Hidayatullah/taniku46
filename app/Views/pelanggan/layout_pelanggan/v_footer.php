<footer class="main-footer text-center">
	<strong>Copyright &copy; <?= date('Y') ?>.</strong> <b>SelengenTani@.com</b>
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
<!-- Summernote -->
<script src="<?= base_url() ?>/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Alert -->
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>/template/plugins/toastr/toastr.min.js"></script>

<script>
	$(function () {
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

	$(function () {
    // Summernote
    $('.textarea').summernote()
})

  //Notifikasi Toast
  function pesan($warna,$pesan){
  	const Toast = Swal.mixin({
  		toast: true,
  		position: 'top-end',
  		showConfirmButton: false,
  		timer: 3000
  	});

  	switch($warna){
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
<?php if(session()->getFlashdata('sukses')){ ?>
	<script>
		pesan('1','<?= session()->getFlashdata('sukses'); ?>');
	</script>
<?php }else if(session()->getFlashdata('ubah')){?>
	<script>
		pesan('2','<?= session()->getFlashdata('ubah'); ?>');
	</script>
<?php }else if(session()->getFlashdata('hapus')){?>
	<script>
		pesan('3','<?= session()->getFlashdata('hapus'); ?>');
	</script>
<?php } ?>

</body>
</html>