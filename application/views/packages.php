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
							<h3 class="card-title">Wording - Packages</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
								Add - Packages
							</button><br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Package ID</th>
									<th>Name</th>
									<th>Addon</th>
									<th>Price</th>
									<th>Desc</th>
									<th>Current Package</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($object as $row => $value){ ?>
										<tr>
											<td><?php echo ($row);?></td>
											<td><?php echo $value->name;?></td>
											<td><?php
												if(is_array($value->addon)){
													$adds = count($value->addon);
													for($a=0;$a<$adds;$a++){
														echo "- ".$value->addon[$a]."<br>";
													}
												} else {
													echo $value->addon;
												}
												?></td>
											<td><?php echo $value->price;?></td>
											<td>
												Indo : <?php echo ($value->description[0]);?><br>
												English : <?php echo ($value->description[1]);?>
											</td>
											<td><?php
												if(in_array($row,$curr_packages)){
													echo "YES";
												} else {
													echo "NO";
												}
												?></td>
											<td>
												<a href="<?=site_url('packages/packages/edit/'.$row)?>">
													<button type="button" class="btn btn-block btn-warning btn-sm">Edit</button>
												</a><br>
												<a href="<?=site_url('packages/packages/delete/'.$row)?>" onclick="return confirm('Are you sure you want to delete this item?');">
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
				<form role="form" method="post" action="<?=site_url('packages/packages/add')?>">
					<div class="card-body">
						<div class="form-check">
							<input type="checkbox" name="curr_packages" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1"><b>Current Packages</b></label>
						</div>
						<div class="form-group">
							<label for="code">Code (Letter and number only)</label>
							<input type="text" required class="form-control" pattern="[a-zA-Z0-9-]+" id="code" name="code" placeholder="Enter package code">
						</div>
						<div class="form-group">
							<label for="promo">Promo</label>
							<input type="text" class="form-control" id="promo" name="promo" placeholder="Enter package promo">
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" required class="form-control" id="name" name="name" placeholder="Enter package name">
						</div>
						<div class="form-group">
							<label for="auto">Auto</label>
							<input type="text" class="form-control" id="auto" name="auto" placeholder="Enter package auto">
						</div>
						<div class="form-group">
							<label for="info">Info</label>
							<input type="text" class="form-control" id="info" name="info" placeholder="Enter package info">
						</div>
						<div class="form-group">
							<label>Packs</label>
							<select name="packs[]" class="select2" multiple="multiple" data-placeholder="Select a packs"
									style="width: 100%;">
								<?php foreach($object as $data){ ?>
								<option value="<?=$data->code;?>"><?=$data->code;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="buy">Buy</label>
							<input type="text" class="form-control" id="buy" name="buy" placeholder="Enter package buy">
						</div>
						<div class="form-group">
							<label>Addon</label>
							<select name="addon[]" class="select2" multiple="multiple" data-placeholder="Select a addon"
									style="width: 100%;">
									<option value="myplan">myplan</option>
									<option value="superunl">superunl</option>
									<option value="corp">corp</option>
									<option value="smart">smart</option>
							</select>
						</div>
						<div class="form-group">
							<label for="offinfo">Offinfo</label>
							<input type="text" class="form-control" id="offinfo" name="offinfo" placeholder="Enter package offinfo">
						</div>
						<div class="form-group">
							<label for="offcode">Offcode</label>
							<input type="text" class="form-control" id="offcode" name="offcode" placeholder="Enter package offcode">
						</div>
						<div class="form-group">
							<label for="quota_div">Quotadiv</label>
							<input type="text" class="form-control" id="quota_div" name="quota_div" placeholder="Enter package quota div">
						</div>
						<div class="form-group">
							<label for="quota">Quota</label>
							<input type="text" class="form-control" id="quota" name="quota" placeholder="Enter package quota">
						</div>
						<div class="form-group">
							<label for="list_head_group_new">List Head Group New</label>
							<select name="list_head_group_new" required class="select2" data-placeholder="Select a list head group new"
									style="width: 100%;">
								<?php
								$head = $file->list_head_group_new;
								foreach($head as $heads => $heads_value){
								?>
								<option value="<?=$heads;?>"><?=$heads;?></option>
								<?php } ?>
							</select>
						</div>
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
							<label for="sub_group">Sub Group</label>
							<select name="sub_group" class="select2" data-placeholder="Select a sub group"
									style="width: 100%;">
								<?php foreach($subgroup as $row => $value){ ?>
									<option value="<?=$row;?>"><?=$row;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="duration">Duration</label>
							<select name="duration" class="select2" data-placeholder="Select a duration"
									style="width: 100%;">
								<?php foreach($duration as $row1 => $value1){ ?>
								<option value="<?=$row1;?>"><?=$row1;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="purchaseby">Purchase By</label>
							<select name="purchaseby[]" class="select2" multiple="multiple" data-placeholder="Select a purchase by"
									style="width: 100%;">
								<option value="deductbalance">Deduct Balance</option>
								<option value="cc_purchase">CC Purchase</option>
							</select>
						</div>
						<div class="form-group">
							<label for="price">Price</label>
							<input type="text" class="form-control" id="price" name="price" placeholder="Enter package price">
						</div>
						<div class="form-group">
							<label for="limits">Limits Data</label>
							<input type="text" class="form-control" id="limits" name="limits[data]" placeholder="Enter limits data">
						</div>
						<div class="form-group">
							<label for="limits">Limits Data Night</label>
							<input type="text" class="form-control" id="limits" name="limits[data_night]" placeholder="Enter limits data night">
						</div>
						<div class="form-group">
							<label for="limits">Limits Down Speed</label>
							<input type="text" class="form-control" id="limits" name="limits[down_speed]" placeholder="Enter limits down speed">
						</div>
						<div class="form-group">
							<label for="limits">Limits Up Speed</label>
							<input type="text" class="form-control" id="limits" name="limits[up_speed]" placeholder="Enter limits up speed">
						</div>
						<div class="form-group">
							<label for="limits">Limits FUP</label>
							<input type="text" class="form-control" id="limits" name="limits[fup]" placeholder="Enter limits FUP">
						</div>
						<div class="form-group">
							<label for="limits">Limits Minute</label>
							<input type="text" class="form-control" id="limits" name="limits[minute]" placeholder="Enter limits minute">
						</div><div class="form-group">
							<label for="limits">Limits SMS</label>
							<input type="text" class="form-control" id="limits" name="limits[sms]" placeholder="Enter limits sms">
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
							<label for="description">Description (Indo)</label>
							<input type="text" required class="form-control" id="description" name="description[]" placeholder="Enter desc (Indo)">
						</div>
						<div class="form-group">
							<label for="description">Description (English)</label>
							<input type="text" required class="form-control" id="description" name="description[]" placeholder="Enter desc (English)">
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
