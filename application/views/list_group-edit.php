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
							<h3 class="card-title">Edit Wording - List Group</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form role="form" method="post" action="<?=site_url('packages/list_group/update/'.$id.'/'.$detail)?>">
								<div class="card-body">
									<div class="form-group">
										<label for="name">List Group Name</label>
										<input type="text" required class="form-control" id="name" name="name" value="<?=$id;?>">
									</div>
									<div class="form-group">
										<label for="type">List Group Type</label>
										<select name="type" class="form-control">
											<option value="4gunl" <?php if($detail=='4gunl'){ echo "selected"; } ?>>4gunl</option>
											<option value="bundling" <?php if($detail=='bundling'){ echo "selected"; } ?>>bundling</option>
											<option value="bundlingmyplan" <?php if($detail=='bundlingmyplan'){ echo "selected"; } ?>>bundlingmyplan</option>
											<option value="chat" <?php if($detail=='chat'){ echo "selected"; } ?>>chat</option>
											<option value="corp" <?php if($detail=='corp'){ echo "selected"; } ?>>corp</option>
											<option value="evo" <?php if($detail=='evo'){ echo "selected"; } ?>>evo</option>
											<option value="game" <?php if($detail=='game'){ echo "selected"; } ?>>game</option>
											<option value="hooq" <?php if($detail=='hooq'){ echo "selected"; } ?>>hooq</option>
											<option value="ic" <?php if($detail=='ic'){ echo "selected"; } ?>>ic</option>
											<option value="im" <?php if($detail=='im'){ echo "selected"; } ?>>im</option>
											<option value="iphone" <?php if($detail=='iphone'){ echo "selected"; } ?>>iphone</option>
											<option value="ir" <?php if($detail=='ir'){ echo "selected"; } ?>>ir</option>
											<option value="mu" <?php if($detail=='mu'){ echo "selected"; } ?>>mu</option>
											<option value="myplan" <?php if($detail=='myplan'){ echo "selected"; } ?>>myplan</option>
											<option value="mysfios" <?php if($detail=='mysfios'){ echo "selected"; } ?>>mysfios</option>
											<option value="other" <?php if($detail=='other'){ echo "selected"; } ?>>other</option>
											<option value="promovol" <?php if($detail=='promovol'){ echo "selected"; } ?>>promovol</option>
											<option value="puas" <?php if($detail=='puas'){ echo "selected"; } ?>>puas</option>
											<option value="smart" <?php if($detail=='smart'){ echo "selected"; } ?>>smart</option>
											<option value="spec" <?php if($detail=='spec'){ echo "selected"; } ?>>spec</option>
											<option value="spsip" <?php if($detail=='spsip'){ echo "selected"; } ?>>spsip</option>
											<option value="superunl" <?php if($detail=='superunl'){ echo "selected"; } ?>>superunl</option>
											<option value="univ" <?php if($detail=='univ'){ echo "selected"; } ?>>univ</option>
											<option value="unl" <?php if($detail=='unl'){ echo "selected"; } ?>>unl</option>
											<option value="vid" <?php if($detail=='vid'){ echo "selected"; } ?>>vid</option>
											<option value="viu" <?php if($detail=='viu'){ echo "selected"; } ?>>viu</option>
											<option value="vol" <?php if($detail=='vol'){ echo "selected"; } ?>>vol</option>
											<option value="volte" <?php if($detail=='volte'){ echo "selected"; } ?>>volte</option>
										</select>
									</div>
									<div class="form-group">
										<label for="id">List Group ID</label>
										<input type="text" required class="form-control" id="id" name="id" value="<?=$object->id;?>">
									</div>
									<div class="form-group">
										<label>List Head Group New</label>
										<select name="list_head_group_new_id" class="form-control">
											<?php foreach($head as $key_head => $value_head){ ?>
											<option <?php if($object->list_head_group_new_id == $value_head->id){ ?>selected<?php } ?> value="<?=$value_head->id;?>"><?=$key_head;?></option>
											<?php } ?>
										</select>
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
	<!-- Select2 -->
	<script src="<?php echo site_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
	<!-- /.control-sidebar -->
</div>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    })
</script>

</body>
</html>
