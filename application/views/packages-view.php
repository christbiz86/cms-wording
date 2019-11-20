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
							<h3 class="card-title">Edit Wording - Packages</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form role="form" method="post" action="#">
								<div class="card-body">
									<div class="form-check">
										<input
											<?php
											$arr = array();
											foreach($curr_packages as $row_curr){
												if($row_curr == $id){
													$arr[] = $id;
												}
											}
											if(in_array($id,$arr)){
												echo "checked";
											}
											?>
											type="checkbox" name="curr_packages" disabled class="form-check-input" id="exampleCheck1">
										<label class="form-check-label" for="exampleCheck1"><b>Current Packages</b></label>
									</div>
									<div class="form-group">
										<label for="id">Package ID</label>
										<input type="text" required class="form-control" disabled value="<?=$id;?>">
									</div>
									<div class="form-group">
										<label for="code">Package Code</label>
										<input type="text" required class="form-control" disabled value="<?php if(isset($object->code)){ echo $object->code; }?>">
									</div>
									<div class="form-group">
										<label for="promo">Promo</label>
										<input type="text" class="form-control" disabled value="<?php if(isset($object->promo)){ echo $object->promo;} ?>">
									</div>
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" required class="form-control" disabled value="<?php if(isset($object->name)){ echo $object->name;} ?>">
									</div>
									<div class="form-group">
										<label for="auto">Auto</label>
										<input type="text" class="form-control" disabled value="<?php if(isset($object->auto)){ echo $object->auto;} ?>">
									</div>
									<div class="form-group">
										<label for="info">Info</label>
										<input type="text" class="form-control" disabled value="<?php if(isset($object->info)){ echo $object->info;} ?>">
									</div>
									<div class="form-group">
										<label>Packs</label>
										<select name="packs[]" class="select2" disabled multiple="multiple"
												style="width: 100%;">
											<?php
											if(isset($object->packs)){
												foreach($file->packages as $data){ ?>
													<?php if(is_array($object->packs)){ ?>
														<option value="<?=$data->code;?>" <?php if(in_array($data->code,$object->packs)){ echo "selected"; } ?>><?=$data->code;?></option>
													<?php } else { ?>
														<option value="<?=$object->packs;?>"><?=$object->packs;?></option>
													<?php } } } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="buy">Buy</label>
										<input type="text" class="form-control" disabled value="<?php if(isset($object->buy)){ echo $object->buy;} ?>">
									</div>
									<div class="form-group">
										<label>Addon</label>
										<select name="addon[]" class="select2" disabled multiple="multiple"
												style="width: 100%;">
											<?php
											if(isset($object->addon)){
												foreach($object->addon as $adds){
													foreach($addon as $addons){
														?>
														<option value="<?=$addons->addon_title?>" <?php if($adds==$addons->addon_title){ echo "selected"; } ?>><?=$addons->addon_title?></option>
													<?php } } } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="unit_sms">Unit SMS</label>
										<select name="unit_sms[]" disabled class="select2" multiple="multiple"
												style="width: 100%;">
											<?php
											if(isset($object->unit_sms)){
												foreach($object->unit_sms as $datas1){ ?>
													<option selected value="<?=$datas1;?>"><?=$datas1;?></option>
												<?php } } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="unit_voice">Unit Voice</label>
										<select name="unit_voice[]" disabled class="select2" multiple="multiple"
												style="width: 100%;">
											<?php
											if(isset($object->unit_voice)){
												foreach($object->unit_voice as $datas2){ ?>
													<option selected value="<?=$datas2;?>"><?=$datas2;?></option>
												<?php } } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="unit_data">Unit Data</label>
										<select name="unit_data[]" disabled class="select2" multiple="multiple"
												style="width: 100%;">
											<?php
											if(isset($object->unit_data)){
												foreach($object->unit_data as $datas3){ ?>
													<option selected value="<?=$datas3;?>"><?=$datas3;?></option>
												<?php } } ?>
										</select>
									</div>
									<div id="unitdetail" <?php if($object->group != 'myplan'){ ?>style="display: none;" <?php } ?>>
										<a href="<?php echo site_url('packages/unitdetail/'.$id);?>"><input type="button" value="Unit Detail" /></a>
									</div>
									<div class="form-group">
										<label for="offinfo">Offinfo</label>
										<input type="text" class="form-control" disabled value="<?php if(isset($object->offinfo)){ echo $object->offinfo;} ?>">
									</div>
									<div class="form-group">
										<label for="offcode">Offcode</label>
										<input type="text" class="form-control" disabled value="<?php if(isset($object->offcode)){ echo $object->offcode;} ?>">
									</div>
									<div class="form-group">
										<label for="quota_div">Quotadiv</label>
										<input type="text" class="form-control" disabled value="<?php if(isset($object->quota_div)){ echo $object->quota_div;} ?>">
									</div>
									<div class="form-group">
										<label for="quota">Quota</label>
										<input type="text" pattern="[0-9-]+" class="form-control" disabled value="<?php if(isset($object->quota)){ echo $object->quota;} ?>">
									</div>
									<div class="form-group">
										<label for="list_head_group_new">Category</label>
										<select name="list_head_group_new" required class="select2" disabled
												style="width: 100%;">
											<?php if(isset($object->list_head_group_new)){ ?>
											<option value="<?=$object->list_head_group_new;?>"><?=$object->list_head_group_new;?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="group">Type</label>
										<select name="type" class="select2" data-placeholder="Enter type" disabled
												style="width: 100%;">
											<?php if(isset($object->type)){ ?><option value="<?=$object->type;?>"><?=$object->type;?></option><?php } ?>
											<?php foreach($groups as $data){ ?>
												<?php if($object->type != $data){ ?>
													<option value="<?=$data;?>"><?=$data;?></option>
												<?php } } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="group">Group</label>
										<select name="group" class="select2" data-placeholder="Enter group" disabled
												style="width: 100%;">
											<?php if(isset($object->group)){ ?><option value="<?=$object->group;?>"><?=$object->group;?></option><?php } ?>
											<?php foreach($groups as $data){ ?>
												<?php if($object->group != $data){ ?>
													<option value="<?=$data;?>"><?=$data;?></option>
												<?php } } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="sub_group">Sub Group</label>
										<select name="sub_group" class="select2" data-placeholder="Select a sub group" disabled
												style="width: 100%;">
											<?php if(isset($object->sub_group)){ ?><option value="<?=$object->sub_group;?>"><?=$object->sub_group;?></option><?php } ?>
											<?php foreach($subgroup as $row => $value){ ?>
												<?php if($row != $object->sub_group){ ?>
													<option value="<?=$row;?>"><?=$row;?></option>
												<?php } } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="duration">Duration</label>
										<select name="duration" class="select2" data-placeholder="Select a duration" disabled
												style="width: 100%;">
											<?php foreach($duration as $row1 => $value1){ ?>
												<?php if($row1 != $object->duration){ ?>
													<option value="<?=$row1;?>"><?=$row1;?></option>
												<?php } } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="purchaseby">Purchase By</label>
										<select name="purchaseby[]" class="select2" multiple="multiple" disabled
												style="width: 100%;">
											<option value="deductbalance">Deduct Balance</option>
											<option value="cc_purchase">CC Purchase</option>
										</select>
									</div>
									<div class="form-group">
										<label for="price">Price</label>
										<input type="text" pattern="[0-9-]+" class="form-control" disabled value="<?php if(isset($object->price)){ echo $object->price;} ?>">
									</div>
									<div class="form-group">
										<label for="data">Limits Data</label>
										<input type="text" pattern="[0-9-]+" class="form-control" disabled value="<?php if(isset($object->limits)){ echo $object->limits->data;} ?>">
									</div>
									<div class="form-group">
										<label for="data_night">Limits Data Night</label>
										<input type="text" pattern="[0-9-]+" class="form-control" disabled value="<?php if(isset($object->limits)){ echo $object->limits->data_night;} ?>">
									</div>
									<div class="form-group">
										<label for="down_speed">Limits Down Speed</label>
										<input type="text" pattern="[0-9-]+" class="form-control" disabled value="<?php if(isset($object->limits)){ echo $object->limits->down_speed;} ?>">
									</div>
									<div class="form-group">
										<label for="up_speed">Limits Up Speed</label>
										<input type="text" pattern="[0-9-]+" class="form-control" disabled value="<?php if(isset($object->limits)){ echo $object->limits->up_speed;} ?>">
									</div>
									<div class="form-group">
										<label for="fup">Limits FUP</label>
										<input type="text" pattern="[0-9-]+" class="form-control" disabled value="<?php if(isset($object->limits)){ echo $object->limits->fup;} ?>">
									</div>
									<div class="form-group">
										<label for="minute">Limits Minute</label>
										<input type="text" pattern="[0-9-]+" class="form-control" disabled value="<?php if(isset($object->limits)){ echo $object->limits->minute;} ?>">
									</div>
									<div class="form-group">
										<label for="sms">Limits SMS</label>
										<input type="text" pattern="[0-9-]+" class="form-control" disabled value="<?php if(isset($object->limits)){ echo $object->limits->sms;} ?>">
									</div>
									<div class="form-group">
										<label for="wording">Wording (Indo)</label>
										<input type="text" required class="form-control" disabled value="<?php if(isset($object->wording)){ echo $object->wording[0];} ?>">
									</div>
									<div class="form-group">
										<label for="wording">Wording (English)</label>
										<input type="text" required class="form-control" disabled value="<?php if(isset($object->wording)){ echo $object->wording[1];} ?>">
									</div>
									<div class="form-group">
										<label for="description">Description (Indo)</label>
										<input type="text" required class="form-control" disabled value="<?php if(isset($object->description)){ echo htmlentities($object->description[0]);} ?>">
									</div>
									<div class="form-group">
										<label for="description">Description (English)</label>
										<input type="text" required class="form-control" disabled value="<?php if(isset($object->description)){ echo htmlentities($object->description[1]);} ?>">
									</div>
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
	<!-- Select2 -->
	<script src="<?php echo site_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
	<!-- /.control-sidebar -->
</div>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4',
            tags: true
        })
    })
</script>

</body>
</html>
