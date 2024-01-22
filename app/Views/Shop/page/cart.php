<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" />
</head>
<style>
.login_Input{
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


</style>
<div class='invisible'>gap fill</div>
<div class="mb-5">
    <div class='row justify-content-between p-5'>
        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
            <p style='font-size:25px'> YOUR CART</p>
        </div>
        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end'>
            <a href= '<?= base_url('checkout')?>'><button class='p-3 login_Links btn btn-dark w-100 cart_Btn'><i class='fa fa-lock mr-3' style='font-size:19px;'></i>  PROCEED TO SECURE CHECKOUT</button></a>
        </div>
    </div>
    <div class='cart_Items'>
        <div class='row cart_Item_single  ml-5 mr-5 table-bordered p-4' style='align-items:center'>
            <div class="col-lg-2 p-0"><img style='width:90%;max-width:140px;' src='<?= base_url('uploads/cartimage.avif')?>'/></div>
            <div class="col-lg-6 mt-2" style='font-size:large'>VISCOSE RAYON SEQUIN EMBROIDERED READY TO WEAR KURTA SET IN NAVY BLUE</div>
            <div class="col-lg-2 mt-2">
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
            </div>
            <div class="col-lg-1 mt-2" style='font-size:large'>$58.00</div>
            <div class="col-lg-1"><a href="javascript:void(0)" class="" style='font-size:40px;text-decoration:none;color:#000' id='closebtn'>&times;</a></div>
        </div>
    </div>
    <hr class='ml-5 mr-5 mb-5 mt-5'style='background:#dfdfdf;padding:1px'></hr>
    <div class='d-flex justify-content-between pl-5 pr-5'>
        <p style='font-size:25px'> Subtotal </p>
        <p style='font-size:25px'> $58.00 </p>
    </div>
    <div class='d-flex justify-content-start pl-5 mb-5'>
        <p style='font-size:18px'> Tax included and Shipping calculated at checkout. FREE Shipping over $99 </p>
    </div>
    <div class='row ml-5 mr-5'>
        <a href= '<?= base_url('checkout')?>'><button class='p-3 w-100 login_Links btn btn-dark'  style='font-size:14px;'><i class='fa fa-lock mr-3' style='font-size:19px;'></i>  PROCEED TO SECURE CHECKOUT</button></a>
    </div>
    <div class='row text-center justify-content-center'>
        <a href='<?= base_url()?>' class='mt-4' style='font-size:18px;color:#000;text-decoration:none'>Continue shopping <i class='fa fa-angle-right' style='font-size:15px;color:#000;'></i></a>
    </div>
</div>
<?= $this->endSection() ?>

