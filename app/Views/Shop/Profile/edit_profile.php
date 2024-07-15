<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<?php $session = session(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
<div class=''>
    <div class='container p-4 p-md-5'>
        <div class="row">
            <div class="col-12">
                <p class="mb-0 h5 font-weight-bold">Account</p>
            </div>
            <div class="col-12 mb-2">
                <p class="m-0 h6 font-weight-light" style="font-size:14px;"><?php $session = session(); echo $session->get('username'); ?></p>
            </div>
            <?php include('app/Views/Shop/Profile/profile_sidebar.php'); ?>

            <div class="col-12 col-md-10">
                <div class='card p-3'>
                    <p class="mb-3 h5 font-weight-bold profile-heading">Edit Profile</p>
                    <form action="<?= base_url('profile/save_edit_profile');?>" method="post">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="row mt-0">
                                    <div class="col-12 col-md-5 mb-0">
                                        <p class="profile-option m-0">Full Name</p>
                                    </div>
                                    <div class="col-12 col-md-7 mb-2">
                                        <input class="form-control" name="full_name" value="<?php if (isset($user[0]) && !empty($user[0]->full_name)) {
                                                                                                echo $user[0]->full_name;
                                                                                            } ?>">
                                    </div>
                                </div>
                                <div class="row mt-0">
                                    <div class="col-12 col-md-5 mb-0">
                                        <p class="profile-option m-0">Mobile Number</p>
                                    </div>
                                    <div class="col-12 col-md-7 mb-2">
                                        <input class="form-control" name="mobile_no" value="<?php if (isset($user[0]) && !empty($user[0]->mobile_no)) {
                                                                                                echo $user[0]->mobile_no;
                                                                                            } ?>">
                                    </div>
                                </div>
                                <div class="row mt-0">
                                    <div class="col-12 col-md-5 mb-0">
                                        <p class="profile-option m-0">Email</p>
                                    </div>
                                    <div class="col-12 col-md-7 mb-2">
                                        <input class="form-control" disabled value="<?php if (isset($user[0]) && !empty($user[0]->email)) {
                                                                                            echo $user[0]->email;
                                                                                        } ?>">
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12 col-md-5 mb-0">
                                        <p class="profile-option m-0">Gender</p>
                                    </div>
                                    <div class="col-12 col-md-7 mb-2">
                                        <div class="radiobuttons d-flex">
                                            <div class="rdio rdio-primary radio-inline mr-3"> <input name="gender" value="M" id="radio1" type="radio" <?php if (isset($user[0]) && !empty($user[0]->gender) && $user[0]->gender == 'M') {
                                                                                            echo 'checked';
                                                                                        } ?>>
                                                <label for="radio1">Male</label>
                                            </div>
                                            <div class="rdio rdio-primary radio-inline">
                                                <input name="gender" value="F" id="radio2" type="radio" <?php if (isset($user[0]) && !empty($user[0]->gender) && $user[0]->gender == 'F') {
                                                                                            echo 'checked';
                                                                                        } ?>>
                                                <label for="radio2">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-0">
                                    <div class="col-12 col-md-5 mb-0">
                                        <p class="profile-option m-0">Date Of Birth</p>
                                    </div>
                                    <div class="col-12 col-md-7 mb-2">
                                        <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                            <input class="form-control" name='dob' type="text" readonly />
                                            <span class="input-group-addon" style="position:absolute;top:11px;right:10px;color:grey"><i class="fa fa-calendar"></i></span>
                                        </div>
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
</div>


<?= $this->endSection('content') ?>
<?= $this->section('scripts') ?>
<script>
    
    $(function() {
        $("#datepicker").datepicker({
            autoclose: true,
            // todayHighlight: true
        }).datepicker('update','<?php if (isset($user[0]) && !empty($user[0]->dob)) {
                                                                                            echo date('d-m-Y',strtotime($user[0]->dob));
                                                                                        } ?>');
    });
</script>
<?= $this->endSection('scripts') ?>