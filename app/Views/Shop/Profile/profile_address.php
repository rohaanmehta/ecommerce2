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
                    <p class="mb-3 h5 font-weight-bold profile-heading">Addresses</p>
                    
                    <?php if (session()->getFlashdata('message') !== NULL) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('profile/save_edit_address'); ?>" method="post">
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <div class="row mt-0">
                                    <div class="col-12 col-md-3">
                                        <p class="profile-option m-0">Address 1</p>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name='address1' class="profile-value form-control mb-2" rows="3"><?php if (isset($user[0]) && !empty($user[0]->address1)) {
                                                                                                                        echo $user[0]->address1;
                                                                                                                    } else {
                                                                                                                        echo 'Not Added';
                                                                                                                    } ?></textarea>
                                    </div>
                                </div>
                                <div class="row mt-0">
                                    <div class="col-12 col-md-3">
                                        <p class="profile-option m-0">Address 2</p>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name='address2' class="profile-value form-control mb-2" rows="3"><?php if (isset($user[0]) && !empty($user[0]->address2)) {
                                                                                                                        echo $user[0]->address2;
                                                                                                                    } else {
                                                                                                                        echo 'Not Added';
                                                                                                                    } ?></textarea>
                                    </div>
                                </div>
                                <div class="row mt-0">
                                    <div class="col-12 col-md-3">
                                        <p class="profile-option m-0">Address 3</p>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name='address3' class="profile-value form-control mb-2" rows="3"><?php if (isset($user[0]) && !empty($user[0]->address3)) {
                                                                                                                        echo $user[0]->address3;
                                                                                                                    } else {
                                                                                                                        echo 'Not Added';
                                                                                                                    } ?></textarea>
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
<?= $this->endSection('scripts') ?>