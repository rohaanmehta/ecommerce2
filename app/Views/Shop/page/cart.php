<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>

<style>
    /* .login_Input{
    width: 100%;
    max-width: 400px;
    height:40px;
    padding-top: 8px;
}
.login_Links:hover{
    color:#fff
}
.cart_Btn{
    font-size:14px;
}
@media screen and (min-width: 575px) {
    .cart_Btn{
        max-width:280px;
    }
}
 */
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
</style>
<!-- <div class='invisible'>gap fill</div> -->
<div class="container">
    <div class="row mb-5">
        <div class="col-12 col-md-8 p-4">
            <div class="shipping-offer">
                <i class='fa fa-truck mr-1' style="font-size:20px;"></i>
                <p class="m-0"> Hurray! <span style="font-weight:600;color:#d63242">Free Shipping!</span>on this order.</p>
            </div>
            <div class='d-flex justify-content-between'>
                <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 p-0 mt-3'>
                    <p class='m-0 mb-1' style='font-size:17px;font-weight:600'> Shopping Cart ( 2 Items)</p>
                </div>
                <!-- <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end'>
            <a href= '<?= base_url('checkout') ?>'><button class='p-3 login_Links btn btn-dark w-100 cart_Btn'><i class='fa fa-lock mr-3' style='font-size:19px;'></i>  PROCEED TO SECURE CHECKOUT</button></a>
        </div> -->
            </div>
            <div class='cart_Items'>
                <?php if (isset($cart_items) && !empty($cart_items)) {
                    foreach ($cart_items as $row) { ?>
                        <div class='d-flex cart_Item_single table-bordered mb-3 p-2' style='align-items:top;justify-content:space-between'>
                            <div class="d-flex">
                                <div class=""><img style='width:90%;max-width:150px;' src='<?= base_url('uploads/product_images/' . $row->image_name1) ?>' /></div>
                                <div class="mt-2 text-left" style='font-size:14px;font-weight:600;'><?= $row->title ?>
                                    <p class="m-0" style='font-size:12px;color:#858585;font-weight:500;'> Color · Size S· Sleeves Half Sleeves· SKU 01-1058110</p>
                                    <div class="d-flex" style="align-items:center;">
                                        <label for="gfg" class='pt-3 mr-2' style='font-size:15px;'>QTY</label>
                                        <select id="gfg" class="mt-2 form-control p-1" style='font-size:14px;width:50px;height:30px'>
                                            <option value='1'> 1 </option>
                                            <option value='2'> 2 </option>
                                            <option value='3'> 3 </option>
                                            <option value='4'> 4 </option>
                                            <option value='5'> 5 </option>
                                            <option value='6'> 6 </option>
                                            <option value='7'> 7 </option>
                                            <option value='8'> 8 </option>
                                            <option value='9'> 9 </option>
                                            <option value='10'> 10 </option>
                                        </select>
                                    </div>
                                    <hr>
                                    <a href="javascript:void(0)" id='<?= $row->cartid ?>' class="delete-from-cart ml-0 mt-3 mr-3 mb-3">REMOVE</a>
                                    <a href="javascript:void(0)" id='<?= $row->cartid ?>' class="delete-from-cart ml-0 mt-3 mr-3 mb-3">MOVE TO WISHLIST</a>
                                </div>
                            </div>
                            <div class="mt-2" style='font-size:16px;font-weight:600;'>$<?= $row->price ?></div>
                            <!-- <div class="col-lg-1"><a href="javascript:void(0)" id='<? //= $row->cartid 
                                                                                        ?>' class="delete-from-cart" style='font-size:40px;text-decoration:none;color:#000' id='closebtn'>&times;</a></div> -->
                        </div>
                    <?php }
                } else { ?>

                    <div class='row cart_Item_single  ml-5 mr-5 table-bordered p-2 mb-3' style='align-items:center'>
                        <div class="col-lg-12 mt-2" style='font-size:large'>No Products in your cart !</div>
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
                    <p style='font-size:15px;font-weight:500'> ₹1598.00</p>
                </div>
            </div>
            <div class='row'>
                <div class='col-6'>
                    <p style='font-size:15px;font-weight:500'> Delivery</p>
                </div>
                <div class='col-6'>
                    <p style='font-size:15px;font-weight:500'> ₹100.00 Free Delivery</p>
                </div>
            </div>
            <div class='row'>
                <div class='col-12'>
                    <hr>
                    <button class="btn btn-black">Apply Coupon</button>
                    <hr>
                </div>
            </div>
            <div class='row'>
                <div class='col-6'>
                    <p style='font-size:17px;font-weight:600'> Total Amount</p>
                </div>
                <div class='col-6'>
                    <p style='font-size:17px;font-weight:600'> ₹1598.00</p>
                </div>
                <div class='col-12'>
                    <button class="btn btn-black">CHECKOUT</button>
                </div>
            </div>
        </div>
        <!-- <div class='row text-center justify-content-center'>
        <a href='<//?= base_url()?>' class='mt-4' style='font-size:18px;color:#000;text-decoration:none'>Continue shopping <i class='fa fa-angle-right' style='font-size:15px;color:#000;'></i></a>
    </div> -->
    </div>
</div>
<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {

        $('.checkout').click(function() {
            alert('PAYMENT CAN ONLY DONE ON REAL DOMAIN');
        });

        $('.delete-from-cart').click(function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('delete-from-cart') ?>",
                data: {
                    id: $(this).attr('id')
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        alert('Deleted from Cart !');

                        setTimeout(function() {
                            // $('#download').css('display', 'block');
                            // $('#loader').css('visibility', 'hidden');
                            window.location.reload();
                        }, 2000);
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