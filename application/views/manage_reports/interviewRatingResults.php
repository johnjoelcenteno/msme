<div class="spacer-75"></div>
&nbsp;
<section>
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url() ?>Reports">Summary Interview Rating Sheet</a></li>
            <li class="breadcrumb-item active" aria-current="page">Interview Rating Results</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header card-header-primary">
                    <h4 class="card-title">Interview Rating Results</h4>
                    <!-- <p class="category">Here are the positions for interview</p> -->
                </div>
                <div class="card-body">
                    <div id="grid"></div>
                </div>

            </div>
        </div>
</section>
<input type="hidden" id="positionId" value='<?= $positionId ?>'>
<script src="<?= base_url() ?>assets/custom_js/interviewRatingResults.js"></script>