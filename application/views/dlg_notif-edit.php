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
							<h3 class="card-title">Edit Wording - DLG Notif</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form role="form" method="post" action="<?=site_url('wording/dlg_notif/update/'.$id)?>">
								<div class="card-body">
									<div class="form-group">
										<label for="id">ID (letter and number only)</label>
										<input type="text" pattern="[a-zA-z0-9-]+" required class="form-control" id="id" name="id" value="<?=$id;?>">
									</div>
									<div class="form-group">
										<label for="name">Type</label>
										<input type="text" required class="form-control" id="type" name="type" value="<?=$object[0]->type;?>">
									</div>
									<div class="form-group">
										<label for="desc">Title (Indo)</label>
										<input type="text" required class="form-control" id="desc" name="title[]" value="<?=$object[0]->title[0];?>">
									</div>
									<div class="form-group">
										<label for="desc">Title (English)</label>
										<input type="text" required class="form-control" id="desc" name="title[]" value="<?=$object[0]->title[1];?>">
									</div>
									<div class="form-group">
										<label for="content">Content (Indo)</label>
										<input type="text" required class="form-control" id="content" name="content[]" value="<?=$object[0]->content[0];?>">
									</div>
									<div class="form-group">
										<label for="content">Content (English)</label>
										<input type="text" required class="form-control" id="content" name="content[]" value="<?=$object[0]->content[1];?>">
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
