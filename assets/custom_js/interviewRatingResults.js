$(document).ready(function () {
    const positionId = $('#positionId').val();

    const findTotalByUserRole = (resp, userRole) => resp.filter(x => x.rater_user_role == userRole)[0]?.total;

    const findTotalForGadAndK4 = (resp, k4OrGad, targetRespElement) => {
        const salaryGradeOfTarget = resp.salary_grade;
        let userRole = "";

        if (k4OrGad == 'k4') {
            // k4
            userRole = salaryGradeOfTarget <= 14 ? "k4Representative1stLevel" : "k4Representative2ndLevel";
        } else {
            //gad 
            userRole = salaryGradeOfTarget <= 14 ? "gadRepresentative1stLevel" : "gadRepresentative2ndLevel";
        }

        return findTotalByUserRole(resp, userRole);

    }

    const getApplicantTotal = (chair, viceChair, member, endUser, gad, k4) => {
        chair = !isNaN(parseInt(chair)) ? parseInt(chair) : 0;
        viceChair = !isNaN(parseInt(viceChair)) ? parseInt(viceChair) : 0;
        member = !isNaN(parseInt(member)) ? parseInt(member) : 0;
        endUser = !isNaN(parseInt(endUser)) ? parseInt(endUser) : 0;
        gad = !isNaN(parseInt(gad)) ? parseInt(gad) : 0;
        k4 = !isNaN(parseInt(k4)) ? parseInt(k4) : 0;

        const scoreArray = [chair, viceChair, member, endUser, gad, k4];

        const numberOfPresent = scoreArray.filter(x => x != 0).length;

        let initialValue = 0;
        let total = scoreArray.reduce((previous, current) => previous + current, initialValue) / numberOfPresent;
        return Math.round(total * 100) / 100;
    }

    function processList(resp) {
        resp = JSON.parse(resp);
        let applicantArray = [];
        const returnArray = [];

        resp.forEach(element => {
            let alreadyInApplicantArray = applicantArray.some(x => x.applicant_id != element.applicant_id);
            if (!alreadyInApplicantArray) {
                applicantArray.push(element.applicant_id);
            }
        });

        // console.log(applicantArray.length);
        applicantArray.forEach(applicant => {
            let foundIndexInResp = resp.findIndex(respElement => respElement.applicant_id == applicant);

            const targetRespElement = resp[foundIndexInResp];
            const applicantInfo = JSON.parse(targetRespElement.applicant_info)[0];

            const { firstname, middlename, lastname, applicant_id } = applicantInfo;

            const applicantFullName = `${firstname} ${middlename} ${lastname}`;
            // console.log(targetRespElement);
            // here are all the user roles 
            // chairman
            // viceChairman
            // member
            // endUser
            // k4Representative1stLevel
            // k4Representative2ndLevel
            // gadRepresentative1stLevel
            // gadRepresentative2ndLevel
            // secretariat
            const initialValuieChair = 0;

            const structureArray = {};
            structureArray.applicant_id = applicant_id;
            structureArray.nameOfCandidate = applicantFullName;
            structureArray.chair = findTotalByUserRole(resp, "chairman");
            structureArray.viceChair = findTotalByUserRole(resp, "viceChairman");
            structureArray.member = findTotalByUserRole(resp, "member");
            structureArray.endUser = findTotalByUserRole(resp, "endUser");
            structureArray.gad = findTotalForGadAndK4(resp, 'gad', targetRespElement);
            structureArray.k4 = findTotalForGadAndK4(resp, 'k4', targetRespElement);
            structureArray.total = getApplicantTotal(structureArray.chair, structureArray.viceChair, structureArray.member, structureArray.endUser, structureArray.gad, structureArray.k4);

            returnArray.push(structureArray);
        });

        // console.log(returnArray);
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
            field: 'nameOfCandidate',
            title: 'Name of Candidate'
        },
        {
            field: 'chair',
            title: 'CHAIR'
        },
        {
            field: 'viceChair',
            title: 'VICE-CHAIR'
        },
        {
            field: 'member',
            title: 'MEMBER'
        },
        {
            field: 'endUser',
            title: 'END-USER'
        },
        {
            field: 'gad',
            title: 'GAD'
        },
        {
            field: 'k4',
            title: 'K4'
        },
        {
            field: 'total',
            title: 'TOTAL'
        }
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
                        chair: { type: "string" },
                        viceChair: { type: "string" },
                        member: { type: "string" },
                        endUser: { type: "string" },
                        gad: { type: "string" },
                        k4: { type: "string" },
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