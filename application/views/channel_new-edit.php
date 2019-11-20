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
							<h3 class="card-title">Edit Wording - Channel</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form role="form" method="post" action="<?=site_url('wording/channel_new/update/'.$id.'/'.$id1.'/'.$id2)?>">
								<div class="card-body">
									<div class="form-group">
										<label for="name">ID</label>
										<input type="text" required class="form-control" id="id" name="id" value="<?=$id;?>">
									</div>
									<div class="form-group">
										<label for="id">Type</label>
										<select name="id" class="select2" data-placeholder="Select channel group"
												style="width: 100%;">
											<option value="topup" <?php if($id1=='topup'){ echo 'selected'; } ?>>topup</option>
											<option value="auto" <?php if($id1=='auto'){ echo 'selected'; } ?>>auto</option>
											<option value="purchase" <?php if($id1=='purchase'){ echo 'selected'; } ?>>purchase</option>
										</select>
									</div>
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" required class="form-control" id="name" name="name" value="<?=$object->name;?>">
									</div>
									<div class="form-group">
										<label for="icons">Icon</label>
										<input type="text" required class="form-control" id="icons" name="icons" value="<?php if(isset($object->icons)){ echo $object->icons;}?>">
									</div>
									<div class="form-group">
										<label for="fields">Fields</label>
										<select name="fields[]" multiple="multiple" class="select2multi" data-placeholder="Select fields"
												style="width: 100%;">
											<?php if(isset($object->fields)){
												foreach($object->fields as $data){
												?>
											<option value="<?=$data;?>" selected><?=$data;?></option>
											<?php } } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="desc">Title (Indo)</label>
										<input type="text" required class="form-control" id="desc" name="title[]" value="<?=$object->title[0];?>">
									</div>
									<div class="form-group">
										<label for="desc">Title (English)</label>
										<input type="text" required class="form-control" id="desc" name="title[]" value="<?=$object->title[1];?>">
									</div>
									<div class="form-group">
										<label for="action">Action</label>
										<input type="text" class="form-control" id="action" name="action" value="<?php if(isset($object->action)){ echo $object->action;}?>">
									</div>
									<div class="form-group">
										<label for="url">Url</label>
										<input type="text" class="form-control" id="url" name="url" value="<?php if(isset($object->url)){ echo $object->url;}?>">
									</div>
									<div class="form-group">
										<label for="voucher">Voucher</label>
										<input type="text" class="form-control" id="voucher" name="voucher" value="<?php if(isset($object->voucher)){ echo $object->voucher;}?>">
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
        $('.select2multi').select2({
            theme: 'bootstrap4',
            tags: true
        });
    });
</script>
</body>
</html>
