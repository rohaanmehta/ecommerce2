<div class='row'>
    <div class='col-6'>
        <p style='font-size:17px;font-weight:600'> Price Detail</p>
    </div>
</div>
<div class='row'>
    <div class='col-6'>
        <p class='mb-2' style='font-size:15px;font-weight:500'> Total MRP</p>
    </div>
    <div class='col-6'>
        <p class='mb-2' style='font-size:15px;font-weight:500'> <?= price_format($total_cart_value) ?></p>
    </div>
</div>
<?php if (isset($cart_items['discount']) && !empty($cart_items['discount'])) { ?>
    <div class='row'>
        <div class='col-6'>
            <p class='mb-2' style='font-size:15px;font-weight:500'> Coupon Discount</p>
        </div>
        <div class='col-6'>
            <p class='mb-2' style='font-size:15px;font-weight:500'> - <?= price_format($cart_items['discount']) ?></p>
        </div>
    </div>
<?php } ?>

<div class='row'>
    <div class='col-6'>
        <p class='mb-2' style='font-size:15px;font-weight:500'> Delivery</p>
    </div>

    <?php if ($final_cart_value >= $shipping[0]->value_2) { ?>
        <div class='col-6'>
            <p class='m-0' style='font-size:15px;font-weight:500'> <span style='text-decoration:line-through !important;color:#6a6a6a !important;'> <?= price_format($shipping[0]->value_1) ?> </span>Free Delivery</p>
        </div>
    <?php } else { ?>
        <div class='col-6'>
            <p class='m-0' style='font-size:15px;font-weight:500'> <?= price_format($shipping[0]->value_1) ?></p>
        </div>
        <div class='col-12 p-2' style='background:#e9e9e9'>
            <p class='m-0' style='font-size:15px;font-weight:500'> <i class='fa fa-truck mr-2'></i><span style='font-weight:600;'>Free Delivery </span>Shop for more <?= price_format($shipping[0]->value_2 - $final_cart_value) ?> </p>
        </div>
    <?php } ?>
</div>
<div class='row'>
    <div class='col-12'>
        <hr>
        <button class="btn btn-coupon w-100" data-toggle="modal" data-target="#couponModal"> Apply Coupon <i class=' ml-3 fa fa-angle-right'></i></button>
        <hr>
    </div>
</div>
<div class='row'>
    <div class='col-6'>
        <p style='font-size:17px;font-weight:600'> Total Amount</p>
    </div>
    <div class='col-6'>
        <?php if ($final_cart_value >= $shipping[0]->value_2) { ?>
            <p style='font-size:17px;font-weight:600'> <?= price_format($final_cart_value) ?> </p>
        <?php } else { ?>
            <p style='font-size:17px;font-weight:600'> <?= price_format($final_cart_value + $shipping[0]->value_1) ?> </p>
        <?php } ?>
    </div>
</div>