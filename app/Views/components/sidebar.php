<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?=site_url('assets/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
			 style="opacity: .8">
		<span class="brand-text font-weight-light">CMS Wording</span>
	</a>
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?=site_url('assets/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Alexander Pierce</a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?=site_url('dashboard')?>" class="nav-link <?php if($menu=='dashboard'){ ?>active<?php } ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url('publish')?>" class="nav-link <?php if($menu=='publish'){ ?>active<?php } ?>">
						<i class="nav-icon fas fa-edit"></i>
						<p>
							Publish to Server
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview <?php if($menu=='wording'){ ?>menu-open<?php } ?>">
					<a href="#" class="nav-link <?php if($menu=='wording'){ ?>active<?php } ?>">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Wording
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=site_url('packages/map_offer_profile')?>" class="nav-link <?php if($submenu=='map_offer_profile'){ ?>active<?php } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>MAP Offer Profile</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=site_url('wording/words')?>" class="nav-link <?php if($submenu=='words'){ ?>active<?php } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Words</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=site_url('wording/error_code')?>" class="nav-link <?php if($submenu=='error_code'){ ?>active<?php } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Error Code</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=site_url('wording/error')?>" class="nav-link <?php if($submenu=='error'){ ?>active<?php } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Error</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=site_url('wording/top_recommend')?>" class="nav-link <?php if($submenu=='top_recommend'){ ?>active<?php } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Top Recommend</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=site_url('wording/channel')?>" class="nav-link <?php if($submenu=='channel'){ ?>active<?php } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Channel</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=site_url('wording/channel_new')?>" class="nav-link <?php if($submenu=='channel_new'){ ?>active<?php } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Channel New</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=site_url('wording/sms_notif')?>" class="nav-link <?php if($submenu=='sms_notif'){ ?>active<?php } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>SMS Notif</p>
							</a>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=site_url('wording/dlg_notif')?>" class="nav-link <?php if($submenu=='dlg_notif'){ ?>active<?php } ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>DLG Notif</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-header">PARTITIONS</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/showed_partitions')?>" class="nav-link <?php if($submenu=='showed_partitions'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>Showed Partitions</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/data_partitions')?>" class="nav-link <?php if($submenu=='data_partitions'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>Data Partitions</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/partitions')?>" class="nav-link <?php if($submenu=='partitions'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>Partitions</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/special_partitions')?>" class="nav-link <?php if($submenu=='special_partitions'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>Special Partitions</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/curr_partitions')?>" class="nav-link <?php if($submenu=='curr_partitions'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>Current Partitions</p>
					</a>
				</li>


				<li class="nav-header">LIST</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/list_duration')?>" class="nav-link <?php if($submenu=='list_duration'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>List Duration</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/list_group')?>" class="nav-link <?php if($submenu=='list_group'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>List Group</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/list_sub_group')?>" class="nav-link <?php if($submenu=='list_sub_group'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>List Sub Group</p>
					</a>
				</li>
<!--				<li class="nav-item">-->
<!--					<a href="--><?//=site_url('packages/list_type')?><!--" class="nav-link --><?php //if($submenu=='list_type'){ ?><!--active--><?php //} ?><!--">-->
<!--						<i class="far fa-circle nav-icon"></i>-->
<!--						<p>List Type</p>-->
<!--					</a>-->
<!--				</li>-->
<!--				<li class="nav-item">-->
<!--					<a href="--><?//=site_url('packages/list_sub_type')?><!--" class="nav-link --><?php //if($submenu=='list_sub_type'){ ?><!--active--><?php //} ?><!--">-->
<!--						<i class="far fa-circle nav-icon"></i>-->
<!--						<p>List Sub Type</p>-->
<!--					</a>-->
<!--				</li>-->
				<li class="nav-item">
					<a href="<?=site_url('packages/list_head_group_new')?>" class="nav-link <?php if($submenu=='list_head_group_new'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>List Head Group New</p>
					</a>
				</li>

				<li class="nav-header">NOTES</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/buy_note')?>" class="nav-link <?php if($submenu=='buy_note'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>Buy Note</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/gift_note')?>" class="nav-link <?php if($submenu=='gift_note'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>Gift Note</p>
					</a>
				</li>

				<li class="nav-header">PACKAGES</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/curr_packages')?>" class="nav-link <?php if($submenu=='curr_packages'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>Current Packages</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/packages')?>" class="nav-link <?php if($submenu=='packages'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>Packages</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/list_packages')?>" class="nav-link <?php if($submenu=='list_packages'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>List Packages</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/recommend_packages')?>" class="nav-link <?php if($submenu=='recommend_packages'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>Recommend Packages</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url('packages/pack_calc')?>" class="nav-link <?php if($submenu=='pack_calc'){ ?>active<?php } ?>">
						<i class="far fa-circle nav-icon"></i>
						<p>Package Calculation</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
