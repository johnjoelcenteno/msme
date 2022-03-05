<div class="spacer-75"></div>
&nbsp;
<section>
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>Dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url() ?>ComprehensiveEvaluationResults">Comprehensive Evaluation</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">Add scores</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add scores for comprehensive results</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 bg-white-smoke p-4 rounded">
                            <!-- Info side -->
                            <div>
                                <p>Applicant Name: <strong><?= "$applicant_info->firstname $applicant_info->middlename $applicant_info->lastname" ?></strong></p>
                                <p>Eligibility: <strong><?= $applicant_info->eligibility ?>.</strong></p>
                                <p>Present Position and designation: <strong><?= $applicant_info->position_designation ?></strong></p>
                                <p>Salary Grade: <strong><?= $applicant_info->salary_grade ?></strong></p>
                                <p>Present Place of Assignment: <strong><?= $applicant_info->place_of_assignment ?></strong></p>
                                <p>Status of Appointment: <strong><?= $applicant_info->status_of_appointment ?></strong></p>
                                <p>Education Attainmenet: <strong><?= $applicant_info->education_attainment ?></strong></p>
                                <p>Age: <strong><?= $applicant_info->age ?></strong></p>
                                <p>Date of Last Promotion: <strong><?= $applicant_info->date_of_last_promotion ?></strong></p>
                            </div>
                            <!-- Info side -->
                        </div>
                        <div class="col-md-8">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Education</label>
                                            <input type="number" id="education" min="0" max="12" placeholder="(0 - 12 pts) Enter points here" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Performance</label>
                                            <input type="number" id="performance" min="0" max="30" placeholder="(0 - 30 pts) Enter points here" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Training</label>
                                            <input type="number" id="training" min="0" max="8" placeholder="(0 - 8 pts) Enter points here" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Experience</label>
                                            <input type="number" id="experience" min="0" max="15" placeholder="(0 - 15 pts) Enter points here" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Written Skill/ Exam</label>
                                            <input type="number" id="writtenSkill" min="0" max="15" placeholder="(0 - 15 pts) Enter points here" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4" style="display:none">
                                        <div class="form-group">
                                            <label for="">Total</label>
                                            <input disabled type="number" id="total" placeholder="Enter points here" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Awards and Outstanding Achievement</label>
                                            <input type="number" id="awards" min="0" max="5" placeholder="(0 - 5 pts) Enter points here" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Remarks</label>
                                            <input type="text" id="comprehensive_remarks" placeholder="Enter Remarks here" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</section>
<input type="hidden" id="employeeInfo" value='<?= $employeeTable ?>'>
<input type="hidden" id="positionsForInterview" value='<?= $positionsForInterview ?>'>
<input type="hidden" id="interviewTable" value='<?= $applicantsTable ?>'>
<input type="hidden" id="interviewTableSpecificApplicant" value='<?= $interviewTable ?>'>
<input type="hidden" id="isProvincialSecretariat" value='<?= $isProvincialSecretariat ?>'>

<script>
    $(document).ready(function() {

        const interviewTableSpecificApplicant = JSON.parse($('#interviewTableSpecificApplicant').val());
        const provincialSecretariatCompleted = interviewTableSpecificApplicant?.provincial_secretariat_completed;
        const isProvincialSecretariat = $('#isProvincialSecretariat').val();

        const initializeFormInputs = () => {
            if (interviewTableSpecificApplicant == null) return;

            $('#education').val(interviewTableSpecificApplicant.education);
            $('#performance').val(interviewTableSpecificApplicant.performance);
            $('#training').val(interviewTableSpecificApplicant.training);
            $('#experience').val(interviewTableSpecificApplicant.experience);
            $('#writtenSkill').val(interviewTableSpecificApplicant.written_skill);
            $('#awards').val(interviewTableSpecificApplicant.awards);
            $('#comprehensive_remarks').val(interviewTableSpecificApplicant.comprehensive_remarks);
        }
        initializeFormInputs();


        function determineIfProvincialSecretariat() {
            if (provincialSecretariatCompleted == "1" && isProvincialSecretariat == "1") {
                $('input').attr('disabled', true);
                $('button[type="submit"]').hide();
            }
        }

        determineIfProvincialSecretariat();

        const interviewTable = JSON.parse($('#interviewTable').val())[0];
        const totalInterviewScore = interviewTable.total;
        $('#total').val(totalInterviewScore);
        const interview_id = interviewTable.interview_id;
        const getFormInputs = () => {
            return {
                interview_id,
                education: $('#education').val(),
                performance: $('#performance').val(),
                training: $('#training').val(),
                experience: $('#experience').val(),
                written_skill: $('#writtenSkill').val(),
                total: $('#total').val(),
                awards: $('#awards').val(),
                comprehensive_remarks: $('#comprehensive_remarks').val(),
            };
        }

        const totalFormScore = () => parseInt($('#education').val()) + parseInt($('#performance').val()) + parseInt($('#training').val()) + parseInt($('#experience').val()) + parseInt($('#writtenSkill').val()) + parseInt($('#awards').val());


        const sendPost = () => {
            $.post(`${baseUrl}ComprehensiveEvaluationResults/insertAddedScores`, getFormInputs(), function() {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                });

                setTimeout(() => {
                    location.replace(`${baseUrl}ComprehensiveEvaluationResults/`);
                    determineIfProvincialSecretariat();
                }, 1500);
            });
        }

        $('form').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#4CAF50',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) sendPost();
            });
        });

    });
</script>