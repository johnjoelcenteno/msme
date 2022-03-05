$(document).ready(function () {
    $('#grid').kendoGrid({
        toolbar: ['search'],
        sortable: true,
        pageable: true,
        editable: "popup",
        groupable: true,
        edit: function (e) {
            e.container.find(".k-edit-label:first").hide();
            e.container.find(".k-edit-field:first").hide();
        },
        columns: [{
            field: "employee_id",
            hidden: true
        },
        {
            field: 'employee_fullname',
            title: 'Employee name',
            width: '20%',
        },
        {
            field: 'applicant_fullname',
            title: 'Applicant Name',
            width: '18%',
        },
        {
            field: 'title_location',
            title: 'Position Details'
        },
        ],
        dataBound: (e) => setTimeout(() => $('#grid').data("kendoGrid").dataSource.read(e), 5000),

        dataSource: {
            pageSize: 6,
            group: [{ field: "title_location" }, { field: "applicant_fullname" }],
            transport: {
                read: {
                    url: `${baseUrl}InterviewRatingManagement/getAllInterviewsForSecretariat`,
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
                    id: "rated_applicant_id",
                    fields: {
                        rated_applicant_id: {
                            editable: false,
                            nullable: true
                        },
                        employee_fullname: {
                            type: "string",
                            validation: {
                                required: true
                            }
                        },
                        applicant_fullname: {
                            type: "string",
                            validation: {
                                required: true,
                                min: 1
                            }
                        },
                        title_location: {
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