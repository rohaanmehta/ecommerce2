<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<?php if ($final_cart_value >= $shipping[0]->value_2) {
  $final_amount =  $final_cart_value;
} else {
  $final_amount = $final_cart_value + $shipping[0]->value_1;
}
?>
<style>
  .checkout-detail-box {
    border: 1px solid #dfdfdf;
    border-radius: 3px;
    /* display: flex; */
    /* align-items: center; */
    /* align-content: center; */
    padding: 6px;
    color: #424242;
    width: 100%;
    margin-top: 10px;
    margin-bottom: 10px;
  }
</style>
<div class="container">
  <div class="row mb-5">
    <?php if (isset($cart_items['items']) && !empty($cart_items['items'])) { ?>
      <div class="col-12 col-md-8 p-4">
        <?php if ($final_cart_value >= $shipping[0]->value_2) { ?>
          <div class="shipping-offer">
            <i class='fa fa-truck mr-1' style="font-size:20px;"></i>
            <p class="m-0"> Hurray! <span style="font-weight:600;color:#d63242">Free Shipping!</span> on this order.</p>
          </div>
        <?php } ?>
        <div class='checkout-detail-box'>
          <div class='w-100 d-flex justify-content-between pl-2 pr-2'>
            <div class='w-50 p-0 mt-1'>
              <p class='m-0 mb-1' style='font-size:16px;font-weight:600'> SELECT DELIVERY ADDRESS</p>
            </div>
            <div class='w-50 p-0 mt-1 change-address' style='text-align:end'>
              <p class='m-0 mb-1' style='font-size:14px;font-weight:600;color:#d63242;cursor:pointer'> CHANGE ADDRESS</p>
            </div>
            <div class='w-50 p-0 mt-1 add-new-address' style='text-align:end;display:none'>
              <p class='m-0 mb-1' style='font-size:14px;font-weight:600;color:#d63242;cursor:pointer;'> ADD NEW ADDRESS</p>
            </div>
          </div>
          <div class='w-100 p-0 pl-2 pr-2 mt-1 delivery-address' style='font-size: 14px;color: grey;font-weight: 600;'>
            <?php if (isset($address) && !empty($address)) {
              if ($address[0]->address1 != '') {
                echo $address[0]->address1;
              } else if ($address[0]->address2 != '') {
                echo $address[0]->address2;
              } else if ($address[0]->address3 != '') {
                echo $address[0]->address3;
              }
            } ?>
          </div>
          <div class='w-100 p-0 pl-2 pr-2 mt-1 all-address' style='display:none;font-size: 14px;color: grey;font-weight: 600;'>
            <div class='select-address'>
              <?php if (isset($address) && !empty($address)) {
                if ($address[0]->address1 != '') { ?>
                  <div class="d-flex mt-2">
                    <div class='mt-1 mr-2'><input class='form-control' name='address' type='radio'></div>
                    <div class='w-100'>
                      <div class='w-100 d-flex justify-content-between'>
                        <p class='mb-1' style='font-size:15px;color:#000;'>Rohaan Mehta</p>
                        <div>
                          <a class=''>EDIT</a> | <a class='' style='color:#d63242;cursor:pointer'>REMOVE</a>
                        </div>
                      </div>
                      <?= $address[0]->address1 ?>
                    </div>
                  </div>
                <?php } ?>
                <?php if ($address[0]->address2 != '') { ?>
                  <div class="d-flex mt-2">
                    <div class='mt-1 mr-2'><input class='form-control' name='address' type='radio'></div>
                    <div class='w-100'>
                      <div class='w-100 d-flex justify-content-between'>
                        <p class='mb-1' style='font-size:15px;color:#000;'>Rohaan Mehta</p>
                        <div>
                          <a class=''>EDIT</a> | <a class='' style='color:#d63242;cursor:pointer'>REMOVE</a>
                        </div>
                      </div>
                      <?= $address[0]->address2 ?>
                    </div>
                  </div>
                <?php } ?>
                <?php if ($address[0]->address3 != '') { ?>
                  <div class="d-flex mt-2">
                    <div class='mt-1 mr-2'><input class='form-control' name='address' type='radio'></div>
                    <div class='w-100'>
                      <div class='w-100 d-flex justify-content-between'>
                        <p class='mb-1' style='font-size:15px;color:#000;'>Rohaan Mehta</p>
                        <div>
                          <a class=''>EDIT</a> | <a class='' style='color:#d63242;cursor:pointer'>REMOVE</a>
                        </div>
                      </div>
                      <?= $address[0]->address3 ?>
                    </div>
                  </div>
              <?php }
              } ?>

            </div>
            <div class='deliver-here' style='display:none'>
              <button class='mt-2 ml-3 btn black-btn'>DELIVER HERE</button>
            </div>
          </div>
        </div>
        <div class='checkout-detail-box'>
          <div class='w-100 d-flex justify-content-between pl-2 pr-2'>
            <div class='w-50 p-0 mt-1'>
              <p class='m-0 mb-1' style='font-size:16px;font-weight:600'> ORDER SUMMARY</p>
            </div>
            <div class='w-50 p-0 mt-1' style='text-align:end'>
              <a href='<?= base_url('/cart'); ?>' style='text-decoration:none;'>
                <p class='m-0 mb-1' style='font-size:14px;font-weight:600;color:#d63242;cursor:pointer'> CHANGE ORDER</p>
              </a>
            </div>
          </div>
          <?php foreach ($cart_items['items'] as $row) {
            // print_r($row);exit;
            $cart_details = cartdetails($row['product_id']); ?>
            <div class='d-flex cart_Item_single table-bordered mt-2 p-1' style='align-items:top;justify-content:space-between'>
              <div class="d-flex">
                <div class=""><a href='<?= base_url($cart_details[0]->category_slug . '/' . $cart_details[0]->product_slug); ?>'><img style='width:90%;max-width:60px;' src='<?= base_url('uploads/product_images/' . $cart_details[0]->image_name1) ?>' /></a></div>
                <div class="mt-0 text-left" style='font-size:13px;font-weight:500;'><?= $cart_details[0]->title ?>
                  <!-- <p class="m-0" style='font-size:12px;color:#858585;font-weight:500;'> Color · Size S· Sleeves Half Sleeves· SKU 01-1058110</p> -->
                  <p class="m-0" style='font-size:12px;color:#858585;font-weight:500;'> <?php foreach ($row as $key => $variation) {
                                                                                          if ($key != 'cartid' && $key != 'unit_price' &&  $key != 'product_id' && $key != 'user_id'  && $key != 'quantity' && $key != 'price') {
                                                                                            echo str_replace('variation_', '', $key) . ' - ' . $variation . ', ';
                                                                                          }
                                                                                        } ?></p>
                  <div class="d-flex" style="align-items:top;">
                    <label for="gfg" class='pt-1 mr-2' style='font-size:12px;font-weight:500;'>QTY: <?= $row['quantity']; ?></label>

                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class='checkout-detail-box'>
          <div class='w-100 d-flex justify-content-between pl-2 pr-2'>
            <div class='w-50 p-0 mt-1'>
              <p class='m-0 mb-1' style='font-size:16px;font-weight:600'> PAYMENT OPTIONS</p>
            </div>
          </div>
          <div class="w-100">
            <button class="btn black-btn payment-btn" style="color:#fff !important;">Payment <?= $final_amount; ?> </button>
          </div>
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
            <p class='mb-2' style='font-size:15px;font-weight:500'> Total MRP</p>
          </div>
          <div class='col-6'>
            <p class='mb-2' style='font-size:15px;font-weight:500'> <?= price_format($total_cart_value) ?></p>
          </div>
        </div>
        <?php if (isset($cart_items['discount']) && !empty($cart_items['discount'])) { ?>
          <div class='row'>
            <div class='col-6'>
              <p class='mb-2' style='font-size:15px;font-weight:500'> Discount</p>
            </div>
            <div class='col-6'>
              <p class='mb-2' style='font-size:15px;font-weight:500'> <?= price_format($cart_items['discount']) ?></p>
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
            <p style='font-size:17px;font-weight:600'> <?= price_format($final_amount); ?> </p>
          </div>
        </div>
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

<script type="text/javascript" src="<?= base_url('/assets/js/razorpay-checkout.js'); ?>"></script>

<?= $this->endSection('content') ?>
<?= $this->section('scripts') ?>

<script>
  $(document).ready(function() {
    $('.payment-btn').click(function() {
      var amount = <?= $final_amount; ?>;
      var options = {
        "key": "rzp_test_aTiITp3A9BDZaR", // Enter the Key ID generated from the Dashboard
        "amount": <?= $final_amount * 100; ?>,
        "currency": "INR",
        "description": "Casino Corners",
        // "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
        // "prefill": {
        //     "email": "gaurav.kumar@example.com",
        //     "contact": +919900000000,
        // },
        config: {
          display: {
            blocks: {
              banks: {
                name: 'Most Used Methods',
                instruments: [{
                  method: 'UPI',
                  // wallets: ['olamoney']
                }]
              },
            },
            sequence: ['block.banks'],
            preferences: {
              show_default_blocks: true,
            },
          },
        },

        "handler": function(response) {
          console.log(response.razorpay_payment_id);
          // console.log($('.deposit-amt').val());
          update_balance(amount, response.razorpay_payment_id);
          // alert(response.razorpay_payment_id);
        },
        "modal": {
          "ondismiss": function() {
            // if (confirm("Are you sure, you want to close the form?")) {
            //     txt = "You pressed OK!";
            // console.log("Checkout form closed by the user");
            // } else {
            // txt = "You pressed Cancel!";
            // console.log("Complete the Payment")
            // }
          }
        }
      };
      var rzp1 = new Razorpay(options);

      // document.getElementById('rzp-button1').onclick = function(e) {
      rzp1.open();
      // e.preventDefault();
      // }
    });

    $('.change-address').click(function() {
      $('.delivery-address').css('display', 'none');
      $('.all-address').css('display', 'block');

      $('.add-new-address').css('display', 'block');
      $('.change-address').css('display', 'none');
    });

    $('.apply-coupon').click(function() {
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

    $('input[name=address]').click(function() {
      $('.deliver-here').css('display', 'block');
    });

  });
</script>
<?= $this->endSection('scripts') ?>