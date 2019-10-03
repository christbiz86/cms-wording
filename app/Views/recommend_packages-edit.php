<!DOCTYPE html>
<html>
<head>
	<?php include('components/header.php') ?>
	<!-- Select2 -->
	<link rel="stylesheet" href="<?=site_url()?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?=site_url()?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	<!-- Navbar -->
	<?php include('components/navbar.php') ?>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<?php include('components/sidebar.php') ?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<?php include('components/breadcrumb.php') ?>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Edit Wording - Recommend Packages</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form role="form" method="post" action="<?=site_url('wording/recommend_packages/update/'.$id)?>">
								<div class="card-body">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" required class="form-control" id="name" name="name" value="<?=$id;?>">
									</div>
									<div class="form-group">
										<label for="content">Content</label>
										<select name="desc[]" required class="select2" multiple="multiple" data-placeholder="Select packages"
												style="width: 100%;">
											<?php
											$file = json_decode(file_get_contents('assets/packages.json'));
											$head = $file->packages;
											foreach($head as $heads => $heads_value){ ?>
												<option value="<?=$heads;?>" <?php if(in_array($heads,$object)){ echo "selected"; } ?>><?=$heads;?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="modal-footer justify-content-between">
									<button type="submit" class="btn btn-primary">Update</button>
								</div>
							</form>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<?php include('components/footer.php'); ?>
	<!-- /.control-sidebar -->
</div>
<script src="<?php echo site_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>
</body>
</html>
