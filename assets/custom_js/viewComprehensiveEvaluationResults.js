$(document).ready(function () {
    const positionId = $('#positionId').val();



    function processList(resp) {
        resp = JSON.parse(resp);
        let applicantArray = []; // dump checked applicants here
        const returnArray = [];

        resp.forEach(respX => {

            const { firstname, middlename, lastname } = JSON.parse(respX.applicant_info)[0];
            const applicantFullname = `${firstname} ${middlename} ${lastname}`;
            const applicantId = respX.applicant_id;
            const plantillaNumber = respX.plantilla_item_no;

            // console.log(applicantArray.findIndex(applicantArrayX => applicantArrayX.applicant_id == applicantId && applicantArrayX.plantilla_number == plantillaNumber) == -1);
            if (applicantArray.findIndex(applicantArrayX => applicantArrayX.applicant_id == applicantId && applicantArrayX.plantilla_number == plantillaNumber) == -1) {
                respX.name_of_candidate = applicantFullname;
                applicantArray.push(respX);
            }
        });

        // complete the processed return array 
        applicantArray.forEach(uniqApplicant => {

            const { position_designation, salary_grade, place_of_assignment, status_of_appointment, age, date_of_last_promotion } = JSON.parse(uniqApplicant.applicant_info)[0];
            const { education, performance, training, experience, written_skill, total_score_a, total_score_b, awards, comprehensive_remarks } = uniqApplicant;

            const arrayStructure = {
                name_of_candiate: uniqApplicant.name_of_candidate,
                present_position_designation: position_designation,
                sg: salary_grade,
                present_place_of_assignment: place_of_assignment,
                status_appt: status_of_appointment,
                education,
                performance,
                training,
                experience,
                written_skill,
                total_score_a,
                total_score_b,
                total: parseInt(total_score_a) + parseInt(total_score_b),
                awards_and_outstanding: awards,
                age: age,
                date_of_last_promotion: date_of_last_promotion,
                comprehensive_remarks,
            };

            returnArray.push(arrayStructure);
        });
        console.log(returnArray);
        return returnArray;
    }

    $('#grid').kendoGrid({
        toolbar: ["excel", "pdf", "search"],
        sortable: true,
        pageable: true,
        groupable: true,
        editable: "popup",
        columns: [{
            field: "applicant_id",
            hidden: true
        },
        {
            field: 'name_of_candiate',
            title: 'NAME OF CANDIDATE',

        },
        {
            field: 'present_position_designation',
            title: 'PRESENT POSITION DESIGNATION'
        },
        {
            field: 'sg',
            title: 'SG'
        },
        {
            field: 'present_place_of_assignment',
            title: 'PRESENT PLACE OF ASSIGNMENT'
        },
        {
            field: 'status_appt',
            title: 'STATUS APPT.'
        },

        {
            field: 'education',
            title: 'EDUCATION'
        },
        {
            field: 'performance',
            title: 'PERFORMANCE'
        },
        {
            field: 'training',
            title: 'TRAINING'
        },
        {
            field: 'experience',
            title: 'EXPERIENCE'
        },
        {
            field: 'written_skill',
            title: 'WRITTEN/SKILL EXAM'
        },
        {
            field: 'total_score_a',
            title: 'PSYCHO SOCIAL ATTRIBUTES/ PERSONALITY TRAITS'
        },
        {
            field: 'total_score_b',
            title: 'POTENTIAL'
        },
        {
            field: 'total',
            title: 'TOTAL'
        },
        {
            field: 'awards_and_outstanding',
            title: 'AWARDS AND OUTSTANDING ACHIEVEMENTS'
        },
        {
            field: 'age',
            title: 'AGE'
        },
        {
            field: 'date_of_last_promotion',
            title: 'DATE OF LAST PROMOTION'
        },
        {
            field: 'comprehensive_remarks',
            title: 'REMARKS'
        },
        ],

        dataSource: {
            pageSize: 5,
            // group: [{ field: 'position_title' }, { field: 'office_name' }],
            transport: {
                read: {
                    url: `${baseUrl}Reports/getAllInterviewsForSummaryInterviewRatingSheet/${positionId}`,
                    contentType: "json",
                    type: "GET"
                },
                parameterMap: function (data, type) {
                    return type != 'read' ? JSON.stringify(data) : null;
                },
            },

            schema: {
                data: (resp) => processList(resp),
                total: (resp) => processList(resp).length,
                model: {
                    id: "applicant_id",
                    position_id: {
                        applicant_id: {
                            editable: false,
                            nullable: true
                        },
                        nameOfCandidate: { type: "string" },
                        present_position_designation: { type: "string" },
                        sg: { type: "string" },
                        present_place_of_assignment: { type: "string" },
                        status_appt: { type: "string" },
                        education: { type: "string" },
                        performance: { type: "string" },
                        training: { type: "string" },
                        experience: { type: "string" },
                        written_skill: { type: "string" },
                        total_score_a: { type: "string" },
                        total_score_b: { type: "string" },
                        total: { type: "string" },
                        awards_and_outstanding: { type: "string" },
                        age: { type: "string" },
                        date_of_last_promotion: { type: "string" },
                        comprehensive_remarks: { type: "string" },
                    }
                },
            },

            requestEnd: function (e) {
                type = e.type;
                if (type != "read") {
                    $('#grid').data("kendoGrid").dataSource.read(e);

                    let title = type == 'update' ? "Employee updated successfully" : "Employee deleted successfully";
                    if (type == 'create') title = 'Employee created successfully';

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: title,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

            }

        }
    });

    var grid = $("#grid").data("kendoGrid");

    $("#grid").on("click", ".customEdit", function () {
        var row = $(this).closest("tr");
        var data = grid.dataItem(row);
        const baseUrl = $('#baseUrl').val();

        location.replace(baseUrl + `Reports/viewInterviewRatingResults/${data.id}`);
    })


}); // document ready end