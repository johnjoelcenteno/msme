<?php
$this->load->model("Credentials_model");
$this->load->model("Main_model");
$userType = $this->Credentials_model->getUserType();
$fullName = $this->Main_model->getFullName('employee', "credentials_id", $_SESSION['credentials_id']);
?>

<div class="navbar fixed-top navbar-expand-lg bg-success top-margin">
	<div class="container" style="max-width: 80% !important">
		<div class="navbar-translate pt-0">
			<a class="navbar-brand" href="<?= base_url() ?>Dashboard">
				<!-- <img alt="CAEMC logo" src="<?= base_url() ?>assets/img/logo.png" style="height: 45px; width: 45px;" class="rounded-circle"> -->
				<span class="text-monospace font-weight-bold"><b>DENR</b> Office Portal</span>
			</a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" aria-expanded="False" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse">

			<ul class="nav navbar-nav navbar-right ml-auto" style="width: 1200px">

				<?php if ($userType == 'super_admin' || $userType == 'regular') { ?>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="material-icons">settings</i> Utility Management
						</a>
						<div class="dropdown-menu dropdown-with-icons">

							<a title="Official Receipt" class="dropdown-item" href="<?= base_url() ?>UserAccounts">
								<i class="material-icons">manage_accounts</i> User Accounts
							</a>

							<a title="Official Receipt" class="dropdown-item" href="<?= base_url() ?>Offices">
								<i class="material-icons">apartment</i> Office
							</a>

							<a title="Journal Voucher" class="dropdown-item" href="<?= base_url() ?>Position">
								<i class="material-icons">work_outline</i> Position
							</a>

							<a title="Cash Disbursement Voucher" class="dropdown-item" href="<?= base_url() ?>Position/configureVacantPositions">
								<i class="material-icons">work</i> Vacant Position
							</a>

							<a title="Monthly Closing of Transaction" class="dropdown-item" href="<?= base_url() ?>Applicants">
								<i class="material-icons">person_add</i> Applicant
							</a>

							<div class="dropdown-divider"></div>

							<a title="Downloadable Forms" class="dropdown-item" href="<?= base_url() ?>PositionsToInterview">
								<i class="material-icons">date_range</i> Interview Positions
							</a>
						</div>
					</li>

					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="material-icons">account_circle</i> Inteview Rating Management
						</a>
					</li>

					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="material-icons">description</i> Comprehensive Evaluation Results Mgt.
						</a>
					</li>

					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="material-icons">summarize</i> Reports
						</a>
						<div class="dropdown-menu dropdown-with-icons">

							<a title="Official Receipt" class="dropdown-item" href="/OR">
								<i class="material-icons">receipt</i> Individual Interview Rating Sheet
							</a>

							<a title="Journal Voucher" class="dropdown-item" href="/JV">
								<i class="material-icons">playlist_add</i> Summary Interview Rating Sheet
							</a>

							<a title="Cash Disbursement Voucher" class="dropdown-item" href="/CV">
								<i class="material-icons">playlist_add_check</i> Comprehensive Evaluation Results
							</a>

						</div>
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
				<?php } ?>
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