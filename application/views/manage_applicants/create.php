<link rel="stylesheet" href="<?= base_url() ?>assets/custom_css/dashboard.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/custom_css/userAccountCreate.css">

<div class="spacer-75"></div>
&nbsp;
<section>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url() ?>Applicants">Applicant management</a></li>
			<li class="breadcrumb-item active" aria-current="page">Update Applicant</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-primary">
					<h4 class="card-title">Update Applicant</h4>
				</div>
				<div class="card-body">
					<form action="">
						<div class="row">
							<div class="form-group col-md-4">
								<label for="">First Name</label>
								<input type="text" placeholder="Enter First Name" id="firstname" class="form-control">
							</div>
							<div class="form-group col-md-4">
								<label for="">Middle Name</label>
								<input type="text" placeholder="Enter Middle Name" id="middlename" class="form-control">
							</div>
							<div class="form-group col-md-4">
								<label for="">Last Name</label>
								<input type="text" placeholder="Enter Last Name" id="lastname" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-3">
								<label for="">Gender</label>
								<input type="text" placeholder="Enter Gender" id="gender" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label for="">Age</label>
								<input type="text" placeholder="Enter Age" id="age" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label for="">Eligibility</label>
								<input type="text" placeholder="Enter Eligibility" id="eligibility" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label for="">Position/Designation</label>
								<input type="text" placeholder="Enter Position/Designation" id="positionDesignation" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-4">
								<label for="">Salary Grade</label>
								<input type="number" placeholder="Enter Salary Grade" id="salaryGrade" class="form-control">
							</div>
							<div class="form-group col-md-4">
								<label for="">Place of Assignment</label>
								<input type="text" placeholder="Enter Place of Assignment" id="placeOfAssignment" class="form-control">
							</div>
							<div class="form-group col-md-4">
								<label for="">Status of Appointment</label>
								<input type="text" placeholder="Enter Status of Appointment" id="statusOfAppointment" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-12">
								<label for="">Education Attainment</label>
								<input type="text" placeholder="Enter Education Attainment" id="educationAttainment" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-4">
								<label for="">Date of Last Promotion</label>
								<input type="text" placeholder="Enter Date of Last Promotion" id="dateOfLastPromotion" class="form-control">
							</div>
							<div class="form-group col-md-4">
								<label for="">Latest IPCR Rating</label>
								<input type="text" placeholder="Enter Latest IPCR Rating" id="lastestIPCR" class="form-control">
							</div>
							<div class="form-group col-md-4">
								<label for="">Relevant Training Hours</label>
								<input type="number" placeholder="Enter Relevant Training" id="relevantTrainingHours" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label for="">Relevant Experience</label>
								<input type="text" placeholder="Enter Relevant Expirience" id="relevantExpirience" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-12">
								<h3>Position/s applied for</h3>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th></th>
											<th>Position</th>
										</tr>
									</thead>
									<tbody id="positionAppliedForTbody">

									</tbody>
								</table>
							</div>
						</div>

						<script>
							$(document).ready(function() {
								let baseUrl = $('#baseUrl').val();
								$.get(`${baseUrl}Applicants/vacantPositions`, function(resp) {
									$('#positionAppliedForTbody').html(resp);
								});
							});
						</script>
						<div class="row pull-right">
							<button class="btn btn-primary">Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>
</section>

<script>
	$(document).ready(function() {

		const formInput = () => {
			return {
				firstname: $("#firstname").val(),
				middlename: $("#middlename").val(),
				lastname: $("#lastname").val(),
				gender: $("#gender").val(),
				age: $("#age").val(),
				eligibility: $("#eligibility").val(),
				position_designation: $("#positionDesignation").val(),
				salary_grade: $("#salaryGrade").val(),
				place_of_assignment: $("#placeOfAssignment").val(),
				status_of_appointment: $("#statusOfAppointment").val(),
				education_attainment: $("#educationAttainment").val(),
				date_of_last_promotion: $("#dateOfLastPromotion").val(),
				latest_IPCR_rating: $("#lastestIPCR").val(),
				relevant_training_hours: $("#relevantTrainingHours").val(),
				relevant_experience: $("#relevantExpirience").val(),
			}
		}

		$('form').submit(function(e) {
			e.preventDefault();
			let formInputs = formInput();
			let hasPositionsChecked = false;
			let positionAppliedForObjects = [];

			$('input:checkbox').each(function() {
				if (this.checked) {
					let checkboxValue = $(this).val();
					let stringArray = checkboxValue.split(":");

					let positionTitle = stringArray[0].trim();
					let plantillaItemNo = stringArray[1].trim();

					let officeNameAndProvince = stringArray[2].split('-');
					let province = officeNameAndProvince[1].trim();
					let officeName = officeNameAndProvince[0].trim();
					positionAppliedForObjects.push(plantillaItemNo);
					hasPositionsChecked = true;
				}
			});

			if (hasPositionsChecked == false) {
				Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'Please select position',
					showConfirmButton: false,
					timer: 1500
				});

				return false;
			}

			let baseUrl = $('#baseUrl').val();
			formInputs.position_applied_for = positionAppliedForObjects.toString();
			$.post(`${baseUrl}Applicants/createPost`, formInputs, function() {
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: 'Applicant successfully created',
					showConfirmButton: false,
					timer: 1500
				});

				$('input').val("");
				$('input:checkbox').each(function() {
					this.checked = false;
				});
			});
		});
	});
</script>