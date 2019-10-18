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
							<h3 class="card-title">Edit Wording - MAP Offer Profile</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form role="form" method="post" action="<?=site_url('packages/map_offer_profile/update/'.$id)?>">
								<div class="card-body">
									<div class="form-group">
										<label for="name">Code (Letter and number only)</label>
										<input type="text" required class="form-control" pattern="[a-zA-Z0-9-]+" id="name" name="name" value="<?=$id;?>">
									</div>
									<div class="form-group">
										<label for="offer">Offer</label>
										<select name="offer[]" required class="select2" multiple="multiple"
												style="width: 100%;">
											<?php foreach($object->offer as $row){ ?>
											<option selected value="<?=$row;?>"><?=$row;?></option>
											<?php } ?>
											<option></option>
										</select>
									</div><div class="form-group">
										<label for="tagid">Tag ID</label>
										<select name="tagid[]" required class="select2" multiple="multiple"
												style="width: 100%;">
											<?php foreach($object->tagid as $row1){ ?>
												<option selected value="<?=$row1;?>"><?=$row1;?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="content">Exc Tag ID</label>
										<select name="exc_tagid[]" required class="select2" multiple="multiple"
												style="width: 100%;">
											<?php foreach($object->exc_tagid as $row2){ ?>
												<option selected value="<?=$row2;?>"><?=$row2;?></option>
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
