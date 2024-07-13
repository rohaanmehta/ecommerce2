<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<?php $session = session(); ?>
<style>
    .order-box {
        border: 1px solid lightgrey;
        padding: 10px 15px 10px 15px;
        /* border-style: dashed; */
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
                <p class="m-0 h6 font-weight-light" style="font-size:14px;">Rohaan Mehta</p>
            </div>
            <?php include('app/Views/Shop/Profile/profile_sidebar.php'); ?>

            <div class="col-12 col-md-10">
                <div class='card p-3'>
                    <p class="mb-3 h5 font-weight-bold profile-heading">My Orders</p>
                    <div class="row">
                        <?php if (isset($orders) && !empty($orders)) {
                            foreach ($orders as $row) {
                                $orderproducts = get_order_products($row->id); ?>
                                <div class="col-12 col-md-12">
                                    <div class='order-box'>
                                        <p class='m-0' style="font-weight:800;font-size:13px;">Order #<?= $row->order_no; ?></p>
                                        <?php foreach ($orderproducts as $row2) { ?>
                                            <div class='bg-light p-2 mt-2' style='align-items:center;'>
                                                <div class='d-flex' style='align-items:center;'>
                                                    <img style='height:60px;width:60px;' height='60px' src='<?= base_url('uploads/product_images/' . get_product_image($row2->product_id)); ?>' />
                                                    <div>
                                                        <p class='m-0 ml-2' style="font-weight:500;font-size:13px;color:#747474;"><?= $row2->product_title ?> </p>
                                                        <p class='m-0 ml-2' style="font-weight:500;font-size:13px;color:#747474;">QTY - <?= $row2->quantity ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class='row'>
                                            <a class='w-100' href='<?= base_url('/orders/'.$row->order_no);?>'>
                                                <button class='m-3 btn black-btn w-100'>View Details</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
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