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
							<h3 class="card-title">Wording - List Channel New</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>ID</th>
									<th>Type</th>
									<th>Name</th>
									<th>Fields</th>
									<th>Title</th>
<!--									<th>Action</th>-->
								</tr>
								</thead>
								<tbody>
								<?php
								foreach($object as $row => $value){
									foreach($value as $row1 => $value1){
									foreach($value1 as $value2){
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
<!--											<td>-->
<!--												<a href="--><?//=site_url('wording/channel/edit/'.$row)?><!--">-->
<!--													<button type="button" class="btn btn-block btn-warning btn-sm">Edit</button>-->
<!--												</a><br>-->
<!--												<a href="--><?//=site_url('wording/channel/delete/'.$row)?><!--" onclick="return confirm('Are you sure you want to delete this item?');">-->
<!--													<button type="button" class="btn btn-block btn-danger btn-sm">Delete</button>-->
<!--												</a>-->
<!--											</td>-->
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
				<form role="form" method="post" action="<?=site_url('wording/channel/add')?>">
					<div class="card-body">
						<div class="form-group">
							<label for="id">ID (number only)</label>
							<input type="text" pattern="[0-9-]+" required class="form-control" id="id" name="id" placeholder="Enter ID">
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" required class="form-control" id="name" name="name" placeholder="Enter name">
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
							<label for="voucher">Voucher</label>
							<input type="text" required class="form-control" id="voucher" name="voucher" placeholder="Enter voucher">
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
