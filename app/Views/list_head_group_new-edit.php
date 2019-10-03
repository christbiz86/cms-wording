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
							<h3 class="card-title">Edit Wording - List Head Group New</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form role="form" method="post" action="<?=site_url('wording/list_head_group_new/update/'.$id)?>">
								<div class="card-body">
									<div class="form-group">
										<label for="id">List Head Group ID</label>
										<input type="text" required class="form-control" id="id" name="id" value="<?=$object->id;?>">
									</div>
									<div class="form-group">
										<label for="bg">Background (Indo)</label>
										<input type="text" required class="form-control" id="bg" name="bg[]" value="<?=$object->bg[0];?>">
									</div>
									<div class="form-group">
										<label for="bg">Background (English)</label>
										<input type="text" required class="form-control" id="bg" name="bg[]" value="<?=$object->bg[1];?>">
									</div>
									<div class="form-group">
										<label for="desc">Desc (Indo)</label>
										<input type="text" required class="form-control" id="desc" name="desc[]" value="<?=$object->desc[0];?>">
									</div>
									<div class="form-group">
										<label for="desc">Desc (English)</label>
										<input type="text" required class="form-control" id="desc" name="desc[]" value="<?=$object->desc[1];?>">
									</div>
									<div class="form-group">
										<label>Ionicon</label>
										<select name="ionicon[]" class="select2" multiple="multiple" data-placeholder="Select a ionicon"
												style="width: 100%;">
											<option value="globe" <?php if(in_array('globe',$object->ionicon)){ ?>selected<?php } ?>>globe</option>
											<option value="play" <?php if(in_array('play',$object->ionicon)){ ?>selected<?php } ?>>play</option>
											<option value="headset" <?php if(in_array('headset',$object->ionicon)){ ?>selected<?php } ?>>headset</option>
											<option value="share" <?php if(in_array('share',$object->ionicon)){ ?>selected<?php } ?>>share</option>
											<option value="plane" <?php if(in_array('plane',$object->ionicon)){ ?>selected<?php } ?>>plane</option>
											<option value="briefcase" <?php if(in_array('briefcase',$object->ionicon)){ ?>selected<?php } ?>>briefcase</option>
											<option value="boat" <?php if(in_array('boat',$object->ionicon)){ ?>selected<?php } ?>>boat</option>
											<option value="cube" <?php if(in_array('cube',$object->ionicon)){ ?>selected<?php } ?>>cube</option>
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
            theme: 'bootstrap4'
        })
    })
</script>

</body>
</html>
