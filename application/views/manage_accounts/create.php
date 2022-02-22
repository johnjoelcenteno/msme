<link rel="stylesheet" href="<?= base_url() ?>assets/custom_css/dashboard.css">
<style>
    .submit-button-row {
        display: flex;
        justify-content: right;
    }
</style>
<div class="spacer-75"></div>
&nbsp;
<section>
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url() ?>UserAccounts">User management</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create User</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Create User</h4>
                </div>
                <div class="card-body">
                    <form action="" class="mt-3">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter first name here">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Middle Name</label>
                                <input type="text" class="form-control" placeholder="Enter middle name here">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter last name here">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="">Select Office</label>
                                <select name="" id="officeDd" class="form-control">
                                    <option value="">select office</option>
                                    <option value="PENRO Batanes">PENRO Batanes</option>
                                    <option value="PENRO Cagayan">PENRO Cagayan</option>
                                    <option value="PENRO Isabela">PENRO Isabela</option>
                                    <option value="PENRO Nueva Vizcaya">PENRO Nueva Vizcaya</option>
                                    <option value="PENRO Quirino">PENRO Quirino</option>
                                    <option value="Regional Office">Regional Office</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Select PENRO/CENRO/Regional Office</label>
                                <select name="" id="penroDd" class="form-control" disabled>
                                    <option value="">Select PENRO/CENRO/Regional Office</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Position</label>
                                <input type="text" class="form-control" placeholder="Enter position here">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" placeholder="Enter position here">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Place of vacancy to rate</label>
                                <br>
                                <button type="button" id="restartBtn" class="mx-1 btn btn-success btn-sm" style="display:none"><span class="material-icons">refresh</span></button>
                                <button type="button" id="addPlaceVacancyBtn" class="mx-1 btn btn-info btn-sm">View</button>
                                <button class="btn btn-danger btn-sm ml-5" type="button" id="clearBtn" style="display:none;">clear</button>
                                <button class="btn btn-primary btn-sm " type="button" id="selectAllBtn" style="display:none">Select all</button>
                                <div id="selectedPositions"></div>
                                <input type="hidden" class="form-control" placeholder="Enter position to rate here">
                            </div>
                        </div>

                        <div class="row" id="tableOfficeCollection" style="display: none;margin-bottom:30px">
                            <div class="form-group col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px;"></th>
                                            <th>Office name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listOfOffices->result() as $row) { ?>
                                            <tr>
                                                <td><input type="checkbox" class="selected-offices-text" value="<?= "$row->office_name,$row->province" ?>"></td>
                                                <td>
                                                    <label for=""><?= "$row->office_name, <strong>$row->province</strong>" ?></label>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary btn-sm" type="button" id="addSelectedBtn">Add selected</button>
                            </div>
                        </div>

                        <script src="<?= base_url() ?>assets/custom_js/manage-account-create.js"></script>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Designation</label>
                                <input type="text" class="form-control" placeholder="Enter designation here">
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#officeDd').change(function() {
                                    let selectedOffice = $(this).val();

                                    $.post("<?= base_url() ?>UserAccounts/getListOfPenros", {
                                        selected_office: selectedOffice
                                    }, function(resp) {
                                        $("#penroDd").html(resp);
                                    });
                                    selectedOffice == "" ? $("#penroDd").attr("disabled", true) : $("#penroDd").attr("disabled", false);
                                });
                            });
                        </script>



                        <div class="row submit-button-row">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>