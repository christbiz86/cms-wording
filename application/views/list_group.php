<!DOCTYPE html>
<html>
<head>
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
							<h3 class="card-title">Wording - List Group</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
								Add - List Group
							</button><br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>List Group Name</th>
									<th>List Group ID</th>
									<th>List Head Group New ID</th>
									<th>Desc</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($object as $row => $value){ ?>
									<?php foreach($value as $row1 => $value1){ ?>
									<tr>
										<td><?php echo ($row);?></td>
										<td><?php echo ($row1);?></td>
										<td><?php
											$data = $file->list_head_group_new;
											if(isset($value1->list_head_group_new_id)){
												foreach($data as $data1 => $val_data){
													if(isset($val_data->id)){
														if($val_data->id == $value1->list_head_group_new_id){
															echo $data1;
														}
													}
												}
											}
											?></td>
										<td>
											Indo : <?php echo ($value1->desc[0]);?><br>
											English : <?php echo ($value1->desc[1]);?>
										</td>
										<td>
											<a href="<?=site_url('packages/list_group/edit/'.$row.'/'.$row1)?>">
												<button type="button" class="btn btn-block btn-warning btn-sm">Edit</button>
											</a><br>
											<a href="<?=site_url('packages/list_group/delete/'.$row.'/'.$row1)?>" onclick="return confirm('Are you sure you want to delete this item?');">
												<button type="button" class="btn btn-block btn-danger btn-sm">Delete</button>
											</a>
										</td>
									</tr>
								<?php } } ?>
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
				<h4 class="modal-title">Add - List Group</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="<?=site_url('packages/list_group/add')?>">
					<div class="card-body">
						<div class="form-group">
							<label for="name">List Group Name</label>
							<input type="text" required class="form-control" id="name" name="name" placeholder="Enter list group name">
						</div>
						<div class="form-group">
							<label for="type">List Group Type</label>
							<select name="type" class="form-control">
								<?php foreach($addon as $addons){ ?>
									<option value="<?=$addons->addon_title?>"><?=$addons->addon_title?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="id">List Group ID</label>
							<input type="text" required class="form-control" id="id" name="id" placeholder="Enter list group ID">
						</div>
						<div class="form-group">
							<label>List Head Group New</label>
							<select name="list_head_group_new_id" class="form-control">
								<?php foreach($head as $key_head => $value_head){ ?>
									<option value="<?=$value_head->id;?>"><?=$key_head;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="desc">Desc (Indo)</label>
							<input type="text" required class="form-control" id="desc" name="desc[]" placeholder="Enter desc indo">
						</div>
						<div class="form-group">
							<label for="desc">Desc (English)</label>
							<input type="text" required class="form-control" id="desc" name="desc[]" placeholder="Enter desc english">
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
                { "orderable": false, "targets": 4 }
            ]
        });
    });
</script>
</body>
</html>
