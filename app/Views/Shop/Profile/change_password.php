<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<?php $session = session(); ?>

<div class=''>
    <div class='container p-4 p-md-5'>
        <div class="row">
            <div class="col-12">
                <p class="mb-0 h5 font-weight-bold">Account</p>
            </div>
            <div class="col-12 mb-2">
                <p class="m-0 h6 font-weight-light" style="font-size:14px;">Rohaan Mehta</p>
            </div>
            <?php include('app/Views/Shop/Profile/profile_sidebar.php'); ?>

            <div class="col-12 col-md-10">
                <div class='card p-3'>
                    <p class="mb-3 h5 font-weight-bold profile-heading">Change Password</p>
                    <div class="alert alert-success alert-dismissible fade show msg2" style='display:none;' role="alert">
                        Your password has updated successfully !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form class="change-password">
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <div class="row mt-2">
                                    <div class="col-12 col-md-4">
                                        <p class="profile-option m-0">Old Password</p>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="password" class="form-control old_password" value="" name="old_password" />
                                        <p class="text-danger m-0 msg" style="display:none;font-size:13px;">Old password doesn't match</p>
                                        <p class="text-danger m-0 msg5" style="display:none;font-size:13px;">Enter your old password</p>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12 col-md-4">
                                        <p class="profile-option m-0">New Password</p>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="password" class="form-control new_password" value="" name="new_password" />
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12 col-md-4">
                                        <p class="profile-option m-0">Confirm Password</p>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="password" class="form-control confirm_password" value="" name="confirm_password" />
                                        <p class="text-danger m-0 msg3" style="display:none;font-size:13px;">New Password doesn't match</p>
                                        <p class="text-danger m-0 msg4" style="display:none;font-size:13px;">Password must be atleast 6 characters</p>
                                    </div>
                                </div>
                                <div class="row p-3 p-md-4 pt-md-2">
                                    <button style='width:100%;' class="btn black-btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('.change-password').submit(function(e) {
            e.preventDefault();
            $('.msg2').css('display', 'none');
            $('.msg3').css('display', 'none');
            $('.msg4').css('display', 'none');
            $('.msg5').css('display', 'none');

            if ($('.old_password').val().length < 1) {
                $('.msg5').css('display', 'block');
                return false;
            }

            if ($('.new_password').val().length < 6) {
                $('.msg4').css('display', 'block');
                return false;
            }

            if ($('.new_password').val() != $('.confirm_password').val()) {
                $('.msg3').css('display', 'block');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "<?= base_url('change_password_post') ?>",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        $('.msg2').css('display', 'block');
                        $('.msg').css('display', 'none');
                        $('.old_password').val('');
                        $('.new_password').val('');
                        $('.confirm_password').val('');
                    } else {
                        $('.msg').css('display', 'block');
                        $('.msg2').css('display', 'none');
                        $('.new_password').val('');
                        $('.confirm_password').val('');
                    }
                }
            });
        });
    });
</script>
<?= $this->endSection('scripts') ?>