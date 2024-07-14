<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<div class="container text-center p-5">
    <div class="d-flex justify-content-center">
        <div style="width:100%;max-width:400px;">
            <p class="h5 mb-4">Forgot Password</p>
            <div class="form-group">
                <p class="m-0 form-check-label w-100 text-left">
                    Enter your email here
                </p>
                <input type="text" class="form-control mb-2" name="email" id="email" placeholder="Email">
                <input type="text" class="form-control mb-2" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="otp" id="otp" placeholder="OTP" style="display:none">
                <input type="text" class="form-control mb-2" name="password" id="password" placeholder="New Password" style="display:none">
                <button class="w-100 btn black-btn reset-btn">Verify Email</button>
                <button class="w-100 btn black-btn pass-btn" style="display:none">Reset Password</button>
                <button class="w-100 btn black-btn pass-updt" style="display:none">Update Password</button>
                <p style='font-size:13px;' class="text-left m-0 text-secondary msg"></p>
                <div style='font-size:13px;' class="text-left m-0 text-danger" id="error-password"></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('.reset-btn').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('forgot-password-mail') ?>",
                data: {
                    email: $('#email').val()
                },
                // contentType: false,
                // cache: false,
                // processData: false,
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    if (data.error == false) {
                        $('#otp').css('display', 'block');
                        $('.reset-btn').css('display', 'none');
                        $('.pass-btn').css('display', 'block');
                        $("#email").removeClass("border-danger");
                        $('.msg').html('OTP is valid for 10 minutes');
                    } else {
                        // $('.register-btn').attr('disabled', false);                        
                        $("#email").addClass("border-danger");
                        $('.msg').html('Email ID not found');
                    }
                }
            });
        });

        $('.pass-btn').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('forgot-password-otp') ?>",
                data: {
                    otp: $('#otp').val()
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    if (data.error == false) {
                        $('.msg').html('');
                        $('.pass-updt').css('display', 'block');
                        $('#password').css('display', 'block');
                        $('.pass-btn').css('display', 'none');
                        $('#otp').css('display', 'none');
                    } else {
                        $('.msg').html('OTP is not valid !');
                    }
                }
            });
        });

        $('.pass-updt').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('forgot-password-reset') ?>",
                data: {
                    password: $('#password').val()
                },
                dataType: "json",
                success: function(data) {
                    if (data.error == false) {
                        $('.msg').html('Password Updated Successfully !');
                        $("#error-password").html('');
                        $("#password").removeClass("border-danger");
                        setTimeout(function(){
                            $('#loginexampleModal').modal('toggle');
                        },2000);
                    } else {
                        $.each(data, function(key, value) {
                            if (value) {
                                $("#error-" + key).html(value);
                                $("#" + key).addClass("border-danger");
                            } else {
                                $("#error-" + key).html(" ");
                                $("#" + key).removeClass("border-danger");
                            }
                        });
                    }
                }
            });
        });

    });
</script>
<?= $this->endSection('scripts') ?>