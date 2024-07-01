<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>

<style>
    .shipping-offer {
        border: 1px solid #dfdfdf;
        border-radius: 3px;
        display: flex;
        align-items: center;
        align-content: center;
        padding: 6px;
        color: #424242;
        width: 100%;
    }

    .remove-btn-cart {
        text-decoration: none !important;
        color: #464646;
        font-size: 14px;
        font-weight: 600;
    }

    .wishlist-btn-cart {
        text-decoration: none !important;
        color: #d63242;
        font-size: 14px;
        font-weight: 600;
    }

    .remove-btn-cart:hover {
        text-decoration: none;
        color: #464646;
    }

    .wishlist-btn-cart:hover {
        text-decoration: none;
        color: #d63242;
    }

    .btn-coupon {
        background: #ffffff;
        color: #7f7f7f;
    }
</style>
<!-- <div class='invisible'>gap fill</div> -->
<div class="container">
    <div class="row mb-5">
        <?php if (isset($cart_items[0]) && !empty($cart_items[0])) { ?>
            <div class="col-12 col-md-8 p-4">
                <?php if ($total_cart_value >= $shipping[0]->value_2) { ?>
                    <div class="shipping-offer">
                        <i class='fa fa-truck mr-1' style="font-size:20px;"></i>
                        <p class="m-0"> Hurray! <span style="font-weight:600;color:#d63242">Free Shipping!</span> on this order.</p>
                    </div>
                <?php } ?>
                <div class='d-flex justify-content-between'>
                    <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 p-0 mt-3'>
                        <p class='m-0 mb-1' style='font-size:17px;font-weight:600'> Shopping Cart ( <?= sizeof($cart_items); ?> Items)</p>
                    </div>
                </div>
                <div class='cart_Items'>
                    <?php foreach ($cart_items as $row) {
                        // print_r($row);exit;
                        $cart_details = cartdetails($row['product_id']); ?>
                        <div class='d-flex cart_Item_single table-bordered mb-3 p-2' style='align-items:top;justify-content:space-between'>
                            <div class="d-flex">
                                <div class=""><img style='width:90%;max-width:150px;' src='<?= base_url('uploads/product_images/' . $cart_details[0]->image_name1) ?>' /></div>
                                <div class="mt-2 text-left" style='font-size:14px;font-weight:600;'><?= $cart_details[0]->title ?>
                                    <!-- <p class="m-0" style='font-size:12px;color:#858585;font-weight:500;'> Color · Size S· Sleeves Half Sleeves· SKU 01-1058110</p> -->
                                    <p class="m-0" style='font-size:12px;color:#858585;font-weight:500;'> <?php foreach ($row as $key => $variation) {
                                                                                                                if ($key != 'cartid' && $key != 'product_id' && $key != 'user_id'  && $key != 'quantity' && $key != 'price') {
                                                                                                                    echo str_replace('variation_', '', $key) . ' - ' . $variation . ', ';
                                                                                                                }
                                                                                                            } ?></p>
                                    <div class="d-flex" style="align-items:center;">
                                        <label for="gfg" class='pt-3 mr-2' style='font-size:15px;'>QTY</label>
                                        <select id="gfg" class="mt-2 form-control p-1" style='font-size:14px;width:50px;height:30px'>
                                            <option value='01' <?php if ($row['quantity'] == '01') {
                                                                    echo 'selected';
                                                                } ?>>01</option>
                                            <option value='02' <?php if ($row['quantity'] == '02') {
                                                                    echo 'selected';
                                                                } ?>>02</option>
                                            <option value='03' <?php if ($row['quantity'] == '03') {
                                                                    echo 'selected';
                                                                } ?>>03</option>
                                            <option value='04' <?php if ($row['quantity'] == '04') {
                                                                    echo 'selected';
                                                                } ?>>04</option>
                                            <option value='05' <?php if ($row['quantity'] == '05') {
                                                                    echo 'selected';
                                                                } ?>>05</option>
                                            <option value='06' <?php if ($row['quantity'] == '06') {
                                                                    echo 'selected';
                                                                } ?>>06</option>
                                            <option value='07' <?php if ($row['quantity'] == '07') {
                                                                    echo 'selected';
                                                                } ?>>07</option>
                                            <option value='08' <?php if ($row['quantity'] == '08') {
                                                                    echo 'selected';
                                                                } ?>>08</option>
                                            <option value='09' <?php if ($row['quantity'] == '09') {
                                                                    echo 'selected';
                                                                } ?>>09</option>
                                            <option value='10' <?php if ($row['quantity'] == '10') {
                                                                    echo 'selected';
                                                                } ?>>10</option>
                                        </select>
                                    </div>
                                    <hr>
                                    <a href="" id='<?= $row['cartid'] ?>' class="delete-from-cart remove-btn-cart ml-0 mt-3 mr-3 mb-3">REMOVE</a>
                                    <a href="" id='<?= $row['cartid'] ?>' class="wishlist-btn-cart ml-0 mt-3 mr-3 mb-3">MOVE TO WISHLIST</a>
                                </div>
                            </div>
                            <div class="mt-2" style='font-size:16px;font-weight:600;'>$<?= $row['price'] ?></div>
                            <!-- <div class="col-lg-1"><a href="javascript:void(0)" id='<? //= $row->cartid 
                                                                                        ?>' class="delete-from-cart" style='font-size:40px;text-decoration:none;color:#000' id='closebtn'>&times;</a></div> -->
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-md-4 p-4" style="border-left:1px solid #dfdfdf">
                <div class='row'>
                    <div class='col-6'>
                        <p style='font-size:17px;font-weight:600'> Price Detail</p>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'>
                        <p style='font-size:15px;font-weight:500'> Total MRP</p>
                    </div>
                    <div class='col-6'>
                        <p style='font-size:15px;font-weight:500'> $<?= $total_cart_value ?></p>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'>
                        <p style='font-size:15px;font-weight:500'> Delivery</p>
                    </div>

                    <?php if ($total_cart_value >= $shipping[0]->value_2) { ?>
                        <div class='col-6'>
                            <p class='m-0' style='font-size:15px;font-weight:500'> <span style='text-decoration:line-through !important;color:#6a6a6a !important;'> $<?= $shipping[0]->value_1 ?> </span>Free Delivery</p>
                        </div>
                    <?php } else { ?>
                        <div class='col-6'>
                            <p class='m-0' style='font-size:15px;font-weight:500'> $<?= $shipping[0]->value_1 ?></p>
                        </div>
                        <div class='col-12 p-2' style='background:#e9e9e9'>
                            <p class='m-0' style='font-size:15px;font-weight:500'> <i class='fa fa-truck mr-2'></i><span style='font-weight:600;'>Free Delivery </span>Shop for more $<?= $shipping[0]->value_2 - $total_cart_value?> </p>
                        </div>
                    <?php } ?>
                </div>
                <div class='row'>
                    <div class='col-12'>
                        <hr>
                        <button class="btn btn-coupon w-100"> Apply Coupon <i class=' ml-3 fa fa-angle-right'></i></button>
                        <hr>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'>
                        <p style='font-size:17px;font-weight:600'> Total Amount</p>
                    </div>
                    <div class='col-6'>
                        <p style='font-size:17px;font-weight:600'> $<?= $total_cart_value ?> </p>
                    </div>
                    <div class='col-12'>
                        <button class="btn black-btn w-100">CHECKOUT</button>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-12 text-center mt-5" style='font-size: 22px;font-weight: 700;color: #4a4a4a;'>Hey, it feels so light!</div>
            <div class="col-12 text-center" style='font-size: 14px;font-weight: 500;color: #363636;'>There is nothing in your bag. Let's add some items.</div>
            <div class="col-12 text-center mt-3">
                <a href='<?= base_url(); ?>'>
                    <button class='btn black-btn'><i class='fa fa-angle-left mr-3'></i>SHOP HERE</button>
                </a>
                <a href='<?= base_url('/wishlist'); ?>'>
                    <button class='btn black-btn'>ADD ITEMS FROM WISHLIST <i class='fa fa-angle-right ml-3'></i></button>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {

        // $('.checkout').click(function() {
        //     alert('PAYMENT CAN ONLY DONE ON REAL DOMAIN');
        // });

        $('.wishlist-btn-cart').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('delete-from-cart-wishlist') ?>",
                data: {
                    id: $(this).attr('id')
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        //  alert('Deleted from Cart !');

                        // setTimeout(function() {
                        // $('#download').css('display', 'block');
                        // $('#loader').css('visibility', 'hidden');
                        window.location.reload();
                        // }, 1000);
                        // alert('registered_successfully');

                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });

        $('.delete-from-cart').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('delete-from-cart') ?>",
                data: {
                    id: $(this).attr('id')
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        //  alert('Deleted from Cart !');

                        // setTimeout(function() {
                        // $('#download').css('display', 'block');
                        // $('#loader').css('visibility', 'hidden');
                        window.location.reload();
                        // }, 1000);
                        // alert('registered_successfully');

                    } else {
                        alert('someything went wrong');
                    }
                }
            });
        });
    });
</script>
<?= $this->endSection('scripts') ?>