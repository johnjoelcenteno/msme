$(document).ready(function () {
    let allCheckedVacancyToRate = [];
    $('#restartBtn').click(function () {
        allCheckedVacancyToRate = [];
        $('#selectedPositions').text("");
        $('#addPlaceVacancyBtn').show();
        $(this).hide();
    });

    $('#addSelectedBtn').click(function () {
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