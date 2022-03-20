<?php
$this->load->model("Credentials_model");
$this->load->model("Main_model");
$fullName = "ADMIN TEST ACCOUNT";
?>

<div class="navbar fixed-top navbar-expand-lg bg-success top-margin">
	<div class="container" style="max-width: 80% !important">
		<div class="navbar-translate pt-0">
			<a class="navbar-brand" href="<?= base_url() ?>Dashboard">
				<!-- <img alt="CAEMC logo" src="<?= base_url() ?>assets/img/logo.png" style="height: 45px; width: 45px;" class="rounded-circle"> -->
				<span class="text-monospace font-weight-bold"><b>DTI</b> MSME</span>
			</a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" aria-expanded="False" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse">

			<ul class="nav navbar-nav navbar-right ml-auto" style="width: 1200px">


				<div class="col-md-6"></div>

				<li class="nav-item">
					<a href="<?= base_url() ?>Manage" class="nav-link">
						<i class="material-icons">account_circle</i> Manage
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url() ?>Manage/addRecord" class="nav-link">
						<i class="material-icons">person_add</i> Add record
					</a>
				</li>



				<li class="dropdown nav-item border-left">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="False">
						<?= $fullName ?>
					</a>
					<div class="dropdown-menu dropdown-with-icons">

						<a title="Manage" class="dropdown-item" href="<?= base_url() ?>Accounts">
							<i class="material-icons">person</i> Account
						</a>

						<div class="dropdown-divider"></div>
						<a data-toggle="modal" data-target="#logoutModal" class="text-danger dropdown-item">
							<i class="material-icons">exit_to_app</i> Log off
						</a>
					</div>
				</li>
			</ul>


		</div>
	</div>
</div>

<div class="modal" id="logoutModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Sign out credentials</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to sign out?</p>
			</div>
			<div class="modal-footer">
				<a href="<?= base_url() ?>Signout"><button type="button" id="signOutBtn" class="btn btn-primary">Sign out</button></a>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>