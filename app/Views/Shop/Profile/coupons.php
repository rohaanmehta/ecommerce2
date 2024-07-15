<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<?php $session = session(); ?>
<style>
    .coupon-box {
        border: 1px solid black;
        padding: 10px 15px 10px 15px;
        border-style: dashed;
        margin-top: 15px;
    }
</style>
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
                    <p class="mb-3 h5 font-weight-bold profile-heading">Coupons</p>
                    <div class="row">
                        <?php if (isset($coupons) && !empty($coupons)) {
                            foreach ($coupons as $row) { ?>
                                <div class="col-12 col-md-6">
                                    <div class='coupon-box'>
                                        <p class='m-0' style="font-weight:800;font-size:13px;">Flat <?php echo $row->discount; if ($row->type == 'Fixed') {
                                                                                                            echo 'Rs';
                                                                                                        } else {
                                                                                                            echo '%';
                                                                                                        } ?> off</p>
                                        <p class='m-0' style="font-weight:500;font-size:13px;color:#747474;">On min purchase of <?= $row->min_cart_value; ?></p>
                                        <p class='m-0 mt-1' style="font-weight:500;font-size:12px;color:#747474;">Code: <?= $row->code; ?></p>
                                        <p class='m-0' style="font-weight:500;font-size:12px;color:#747474;">Expiry: <span style='font-weight:500;'><?= date('d-m-Y', strtotime($row->end_date)); ?></span></p>
                                    </div>
                                </div>
                        <?php }
                        } else {?>
                            <div class="w-100 text-center" style="font-size:13px;font-weight:600;"> No Coupons Available</div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>
<?= $this->endSection('scripts') ?>