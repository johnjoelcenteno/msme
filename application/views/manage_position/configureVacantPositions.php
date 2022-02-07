<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb ml-3">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>Dashboard">Home</a></li>
        <li class="breadcrumb-item active"><a>Manage vacant position</a></li>
    </ol>
</nav>
<section class="ml-5 mt-5">
    <h3>
        <a href="<?= base_url() ?>Position/create">
            <button class="btn btn-info float-right btn-sm"><i class="material-icons">add</i> Add Position</button>
        </a>
        <b>Manage Vacant Position</b>

        <div id="grid" class="mt-3"></div>
    </h3>
</section>

<div id="window"></div>
<script type="text/x-kendo-template" id="windowTemplate">
    Permanently delete
    <strong>#= position_title # </strong> ?
    <p></p>
    <button class="k-button" id="yesButton">Yes</button>
    <button class="k-button" id="noButton"> No</button>
</script>

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
                    title: 'Position Title'
                },
                {
                    field: 'plantilla_item_no',
                    title: 'Plantilla Item No.'
                },
                {
                    field: 'office_name',
                    title: 'Office Assignment'
                },
                {
                    field: 'Salary_job_pay_scale',
                    title: 'Salary Grade',
                },
                {
                    field: 'is_vacant',
                    title: 'Is Vacant',
                    template: "<input class='checkbox' value='#= position_id#' type='checkbox' #= is_vacant == 1 ? 'checked' : ''#>",
                    width: "150px",
                    filterable: true,
                },
            ],

            dataSource: {
                pageSize: 5,

                transport: {
                    read: {
                        url: "<?= base_url() ?>Position/get",
                        contentType: "json",
                        type: "GET"
                    },
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
                            is_vacant: {
                                type: "number"
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
        var grid = $("#grid").data("kendoGrid");

        $("#addEmployee").click(function() {
            var grid = $("#grid").data("kendoGrid");
            grid.addRow();
        });

        $(document).on("change", '.checkbox', function() {
            let positionId = $(this).val();
            let isChecked = $(this).is(":checked");

            $.post("<?= base_url() ?>Position/updateVacantPosition", {
                position_id: positionId,
                is_checked: isChecked
            }, function(resp) {
                grid.dataSource.read();
            });

            isChecked ?
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Position opened',
                    showConfirmButton: false,
                    timer: 1500
                }) : Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Position closed',
                    showConfirmButton: false,
                    timer: 1500
                })


        });


        var window = $("#window").kendoWindow({
            title: "Are you sure you?",
            visible: false, //the window will not appear before its .open method is called
            width: "400px"
        }).data("kendoWindow");
        var windowTemplate = kendo.template($("#windowTemplate").html());


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