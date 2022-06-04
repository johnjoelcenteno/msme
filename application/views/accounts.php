<div class="spacer-75"></div>
<section>
    &nbsp;
    <div class="mt-3"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">MSME Profile Form</h4>

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
                    field: "msme_id",
                    hidden: true
                },
                {
                    field: 'fullname',
                    title: 'Owner/Contact person'
                },
                {
                    field: 'category',
                    title: 'Category'
                },
                {
                    field: 'classification_by_sector',
                    title: 'Sector Classification'
                },
                {
                    field: 'industry_sector',
                    title: 'Industry Sector',
                },
                {
                    field: 'classification_size',
                    title: 'Size',
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
                    read: {
                        url: "<?= base_url() ?>Manage/getForms",
                        contentType: "json",
                        type: "GET"
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

        $("#grid").on("click", ".customEdit", function() {
            var row = $(this).closest("tr");
            const grid = $('#grid').data('kendoGrid');
            let data = grid.dataItem(row);

            let msme_id = data.msme_id;
            location.replace("<?= base_url() ?>" + `Manage/update?id=${msme_id}`);
        });

        $("#grid").on("click", ".customDelete", async function() {
            var row = $(this).closest("tr");
            const grid = $('#grid').data('kendoGrid');
            let data = grid.dataItem(row);

            const resp = await SweetAlert.AreYouSure();
            if (!resp) return;

            let msme_id = data.msme_id;
            location.replace("<?= base_url() ?>" + `Manage/delete?id=${msme_id}`);
        });
    });
</script>