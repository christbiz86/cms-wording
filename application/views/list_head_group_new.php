<!DOCTYPE html>
<html>
<head>
	<?php include('components/header.php') ?>
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
							<h3 class="card-title">Wording - Category</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
								Add - Category
							</button><br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Category Name</th>
									<th>Category ID</th>
									<th>Desc</th>
									<th>Background</th>
									<th>Ionicon</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php foreach($object as $row => $value){ ?>
									<tr>
										<td><?php echo $row;?></td>
										<td><?php echo $value->id;?></td>
										<td>
											Indo : <?php echo $value->desc[0];?><br>
											English : <?php echo $value->desc[1];?>
										</td>
										<td>
											Indo : <img src="<?php echo $value->bg[0];?>" width="100"><br>
											English : <img src="<?php echo $value->bg[1];?>" width="100">
										</td>
										<td>
											<?php foreach($value->ionicon as $data){
												echo "- ".$data."<br>";
											} ?>
										</td>
										<td>
											<a href="<?=site_url('packages/list_head_group_new/edit/'.$row)?>">
												<button type="button" class="btn btn-block btn-warning btn-sm">Edit</button>
											</a><br>
											<a href="<?=site_url('packages/list_head_group_new/delete/'.$row)?>" onclick="return confirm('Are you sure you want to delete this item?');">
												<button type="button" class="btn btn-block btn-danger btn-sm">Delete</button>
											</a>
										</td>
									</tr>
									<?php } ?>
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
				<h4 class="modal-title">Add - Packages</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="<?=site_url('packages/list_head_group_new/add')?>">
					<div class="card-body">
						<div class="form-group">
							<label for="name">Category Name (Letter and number only)</label>
							<input type="text" required class="form-control" pattern="[a-zA-z0-9-]+" id="name" name="name" placeholder="Enter category name">
						</div>
						<div class="form-group">
							<label for="id">Category ID</label>
							<input type="text" class="form-control" id="id" name="id" placeholder="Enter category id">
						</div>
						<div class="form-group">
							<label for="bg">Background (Indo)</label>
							<input type="text" required class="form-control" id="bg" name="bg[]" placeholder="Enter bg (Indo)">
						</div>
						<div class="form-group">
							<label for="bg">Background (English)</label>
							<input type="text" required class="form-control" id="bg" name="bg[]" placeholder="Enter bg (English)">
						</div>
						<div class="form-group">
							<label for="description">Description (Indo)</label>
							<input type="text" required class="form-control" id="desc" name="desc[]" placeholder="Enter desc (Indo)">
						</div>
						<div class="form-group">
							<label for="description">Description (English)</label>
							<input type="text" required class="form-control" id="desc" name="desc[]" placeholder="Enter desc (English)">
						</div>
						<div class="form-group">
							<label for="ionicon">Ionicon</label>
							<select name="ionicon[]" class="select2" multiple="multiple" data-placeholder="Select a ionicon"
									style="width: 100%;">
								<option value="globe">globe</option>
								<option value="play">play</option>
								<option value="headset">headset</option>
								<option value="share">share</option>
								<option value="plane">plane</option>
								<option value="briefcase">briefcase</option>
								<option value="boat">boat</option>
								<option value="cube">cube</option>
							</select>
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
            "columnDefs": [
                { "orderable": false, "targets": 5 }
            ]
        });
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>
</body>
</html>
