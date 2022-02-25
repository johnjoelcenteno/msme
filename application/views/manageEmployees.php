<nav aria-label="breadcrumb" role="navigation">
	<ol class="breadcrumb ml-3">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>Dashboard">Home</a></li>
		<li class="breadcrumb-item active"><a>Manage Employees</a></li>
	</ol>
</nav>
<section class="ml-5 mt-5">
	<h3>
		<a href="<?= base_url() ?>UserAccounts/create">
			<button class="btn btn-info float-right btn-sm"><i class="material-icons">add</i> Add User</button>
		</a>
		<b>Manage Users</b>

		<div id="grid" class="mt-3"></div>
	</h3>
</section>

<div id="window"></div>
<script type="text/x-kendo-template" id="windowTemplate">
	Permanently delete
    <strong>#= lastname #, #=firstname# </strong> ?
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
					field: "employee_id",
					hidden: true
				},
				{
					field: 'lastname',
					title: 'Last Name'
				},
				{
					field: 'firstname',
					title: 'First Name'
				},
				{
					field: 'middlename',
					title: 'Middle Name'
				},
				{
					field: 'office_name',
					title: 'Office Name',
				},
				{
					field: 'user_role',
					title: 'User Role',
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
						url: "<?= base_url() ?>UserAccounts/getAllUsers",
						contentType: "json",
						type: "GET"
					},
					update: {
						url: "<?= base_url() ?>ManageEmployees/update",
						contentType: "application/json",
						type: "POST"
					},
					destroy: {
						url: "<?= base_url() ?>UserAccounts/destroy",
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
						id: "employee_id",
						fields: {
							employee_id: {
								editable: false,
								nullable: true
							},
							firstname: {
								type: "string",
								validation: {
									required: true
								}
							},
							lastname: {
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
							user_role: {
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
