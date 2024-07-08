<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>

<!-- <div class='invisible'>gap fill</div> -->
<div class="container">
    <div class="row mb-5">
        <?php if (isset($cart_items['items']) && !empty($cart_items['items'])) { ?>
            <div class="col-12 col-md-8 pt-3 pr-3 pl-3 pb-0 p-md-4">
                <?php if ($final_cart_value >= $shipping[0]->value_2) { ?>
                    <div class="shipping-offer">
                        <i class='fa fa-truck mr-1' style="font-size:20px;"></i>
                        <p class="m-0"> Hurray! <span style="font-weight:600;color:#d63242">Free Shipping!</span> on this order.</p>
                    </div>
                <?php } ?>
                <div class='d-flex justify-content-between'>
                    <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 p-0 mt-3'>
                        <p class='m-0 mb-1' style='font-size:17px;font-weight:600'> Shopping Cart ( <?= sizeof($cart_items['items']); ?> Items)</p>
                    </div>
                </div>
                <div class='cart_Items'>
                    <?php foreach ($cart_items['items'] as $row) {
                        // print_r($row);exit;
                        $cart_details = cartdetails($row['product_id']); ?>
                        <div class='d-flex cart_Item_single table-bordered mb-3 p-2' style='align-items:top;justify-content:space-between;flex-wrap:wrap;'>
                            <div class="d-flex">
                                <div class=""><a href='<?= base_url($cart_details[0]->category_slug . '/' . $cart_details[0]->product_slug); ?>'><img style='width:90%;max-width:150px;' src='<?= base_url('uploads/product_images/' . $cart_details[0]->image_name1) ?>' /></a></div>
                                <div class="mt-2 text-left" style='font-size:14px;font-weight:600;'><?= $cart_details[0]->title ?>
                                    <div class="mt-1 mr-2 mobile_Head_Show" style='align-items:center;font-size:13px;font-weight:600;min-width: 90px;text-align:start;'><?= price_format($row['price']) ?></div>

                                    <!-- <p class="m-0" style='font-size:12px;color:#858585;font-weight:500;'> Color · Size S· Sleeves Half Sleeves· SKU 01-1058110</p> -->
                                    <p class="m-0" style='font-size:12px;color:#858585;font-weight:500;'> <?php foreach ($row as $key => $variation) {
                                                                                                                if ($key != 'cartid' && $key != 'unit_price' &&  $key != 'product_id' && $key != 'user_id'  && $key != 'quantity' && $key != 'price') {
                                                                                                                    echo str_replace('variation_', '', $key) . ' - ' . $variation . ', ';
                                                                                                                }
                                                                                                            } ?></p>
                                    <div class="d-flex" style="align-items:center;">
                                        <label for="gfg" class='pt-3 mr-2 mobile_Head_Hide' style='font-size:15px;'>QTY</label>
                                        <label for="gfg" class='pt-3 mr-2 mobile_Head_Show' style='font-size:13px;'>QTY</label>
                                        <select id='<?= $row['cartid'] ?>' class="change-cart-qty mt-2 form-control p-1" style='font-size:14px;width:50px;height:30px'>
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
                                    <hr class='m-2 m-md-2'>
                                    <a href="" style='font-size:13px;' id='<?= $row['cartid'] ?>' class="mobile_Head_Hide delete-from-cart remove-btn-cart ml-0 mt-3 mr-3 mb-3">REMOVE</a>
                                    <a href="" style='font-size:13px;' id='<?= $row['cartid'] ?>' class="mobile_Head_Hide wishlist-btn-cart ml-0 mt-3 mr-3 mb-3">MOVE TO WISHLIST</a>
                                </div>
                            </div>
                            <div class="mt-2 mr-2 mobile_Head_Hide" style='font-size:16px;font-weight:600;min-width: 90px;text-align:end;'><?= price_format($row['price']) ?></div>
                            <!-- <div class="col-lg-1"><a href="javascript:void(0)" id='<? //= $row->cartid 
                                                                                        ?>' class="delete-from-cart" style='font-size:40px;text-decoration:none;color:#000' id='closebtn'>&times;</a></div> -->


                            <div class='d-flex w-100'>
                                <a href="" style='font-size:13px;' id='<?= $row['cartid'] ?>' class="mobile_Head_Show delete-from-cart remove-btn-cart mt-2">REMOVE</a><span class='mobile_Head_Show ml-1 mr-1' style='margin-top:6px;font-weight:900;font-size:14px;'>|</span>
                                <a href="" style='font-size:13px;' id='<?= $row['cartid'] ?>' class="mobile_Head_Show wishlist-btn-cart mt-2">MOVE TO WISHLIST</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-md-4 pt-0 pr-3 pl-3 pb-0 p-md-4" style="border-left:1px solid #dfdfdf">
                <?php include('order_summary.php'); ?>
                <div class='row'>
                    <div class='col-12'>
                        <a href='<?= base_url('/checkout'); ?>'><button class="btn black-btn w-100">CHECKOUT</button></a>
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

<!-- Modal -->
<div class="modal fade" id="couponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apply Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class='coupon-form'>
                    <div class='d-flex'>
                        <input type='text' class='form-control w-75 rounded-0 rounded-left' name='coupon' id='coupon' placeholder='Enter coupon code'>
                        <button class='btn black-btn w-25 rounded-0 rounded-right'>APPLY</button>
                    </div>
                    <div class='coupon-msg text-success ' style='font-size:14px'></div>
                    <div class='coupon-msg2 text-danger' style='font-size:14px'></div>
                </form>
                <div class='mt-3 mb-2' style='font-size:14px;color:#5f5f5f'>Available Coupons</div>
                <hr class='m-0'>
                <?php if (isset($coupons) && !empty($coupons)) {
                    foreach ($coupons as $row) { ?>
                        <div class="col-12 col-md-12 p-0 apply-coupon" style='cursor:pointer;' id='<?= $row->code; ?>'>
                            <div class='coupon-box'>
                                <p class='m-0' style="font-weight:800;font-size:13px;">Flat <?php echo $row->discount;
                                                                                            if ($row->type == 'Fixed') {
                                                                                                echo 'Rs';
                                                                                            } else {
                                                                                                echo '%';
                                                                                            } ?> off</p>
                                <p class='m-0' style="font-weight:500;font-size:13px;color:#747474;">On min purchase of <?= $row->min_cart_value; ?></p>
                                <p class='m-0 mt-1' style="font-weight:500;font-size:12px;color:#747474;">Code: <?= $row->code; ?></p>
                                <!-- <p class='m-0' style="font-weight:500;font-size:12px;color:#747474;">Expiry: <span style='font-weight:500;'><//?= date('d-m-Y', strtotime($row->end_date)); ?></span></p> -->
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {
        $('.apply-coupon').click(function() {
            $('.coupon-msg2').html('');
            $('.coupon-msg').html('');
            $.ajax({
                type: "POST",
                url: "<?= base_url('coupon-validate') ?>",
                data: {
                    coupon: $(this).attr('id')
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data.result == '200') {
                        $('.coupon-msg').html('Coupon has applied successfully !');
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    } else {
                        $('.coupon-msg2').html(data.msg);
                    }
                }
            });
        });

        $('.change-cart-qty').change(function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('change-cart-qty') ?>",
                data: {
                    id: $(this).attr('id'),
                    qty: $(this).val()
                },
                dataType: "json",
                success: function(data) {
                    if (data == '200') {
                        // setTimeout(function() {
                        window.location.reload();
                        // }, 1000);
                    } else {}
                }
            });
        });

        $('.coupon-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('coupon-validate') ?>",
                data: {
                    coupon: $('#coupon').val()
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data.result == '200') {
                        $('.coupon-msg').html('Coupon has applied successfully !');
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    } else {
                        $('.coupon-msg2').html(data.msg);
                        $('#coupon').val('');
                    }
                }
            });
        });

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