<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb ml-3">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>Dashboard">Home</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>Offices/index">Manage Offices</a></li>
        <li class="breadcrumb-item active"><a>Update Offices</a></li>
    </ol>
</nav>
<section class="ml-5 mt-5">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Update Offices</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="row" style="display: flex;justify-content: right;margin-right: 20px;">
                    <div class="form-group col-md-6">
                        <label for="">Office Name</label>
                        <input type="text" class="form-control" id="officeName" placeholder="Enter office name" value="<?= $queryData->office_name ?>">
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
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $("#provinceDd option[value='" + "<?= $queryData->province ?>" + "']").attr("selected", true);

                            $('form').submit(function(e) {
                                e.preventDefault();

                                let officeName = $('#officeName').val();
                                let officeId = "<?= $this->input->get("id") ?>";
                                let provinceName = $('#provinceDd').val();

                                let postObj = {
                                    office_name: officeName,
                                    office_id: officeId,
                                    province: provinceName
                                }

                                $.post("<?= base_url() ?>Offices/updatePost", postObj, function(resp) {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Office update successfully',
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