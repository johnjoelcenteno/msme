<link rel="stylesheet" href="<?= base_url() ?>assets/custom_css/dashboard.css">
<style>
	.submit-button-row {
		display: flex;
		justify-content: right;
	}

	.bg-white-smoke {
		background-color: #fffbfb !important;
		border-radius: 10px;
	}

	strong {
		font-weight: bolder;
	}
</style>
<div class="spacer-75"></div>
&nbsp;
<section>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
			<li class="breadcrumb-item"><a href="javascript:;">Library</a></li>
			<li class="breadcrumb-item active" aria-current="page">Rate Applicant</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-12">
			<div class="card">

				<div class="card-header card-header-primary">
					<h4 class="card-title">Positions to rate</h4>
					<p class="category">Here are the positions for interview</p>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="card">
							<div class="card-header card-header-primary">
								<h4 class="card-title">Testing</h4>
							</div>
							<div class="card-body">
								<!-- border border-dark rounded -->
								<div class="p-1 pl-5 pr-5 m-1 ">
									<div class="row">
										<div class="col-md-4">
											<h4 class="font-weight-bold mx-4">Joel John Centeno</h4>
										</div>
										<div class="col-md-8">
											<button class="btn btn-success btn-sm">Interview</button>
										</div>
									</div>
								</div>
								<div class="p-1 pl-5 pr-5 m-1 ">
									<div class="row">
										<div class="col-md-4">
											<h4 class="font-weight-bold mx-4">Joel John Centeno lorem</h4>
										</div>
										<div class="col-md-8">
											<button class="btn btn-success btn-sm">Interview</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
</section>
<input type="hidden" id="employeeInfo" value='<?= $employeeTable ?>'>
<input type="hidden" id="positionsForInterview" value='<?= $positionsForInterview ?>'>
<input type="hidden" id="applicantsTable" value='<?= $applicantsTable ?>'>
<script src="<?= base_url() ?>assets/custom_js/dashboard-processes.js"></script>
<!-- 
<form action="" class="mt-3">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Vacant position applied</label>
                                <select name="" id="" class="form-control">
                                    <option value="">select vacant position</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter first name here">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Middle Name</label>
                                <input type="text" class="form-control" placeholder="Enter middle name here">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter last name here">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">Eligibility</label>
                                <input type="text" class="form-control" placeholder="Enter eligibility here">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Present position</label>
                                <input type="text" class="form-control" placeholder="Enter present position here">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Present Designation</label>
                                <input type="text" class="form-control" placeholder="Enter present designation here">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">Present salary grade</label>
                                <input type="text" class="form-control" placeholder="Enter present salary grade here">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Present Place of Assignment</label>
                                <input type="text" class="form-control" placeholder="Enter present place of assignment here">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Status of Appointment</label>
                                <input type="text" class="form-control" placeholder="Enter Status of appointment here">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">Education Attainment</label>
                                <input type="text" class="form-control" placeholder="Enter education attainment here">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Age</label>
                                <input type="text" class="form-control" placeholder="Enter age here">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Date of Last Promotion</label>
                                <input type="text" class="form-control" placeholder="Enter date of last promotion here">
                            </div>
                        </div>

                        <div class="row submit-button-row">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form> -->
