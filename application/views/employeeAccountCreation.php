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
            <li class="breadcrumb-item"><a href="javascript:;">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Employee Account Creation</h4>
                    <!-- <p class="category">Category subtitle</p> -->
                </div>
                <div class="card-body">
                    <form action="" class="mt-3">
                        <div class="form-group row mb-5">
                            <div class="col-md-4">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter first name here" id="firstname">
                            </div>
                            <div class="col-md-4">
                                <label for="">Middle Name</label>
                                <input type="text" class="form-control" placeholder="Enter middle name here" id="middlename">
                            </div>
                            <div class="col-md-4">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter last name here" id="lastname">
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter email here" id="email">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Position</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select position</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Office</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select office</option>
                                        <optgroup label="PENRO Batanes"></optgroup>
                                        <optgroup label="PENRO Cagayan">
                                            <option value="cenroAlcala">CENRO Alcala</option>
                                            <option value="cenroAparri">CENRO Aparri</option>
                                            <option value="cenroSolana">CENRO Solana</option>
                                            <option value="cenroSanchezMira">CENRO Sanchez Mira</option>
                                        </optgroup>
                                        <optgroup label="PENRO Isabela">
                                            <option value="cenroCabagan">CENRO Cabagan</option>
                                            <option value="cenroCauayan">CENRO Cauayan</option>
                                            <option value="cenroNaguilian">CENRO Naguilian</option>
                                            <option value="cenroPalanan">CENRO Palanan</option>
                                            <option value="cenroSanIsidro">CENRO San Isidro</option>
                                        </optgroup>
                                        <optgroup label="PENRO Nueva Vizcaya">
                                            <option value="cenroAritao">CENRO Aritao</option>
                                            <option value="cenroDupax">CENRO Dupax</option>
                                        </optgroup>
                                        <optgroup label="PENRO Quirino">
                                            <option value="cenroDiffun">CENRO Diffun</option>
                                            <option value="cenroNagtipunan">CENRO Nagtipunan</option>
                                        </optgroup>
                                        <optgroup label="Regional Office">
                                            <option value="AredForManagementServicesDivision">ARED for Management Services Division</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Position to rate</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select position to rate</option>
                                        <option value="">PENRO Batanes – Management Services Division</option>
                                        <option value="">PENRO Batanes – Technical Services Division</option>
                                        <option value="">PENRO Cagayan – Management Services Division</option>
                                        <option value="">PENRO Cagayan – Technical Services Division</option>
                                        <option value="">PENRO Isabela – Management Services Division</option>
                                        <option value="">PENRO Isabela – Technical Services Division</option>
                                        <option value="">PENRO Nueva Vizcaya – Management Services Division</option>
                                        <option value="">PENRO Nueva Vizcaya – Technical Services Division</option>
                                        <option value="">PENRO Quirino – Management Services Division</option>
                                        <option value="">PENRO Quirino – Technical Services Division</option>
                                        <option value="">CENRO Alcala</option>
                                        <option value="">CENRO Aparri</option>
                                        <option value="">CENRO Solana</option>
                                        <option value="">CENRO Sanchez Mira</option>
                                        <option value="">CENRO Cabagan</option>
                                        <option value="">CENRO Palanan</option>
                                        <option value="">CENRO Naguilian</option>
                                        <option value="">CENRO Cauayan</option>
                                        <option value="">CENRO San Isidro</option>
                                        <option value="">CENRO Aritao</option>
                                        <option value="">CENRO Dupax</option>
                                        <option value="">CENRO Diffun</option>
                                        <option value="">CENRO Nagtipunan</option>
                                        <option value="">ARED for Management Services</option>
                                        <option value="">ARED for Technical Services</option>
                                        <option value="">Licenses, Patents and Deeds Division</option>
                                        <option value="">Surveys and Mapping Division</option>
                                        <option value="">Conservation and Development Division</option>
                                        <option value="">Enforcement Division</option>
                                        <option value="">Administrative Division</option>
                                        <option value="">Legal Division</option>
                                        <option value="">Planning and Management Division</option>
                                        <option value="">Finance Division</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row submit-button-row">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>