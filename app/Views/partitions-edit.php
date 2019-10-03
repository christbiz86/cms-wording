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
							<h3 class="card-title">Edit Wording - Partitions</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form role="form" method="post" action="<?=site_url('wording/partitions/update/'.$id)?>">
								<div class="form-check">
									<input
										<?php if(in_array($id,$special_partitions)){ echo "checked"; } ?>
										type="checkbox" name="special_partitions" class="form-check-input">
									<label class="form-check-label"><b>Special Partitions</b></label>
								</div>
								<div class="form-check">
									<input type="checkbox" <?php if(in_array($id,$curr_partitions)){ echo "checked"; } ?>
										   name="curr_partitions" class="form-check-input">
									<label class="form-check-label"><b>Current Partitions</b></label>
								</div>
								<div class="form-check">
									<input type="checkbox" <?php if(in_array($id,$showed_partitions)){ echo "checked"; } ?>
										   name="showed_partitions" class="form-check-input">
									<label class="form-check-label"><b>Showed Partitions</b></label>
								</div>
								<div class="form-check">
									<input <?php if(in_array($id,$data_partitions)){ echo "checked"; } ?>
										type="checkbox" name="data_partitions" class="form-check-input">
									<label class="form-check-label"><b>Data Partitions</b></label>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" required class="form-control" id="name" name="name" value="<?=$object->name;?>">
									</div>
									<div class="form-group">
										<label for="quota">Quota</label>
										<input type="text" required class="form-control" id="quota" name="quota" value="<?=$object->quota;?>">
									</div>
									<div class="form-group">
										<label for="type">Type</label>
										<input type="text" required class="form-control" id="type" name="type" value="<?=$object->type;?>">
									</div>
									<div class="form-group">
										<label for="order">Order</label>
										<input type="text" required class="form-control" id="order" name="order" value="<?=$object->order;?>">
									</div>
									<div class="form-group">
										<label for="adjust_exp">Adjust Exp</label>
										<input type="text" required class="form-control" id="adjust_exp" name="adjust_exp" value="<?=$object->adjust_exp;?>">
									</div>
									<div class="form-group">
										<label for="sub_type">Sub Type</label>
										<input type="text" required class="form-control" id="sub_type" name="sub_type" value="<?=$object->sub_type;?>">
									</div>
									<div class="form-group">
										<label for="group">Group</label>
										<input type="text" required class="form-control" id="group" name="group" value="<?=$object->group;?>">
									</div>
									<div class="form-group">
										<label for="wording">Wording (Indo)</label>
										<input type="text" required class="form-control" id="wording" name="wording[]" value="<?=$object->wording[0];?>">
									</div>
									<div class="form-group">
										<label for="wording">Wording (English)</label>
										<input type="text" required class="form-control" id="wording" name="wording[]" value="<?=$object->wording[1];?>">
									</div>
									<div class="form-group">
										<label for="desc">Desc (Indo)</label>
										<input type="text" required class="form-control" id="desc" name="desc[]" value="<?=$object->desc[0];?>">
									</div>
									<div class="form-group">
										<label for="desc">Desc (English)</label>
										<input type="text" required class="form-control" id="desc" name="desc[]" value="<?=$object->desc[1];?>">
									</div>
								</div>
								<div class="modal-footer justify-content-between">
									<button type="submit" class="btn btn-primary">Update</button>
								</div>
							</form>
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
