<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb ml-3">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>Dashboard">Home</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>Offices/index">Manage Offices</a></li>
        <li class="breadcrumb-item active"><a>Create Offices</a></li>
    </ol>
</nav>
<section class="ml-5 mt-5">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Create Offices</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="row" style="display: flex;justify-content: right;margin-right: 20px;">
                    <div class="form-group col-md-6">
                        <label for="">Office Name</label>
                        <input type="text" class="form-control" id="officeName" placeholder="Enter office name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Select province</label>
                        <select name="" id="provinceDd" class="form-control">
                            <option value="">Select Province</option>
                            <option value="PENRO Batanes">PENRO Batanes</option>
                            <option value="PENRO Cagayan">PENRO Cagayan</option>
                            <option value="PENRO Isabela">PENRO Isabela</option>
                            <option value="PENRO Quirino">PENRO Quirino</option>
                            <option value="PENRO Nueva Vizcaya">PENRO Nueva Vizcaya</option>
                            <option value="PENRO Nueva viscaya">PENRO Nueva viscaya</option>
                            <option value="Regional Office">Regional Office</option>
                        </select>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">CREATE</button>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('form').submit(function(e) {
                                e.preventDefault();

                                let officeName = $('#officeName').val();
                                let provinceName = $('#provinceDd').val();

                                let postObj = {
                                    office_name: officeName,
                                    province: provinceName
                                }

                                $.post("<?= base_url() ?>Offices/createPost", postObj, function(resp) {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Office Created successfully',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                });
                            });
                        });
                    </script>
                </div>
            </form>
        </div>
    </div>
</section>