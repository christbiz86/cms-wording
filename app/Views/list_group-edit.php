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
							<h3 class="card-title">Edit Wording - List Group</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form role="form" method="post" action="<?=site_url('wording/list_group/update/'.$id.'/'.$detail)?>">
								<div class="card-body">
									<div class="form-group">
										<label for="id">List Group ID</label>
										<input type="text" required class="form-control" id="id" name="id" value="<?=$object->id;?>">
									</div>
									<div class="form-group">
										<label>List Head Group New</label>
										<select name="list_head_group_new_id" class="form-control">
											<?php foreach($head as $key_head => $value_head){ ?>
											<option <?php if($object->list_head_group_new_id == $value_head->id){ ?>selected<?php } ?> value="<?=$value_head->id;?>"><?=$key_head;?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="desc">Desc (Indo)</label>
										<input type="text" required class="form-control" id="desc" name="desc[]" value="<?=$object->desc[0];?>">
									</div>
									<div class="form-group">
										<label for="desc">Desc (English)</label>
										<input type="text" required class="form-control" id="desc" name="desc[]" value="<?=$object->desc[1];?>">
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
            theme: 'bootstrap4'
        })
    })
</script>

</body>
</html>
