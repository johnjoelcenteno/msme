<link rel="stylesheet" href="<?= base_url() ?>assets/custom_css/dashboard.css">
<style>
    .submit-button-row {
        display: flex;
        justify-content: right;
    }

    .bg-white-smoke {
        background-color: #fffbfb !important;
        border-radius: 10px;
    }

    strong {
        font-weight: bolder;
    }
</style>
<div class="spacer-75"></div>
&nbsp;
<section>
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Rate Applicant</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title"><?= $applicant_name ?></h4>
                    <p class="category">Salary grade 15 and above</p>
                </div>
                <div class="card-body">

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="card-body bg-white-smoke">
                                <p>Eligibility: <strong><?= $applicantTable->eligibility ?>.</strong></p>
                                <p>Present Position and designation: <strong><?= $applicantTable->position_designation ?></strong></p>
                                <p>Salary Grade: <strong><?= $applicantTable->salary_grade ?></strong></p>
                                <p>Present Place of Assignment: <strong><?= $applicantTable->place_of_assignment ?></strong></p>
                                <p>Status of Appointment: <strong><?= $applicantTable->status_of_appointment ?></strong></p>
                                <p>Education Attainmenet: <strong><?= $applicantTable->education_attainment ?></strong></p>
                                <p>Age: <strong><?= $applicantTable->age ?></strong></p>
                                <p>Date of Last Promotion: <strong><?= $applicantTable->date_of_last_promotion ?></strong></p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <form action="">
                                <h5>A. Physical Characteristics and Personality Traits <strong>(10 points)</strong></h5>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Conscientiousness</label>
                                        <input required type="number" id="Conscientiousness" placeholder="Enter (0 - 2 points)" min="0" max="2" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Extraversion</label>
                                        <input required type="number" id="Extraversion" placeholder="Enter (0 - 2 points)" min="0" max="2" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Agreeableness</label>
                                        <input required type="number" id="Agreeableness" placeholder="Enter (0 - 2 points)" min="0" max="2" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Openness to experience</label>
                                        <input required type="number" id="Openness_to_experience" placeholder="Enter  (2points)" min="0" max="2" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Emotional Stability</label>
                                        <input required type="number" id="Emotional_Stability" placeholder="Emotional Stability (0 - 2 points)" min="0" max="2" class="form-control">
                                    </div>
                                </div>

                                <br>

                                <h5>B. Potential (10 points)</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Points earned based on interview by Panel (4 points)</h6>
                                        <div class="form-group">
                                            <label for="">A. On devising and plan or any activity</label>
                                            <input required type="number" id="On_devising_and_plan_or_any_activity" placeholder="Enter (0 - 1 point)" min="0" max="1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">B. On how to organize</label>
                                            <input required type="number" id="On_how_to_organize" placeholder="Enter (0 - 1 points)" min="0" max="1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">C. On implementing</label>
                                            <input required type="number" id="On_implementing" placeholder="Enter (0 - 1 point)" min="0" max="1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">D. On monitoring</label>
                                            <input required type="number" id="On_monitoring" placeholder="Enter (0 - 1 point)" min="0" max="1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>Knowledge of the job/work applied for (3 points)</h6>
                                            <input required type="number" id="Knowledge_of_the_job" placeholder="Enter (0 - 3 points)" min="0" max="3" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <h6>Logical presentation of ideas/concepts (3 points)</h6>
                                            <input required type="number" id="Logical_presentation_of_ideas" placeholder="Enter (0 - 3 points)" min="0" max="3" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Remarks</label>
                                        <textarea name="" id="remarks" placeholder="Enter your Remarks here" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary pull-right">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<input type="hidden" id="applicant_id" value="<?= $applicant_id ?>">
