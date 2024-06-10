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
                    <p class="mb-3 h5 font-weight-bold profile-heading">Profile Details</p>
                    <?php if (session()->getFlashdata('message') !== NULL) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="row mt-0">
                                <div class="col-12 col-md-5">
                                    <p class="profile-option m-0">Full Name</p>
                                </div>
                                <div class="col-12 col-md-7">
                                    <p class="profile-value"><?php if (isset($user[0]) && !empty($user[0]->full_name)) {
                                                                    echo $user[0]->full_name;
                                                                } else {
                                                                    echo 'Not Added';
                                                                } ?></p>
                                </div>
                            </div>
                            <div class="row mt-0">
                                <div class="col-12 col-md-5">
                                    <p class="profile-option m-0">Mobile Number</p>
                                </div>
                                <div class="col-12 col-md-7">
                                    <p class="profile-value"><?php if (isset($user[0]) && !empty($user[0]->mobile_no)) {
                                                                    echo $user[0]->mobile_no;
                                                                } else {
                                                                    echo 'Not Added';
                                                                } ?></p>
                                </div>
                            </div>
                            <div class="row mt-0">
                                <div class="col-12 col-md-5">
                                    <p class="profile-option m-0">Email</p>
                                </div>
                                <div class="col-12 col-md-7">
                                    <p class="profile-value"><?php if (isset($user[0]) && !empty($user[0]->email)) {
                                                                    echo $user[0]->email;
                                                                } else {
                                                                    echo 'Not Added';
                                                                } ?></p>
                                </div>
                            </div>
                            <div class="row mt-0">
                                <div class="col-12 col-md-5">
                                    <p class="profile-option m-0">Gender</p>
                                </div>
                                <div class="col-12 col-md-7">
                                    <p class="profile-value"><?php if (isset($user[0]) && !empty($user[0]->gender)) {
                                                                    if ($user[0]->gender == 'M') {
                                                                        echo 'Male';
                                                                    } else {
                                                                        echo 'Female';
                                                                    }
                                                                } else {
                                                                    echo 'Not Added';
                                                                } ?></p>
                                </div>
                            </div>
                            <div class="row mt-0">
                                <div class="col-12 col-md-5">
                                    <p class="profile-option m-0">Date Of Birth</p>
                                </div>
                                <div class="col-12 col-md-7">
                                    <p class="profile-value"><?php if (isset($user[0]) && !empty($user[0]->dob)) {
                                                                    echo date('d-m-Y', strtotime($user[0]->dob));
                                                                } else {
                                                                    echo 'Not Added';
                                                                } ?></p>
                                </div>
                            </div>
                            <a href="<?= base_url('profile/edit_profile'); ?>">
                                <div class="row p-3 p-md-4 pt-md-2">
                                    <button style='width:100%;' class="btn black-btn">Edit</button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>
<?= $this->endSection('scripts') ?>