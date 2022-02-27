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
					<h4 class="card-title">(Applicant name here)</h4>
					<p class="category">Salary grade 15 and above</p>
				</div>
				<div class="card-body">

					<div class="row mt-3">
						<div class="col-md-4">
							<div class="card-body bg-white-smoke">
								<p>Eligibility: <strong>Lorem, ipsum dolor.</strong></p>
								<p>Present Position: <strong>Lorem, ipsum dolor.</strong></p>
								<p>Designation: <strong>Lorem, ipsum dolor.</strong></p>
								<p>Salary Grade: <strong>Lorem, ipsum dolor.</strong></p>
								<p>Present Place of Assignment: <strong>Lorem, ipsum dolor.</strong></p>
								<p>Status of Appointment: <strong>Lorem, ipsum dolor.</strong></p>
								<p>Education Attainmenet: <strong>Lorem, ipsum dolor.</strong></p>
								<p>Age: <strong>Lorem, ipsum dolor.</strong></p>
								<p>Date of Last Promotion: <strong>Lorem, ipsum dolor.</strong></p>
							</div>
						</div>
						<div class="col-md-8">
							<form action="">
								<h5>A. Physical Characteristics and Personality Traits <strong>(10 points)</strong></h5>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="">Conscientiousness</label>
										<input type="number" placeholder="Enter (0 - 2 points)" min="0" max="2" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<label for="">Extraversion</label>
										<input type="number" placeholder="Enter (0 - 2 points)" min="0" max="2" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="">Agreeableness</label>
										<input type="number" placeholder="Enter (0 - 2 points)" min="0" max="2" class="form-control">
									</div>
									<div class="form-group col-md-6">
										<label for="">Openness to experience</label>
										<input type="number" placeholder="Enter  (2points)" min="0" max="2" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="">Emotional Stability</label>
										<input type="number" placeholder="Emotional Stability (0 - 2 points)" min="0" max="2" class="form-control">
									</div>
								</div>

								<br>

								<h5>B. Potential (10 points)</h5>

								<div class="row">
									<div class="col-md-6">
										<h6>Points earned based on interview by Panel (4 points)</h6>
										<div class="form-group">
											<label for="">a. On devising and plan or any activity</label>
											<input type="number" placeholder="Enter (0 - 1 point)" min="0" max="1" class="form-control">
										</div>
										<div class="form-group">
											<label for="">a. On devising and plan or any activity</label>
											<input type="number" placeholder="Enter (0 - 1 points)" min="0" max="1" class="form-control">
										</div>
										<div class="form-group">
											<label for="">b. On how to organize</label>
											<input type="number" placeholder="Enter (0 - 1 point)" min="0" max="1" class="form-control">
										</div>
										<div class="form-group">
											<label for="">c. On implementing</label>
											<input type="number" placeholder="Enter (0 - 1 point)" min="0" max="1" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<h6>Knowledge of the job/work applied for (3 points)</h6>
											<input type="number" placeholder="Enter (0 - 3 points)" min="0" max="3" class="form-control">
										</div>
										<div class="form-group">
											<h6>Logical presentation of ideas/concepts (3 points)</h6>
											<input type="number" placeholder="Enter (0 - 3 points)" min="0" max="3" class="form-control">
										</div>
									</div>

									<div class="row">
										<button class="btn btn-primary">Submit</button>
									</div>
								</div>
							</form>
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
