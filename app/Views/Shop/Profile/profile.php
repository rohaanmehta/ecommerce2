<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<?php $session = session(); ?>

<div class=''>
    <div class='container p-5'>
        <div class="row">
            <div class="col-12">
                <p class="mb-0 h5 font-weight-bold">Account</p>
            </div>
            <div class="col-12">
                <p class="m-0 h6 font-weight-light" style="font-size:14px;">Rohaan Mehta</p>
            </div>
            <?php include('app/Views/Shop/Profile/profile_sidebar.php'); ?>

            <div class="col-10">
                <div class='card p-3'>
                    <p class="mb-3 h5 font-weight-bold profile-heading">Profile Details</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="row mt-0">
                                <div class="col-6">
                                    <p class="profile-option">Full Name</p>
                                </div>
                                <div class="col-6">
                                    <p class="profile-value">Rohaan Mehta</p>
                                </div>
                            </div>
                            <div class="row mt-0">
                                <div class="col-6">
                                    <p class="profile-option">Mobile Number</p>
                                </div>
                                <div class="col-6">
                                    <p class="profile-value">Rohaan Mehta</p>
                                </div>
                            </div>
                            <div class="row mt-0">
                                <div class="col-6">
                                    <p class="profile-option">Email</p>
                                </div>
                                <div class="col-6">
                                    <p class="profile-value">Rohaan Mehta</p>
                                </div>
                            </div>
                            <div class="row mt-0">
                                <div class="col-6">
                                    <p class="profile-option">Gender</p>
                                </div>
                                <div class="col-6">
                                    <p class="profile-value">Rohaan Mehta</p>
                                </div>
                            </div>
                            <div class="row mt-0">
                                <div class="col-6">
                                    <p class="profile-option">Date Of Birth</p>
                                </div>
                                <div class="col-6">
                                    <p class="profile-value">Rohaan Mehta</p>
                                </div>
                            </div>
                            <div class="row mt-0">
                                <div class="col-6">
                                    <p class="profile-option">Alternate Mobile Number</p>
                                </div>
                                <div class="col-6">
                                    <p class="profile-value">Rohaan Mehta</p>
                                </div>
                            </div>
                            <div class="row p-4 pt-2">
                                <button class=" w-100 btn black-btn">Edit</button>
                            </div>
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