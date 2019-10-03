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
											$file = json_decode(file_get_contents('assets/packages.json'));
											$data = $file->list_head_group_new;
											foreach($data as $data1 => $val_data){
												if($val_data->id == $value1->list_head_group_new_id){
													echo $data1;
												}
											}
											?></td>
										<td>
											Indo : <?php echo ($value1->desc[0]);?><br>
											English : <?php echo ($value1->desc[1]);?>
										</td>
										<td>
											<a href="<?=site_url('wording/list_group/edit/'.$row.'/'.$row1)?>">
												<button type="button" class="btn btn-block btn-warning btn-sm">Edit</button>
											</a><br>
											<a href="<?=site_url('wording/list_group/delete/'.$row.'/'.$row1)?>" onclick="return confirm('Are you sure you want to delete this item?');">
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