<input type="hidden" id="plantilla_no" value="<?= $plantilla_no ?>">
<input type="hidden" id="applicantTable" value='<?= json_encode($applicantTable) ?>'>
<input type="hidden" id="ddTitle" value="<?= $this->input->get('ddTitle') ?>">
<script>
    $(document).ready(function() {
        const removePlantillaNumberAndUpdatePositionAppliedFor = () => {
            let plantillaNo = $('#plantilla_no').val();
            const applicantTable = JSON.parse($('#applicantTable').val());
            let positionAppliedFor = applicantTable.position_applied_for.split(',');

            let indexOfPlantillaNoInPositionAppliedFor = positionAppliedFor.findIndex(x => x == plantillaNo);

            positionAppliedFor.splice(indexOfPlantillaNoInPositionAppliedFor, 1);

            positionAppliedFor = positionAppliedFor.map(x => x.trim()).join();
            const postObj = {
                applicant_id: $('#applicant_id').val(),
                position_applied_for: positionAppliedFor
            };

            $.post(`${baseUrl}Interview/updatePlantillaNumberOfApplicant`, postObj);
        }

        $('form').submit(function(e) {
            e.preventDefault();

            const getFormInputs = () => {
                return {
                    Conscientiousness: $('#Conscientiousness').val(),
                    Extraversion: $('#Extraversion').val(),
                    Agreeableness: $('#Agreeableness').val(),
                    Openness_to_experience: $('#Openness_to_experience').val(),
                    Emotional_Stability: $('#Emotional_Stability').val(),
                    On_devising_and_plan_or_any_activity: $('#On_devising_and_plan_or_any_activity').val(),
                    On_how_to_organize: $('#On_how_to_organize').val(),
                    On_implementing: $('#On_implementing').val(),
                    On_monitoring: $('#On_monitoring').val(),
                    Knowledge_of_the_job: $('#Knowledge_of_the_job').val(),
                    Logical_presentation_of_ideas: $('#Logical_presentation_of_ideas').val(),
                    remarks: $('#remarks').val(),
                };
            }

            let Conscientiousness = parseInt($('#Conscientiousness').val());
            let Extraversion = parseInt($('#Extraversion').val());
            let Agreeableness = parseInt($('#Agreeableness').val());
            let Openness_to_experience = parseInt($('#Openness_to_experience').val());
            let Emotional_Stability = parseInt($('#Emotional_Stability').val());
            let On_devising_and_plan_or_any_activity = parseInt($('#On_devising_and_plan_or_any_activity').val());
            let On_how_to_organize = parseInt($('#On_how_to_organize').val());
            let On_implementing = parseInt($('#On_implementing').val());
            let On_monitoring = parseInt($('#On_monitoring').val());
            let Knowledge_of_the_job = parseInt($('#Knowledge_of_the_job').val());
            let Logical_presentation_of_ideas = parseInt($('#Logical_presentation_of_ideas').val());
            let remarks = $('#remarks').val();

            const total_score_a = Emotional_Stability + Openness_to_experience + Agreeableness + Extraversion + Conscientiousness;
            const total_score_b = On_devising_and_plan_or_any_activity + On_how_to_organize + On_implementing + On_monitoring + Knowledge_of_the_job + Logical_presentation_of_ideas;
            const total = Conscientiousness + Extraversion + Agreeableness + Openness_to_experience + Emotional_Stability + On_devising_and_plan_or_any_activity + On_how_to_organize + On_implementing + On_monitoring + Knowledge_of_the_job + Logical_presentation_of_ideas;
            const answers = JSON.stringify(getFormInputs());

            const applicant_id = $('#applicant_id').val();
            const plantilla_item_no = $('#plantilla_no').val();
            const dd_title = $('#ddTitle').val().replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '');

            const postObj = {
                dd_title,
                applicant_id,
                plantilla_item_no,
                total,
                total_score_a,
                total_score_b,
                answers
            };

            const sendPost = () => {
                $.post(`${baseUrl}Interview/sendPost`, postObj, function() {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Interview has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    setTimeout(() => {
                        location.replace(`${baseUrl}InterviewRatingManagement`);
                    }, 2000);
                });
            }

            Swal.fire({
                title: 'Total score: ' + total,
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#4CAF50',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    removePlantillaNumberAndUpdatePositionAppliedFor();
                    sendPost();
                }
            });
        });
    });
</script>