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


                    <div class="card-body">
                        <h5 class="card-title">
                            Create Record
                        </h5>

                        <form class="mt-5" action="" method="POST">

                            <h6>Business Owner/ Contact Person</h6>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="fw-bold">Last Name</label>
                                        <input type="text" placeholder="Enter Last Name here" class="form-control" id="lastname">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="fw-bold">First Name</label>
                                        <input type="text" placeholder="Enter First Name here" class="form-control" id="firstname">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="fw-bold">Middle Name</label>
                                        <input type="text" placeholder="Enter Middle Name here" class="form-control" id="middlename">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="margin-bottom: -15px;" class="fw-bold">MSME/Owner Gender</label>
                                            <select class="form-control" id="gender">
                                                <option value="">Select Gender</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <h6>Complete Mailing Address</h6>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="" class="fw-bold">Barangay</label>
                                            <input type="text" placeholder="Enter Barangay here" class="form-control" id="barangay">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="fw-bold">Municipality/City</label>
                                            <input type="text" placeholder="Enter Municipality/City here" class="form-control" id="municipality">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="fw-bold">Province</label>
                                            <input type="text" placeholder="Enter Province here" class="form-control" id="province">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="fw-bold">House No.</label>
                                            <input type="text" placeholder="Enter House No. here" class="form-control" id="houseNo">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="fw-bold">Street No.</label>
                                            <input type="text" placeholder="Enter Street No. here" class="form-control" id="streetNo">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="" class="fw-bold">Select Category</label>
                                            <select class="form-control" id="category">
                                                <option value="">Select Category</option>
                                                <option>Existing</option>
                                                <option>Other Client</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="fw-bold">Business Name Registration</label><br>
                                            <input type="radio" name="bnrRadio" id="yes" />
                                            <label for="">Yes</label><br>
                                            <input type="radio" name="bnrRadio" id="no" />
                                            <label for="">No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="fw-bold">Mayor's Permit Number</label>
                                            <input type="text" placeholder="Enter Mayor's permit number" class="form-control" id="mayorsPermitNumber">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label style="margin-bottom: -15px;" class="fw-bold">Mayor's Permit Registration</label>
                                        <select class="form-control" id="mayorsPermit">
                                            <option>Select mayor's permit</option>
                                            <option>Registered</option>
                                            <option>Not Registered</option>
                                        </select>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="fw-bold">Enterprise Development Track</label>
                                        <select name="" class="form-control" id="enterpriseDevelopment">
                                            <option value="">Select Enterprise Development</option>
                                            <option value="1">Startine Enterprise (Level 1)</option>
                                            <option value="2">Growing (Level 2)</option>
                                            <option value="3">Expanding (Level 3)</option>
                                            <option value="4">Sustaining (Level 4)</option>
                                        </select>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="fw-bold">Classification by Sector</label>
                                        <select class="form-control" id="classification">
                                            <option value="">Select Classification</option>
                                            <option>MFG</option>
                                            <option>WS/Retail</option>
                                            <option>Agri</option>
                                            <option>Serv</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="fw-bold">Industry Sector</label>
                                        <select class="form-control" id="industry">
                                            <option value="">Select Industry sector</option>
                                            <option>AeroSpace parts</option>
                                            <option>Auto & Auto pass</option>
                                            <option>Chemicals</option>
                                            <option>Construction</option>
                                            <option>Electronic Manufacturing Services</option>
                                            <option>Ship building and ship repair</option>
                                            <option>Furniture, Garments and Creative industries</option>
                                            <option>Iron and steel, tool and dye</option>
                                            <option>Agribusiness</option>
                                            <option>IT-Bpm and E-Commerce</option>
                                            <option>Transport and logistics</option>
                                            <option>Tourisim</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="fw-bold">Classification by size</label>
                                            <select class="form-control" id="classificationBySize">
                                                <option value="">Select classification by size</option>
                                                <option>Micro</option>
                                                <option>Small</option>
                                                <option>Medium</option>
                                                <option>Large</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="fw-bold">Profile</label>
                                            <select class="form-control" id="profile">
                                                <option value="">Select profile</option>
                                                <option>OSY</option>
                                                <option>PWD</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <style>
                                    .danger {
                                        color: red !important;
                                        display: none;
                                    }
                                </style>
                                <section class="card card-body">
                                    <h3>Add Technical Advisory Services Provided</h3>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="fw-bold">Technical Advisory Services Provided</label>
                                                <input type="text" placeholder="Enter technical advisory services provided here" class="form-control" id="technicalAdvisory">
                                                <span id="errorTechnical" class="danger bold">Invalid input</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="fw-bold">Date of services</label>
                                                <input type="text" class="form-control" placeholder="Date Started" id="dateOfServicesStarted">
                                                <span id="dateStartedError" class="danger bold">Invalid input</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="fw-bold">Date of services</label>
                                                <input type="text" class="form-control" placeholder="Date Ended" id="dateOfServicesEnded">
                                                <span id="dateEndedError" class="danger bold">Invalid input</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-secondary btn-sm" type="button" id="appendBtn">Append</button>
                                    </div>
                                </section>

                                <section>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Technical Advisory Services Provided</th>
                                                    <th>Date Started</th>
                                                    <th>Date Ended</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tbodyServicesProvided">
                                                <tr>
                                                    <td colspan="5" align="center">Appended services provided will appear here</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success" style="float:right" id="saveBtn" type="button">Save</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?= base_url() ?>assets/custom_js/appendTechnicalServices.js"></script>

