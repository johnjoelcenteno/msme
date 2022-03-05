<div class="spacer-75"></div>
&nbsp;
<style>
    #grid,
    #grid .k-grid {
        font-size: 12px;
    }

    .k-grid .k-grid-header .k-header .k-link {
        height: 80px !important;
        white-space: normal;
    }
</style>
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
            <div id="grid"></div>
        </div>
</section>
<input type="hidden" id="positionId" value='<?= $positionId ?>'>
<script src="<?= base_url() ?>assets/custom_js/viewComprehensiveEvaluationResults.js"></script>