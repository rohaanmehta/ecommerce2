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
</style>
<div class='invisible'>gap fill</div>
<div class="mb-5">
    <div class='row justify-content-between p-5'>
        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
            <p style='font-size:19px'> YOUR CART</p>
        </div>
        <!-- <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end'>
            <a href= '<?= base_url('checkout') ?>'><button class='p-3 login_Links btn btn-dark w-100 cart_Btn'><i class='fa fa-lock mr-3' style='font-size:19px;'></i>  PROCEED TO SECURE CHECKOUT</button></a>
        </div> -->
    </div>
    <div class='cart_Items'>
        <?php if (isset($cart_items) && !empty($cart_items)) {
            foreach ($cart_items as $row) { ?>
                <div class='row cart_Item_single  ml-5 mr-5 table-bordered p-2 mb-3' style='align-items:center'>
                    <div class="col-lg-1 p-0"><img style='width:90%;max-width:100px;' src='<?= base_url('uploads/product_images/' . $row->image_name1) ?>' /></div>
                    <div class="col-lg-9 mt-2 text-left" style='font-size:16px'><?= $row->title ?></div>
                    <!-- <div class="col-lg-2 mt-2">
                <div class="form-floating">
                    <select id="gfg" class="form-select" style='width:130px;font-size:13px;border:1px solid #dfdfdf;height:50px;'>
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
                    <label for="gfg" class='pt-3' style='font-size:15px;'>Quantity</label>
                </div>
            </div> -->
                    <div class="col-lg-1 mt-2" style='font-size:large'>$<?= $row->price ?></div>
                    <div class="col-lg-1"><a href="javascript:void(0)" id='<?= $row->cartid ?>' class="delete-from-cart" style='font-size:40px;text-decoration:none;color:#000' id='closebtn'>&times;</a></div>
                </div>
            <?php }
        } else { ?>

            <div class='row cart_Item_single  ml-5 mr-5 table-bordered p-2 mb-3' style='align-items:center'>
                <div class="col-lg-12 mt-2" style='font-size:large'>No Products in your cart !</div>
            </div>

        <?php } ?>
    </div>
    <hr class='ml-5 mr-5 mb-5 mt-5' style='background:#dfdfdf;padding:1px'>
    </hr>
    <?php if (isset($cart_items) && !empty($cart_items)) { ?>
        <div class='d-flex justify-content-between pl-5 pr-5'>
            <p style='font-size:20px'> Subtotal </p>
            <p style='font-size:20px'> $<?= $cart_item_total[0]->total ; ?> </p>
        </div>


        <div class='d-flex justify-content-start pl-5 mb-5'>
            <!-- <p style='font-size:18px'> Tax included and Shipping calculated at checkout. </p> -->
        </div>
        <div class='row ml-5 mr-5 justify-content-center'>
            <a href='<?= base_url('/checkout');?>'><button class='p-3 w-100 login_Links btn btn-sm btn-dark' style='font-size:12px;'><i class='fa fa-lock mr-3' style='font-size:19px;'></i> PROCEED TO SECURE CHECKOUT</button></a>
        </div>
    <?php } ?>

    <!-- <div class='row text-center justify-content-center'>
        <a href='<//?= base_url()?>' class='mt-4' style='font-size:18px;color:#000;text-decoration:none'>Continue shopping <i class='fa fa-angle-right' style='font-size:15px;color:#000;'></i></a>
    </div> -->
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

