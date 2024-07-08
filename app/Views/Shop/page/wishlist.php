<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>

<head>
    <!-- 360 degrees -->
    <!-- <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->

    <!-- <link href="/3602/main.css" rel="stylesheet" type="text/css"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <script src="<//?= base_url('public/dist/js/main.js') ?>"></script> -->
    <!-- <script src="<//?= base_url('public/dist/js/j360.js') ?>"></script> -->
</head>
<style>

</style>
<?php $session = session();
$userid = $session->get('userid');

if ($userid == '') { ?>
    <div class='row d-flex justify-content-center pt-5 '>
        <p style='font-size:18px'>PLEASE LOG IN</p>
    </div>
    <div class='row d-flex justify-content-center'>
        <p style='font-size:15px;color:#000;'>Login to view items in your wishlist.</p>
    </div>
    <div class='row d-flex justify-content-center p-3'>
        <div class='text-center'><button data-toggle="modal" data-target="#loginexampleModal" class='btn pt-2 pb-2 pl-4 pr-4' style='font-size:18px;background:#000;color:#fff;'>Login</button></div>
    </div>
<?php } else if (isset($products) && !empty($products)) { ?>
    <div class='galler_heading d-flex justify-content-left pt-5 pl-5 pb-2' style=''>
        <p style='font-size:25px;'>Your Wishlist</p>
    </div>
    <div class="row m-0 gallery products-5 pr-4 pl-4">
        <?php foreach ($products as $row) { ?>
            <?php echo view('Shop/page/single_product', ['row' => $row, 'wishlist' =>  $session->get('userid')]); ?>
        <?php } ?>
    </div>
    <div class='row justify-content-center pt-3' style='border-top:1px solid #dfdfdf'>
        <?= $links ?>
    </div>
<?php } else { ?>
    <div class="col-12 text-center mt-5" style='font-size: 22px;font-weight: 700;color: #4a4a4a;'>YOUR WISHLIST IS EMPTY</div>
    <div class="col-12 text-center" style='font-size: 14px;font-weight: 500;color: #363636;'>Add items that you like to your wishlist. </div>
    <div class="col-12 text-center mt-3">
        <a href='<?= base_url(); ?>'>
            <button class='btn black-btn'><i class='fa fa-angle-left mr-2'></i>CONTINUE SHOPPING</button>
        </a>
    </div>
<?php } ?>
<?= $this->endSection() ?>