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
							<h3 class="card-title">Wording - List Head Group New</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>List Head Group Name</th>
									<th>List Head Group ID</th>
									<th>Background</th>
									<th>Desc</th>
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

</body>
</html>
