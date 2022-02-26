<link rel="stylesheet" href="<?= base_url() ?>assets/custom_css/dashboard.css">
<style>
	.submit-button-row {
		display: flex;
		justify-content: right;
	}
</style>
<div class="spacer-75"></div>
&nbsp;
<section>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url() ?>Dashboard">Home</a></li>
			<li class="breadcrumb-item"><a href="<?= base_url() ?>Position">Manage Positions</a></li>
			<li class="breadcrumb-item active" aria-current="page">Create position</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-primary">
					<h4 class="card-title">Position Management</h4>
					<!-- <p class="category">Category subtitle</p> -->
				</div>
				<div class="card-body">
					<form action="" class="mt-3">

						<div class="row">
							<div class="form-group col-md-6">
								<label for="">Position Title</label>
								<input type="text" class="form-control" id="positionTitle" placeholder="Enter position title here">
							</div>
							<div class="form-group col-md-6">
								<label for="">Plantilla Item No.</label>
								<input type="text" class="form-control" id="plantillaItemNo" placeholder="Enter planilla item no. here">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="">Select Office</label>
								<select name="" id="officeDd" class="form-control">
									<option value="">select office</option>
									<option value="PENRO Batanes">PENRO Batanes</option>
									<option value="PENRO Cagayan">PENRO Cagayan</option>
									<option value="PENRO Isabela">PENRO Isabela</option>
									<option value="PENRO Nueva Viscaya">PENRO Nueva Viscaya</option>
									<option value="PENRO Quirino">PENRO Quirino</option>
									<option value="Regional Office">Regional Office</option>
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="">Select PENRO/CENRO/Regional Office</label>
								<select name="" id="penroDd" class="form-control">
									<option value="">Select PENRO/CENRO/Regional Office</option>
								</select>
							</div>
							<script>
								let selectedOffice;
								let selectedPenro;
								$(document).ready(function() {
									$('#officeDd').change(function() {
										selectedOffice = $(this).val();

										$.post("<?= base_url() ?>UserAccounts/getListOfPenros", {
											selected_office: selectedOffice
										}, function(resp) {
											$("#penroDd").html(resp);
										});
									});

									$('#penroDd').change(function() {
										let selectedPenroValue = $(this).val();

										let selectedPenroText = $("#penroDd").children("option").filter(":selected").text();

										selectedOffice == selectedPenroText ? $("#divisionDd").attr("disabled", false) : $("#divisionDd").attr("disabled", true);
									});
								});
							</script>
						</div>

						<div class="row">
							<div class="form-group col-md-3">
								<label for="">Salary job pay scale</label>
								<input type="number" id="salaryJobPayScale" min="0" max="33" class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label for="">Education</label>
								<input type="text" id="education" class="form-control" placeholder="Enter education here">
							</div>
							<div class="form-group col-md-3">
								<label for="">Training</label>
								<input type="text" id="training" class="form-control" placeholder="Enter training here">
							</div>
							<div class="form-group col-md-3">
								<label for="">Expirience</label>
								<input type="text" id="expirience" class="form-control" placeholder="Enter expirience here">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="">Eligibility</label>
								<input type="text" id="eligibility" placeholder="Enter eligibility here" class="form-control">
							</div>
							<div class="form-group col-md-6">
								<label for="">Competency</label>
								<input type="text" id="competency" placeholder="Enter competency here" class="form-control">
							</div>
						</div>

						<div class="row submit-button-row">
							<button class="btn btn-primary" type="submit">Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>
</section>

<script>
	$(document).ready(function() {
		$("form").submit(function(e) {
			e.preventDefault();
			let postObj = {
				position_title: $('#positionTitle').val(),
				plantilla_item_no: $('#plantillaItemNo').val(),
				salary_job_pay_scale: $('#salaryJobPayScale').val(),
				education: $('#education').val(),
				training: $('#training').val(),
				expirience: $('#expirience').val(),
				eligibility: $('#eligibility').val(),
				competency: $('#competency').val(),
				province: $('#officeDd').val(),
				office_name: $('#penroDd').val()
			}

			$.post("<?= base_url() ?>Position/createPost", postObj, function(resp) {
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: 'Position created successfully',
					showConfirmButton: false,
					timer: 1500
				});

				$("form :input").val("");
				$("form :select").val("");
			});
		});
	});
</script>
