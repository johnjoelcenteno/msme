$(document).ready(function(){
	const employeeInfo = JSON.parse($('#employeeInfo').val())[0];
	const positionsForInterview = $('#positionsForInterview').val();
	const applicantsTable = $('#applicantsTable').val();
	
	const vacantPositionToRateArray = JSON.parse(employeeInfo.vacant_position_to_rate);
	const openPositionsForInterviewArray = JSON.parse(positionsForInterview);
	
	let plantillaNumbersToRate = []; // here is the collection of plantilla numbers that the current user can rate
	openPositionsForInterviewArray.forEach((openInterviewElement) => {
		let isForInterviewOfficeName = openInterviewElement.office_name;
		let isForInterviewProvince = openInterviewElement.province;
		let plantillaNumberOfOpenInterview = openInterviewElement.plantilla_item_no;
		console.log(`Is for interview office name: ${isForInterviewOfficeName}`, `Is for interview province name: ${isForInterviewProvince}`);
		vacantPositionToRateArray.forEach((isInVacantPositionElement) => {
			let isInVacantPositionOfficeName = isInVacantPositionElement.office_name;
			let isInVacantPositionProvince = isInVacantPositionElement.province;
			console.warn(`isInVacantPositionOfficeName: ${isInVacantPositionOfficeName}`, `isInVacantPositionProvince: ${isInVacantPositionProvince}`);
			if(isInVacantPositionOfficeName == isForInterviewOfficeName && isInVacantPositionProvince == isForInterviewProvince){
				plantillaNumbersToRate.push(plantillaNumberOfOpenInterview);
				console.log(plantillaNumberOfOpenInterview, 'nakuha ko ito');
			}
		});		
	});
	console.log(plantillaNumbersToRate);
	const allApplicants = JSON.parse(applicantsTable);
	plantillaNumbersToRate.forEach((canRatePlantilla) => {
		
	});
});
//Office of the Regional Executive Director, Regional Office
