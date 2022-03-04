$(document).ready(function () {
	const employeeInfo = JSON.parse($('#employeeInfo').val())[0];
	const positionsForInterview = $('#positionsForInterview').val();
	const applicantsTable = $('#applicantsTable').val();

	const vacantPositionToRateArray = JSON.parse(employeeInfo.vacant_position_to_rate);
	const openPositionsForInterviewArray = JSON.parse(positionsForInterview);

	const dashboardDropDowns = []; // for the titles of the thumbnails in dashboard
	let plantillaNumbersToRate = []; // here is the collection of plantilla numbers that the current user can rate
	openPositionsForInterviewArray.forEach((openInterviewElement) => {
		const ddTitlePositionTitle = openInterviewElement.position_title; // first element for dashboard dd title
		const ddTitlePlantillaItemNo = openInterviewElement.plantilla_item_no; // second element for dashboard dd title
		const salaryJobPayScale = openInterviewElement.Salary_job_pay_scale;

		let isForInterviewOfficeName = openInterviewElement.office_name;
		let isForInterviewProvince = openInterviewElement.province;
		let plantillaNumberOfOpenInterview = openInterviewElement.plantilla_item_no;
		vacantPositionToRateArray.forEach((isInVacantPositionElement) => {
			let isInVacantPositionOfficeName = isInVacantPositionElement.office_name;
			let isInVacantPositionProvince = isInVacantPositionElement.province;
			if (isInVacantPositionOfficeName == isForInterviewOfficeName && isInVacantPositionProvince == isForInterviewProvince) {
				plantillaNumbersToRate.push(plantillaNumberOfOpenInterview);

				// configure dashboard drop down
				let dashboardDdTitleOfficeName = isInVacantPositionOfficeName; // third dd element
				let dashboardDdTitleProvinceName = isInVacantPositionProvince; // fourth dd element

				const objForDashboardDd = {
					title: `${ddTitlePositionTitle} : ${ddTitlePlantillaItemNo} : ${dashboardDdTitleOfficeName} - ${dashboardDdTitleProvinceName}`,
					salaryGrade: salaryJobPayScale,
					plantillaNumber: plantillaNumberOfOpenInterview,
					applicants: []
				};

				dashboardDropDowns.push(objForDashboardDd);
			}
		});
	});
	//plantillaNumbersToRate 
	const summaryOfAllApplicantsThatCanBeRated = [];
	const allApplicants = JSON.parse(applicantsTable); // lahat ng applicants
	allApplicants.forEach(applicant => {
		let positionAppliedForOfTheApplicant = applicant.position_applied_for.split(',');

		positionAppliedForOfTheApplicant.forEach(positionAppliedForOfTheApplicantElement => {
			if (plantillaNumbersToRate.includes(positionAppliedForOfTheApplicantElement)) summaryOfAllApplicantsThatCanBeRated.push(applicant);
		});
	});

	// summaryOfAllApplicantsThatCanBeRated is the list of applicant element that the user can rate
	// console.log(plantillaNumbersToRate); dito mo makukuha lahat ng pwedeng ma rate ng naka login. 
	// console.log(summaryOfAllApplicantsThatCanBeRated);
	//console.log(dashboardDropDowns); //summary of titles for the thumbnail of dashboard
	//console.log(summaryOfAllApplicantsThatCanBeRated);

	// MAP ALL OF THE APPLICANTS TO CORRESPONDING DASHBOARDdD
	dashboardDropDowns.forEach(ddElements => {
		let ddElementsPlantillaNumber = ddElements.plantillaNumber;

		let applicantsForDdElement = summaryOfAllApplicantsThatCanBeRated.filter(applicant => {
			let applicantPositionsAppliedForArray = applicant.position_applied_for.split(',');
			if (applicantPositionsAppliedForArray.includes(ddElementsPlantillaNumber)) return applicant;
		});

		ddElements.applicants = applicantsForDdElement;
	});




	// MAP OUT TO THE UI 
	dashboardDropDowns.forEach(x => {


		const headerTemplate = `
			<div class="col-md-6">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">${x.title}</h4>
					</div>
				<div class="card-body">
				<div class="p-1 pl-5 pr-5 m-1 ">
		`;

		let bodyTemplate = "";

		x.applicants.forEach(applicant => {
			bodyTemplate += `
			<div class="row">
				<div class="col-md-4">
					<h4 class="font-weight-bold mx-4">${applicant.firstname} ${applicant.middlename} ${applicant.lastname}</h4>
				</div>
				<div class="col-md-8">
					<button class="btn btn-success btn-sm interviewBtn" dropdown_title="${x.title}" applicant_id="${applicant.applicant_id}" salary_grade="${x.salaryGrade}" plantilla_no="${x.plantillaNumber}">Interview</button>
				</div>
			</div>
		`;
		});

		const cardFooter = `
						</div>
					</div>
				</div>
			</div>
		`;

		const htmlStringCompilation = headerTemplate + bodyTemplate + cardFooter;
		$('#iteratePositionsToApplyHere').append(htmlStringCompilation);
	});


	$('.interviewBtn').click(function () {
		let salary_grade = $(this).attr('salary_grade');
		let applicant_id = $(this).attr('applicant_id');
		let plantilla_no = $(this).attr('plantilla_no');
		let ddTitle = $(this).attr('dropdown_title');
		console.log(salary_grade);
		const interviewLink = salary_grade <= 14 ?
			`${baseUrl}Interview/firstForm?salary_grade=${salary_grade}&applicant_id=${applicant_id}&plantilla_no=${plantilla_no}&ddTitle=${ddTitle}` :
			`${baseUrl}Interview/secondForm?salary_grade=${salary_grade}&applicant_id=${applicant_id}&plantilla_no=${plantilla_no}&ddTitle=${ddTitle}`;

		location.replace(interviewLink);
	});
});

