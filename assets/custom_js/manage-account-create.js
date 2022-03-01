$(document).ready(function () {
    let allCheckedVacancyToRate = [];
    const baseUrl = $('#baseUrl').val();

    const formInputs = () => {
        return {
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

    const resetAllInputs = () => {
        $('#firstname').val("");
        $('#middlename').val("");
        $('#lastname').val("");
        $('#penroDd').val("");
        $('#officeDd').val("");
        $('#email').val("");
        $('#position').val("");
        $('#designation').val("");
        $('#penroDd').attr('disabled', true);
        $('input:checkbox.selected-offices-text').each(function () {
            this.checked = false;
        });
        $("input[name='radio-boxes-user-role']").each(function () {
            this.checked = false;
        });
    }

    $('form').submit(function (e) {
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

        $.post(`${baseUrl}UserAccounts/createPost`, formInputs(), function (resp) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'User created successfully',
                showConfirmButton: false,
                timer: 1500
            });

            resetAllInputs();
        });

    });


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

    console.log($('input:radio[name=userRoleRadioBoxes] checked').val());
    $('input:radio[name=userRoleRadioBoxes] checked').each(function () {
        if (this.checked) console.log(this.Object());
        return;
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
});

$('#officeDd').change(function () {
    let selectedOffice = $(this).val();

    $.post(baseUrl + "UserAccounts/getListOfPenros", {
        selected_office: selectedOffice
    }, function (resp) {
        $("#penroDd").html(resp);
    });
    selectedOffice == "" ? $("#penroDd").attr("disabled", true) : $("#penroDd").attr("disabled", false);
});


$('#restartBtn').click(function () {
    allCheckedVacancyToRate = [];
    $('#selectedPositions').text("");
    $('#addPlaceVacancyBtn').show();
    $(this).hide();
});

$('#addSelectedBtn').click(function () {


    //selectedPositions
    let toBeAppendedString = "";
    allCheckedVacancyToRate.forEach(x => {
        const {
            office_name,
            province
        } = x;
        toBeAppendedString += `${office_name}, ${province} | `;
    });

});

