<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Values Entered</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x"></i></button>
            </div>
            <div class="modal-body">


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
                                        Review Record
                                    </h5>

                                    <form class="mt-5" action="" method="POST">

                                        <h6>Business Owner/ Contact Person</h6>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="" class="fw-bold">Last Name</label>
                                                    <input type="text" placeholder="Enter Last Name here" class="form-control" id="reviewlastname">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="fw-bold">First Name</label>
                                                    <input type="text" placeholder="Enter First Name here" class="form-control" id="reviewfirstname">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="fw-bold">Middle Name</label>
                                                    <input type="text" placeholder="Enter Middle Name here" class="form-control" id="reviewmiddlename">
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label style="margin-bottom: -15px;" class="fw-bold">MSME/Owner Gender</label>
                                                        <select class="form-control" id="reviewgender">
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
                                                        <input type="text" placeholder="Enter Barangay here" class="form-control" id="reviewbarangay">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="" class="fw-bold">Municipality/City</label>
                                                        <input type="text" placeholder="Enter Municipality/City here" class="form-control" id="reviewmunicipality">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="" class="fw-bold">Province</label>
                                                        <input type="text" placeholder="Enter Province here" class="form-control" id="reviewprovince">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="" class="fw-bold">House No.</label>
                                                        <input type="text" placeholder="Enter Municipality/City here" class="form-control" id="reviewHouseNo">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="" class="fw-bold">Street No.</label>
                                                        <input type="text" placeholder="Enter Barangay here" class="form-control" id="reviewStreetNo">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="" class="fw-bold">Select Category</label>
                                                        <select class="form-control" id="reviewcategory">
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
                                                        <input type="radio" name="bnrRadio" id="reviewyes" />
                                                        <label for="" class="fw-bold">Yes</label><br>
                                                        <input type="radio" name="bnrRadio" id="reviewno" />
                                                        <label for="" class="fw-bold">No</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="fw-bold">Mayor's Permit Number</label>
                                                        <input type="text" placeholder="Enter Mayor's permit number" class="form-control" id="reviewmayorsPermitNumber">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label style="margin-bottom: -15px;" class="fw-bold">Mayor's Permit Registration</label>
                                                    <select class="form-control" id="reviewmayorsPermit">
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
                                                    <select name="" class="form-control" id="reviewenterpriseDevelopment">
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
                                                    <select class="form-control" id="reviewclassification">
                                                        <option value="">Select Classification</option>
                                                        <option>MFG</option>
                                                        <option>WS/Retail</option>
                                                        <option>Agri</option>
                                                        <option>Serv</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="fw-bold">Industry Sector</label>
                                                    <select class="form-control" id="reviewindustry">
                                                        <option value="">Select Industry sector</option>
                                                        <option>Auto & Auto pass</option>
                                                        <option>Electronic Manufacturing Services</option>
                                                        <option>AeroSpace parts</option>
                                                        <option>Chemicals</option>
                                                        <option>Ship building and ship repair</option>
                                                        <option>Furniture, Garments and Creative industries</option>
                                                        <option>Iron and steel, tool and dye</option>
                                                        <option>Agribusiness</option>
                                                        <option>Construction</option>
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
                                                        <select class="form-control" id="reviewclassificationBySize">
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
                                                        <select class="form-control" id="reviewprofile">
                                                            <option value="">Select profile</option>
                                                            <option>OSY</option>
                                                            <option>PWD</option>
                                                            <option>Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>

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

                                    </form>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>&nbsp;
                <button type="button" class="btn btn-primary" id="proceedSaveChangesBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        var createModal = new bootstrap.Modal(document.getElementById('createModal'), {
            keyboard: false
        });

        let transferInputModal = null;

        $('#saveBtn').click(function() {
            transferInputModal = transferInputIntoModal();
            console.log(transferInputModal, 'transfer input modal');
            createModal.show();
        });

        async function prepareRequestPayload(transferInputModal) {
            const {
                firstname,
                middlename,
                lastname,
                barangay,
                province,
                category,
                // adjust bnr,
                profile,
                houseNo,
                streetNo,
            } = transferInputModal;


            const city = transferInputModal.municipality;
            const mayors_permit_registration = transferInputModal.mayorsPermit;
            const mayors_permit_number = transferInputModal.mayorsPermitNumber;
            const enterprise_development_track = transferInputModal.enterpriseDevelopment;
            const industry_sector = transferInputModal.industry;
            const classification_size = transferInputModal.classificationBySize;
            const classification_by_sector = transferInputModal.classification;
            const owner_gender = transferInputModal.gender;
            const technical_advisory_services_provided = transferInputModal.technicalAdvisory;
            const date_of_services = transferInputModal.dateOfServices;
            const bnr = transferInputModal.yes;
            const servicesProvided = JSON.stringify(servicesProvidedArray);

            const payload = {
                firstname,
                middlename,
                lastname,
                barangay,
                city,
                province,
                category,
                mayors_permit_registration,
                bnr,
                mayors_permit_number,
                enterprise_development_track,
                classification_by_sector,
                industry_sector,
                classification_size,
                owner_gender,
                profile,
                technical_advisory_services_provided,
                date_of_services,
                houseNo,
                streetNo,
                servicesProvided
            };

            const request = new Request("Manage/addRecordPost", payload);
            await request.SendPost();
            SweetAlert.SuccessWithMessage('Record Created Successfully');
            $('input').val('');
            $('select').val('');

            createModal.hide();
        }

        $('#proceedSaveChangesBtn').click(function() {
            if (transferInputModal == null) return;
            prepareRequestPayload(transferInputModal);
        });
    });
</script>