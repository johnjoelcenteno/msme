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
                                    <option value="PENRO Nueva Viscaya">PENRO Nueva Viscaya</option>
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
                                <select name="" id="positionDd" class="form-control" disabled>
                                    <option value="">Select position</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-control col-md-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="form-control col-md-6">
                                <label for="">Designation</label>
                                <input type="text" class="form-control" placeholder="Enter Designation">
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

                                $("#penroDd").change(function(e) {
                                    let selectedPenro = $(this).val();
                                    selectedPenro == "" ? $("#positionDd").attr("disabled", true) : $("#positionDd").attr("disabled", false);

                                    $.post("<?= base_url() ?>UserAccounts/getListOfPosition", {
                                        office_id: selectedPenro
                                    }, function(resp) {
                                        resp = JSON.parse(resp);
                                        let optionsString;
                                        optionsString += "<option>Select Position</option>";
                                        resp.forEach(element => optionsString += `<option value="${element.position_id}">${element.position_title}</option>`);

                                        $("#positionDd").html(optionsString);
                                    });
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