<script>
    function transferInputIntoModal() {
        const lastname = $('#lastname').val();
        const firstname = $('#firstname').val();
        const middlename = $('#middlename').val();
        const gender = $('#gender').val();
        const barangay = $('#barangay').val();
        const streetNo = $('#streetNo').val();
        const houseNo = $('#houseNo').val();
        const municipality = $('#municipality').val();
        const province = $('#province').val();
        const category = $('#category').val();
        const yes = $('#yes[type="radio"]:checked').length;
        const no = $('#no[type="radio"]:checked').length;
        const mayorsPermitNumber = $('#mayorsPermitNumber').val();
        const mayorsPermit = $('#mayorsPermit').val();
        const enterpriseDevelopment = $('#enterpriseDevelopment').val();
        const classification = $('#classification').val();
        const industry = $('#industry').val();
        const classificationBySize = $('#classificationBySize').val();
        const profile = $('#profile').val();
        const technicalAdvisory = $('#technicalAdvisory').val();
        const dateOfServices = $('#dateOfServices').val();

        document.querySelector('#reviewyes').checked = false;
        document.querySelector('#reviewno').checked = false;

        $('#reviewlastname').val(lastname);
        $('#reviewfirstname').val(firstname);
        $('#reviewmiddlename').val(middlename);
        $('#reviewgender').val(gender);
        $('#reviewbarangay').val(barangay);
        $('#reviewmunicipality').val(municipality);
        $('#reviewprovince').val(province);
        $('#reviewcategory').val(category);
        if (yes == 1) document.querySelector('#reviewyes').checked = true;
        if (no == 1) document.querySelector('#reviewno').checked = true;

        $('#reviewmayorsPermitNumber').val(mayorsPermitNumber);
        $('#reviewmayorsPermit').val(mayorsPermit);
        $('#reviewenterpriseDevelopment').val(enterpriseDevelopment);
        $('#reviewclassification').val(classification);
        $('#reviewindustry').val(industry);
        $('#reviewclassificationBySize').val(classificationBySize);
        $('#reviewprofile').val(profile);
        $('#reviewtechnicalAdvisory').val(technicalAdvisory);
        $('#reviewdateOfServices').val(dateOfServices);
        $('#reviewdateOfServices').val(dateOfServices);
        $('#reviewdateOfServices').val(dateOfServices);
        $('#reviewHouseNo').val(houseNo);
        $('#reviewStreetNo').val(streetNo);

        return {
            lastname,
            firstname,
            middlename,
            gender,
            barangay,
            municipality,
            province,
            category,
            yes,
            no,
            mayorsPermitNumber,
            mayorsPermit,
            enterpriseDevelopment,
            classification,
            industry,
            classificationBySize,
            profile,
            technicalAdvisory,
            dateOfServices,
            houseNo,
            streetNo
        }
    }
</script>
<?php $this->load->view('modalCreateConfirmation') ?>