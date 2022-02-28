<link rel="stylesheet" href="<?= base_url() ?>assets/custom_css/dashboard.css">
<<<<<<< HEAD
<style>
    .submit-button-row {
        display: flex;
        justify-content: right;
    }

    .radio-box-user-roles {
        height: 20px;
        width: 20px;
        display: inline;
        margin-right: 10px;
    }

    .display-inline {
        display: inline;
    }
</style>
=======
<link rel="stylesheet" href="<?= base_url() ?>assets/custom_css/userAccountCreate.css">

>>>>>>> a1df98a5f59420ff92aa271705bbff6c57110f65
<div class="spacer-75"></div>
&nbsp;
<section>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url() ?>UserAccounts">User management</a></li>
			<li class="breadcrumb-item active" aria-current="page">Create User</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-primary">
					<h4 class="card-title">Create User</h4>
				</div>
				<div class="card-body">
					<form action="" class="mt-3">
						<div class="row">
							<div class="form-group col-md-4">
								<label for="">First Name</label>
								<input type="text" id="firstname" class="form-control" placeholder="Enter first name here">
							</div>
							<div class="form-group col-md-4">
								<label for="">Middle Name</label>
								<input type="text" id="middlename" class="form-control" placeholder="Enter middle name here">
							</div>
							<div class="form-group col-md-4">
								<label for="">Last Name</label>
								<input type="text" id="lastname" class="form-control" placeholder="Enter last name here">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-4">
								<label for="">Select Office</label>
								<select name="" id="officeDd" class="form-control">
									<option value="">select office</option>
									<option value="PENRO Batanes">PENRO Batanes</option>
									<option value="PENRO Cagayan">PENRO Cagayan</option>
									<option value="PENRO Isabela">PENRO Isabela</option>
									<option value="PENRO Nueva Vizcaya">PENRO Nueva Vizcaya</option>
									<option value="PENRO Quirino">PENRO Quirino</option>
									<option value="Regional Office">Regional Office</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="">Select PENRO/CENRO/Regional Office</label>
								<select name="" id="penroDd" class="form-control" disabled>
									<option value="">Select PENRO/CENRO/Regional Office</option>
								</select>
							</div>

							<div class="form-group col-md-4">
								<label for="">Position</label>
								<input type="text" id="position" class="form-control" placeholder="Enter position here">
							</div>
						</div>

