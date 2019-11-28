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
							<h3 class="card-title">Unit Detail - Packages</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form role="form" method="post" action="<?=site_url('packages/unitdetail/update/'.$id)?>">
								<div class="card-body">
									<div class="card-body">
										<div class="form-group">
											<label for="total">Total</label>
											<input type="text" required class="form-control" id="total" name="total" value="<?php if(isset($object->total)){ echo $object->total; } ?>">
										</div>
										<div class="form-group">
											<label for="total">Item :</label>
											<div>
												<table>
													<tr>
														<td>Type</td>
														<td>Val</td>
														<td>Default</td>
														<td>Unit Indonesia</td>
														<td>Unit English</td>
													</tr>
													<?php
													if(isset($object->item)){
													foreach($object->item as $row){ ?>
													<tr>
														<td><input type="text" id="type[]" name="type[]" value="<?=$row->type;?>"></td>
														<td><input type="text" id="val[]" name="val[]" value="<?=$row->val;?>"></td>
														<td><input type="text" id="default[]" name="default[]" value="<?=$row->default;?>"></td>
														<td><input type="text" id="unit_ind[]" name="unit_ind[]" value="<?=$row->unit[0];?>"></td>
														<td><input type="text" id="unit_eng[]" name="unit_eng[]" value="<?=$row->unit[1];?>"></td>
													</tr>
													<?php } } else {
														for($a=1;$a<=3;$a++){
														?>
														<tr>
															<td><input type="text" id="type[]" name="type[]"></td>
															<td><input type="text" id="val[]" name="val[]"></td>
															<td><input type="text" id="default[]" name="default[]"></td>
															<td><input type="text" id="unit_ind[]" name="unit_ind[]"></td>
															<td><input type="text" id="unit_eng[]" name="unit_eng[]"></td>
														</tr>
													<?php } } ?>
												</table>

											</div>

										</div>
									</div>
									<div class="modal-footer justify-content-between">
										<button type="submit" class="btn btn-primary">Update</button>
										<button class="btn btn-dark" onclick="history.back()">Back</button>
									</div>
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
	<!-- Select2 -->
	<script src="<?php echo site_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
	<!-- /.control-sidebar -->
</div>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4',
            tags: true
        })
    })
</script>

</body>
</html>
