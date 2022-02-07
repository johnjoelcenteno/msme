<div class="spacer-75"></div>
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
                    <h4 class="card-title">Change Password</h4>

                </div>
                <div class="card-body">
                    <div class="spacer-20"></div>
                    <form>
                        <div class="form-group">
                            <label for="">Current Password</label>
                            <input type="password" id="currentPassword" class="form-control" placeholder="Enter current password" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" id="newPassword" class="form-control" placeholder="Enter new password" autocomplete="off" required>
                            <span class="text-danger confirm-password-error" style="display:none;">Password does not match</span>
                        </div>
                        <div class="form-group">
                            <label for="">Confirm new password</label>
                            <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm new password" autocomplete="off" required>
                            <span class="text-danger confirm-password-error" style="display:none;">Password does not match</span>
                        </div>

                        <div class="row submit-button-row">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {


        $("form").submit(function(e) {
            e.preventDefault();
            let currentPassword = $("#currentPassword").val();
            let newPassword = $("#newPassword").val();
            let confirmPassword = $("#confirmPassword").val();

            newPassword != confirmPassword ? $('.confirm-password-error').show() : $('.confirm-password-error').hide();

            if (newPassword != confirmPassword) return;

            $.post("<?= base_url() ?>Accounts/changePassword", {
                current_password: currentPassword,
                new_password: newPassword
            }, function(resp) {
                resp == "valid" ? Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Password changed successfully',
                    showConfirmButton: false,
                    timer: 1500
                }) : Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Invalid current password',
                    showConfirmButton: false,
                    timer: 1500
                });

                if (resp == "valid") {
                    $('#currentPassword').val("");
                    $('#newPassword').val("");
                    $('#confirmPassword').val("");
                }
            });
        });
    });
</script>