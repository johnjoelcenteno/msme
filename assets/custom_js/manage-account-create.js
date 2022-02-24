$(document).ready(function () {
    $('form').submit(function (e) {
        e.preventDefault();
        let allCheckedVacancyToRate = [];
        let selectedUserRole = '';

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

        $.post("<?= base_url() ?>UserAccounts/getListOfPenros", {
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

        $('#selectedPositions').text(toBeAppendedString);
        $('#selectAllBtn').hide();
        $('#clearBtn').fadeOut();
        $('#restartBtn').show();
        $('#addPlaceVacancyBtn').hide();
    });

    $('#clearBtn').click(function () {
        $('input:checkbox.selected-offices-text').each(function () {
            this.checked = false;
        });
        $('#clearBtn').hide();
        $('#selectAllBtn').fadeIn();
    });

    $('#selectAllBtn').click(function () {
        $('input:checkbox.selected-offices-text').each(function () {
            this.checked = true;
        });
        $('#clearBtn').fadeIn();
        $('#selectAllBtn').hide();
    });

    $('#addPlaceVacancyBtn').click(function () {
        $(this).hide();
        $("#tableOfficeCollection").slideToggle('slow');
        $('#selectAllBtn').fadeIn();
    });

    $('#addSelectedBtn').click(function () {
        $("#tableOfficeCollection").fadeOut('slow');
    });
});