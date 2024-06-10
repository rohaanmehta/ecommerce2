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
                    <p class="mb-0 h5 font-weight-bold profile-heading">Delete Account</p>
                    <div class="row p-4">
                        <?php if (isset($page) && !empty($page)) {
                            print_r($page[0]->page_content);
                        } ?>
                        <div class="row p-4 pt-2">
                            <a href='<?= base_url('Admin/delete_account'); ?>'><button class=" w-100 btn black-btn">Delete Account</button></a>
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