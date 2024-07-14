<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>

<!-- <div class='invisible'>gap fill</div> -->
<div class="container  p-3">
    <div class="row">
        <?php if (session()->getFlashdata('message') !== NULL) : ?>
            <div class="w-100 alert alert-success alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        <?php endif; ?>
    </div>
    <div class="row mb-1">
        <p class='mb-2 h3 w-100' style="font-weight:600;">Order #<?= $order[0]->order_no ?></p>
        <p class='mb-0 h6 w-100' style="font-weight:600;">Order Status <span class="text-success"><?= $order[0]->order_status ?></span></p>
    </div>
    <div class="row ">
        <?php if (isset($order) && !empty($order)) {
            foreach ($order as $row) {
                $orderproducts = get_order_products($row->id); ?>
                <div class="mt-0 col-12 col-md-8 p-3" style="background:#f3f3f3">
                    <div class='order-box'>
                        <?php foreach ($orderproducts as $row2) { ?>
                            <div class=' p-2 mt-1' style='align-items:center;background:#e1e1e1'>
                                <div class='d-flex' style='align-items:center;'>
                                    <img style='height:60px;width:60px;' height='60px' src='<?= base_url('uploads/product_images/' . get_product_image($row2->product_id)); ?>' />
                                    <div>
                                        <p class='m-0 ml-2' style="font-weight:600;font-size:13px;color:#747474;"><?= $row2->product_title ?> </p>
                                        <?php $variation = get_order_variation($row2->id);
                                        if (isset($variation) && !empty($variation)) {
                                            foreach ($variation as $row3) { ?>
                                                <div class='d-flex'>
                                                    <p style="font-weight:500;font-size:12px;color:#747474;"class='mb-0 ml-2'><?= $row3->varaiation_name . ' :' . $row3->variation_value ?></p>
                                                </div>
                                        <?php }
                                        } ?>
                                        <p class='m-0 ml-2' style="font-weight:600;font-size:13px;color:#747474;">QTY - <?= $row2->quantity ?> </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="mt-0 col-12 col-md-4 p-0 pl-2">
                    <div class="w-100 p-3" style="background:#f3f3f3">
                        <div class='w-100'>
                            <div class='w-100 d-flex'>
                                <p class='h6' style='font-size:15px;font-weight:600;'>Order Total : </p>
                                <p class='h6 ml-2' style='font-size:15px;font-weight:500;'><?= price_format($order[0]->total_price); ?></p>
                            </div>
                            <?php if ($order[0]->discount_price != '0') { ?>
                                <div class='w-100 d-flex'>
                                    <p class='h6' style='font-size:15px;font-weight:600;'>Coupon Discount :</p>
                                    <p class='h6 ml-2' style='font-size:15px;font-weight:500;'> <?= '-' . $order[0]->discount_price . ' (' . $order[0]->coupon_code . ') '; ?></p>
                                </div>
                            <?php } ?>
                            <div class='w-100 d-flex'>
                                <p class='h6' style='font-size:15px;font-weight:600;'>Shipping Price : </p>
                                <p class='h6 ml-2' style='font-size:15px;font-weight:500;'><?= price_format($order[0]->shipping_price); ?></p>
                            </div>
                            <hr class='m-1 p-0'>
                            <div class='w-100 d-flex'>
                                <p class='h6' style='font-size:15px;font-weight:600;'>Final Price : </p>
                                <p class='h6 ml-2' style='font-size:15px;font-weight:500;'><?= price_format($order[0]->final_price); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
    <?php if ($order[0]->tracking_no != '') { ?>
        <div class="row mt-2 p-3" style="background:#f3f3f3">
            <p class="m-2 h4 w-100" style="">Tracking</p>
            <p class="m-0 ml-2 mt-1 h6" style="">Tracking No - <?= $order[0]->tracking_no; ?></p>
            <a class='w-100 ml-2' target='_blank' href="<?= $order[0]->tracking_url; ?>"> Track Your Order Here</a>
        </div>
    <?php } else { ?>
        <div class="row mt-2 p-3" style="background:#f3f3f3;">
            <p class="m-1 h4 w-100" style="">Tracking</p>
            <p class="m-0 ml-2 mt-1 h6" style="color:#747474">We will update your tracking information here once your order is dispatched !</p>
        </div>
    <?php } ?>
</div>

<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>

<?= $this->endSection('scripts') ?>