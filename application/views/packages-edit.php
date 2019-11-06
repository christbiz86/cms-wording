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
							<form role="form" method="post" action="<?=site_url('packages/packages/update/'.$id)?>">
								<div class="card-body">
									<div class="form-check">
										<input
											<?php if(in_array($id,$curr_packages)){ echo "checked"; } ?>
											type="checkbox" name="curr_packages" class="form-check-input" id="exampleCheck1">
										<label class="form-check-label" for="exampleCheck1"><b>Current Packages</b></label>
									</div>
									<div class="form-group">
										<label for="id">Package ID</label>
										<input type="text" required class="form-control" id="id" name="id" value="<?=$id;?>">
									</div>
									<div class="form-group">
										<label for="code">Package Code</label>
										<input type="text" required class="form-control" id="code" name="code" value="<?=$object->code;?>">
									</div>
									<div class="form-group">
										<label for="promo">Promo</label>
										<input type="text" class="form-control" id="promo" name="promo" value="<?php if(isset($object->promo)){ echo $object->promo;} ?>">
									</div>
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" required class="form-control" id="name" name="name" value="<?=$object->name;?>">
									</div>
									<div class="form-group">
										<label for="auto">Auto</label>
										<input type="text" class="form-control" id="auto" name="auto" value="<?=$object->auto;?>">
									</div>
									<div class="form-group">
										<label for="info">Info</label>
										<input type="text" class="form-control" id="info" name="info" value="<?=$object->info;?>">
									</div>
									<div class="form-group">
										<label>Packs</label>
										<select name="packs[]" class="select2" multiple="multiple"
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
										<input type="text" class="form-control" id="buy" name="buy" value="<?=$object->buy;?>">
									</div>
									<div class="form-group">
										<label>Addon</label>
										<select name="addon[]" class="select2" multiple="multiple"
												style="width: 100%;">
											<?php foreach($object->addon as $adds){ ?>
											<option value="<?=$adds;?>" selected><?=$adds;?></option>
											<?php } ?>
<!--											<option value="superunl">superunl</option>-->
<!--											<option value="corp">corp</option>-->
<!--											<option value="smart">smart</option>-->
										</select>
									</div>
									<div class="form-group">
										<label for="offinfo">Offinfo</label>
										<input type="text" class="form-control" id="offinfo" name="offinfo" value="<?=$object->offinfo;?>">
									</div>
									<div class="form-group">
										<label for="offcode">Offcode</label>
										<input type="text" class="form-control" id="offcode" name="offcode" value="<?=$object->offcode;?>">
									</div>
									<div class="form-group">
										<label for="quota_div">Quotadiv</label>
										<input type="text" class="form-control" id="quota_div" name="quota_div" value="<?=$object->quota_div;?>">
									</div>
									<div class="form-group">
										<label for="quota">Quota</label>
										<input type="text" class="form-control" id="quota" name="quota" value="<?=$object->quota;?>">
									</div>
									<div class="form-group">
										<label for="list_head_group_new">List Head Group New</label>
										<select name="list_head_group_new" required class="select2" data-value="<?=$object->list_head_group_new;?>"
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
											<option value="<?=$object->group;?>"><?=$object->group;?></option>
											<?php foreach($groups as $data){ ?>
												<?php if($object->group != $data){ ?>
													<option value="<?=$data;?>"><?=$data;?></option>
												<?php } } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="sub_group">Sub Group</label>
										<select name="sub_group" class="select2" data-placeholder="Select a sub group"
												style="width: 100%;">
											<option value="<?=$object->sub_group;?>"><?=$object->sub_group;?></option>
											<?php foreach($subgroup as $row => $value){ ?>
												<?php if($row != $object->sub_group){ ?>
												<option value="<?=$row;?>"><?=$row;?></option>
											<?php } } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="duration">Duration</label>
										<select name="duration" class="select2" data-placeholder="Select a duration"
												style="width: 100%;">
											<?php foreach($duration as $row1 => $value1){ ?>
												<?php if($row1 != $object->duration){ ?>
												<option value="<?=$row1;?>"><?=$row1;?></option>
											<?php } } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="purchaseby">Purchase By</label>
										<select name="purchaseby[]" class="select2" multiple="multiple"
												style="width: 100%;">
											<option value="deductbalance">Deduct Balance</option>
											<option value="cc_purchase">CC Purchase</option>
										</select>
									</div>
									<div class="form-group">
										<label for="price">Price</label>
										<input type="text" pattern="[0-9-]+" class="form-control" id="price" name="price" value="<?=$object->price;?>">
									</div>
									<div class="form-group">
										<label for="data">Limits Data</label>
										<input type="text" class="form-control" id="limits" name="limits[data]" value="<?php if(isset($object->limits)){ echo $object->limits->data;} ?>">
									</div>
									<div class="form-group">
										<label for="data_night">Limits Data Night</label>
										<input type="text" class="form-control" id="limits" name="limits[data_night]" value="<?php if(isset($object->limits)){ echo $object->limits->data_night;} ?>">
									</div>
									<div class="form-group">
										<label for="down_speed">Limits Down Speed</label>
										<input type="text" class="form-control" id="limits" name="limits[down_speed]" value="<?php if(isset($object->limits)){ echo $object->limits->down_speed;} ?>">
									</div>
									<div class="form-group">
										<label for="up_speed">Limits Up Speed</label>
										<input type="text" class="form-control" id="limits" name="limits[up_speed]" value="<?php if(isset($object->limits)){ echo $object->limits->up_speed;} ?>">
									</div>
									<div class="form-group">
										<label for="fup">Limits FUP</label>
										<input type="text" class="form-control" id="fup" name="limits[fup]" value="<?php if(isset($object->limits)){ echo $object->limits->fup;} ?>">
									</div>
									<div class="form-group">
										<label for="minute">Limits Minute</label>
										<input type="text" class="form-control" id="limits" name="limits[minute]" value="<?php if(isset($object->limits)){ echo $object->limits->minute;} ?>">
									</div>
									<div class="form-group">
										<label for="sms">Limits SMS</label>
										<input type="text" class="form-control" id="limits" name="limits[sms]" value="<?php if(isset($object->limits)){ echo $object->limits->sms;} ?>">
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
										<label for="description">Description (Indo)</label>
										<input type="text" required class="form-control" id="description" name="description[]" value="<?=$object->description[0];?>">
									</div>
									<div class="form-group">
										<label for="description">Description (English)</label>
										<input type="text" required class="form-control" id="description" name="description[]" value="<?=$object->description[1];?>">
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
