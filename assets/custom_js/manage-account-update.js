$(document).ready(function () {
    let allCheckedVacancyToRate = [];
	const baseUrl = $('#baseUrl').val();
	const formData = JSON.parse($('#formInput').val())[0];
	console.log(formData);

	function init(){
		$('#firstname').val(formData.firstname);
		$('#middlename').val(formData.middlename);
		$('#lastname').val(formData.lastname);
		
		$('#email').val(formData.email_address);
		$('#position').val(formData.position);
		$('#designation').val(formData.designation);

		// vacancy to rate
		let vacantPositionToRate = JSON.parse(formData.vacant_position_to_rate);
		vacantPositionToRate.forEach((element) => {
			let VacantPositionNeedle = `${element.office_name},${element.province}`;
			
			$('input:checkbox[value="'+ VacantPositionNeedle +'"]').each(function(){
				this.checked = true;
			});
		});
	
		// select user role 		
		$('input:radio[value="'+ formData.user_role +'"]').each(function(){
			this.checked = true;
		});

		$('#officeDd option[value="'+ formData.province +'"]').each(function(){
			this.selected = true;
		});

		$('#penroDdSelectedOption').val(formData.office_name);
		$('#penroDdSelectedOption').text(formData.office_name);
	}

	init();
	
	const formInputs = () => {
		return {
			employee_id: formData.employee_id, 
			credentials_id: formData.credentials_id, 
			firstname: $('#firstname').val(),
			middlename: $('#middlename').val(),
			lastname: $('#lastname').val(),
			office_name: $('#penroDd').val(),
			province: $('#officeDd').val(),
			email_address: $('#email').val(),
			position: $('#position').val(),
			designation: $('#designation').val(),
			vacant_position_to_rate: JSON.stringify(allCheckedVacancyToRate),
			user_role: $("input[name='radio-boxes-user-role']:checked").val()
		}
	};

	// const resetAllInputs = () => {
	// 	$('#firstname').val("");
	// 	$('#middlename').val("");
	// 	$('#lastname').val("");
	// 	$('#penroDd').val("");
	// 	$('#officeDd').val("");
	// 	$('#email').val("");
	// 	$('#position').val("");
	// 	$('#designation').val("");
	// 	$('#penroDd').attr('disabled', true);
	// 	$('input:checkbox.selected-offices-text').each(function() {
	// 		this.checked = false;
	// 	});
	// 	$("input[name='radio-boxes-user-role']").each(function(){
	// 		this.checked = false;
	// 	});
	// }

	$('form').submit(function(e){
		e.preventDefault();
		
		$('input:checkbox.selected-offices-text').each(function () {
            this.checked ? allCheckedVacancyToRate.push() : "";

            if (this.checked) {
                let provinceAndOfficeName = $(this).val().split(",");
                const toBePushedObj = {
                    province: provinceAndOfficeName[1],
                    office_name: provinceAndOfficeName[0],
                };
                allCheckedVacancyToRate.push(toBePushedObj);
            }
        });

		$.post(`${baseUrl}UserAccounts/updatePost`, formInputs(), function(resp){
			Swal.fire({
				position: 'center',
				icon: 'success',
				title: 'User update successfully',
				showConfirmButton: false,
				timer: 1500
			  });
		});		
	});
    
});
