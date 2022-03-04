$(document).ready(function () {

    $('#grid').kendoGrid({
        toolbar: ["excel", "search"],
        sortable: true,
        pageable: true,
        editable: "popup",
        edit: function (e) {
            e.container.find(".k-edit-label:first").hide();
            e.container.find(".k-edit-field:first").hide();
        },
        groupable: true,
        columns: [{
            field: "interview_id",
            hidden: true
        },
        {
            field: 'name_of_candidate',
            title: 'NAME OF CANDIDATE'
        },
        {
            field: 'plantilla_no',
            title: 'PLANTILLA NUMBER'
        },
        {
            field: 'dd_title',
            title: 'POSITION TITLE'
        },
        {
            command: [{
                name: "edit",
                text: {
                    edit: " "
                },
                template: "<a class='customEdit btn btn-success btn-round' title='Edit'><i class='material-icons'>edit</i></a>"
            }
            ],
        },
        ],

        dataSource: {
            pageSize: 5,
            group: { field: "plantilla_no" },
            transport: {
                read: {
                    url: `${baseUrl}ComprehensiveEvaluationResults/getAllInterviews`,
                    contentType: "json",
                    type: "GET"
                },
                update: {
                    url: `${baseUrl}InterviewRatingManagement/update`,
                    contentType: "application/json",
                    type: "POST"
                },
                destroy: {
                    url: `${baseUrl}InterviewRatingManagement/destroy`,
                    contentType: "application/json",
                    type: "POST"
                },
                create: {
                    url: `${baseUrl}InterviewRatingManagement/create`,
                    contentType: "application/json",
                    type: "POST"
                },
                parameterMap: function (data, type) {
                    return type != 'read' ? JSON.stringify(data) : null;
                },
            },

            schema: {
                data: (resp) => JSON.parse(resp),
                total: (resp) => JSON.parse(resp).length,
                model: {
                    id: "interview_id",
                    fields: {
                        interview_id: {
                            editable: false,
                            nullable: true
                        },
                        name_of_candidate: {
                            type: "string",
                            validation: {
                                required: true
                            }
                        },
                        plantilla_no: {
                            type: "string",
                            validation: {
                                required: true,
                                min: 1
                            }
                        },
                        dd_title: {
                            type: "string",
                            validation: {
                                required: true,
                                min: 1
                            }
                        }
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

    var window = $("#window").kendoWindow({
        title: "Are you sure you?",
        visible: false, //the window will not appear before its .open method is called
        width: "400px"
    }).data("kendoWindow");
    var windowTemplate = kendo.template($("#windowTemplate").html());
    var grid = $("#grid").data("kendoGrid");

    $("#grid").on("click", ".customDelete", function (e) {
        e.preventDefault();
        var tr = $(e.target).closest("tr");
        var data = grid.dataItem(tr);
        window.content(windowTemplate(data));
        window.center().open();

        $("#yesButton").click(function () {
            grid.dataSource.remove(data);
            grid.dataSource.sync();
            window.close();
        });
        $("#noButton").click(function () {
            window.close();
        });
    });

    $("#grid").on("click", ".customEdit", function () {
        var row = $(this).closest("tr");
        var data = grid.dataItem(row);
        const baseUrl = $('#baseUrl').val();
        const link = "UserAccounts/edit/" + data.id;
        location.replace(baseUrl + `UserAccounts/update/${data.id}`);
    })

    // EDITORS 
    function provinceDropDownEditor(container, options) {
        $('<input required name="' + options.field + '" />')
            .appendTo(container)
            .kendoComboBox({
                placeholder: "Select province",
                dataTextField: "name",
                dataValueField: "name",
                dataSource: {
                    transport: {
                        read: {
                            url: "<?= base_url() ?>ProvinceController"
                        }
                    },
                    schema: {
                        parse: function (response) {
                            response = JSON.parse(response);
                            var dropDownContainer = [];
                            for (var idx = 0; idx < response.length; idx++) {
                                var province = {
                                    id: response[idx].province_id,
                                    name: response[idx].province_name
                                };

                                dropDownContainer.push(province);
                            }

                            return dropDownContainer;
                        }
                    }
                },
                filter: "contains",
                suggest: true,
                valuePrimitive: true
            });
    }

    function divisionDropDownEditor(container, options) {
        $('<input required name="' + options.field + '" />')
            .appendTo(container)
            .kendoComboBox({
                placeholder: "Select division",
                dataTextField: "name",
                dataValueField: "name",
                dataSource: {
                    transport: {
                        read: {
                            url: "<?= base_url() ?>DivisionController"
                        }
                    },
                    schema: {
                        parse: function (response) {
                            response = JSON.parse(response);

                            var dropDownContainer = [];
                            for (var idx = 0; idx < response.length; idx++) {
                                var province = {
                                    id: response[idx].division_id,
                                    name: response[idx].division_name
                                };

                                dropDownContainer.push(province);
                            }

                            return dropDownContainer;
                        }
                    }
                },
                filter: "contains",
                suggest: true,
                valuePrimitive: true
            });
    }
}); // document ready end