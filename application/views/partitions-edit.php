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
							<h3 class="card-title">Edit Wording - Partitions</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form role="form" method="post" action="<?=site_url('packages/partitions/update/'.$id)?>">
								<div class="form-check">
									<input
										<?php
										$arr1 = array();
										foreach($special_partitions as $spc){
											if($spc == $id){
												$arr1[] = $id;
											}
										}
										if(in_array($id,$arr1)){
											echo "checked";
										}
										?>
										type="checkbox" name="special_partitions" class="form-check-input">
									<label class="form-check-label"><b>Special Partitions</b></label>
								</div>
								<div class="form-check">
									<input type="checkbox" <?php
									$arr2 = array();
									foreach($curr_partitions as $curr){
										if($curr == $id){
											$arr2[] = $id;
										}
									}
									if(in_array($id,$arr2)){
										echo "checked";
									}
									?>
										   name="curr_partitions" class="form-check-input">
									<label class="form-check-label"><b>Current Partitions</b></label>
								</div>
								<div class="form-check">
									<input type="checkbox" <?php
									$arr3 = array();
									foreach($showed_partitions as $show){
										if($show == $id){
											$arr3[] = $id;
										}
									}
									if(in_array($id,$arr3)){
										echo "checked";
									}
									?>
										   name="showed_partitions" class="form-check-input">
									<label class="form-check-label"><b>Showed Partitions</b></label>
								</div>
								<div class="form-check">
									<input <?php
									$arr4 = array();
									foreach($data_partitions as $parts){
										if($parts == $id){
											$arr4[] = $id;
										}
									}
									if(in_array($id,$arr4)){
										echo "checked";
									}
									?>
										type="checkbox" name="data_partitions" class="form-check-input">
									<label class="form-check-label"><b>Data Partitions</b></label>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label for="name">Partition ID</label>
										<input type="text" required class="form-control" id="id" name="id" value=<?=$id;?>>
									</div>
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" required class="form-control" id="name" name="name" value="<?=$object->name;?>">
									</div>
<!--									<div class="form-group">-->
<!--										<label for="quota">Quota</label>-->
<!--										<input type="text" required class="form-control" id="quota" name="quota" value="--><?php // echo $object->quota;?><!--">-->
<!--									</div>-->
									<div class="form-group">
										<label for="order">Order</label>
										<input type="number" required class="form-control" id="order" name="order" value="<?=$object->order;?>">
									</div>
									<div class="form-group">
										<label for="adjust_exp">Adjust Exp</label>
										<input type="number" required class="form-control" id="adjust_exp" name="adjust_exp" value="<?php if(isset($object->adjust_exp)){ echo $object->adjust_exp;} ?>">
									</div>
									<div class="form-group">
										<label for="sub_type">Sub Type</label>
										<input type="text" required class="form-control" id="sub_type" name="sub_type" value="<?php if(isset($object->sub_type)){ echo $object->sub_type;} ?>">
									</div>
									<div class="form-group">
										<label for="group">Group</label>
										<select name="group" class="select2" data-placeholder="Enter group"
												style="width: 100%;">
												<option value="<?=$object->group;?>"><?=$object->group;?></option>
											<?php foreach($groups as $data){ ?>
												<?php if($object->group != $data){ ?>
												<option value="<?=$data;?>"><?=$data;?></option>
											<?php } } ?>
										</select>
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

<script src="<?php echo site_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
<!-- ./wrapper -->
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>

</body>
</html>
