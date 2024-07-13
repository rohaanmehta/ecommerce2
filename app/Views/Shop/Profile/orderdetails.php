<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>

<!-- <div class='invisible'>gap fill</div> -->
<div class="container bg-light p-3">
    <div class="row mb-5">
        <p class='h3' style="font-weight:600;">Order #<?= $order[0]->order_no ?></p>
    </div>
    <div class="row">
        <?php if (isset($order) && !empty($order)) {
            foreach ($order as $row) {
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
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>

<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>

<?= $this->endSection('scripts') ?>