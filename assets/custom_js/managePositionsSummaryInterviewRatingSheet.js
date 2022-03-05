$(document).ready(function () {
    $('#grid').kendoGrid({
        toolbar: ["search"],
        sortable: true,
        pageable: true,
        groupable: true,
        editable: "popup",
        edit: function (e) {
            e.container.find(".k-edit-label:first").hide();
            e.container.find(".k-edit-field:first").hide();
        },
        columns: [{
            field: "position_id",
            hidden: true
        },
        {
            field: 'position_title',
            title: 'Position Title'
        },
        {
            field: 'plantilla_item_no',
            title: 'Plantilla Item Number'
        },
        {
            field: 'office_name',
            title: 'Office Assignment'
        },
        {
            field: 'province',
            title: 'Province Name'
        },
        {
            command: [{
                name: "edit",
                text: {
                    edit: " "
                },
                template: "<a class='customEdit btn btn-info btn-round' title='Edit'><i class='material-icons'>visibility</i></a>"
            },
            ],
        },
        ],

        dataSource: {
            pageSize: 5,
            group: [{ field: 'position_title' }, { field: 'office_name' }],
            transport: {
                read: {
                    url: `${baseUrl}Reports/getAllPositionsThatIsVacantAndForInterview`,
                    contentType: "json",
                    type: "GET"
                },
                parameterMap: function (data, type) {
                    return type != 'read' ? JSON.stringify(data) : null;
                },
            },

            schema: {
                data: (resp) => JSON.parse(resp),
                total: (resp) => JSON.parse(resp).length,
                model: {
                    id: "position_id",
                    position_id: {
                        employee_id: {
                            editable: false,
                            nullable: true
                        },
                        position_title: {
                            type: "string",
                            validation: {
                                required: true
                            }
                        },
                        plantilla_item_no: {
                            type: "string",
                            validation: {
                                required: true,
                                min: 1
                            }
                        },
                        office_name: {
                            type: "string",
                            validation: {
                                required: true,
                                min: 1
                            }
                        },
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

    $("#addEmployee").click(function () {
        var grid = $("#grid").data("kendoGrid");
        grid.addRow();
    });

    var grid = $("#grid").data("kendoGrid");

    $("#grid").on("click", ".customEdit", function () {
        var row = $(this).closest("tr");
        var data = grid.dataItem(row);
        const baseUrl = $('#baseUrl').val();

        location.replace(baseUrl + `Reports/viewInterviewRatingResults/${data.id}`);
    })


}); // document ready end