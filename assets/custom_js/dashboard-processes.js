$(document).ready(function(){
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
			if(isInVacantPositionOfficeName == isForInterviewOfficeName && isInVacantPositionProvince == isForInterviewProvince){
				plantillaNumbersToRate.push(plantillaNumberOfOpenInterview);

				// configure dashboard drop down
				let dashboardDdTitleOfficeName = isInVacantPositionOfficeName; // third dd element
				let dashboardDdTitleProvinceName = isInVacantPositionOfficeName; // fourth dd element
				
				const objForDashboardDd = {
					title: `${ddTitlePositionTitle} : ${ddTitlePlantillaItemNo} : ${dashboardDdTitleOfficeName} - ${dashboardDdTitleProvinceName}`,
					salaryGrade: salaryJobPayScale
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
			if(plantillaNumbersToRate.includes(positionAppliedForOfTheApplicantElement)) summaryOfAllApplicantsThatCanBeRated.push(applicant);
		});
	});
	
	// summaryOfAllApplicantsThatCanBeRated is the list of applicant element that the user can rate
	// console.log(plantillaNumbersToRate); dito mo makukuha lahat ng pwedeng ma rate ng naka login. 
	// console.log(summaryOfAllApplicantsThatCanBeRated);
	console.log(dashboardDropDowns); //summary of titles for the thumbnail of dashboard
});
//Office of the Regional Executive Director, Regional Office
