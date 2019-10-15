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
							<h3 class="card-title">Wording - Partitions</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
								Add - Partitions
							</button><br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Partition ID</th>
									<th>Name</th>
									<th>Group</th>
									<th>Type</th>
									<th>Wording</th>
									<th>Desc</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php foreach($object as $row => $value){ ?>
									<tr>
										<td><?php echo ($row);?></td>
										<td><?=$value->name;?></td>
										<td><?=$value->group;?></td>
										<td><?=$value->type;?></td>
										<td>
											Indo : <?=$value->wording[0];?><br>
											English : <?=$value->wording[1];?>
										</td>
										<td>
											Indo : <?=$value->desc[0];?><br>
											English : <?=$value->desc[1];?>
										</td>
										<td>
											<a href="<?=site_url('packages/partitions/edit/'.$row)?>">
												<button type="button" class="btn btn-block btn-warning btn-sm">Edit</button>
											</a><br>
											<a href="<?=site_url('packages/partitions/delete/'.$row)?>" onclick="return confirm('Are you sure you want to delete this item?');">
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
				<h4 class="modal-title">Add - Partitions</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="<?=site_url('packages/partitions/add')?>">
					<div class="form-check">
						<input type="checkbox" name="special_partitions" class="form-check-input">
						<label class="form-check-label" for="exampleCheck1"><b>Special Partitions</b></label>
					</div>
					<div class="form-check">
						<input type="checkbox" name="curr_partitions" class="form-check-input">
						<label class="form-check-label" for="exampleCheck1"><b>Current Partitions</b></label>
					</div>
					<div class="form-check">
						<input type="checkbox" name="showed_partitions" class="form-check-input">
						<label class="form-check-label" for="exampleCheck1"><b>Showed Partitions</b></label>
					</div>
					<div class="form-check">
						<input type="checkbox" name="data_partitions" class="form-check-input">
						<label class="form-check-label" for="exampleCheck1"><b>Data Partitions</b></label>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="name">Partition ID</label>
							<input type="text" required class="form-control" id="id" name="id" placeholder="Enter id">
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" required class="form-control" id="name" name="name" placeholder="Enter name">
						</div>
<!--						<div class="form-group">-->
<!--							<label for="quota">Quota</label>-->
<!--							<input type="text" required class="form-control" id="quota" name="quota" placeholder="Enter quota">-->
<!--						</div>-->
<!--						<div class="form-group">-->
<!--							<label for="type">Type</label>-->
<!--							<select name="type" class="select2" data-placeholder="Enter type"-->
<!--									style="width: 100%;">-->
<!--								--><?php //foreach($type as $data1 => $value1){ ?>
<!--									<option value="--><?//=$value1->name;?><!--">--><?//=$value1->name;?><!--</option>-->
<!--								--><?php //} ?>
<!--							</select>-->
<!--						</div>-->
						<div class="form-group">
							<label for="order">Order</label>
							<input type="text" required class="form-control" id="order" name="order" placeholder="Enter order">
						</div>
						<div class="form-group">
							<label for="adjust_exp">Adjust Exp</label>
							<input type="text" required class="form-control" id="adjust_exp" name="adjust_exp" placeholder="Enter adjust exp">
						</div>
<!--						<div class="form-group">-->
<!--							<label for="sub_type">Sub Type</label>-->
<!--							<select name="sub_type" class="select2" data-placeholder="Enter sub type"-->
<!--									style="width: 100%;">-->
<!--								--><?php //foreach($subtype as $data2 => $value2){ ?>
<!--									<option value="--><?//=$value2->name;?><!--">--><?//=$value2->name;?><!--</option>-->
<!--								--><?php //} ?>
<!--							</select>-->
<!--						</div>-->
						<div class="form-group">
							<label for="group">Group</label>
							<select name="group" class="select2" data-placeholder="Enter group"
									style="width: 100%;">
								<?php foreach($groups as $data){ ?>
									<option value="<?=$data;?>"><?=$data;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="wording">Wording (Indo)</label>
							<input type="text" required class="form-control" id="wording" name="wording[]" placeholder="Enter wording (Indo)">
						</div>
						<div class="form-group">
							<label for="wording">Wording (English)</label>
							<input type="text" required class="form-control" id="wording" name="wording[]" placeholder="Enter wording (English)">
						</div>
						<div class="form-group">
							<label for="desc">Desc (Indo)</label>
							<input type="text" required class="form-control" id="desc" name="desc[]" placeholder="Enter desc (Indo)">
						</div>
						<div class="form-group">
							<label for="desc">Desc (English)</label>
							<input type="text" required class="form-control" id="desc" name="desc[]" placeholder="Enter desc (English)">
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
<!-- ./wrapper -->
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
                { "orderable": false, "targets": 6 }
            ]
        });
    });
</script>
</body>
</html>
