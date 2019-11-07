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
							<h3 class="card-title">Wording - List Group Type</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
								Add - List Group Type
							</button><br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>List Group Type</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php $no=1; foreach($object as $row){ ?>
										<tr>
											<td><?php echo $no;?></td>
											<td><?php echo $row->addon_title;?></td>
											<td>
												<a href="<?=site_url('list_group_type/edit/'.$row->addon_id)?>">
													<button type="button" class="btn btn-block btn-warning btn-sm">Edit</button>
												</a><br>
												<a href="<?=site_url('list_group_type/delete/'.$row->addon_id)?>" onclick="return confirm('Are you sure you want to delete this item?');">
													<button type="button" class="btn btn-block btn-danger btn-sm">Delete</button>
												</a>
											</td>
										</tr>
									<?php $no++; } ?>
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
				<form role="form" method="post" action="<?=site_url('list_group_type/add')?>">
					<div class="card-body">
						<div class="form-group">
							<label for="name">List Group Type</label>
							<input type="text" required class="form-control" id="name" name="name" placeholder="Enter list group type">
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
                { "orderable": false, "targets": 2 }
            ]
        });
    });
</script>
</body>
</html>
