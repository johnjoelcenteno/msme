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
            <li class="breadcrumb-item"><a href="javascript:;">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Rate Applicant</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header card-header-primary">
                    <h4 class="card-title">Positions to rate</h4>
                    <p class="category">Here are the positions for interview</p>
                </div>
                <div class="card-body">
                    <div class="row" id="iteratePositionsToApplyHere">
                        <!-- iterations start here -->
                        <!-- Iterations end here -->
                    </div>
                </div>

            </div>
        </div>
</section>
<input type="hidden" id="employeeInfo" value='<?= $employeeTable ?>'>
<input type="hidden" id="positionsForInterview" value='<?= $positionsForInterview ?>'>
<input type="hidden" id="applicantsTable" value='<?= $applicantsTable ?>'>
<script src="<?= base_url() ?>assets/custom_js/dashboard-processes.js"></script>