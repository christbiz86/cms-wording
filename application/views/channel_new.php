<!DOCTYPE html>
<html>
<head>
	<!-- Select2 -->
	<link rel="stylesheet" href="<?=site_url()?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?=site_url()?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<?php include('components/header.php') ?>
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
							<h3 class="card-title">Wording - List Channel New</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
								Add - Channel New
							</button><br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>ID</th>
									<th>Type</th>
									<th>Name</th>
									<th>Fields</th>
									<th>Title</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php
								foreach($object as $row => $value){
									foreach($value as $row1 => $value1){
									foreach($value1 as $row2 => $value2){
										?>
										<tr>
											<td><?php echo $row;?></td>
											<td><?php echo $row1;?></td>
											<td><?php echo $value2->name;?></td>
											<td><?php
												if(isset($value2->fields)){
													foreach($value2->fields as $rowfield){ echo '- '.$rowfield.'<br>'; }
												} ?></td>
											<td>
												Indo : <?php echo $value2->title[0];?><br>
												English : <?php echo $value2->title[1];?>
											</td>
											<td>
												<a href="<?=site_url('wording/channel_new/edit/'.$row.'/'.$row1.'/'.$row2)?>">
													<button type="button" class="btn btn-block btn-warning btn-sm">Edit</button>
												</a><br>
												<a href="<?=site_url('wording/channel_new/delete/'.$row.'/'.$row1.'/'.$row2)?>" onclick="return confirm('Are you sure you want to delete this item?');">
													<button type="button" class="btn btn-block btn-danger btn-sm">Delete</button>
												</a>
											</td>
										</tr>
									<?php } } } ?>
								</tbody>
							</table>
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

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add - Channel</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="<?=site_url('wording/channel_new/add')?>">
					<div class="card-body">
						<div class="form-group">
							<label for="name">ID</label>
							<input type="text" required class="form-control" id="id" name="id" placeholder="Channel new ID">
						</div>
						<div class="form-group">
							<label for="id">Channel Group</label>
							<select name="id" class="select2" data-placeholder="Select channel group"
									style="width: 100%;">
								<option value="topup">topup</option>
								<option value="auto">auto</option>
								<option value="purchase">purchase</option>
							</select>
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" required class="form-control" id="name" name="name" placeholder="Enter name">
						</div>
						<div class="form-group">
							<label for="icon">Icon</label>
							<input type="text" required class="form-control" id="icon" name="icon" placeholder="Enter icon">
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
							<input type="text" required class="form-control" id="desc" name="title[]" placeholder="Enter title (Indo)">
						</div>
						<div class="form-group">
							<label for="desc">Title (English)</label>
							<input type="text" required class="form-control" id="desc" name="title[]" placeholder="Enter title (English)">
						</div>
						<div class="form-group">
							<label for="action">Action</label>
							<input type="text" class="form-control" id="action" name="action" placeholder="Enter action">
						</div>
						<div class="form-group">
							<label for="url">Url</label>
							<input type="text" class="form-control" id="url" name="url" placeholder="Enter url">
						</div>
						<div class="form-group">
							<label for="voucher">Voucher</label>
							<input type="text" class="form-control" id="voucher" name="voucher" placeholder="Enter voucher">
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- ./wrapper -->
<script src="<?php echo site_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
<script>
    $(function () {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            // "columnDefs": [
            //     { "orderable": false, "targets": 2 }
            // ]
        });
        $('.select2multi').select2({
            theme: 'bootstrap4',
            tags: true
        });
    });
</script>
</body>
</html>
