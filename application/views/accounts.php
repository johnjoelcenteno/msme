<div class="spacer-75"></div>
<section>
    &nbsp;
    <div class="mt-3"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Manage MSME</h4>

                </div>
                <div class="card-body">
                    <div class="spacer-20"></div>
                    <div id="grid"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#grid').kendoGrid({
            toolbar: ["excel", "search"],
            sortable: true,
            pageable: true,
            editable: "popup",
            edit: function(e) {
                e.container.find(".k-edit-label:first").hide();
                e.container.find(".k-edit-field:first").hide();
            },
            columns: [{ 
                    field: "position_id",
                    hidden: true
                },
                {
                    field: 'position_title',
                    title: 'Owner/Contact person'
                },
                {
                    field: 'plantilla_item_no',
                    title: 'Category'
                },
                {
                    field: 'office_name',
                    title: 'Sector Classification'
                },
                {
                    field: 'Salary_job_pay_scale',
                    title: 'Industry Sector',
                },
                {
                    field: 'eligibility',
                    title: 'Size',
                    editor: provinceDropDownEditor,
                },
                {
                    command: [{
                            name: "edit",
                            text: {
                                edit: " "
                            },
                            template: "<a class='customEdit btn btn-success btn-round' title='Edit'><i class='material-icons'>edit</i></a>"
                        },
                        {
                            name: "delete",
                            text: {
                                edit: " "
                            },
                            template: "<a class='customDelete btn btn-danger btn-round ' title='Delete'><i class='material-icons'>delete</i></a>"
                        }
                    ],
                },
            ],

            dataSource: {
                pageSize: 5,

                transport: {
                    // read: {
                    //     url: "<?= base_url() ?>Position/get",
                    //     contentType: "json",
                    //     type: "GET"
                    // },
                    update: {
                        url: "<?= base_url() ?>ManageEmployees/update",
                        contentType: "application/json",
                        type: "POST"
                    },
                    destroy: {
                        url: "<?= base_url() ?>Position/destroy",
                        contentType: "application/json",
                        type: "POST"
                    },
                    create: {
                        url: "<?= base_url() ?>ManageEmployees/create",
                        contentType: "application/json",
                        type: "POST"
                    },
                    parameterMap: function(data, type) {
                        return type != 'read' ? JSON.stringify(data) : null;
                    },
                },

                schema: {
                    data: (resp) => JSON.parse(resp),
                    total: (resp) => JSON.parse(resp).length,
                    model: {
                        id: "position_id",
                        fields: {
                            position_id: {
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
                            Salary_job_pay_scale: {
                                type: "string",
                                validation: {
                                    required: true,
                                    min: 1
                                }
                            },
                            eligibility: {
                                type: "string",
                                validation: {
                                    required: true,
                                    min: 1
                                }
                            },
                        }
                    },
                },

                requestEnd: function(e) {
                    type = e.type;
                    if (type != "read") {
                        $('#grid').data("kendoGrid").dataSource.read(e);

                        let title = type == 'update' ? "Employee updated successfully" : "Position deleted successfully";
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

        $("#addEmployee").click(function() {
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

        $("#grid").on("click", ".customDelete", function(e) {
            e.preventDefault();

            var tr = $(e.target).closest("tr");
            var data = grid.dataItem(tr);
            console.log(data);
            window.content(windowTemplate(data));
            window.center().open();

            $("#yesButton").click(function() {
                grid.dataSource.remove(data);
                grid.dataSource.sync();
                window.close();
            });
            $("#noButton").click(function() {
                window.close();
            });
        });

        $("#grid").on("click", ".customEdit", function() {
            var row = $(this).closest("tr");
            let data = grid.dataItem(row);

            let positionId = data.position_id;
            location.replace("<?= base_url() ?>" + `Position/update?id=${positionId}`);
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
                            parse: function(response) {
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
                            parse: function(response) {
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
</script>