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
							<h3 class="card-title">Wording - Package Calculation</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
								Add - Package Calculation
							</button><br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Package Calculation ID</th>
									<th>Logics</th>
									<th>Packs</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($object as $row => $value){ ?>
									<tr>
										<td><?php echo $row;?></td>
										<td><?php echo $value->logics;?></td>
										<td>
											<?php foreach($value->packs as $data){
												echo "- ".$data."<br>";
											} ?>
										</td>
										<td>
											<a href="<?=site_url('packages/pack_calc/edit/'.$row)?>">
												<button type="button" class="btn btn-block btn-warning btn-sm">Edit</button>
											</a><br>
											<a href="<?=site_url('packages/pack_calc/delete/'.$row)?>" onclick="return confirm('Are you sure you want to delete this item?');">
												<button type="button" class="btn btn-block btn-danger btn-sm">Delete</button>
											</a>
										</td>
									</tr>
								<?php  } ?>
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
				<h4 class="modal-title">Add - Package Calculation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="<?=site_url('packages/pack_calc/add')?>">
					<div class="card-body">
						<div class="form-group">
							<label for="name">Package Calculation ID (Letter and number only)</label>
							<input type="text" required class="form-control" id="name" name="name" placeholder="Enter package calculation ID">
						</div>
						<div class="form-group">
							<label for="logics">Logics</label>
							<input type="text" required class="form-control" id="logics" name="logics" placeholder="Enter logic">
						</div>
						<div class="form-group">
							<label for="desc">Packs</label>
							<select name="packs[]" required class="select2" multiple="multiple" data-placeholder="Select packages"
									style="width: 100%;">
								<?php
								$head = $file->packages;
								foreach($head as $heads => $heads_value){ ?>
									<option value="<?=$heads;?>"><?=$heads;?></option>
								<?php } ?>
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

<!-- ./wrapper -->
<script src="<?php echo site_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
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