<<<<<<< HEAD
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" placeholder="Enter position here">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Place of designation</label>
                                <input type="text" class="form-control" placeholder="Enter place of designation here">
                            </div>
                        </div>

                        <div class="row" id="tableOfficeCollection">
                            <div class="form-group col-md-6">
                                <h3 class="mb-4">Select place of vacancy to rate</h3>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px;"></th>
                                            <th>Office name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listOfOffices->result() as $row) { ?>
                                            <tr>
                                                <td><input type="checkbox" class="selected-offices-text" value="<?= "$row->office_name,$row->province" ?>"></td>
                                                <td>
                                                    <label for=""><?= "$row->office_name, <strong>$row->province</strong>" ?></label>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group col-md-6">
                                <h3 class="mb-4">Select user role</h3>

                                <ul>
                                    <li>
                                        <input type="radio" class="form-control radio-box-user-roles" name="userRoleRadioBoxes" value="chairman">
                                        <h3 class="display-inline">Chairman</h3>
                                    </li>
                                    <li>
                                        <input type="radio" class="form-control radio-box-user-roles" name="userRoleRadioBoxes" value="viceChairman">
                                        <h3 class="display-inline">Vice Chairman</h3>
                                    </li>
                                    <li>
                                        <input type="radio" class="form-control radio-box-user-roles" name="userRoleRadioBoxes" value="endUser">
                                        <h3 class="display-inline">End User</h3>
                                    </li>
                                    <li>
                                        <input type="radio" class="form-control radio-box-user-roles" name="userRoleRadioBoxes" value="secretariat">
                                        <h3 class="display-inline">Secretariat</h3>
                                    </li>
                                    <li>
                                        <input type="radio" class="form-control radio-box-user-roles" name="userRoleRadioBoxes" value="k4FirstLevel">
                                        <h3 class="display-inline"><strong>K4 UNION</strong> First level representative</h3>
                                    </li>
                                    <li>
                                        <input type="radio" class="form-control radio-box-user-roles" name="userRoleRadioBoxes" value="k4SecondLevel">
                                        <h3 class="display-inline"><strong>GAD</strong> First level representative</h3>
                                    </li>
                                    <li>
                                        <input type="radio" class="form-control radio-box-user-roles" name="userRoleRadioBoxes" value="gadFirstLevel">
                                        <h3 class="display-inline"><strong>GAD</strong> First level representative</h3>
                                    </li>
                                    <li>
                                        <input type="radio" class="form-control radio-box-user-roles" name="userRoleRadioBoxes" value="gadSecondLevel">
                                        <h3 class="display-inline"><strong>GAD</strong> Second level representative</h3>
                                    </li>
                                    <li>
                                        <input type="radio" class="form-control radio-box-user-roles" name="userRoleRadioBoxes" value="member">
                                        <h3 class="display-inline">Member</h3>
                                    </li>
                                </ul>
                                <button class="btn btn-primary mt-5" type="submit">Create</button>
                            </div>
                        </div>

                        <script src="<?= base_url() ?>assets/custom_js/manage-account-create.js"></script>
                    </form>
                </div>
            </div>
        </div>
</section>
<script>
    $(document).ready(function() {
        $('#officeDd').change(function() {
            let selectedOffice = $(this).val();

            $.post("<?= base_url() ?>UserAccounts/getListOfPenros", {
                selected_office: selectedOffice
            }, function(resp) {
                $("#penroDd").html(resp);
            });
            selectedOffice == "" ? $("#penroDd").attr("disabled", true) : $("#penroDd").attr("disabled", false);
        });
    });
</script>
=======
						<div class="row">
							<div class="form-group col-md-6">
								<label for="">Email</label>
								<input type="text" id="email" class="form-control" placeholder="Enter position here">
							</div>
							<div class="form-group col-md-6">
								<label for="">Designation</label>
								<input type="text" id="designation" class="form-control" placeholder="Enter designation here">
							</div>
						</div>

						<div class="row" id="tableOfficeCollection">
							<div class="form-group col-md-6">
								<h3>Select Vacancy to rate</h3>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 10px;"></th>
											<th>Office name</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($listOfOffices->result() as $row) { ?>
											<tr>
												<td><input type="checkbox" class="selected-offices-text" value="<?= "$row->office_name,$row->province" ?>"></td>
												<td>
													<label for=""><?= "$row->office_name, <strong>$row->province</strong>" ?></label>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="form-group col-md-6">
								<h3>Select User Role</h3>
								<ul style="list-style-type: none;">
									<li class="mb-5">
										<input value="chairman" type="radio" name="radio-boxes-user-role" class="user-role-rb">
										<h3 class="h3-radio-boxes"><strong>Chair</strong>, Human Resource Merit Promotion and Selection Board</h3>
									</li>
									<li class="mb-5">
										<input value="viceChairman" type="radio" name="radio-boxes-user-role" class="user-role-rb">
										<h3 class="h3-radio-boxes"><strong>Vice-Chair</strong>, Human Resource Merit Promotion and Selection Board</h3>
									</li>
									<li class="mb-5">
										<input value="member" type="radio" name="radio-boxes-user-role" class="user-role-rb">
										<h3 class="h3-radio-boxes"><strong>Member</strong>, Human Resource Merit Promotion and Selection Board</h3>
									</li>
									<li class="mb-5">
										<input value="endUser" type="radio" name="radio-boxes-user-role" class="user-role-rb">
										<h3 class="h3-radio-boxes"><strong>End User</strong></h3>
									</li>
									<li class="mb-5">
										<input value="k4Representative1stLevel" type="radio" name="radio-boxes-user-role" class="user-role-rb">
										<h3 class="h3-radio-boxes"><strong>K4 Representative</strong> (1st Level)</h3>
									</li>
									<li class="mb-5">
										<input value="k4Representative2ndLevel" type="radio" name="radio-boxes-user-role" class="user-role-rb">
										<h3 class="h3-radio-boxes"><strong>K4 Representaive</strong> (2nd Level)</h3>
									</li>
									<li class="mb-5">
										<input value="gadRepresentative1stLevel" type="radio" name="radio-boxes-user-role" class="user-role-rb">
										<h3 class="h3-radio-boxes"><strong>GAD Representative</strong> (1st Level)</h3>
									</li>
									<li class="mb-5">
										<input value="gadRepresentaive2ndLevel" type="radio" name="radio-boxes-user-role" class="user-role-rb">
										<h3 class="h3-radio-boxes"><strong>GAD Representative</strong> (2nd Level)</h3>
									</li>
									<li class="mb-5">
										<input value="secretariat" type="radio" name="radio-boxes-user-role" class="user-role-rb">
										<h3 class="h3-radio-boxes"><strong>HRMPSB Secretariat</strong></h3>
									</li>
								</ul>
								<center><button class="btn btn-primary col-md-8 mt-5" align="center" type="submit">Create</button></center>
							</div>
						</div>

						<script src="<?= base_url() ?>assets/custom_js/manage-account-create.js"></script>

						<script>
							$(document).ready(function() {
								$('#officeDd').change(function() {
									let selectedOffice = $(this).val();

									$.post("<?= base_url() ?>UserAccounts/getListOfPenros", {
										selected_office: selectedOffice
									}, function(resp) {
										$("#penroDd").html(resp);
									});
									selectedOffice == "" ? $("#penroDd").attr("disabled", true) : $("#penroDd").attr("disabled", false);
								});
							});
						</script>
					</form>
				</div>
			</div>
		</div>
</section>
>>>>>>> a1df98a5f59420ff92aa271705bbff6c57110f65
