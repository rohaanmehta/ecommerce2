<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<style>
  .title {
    font-weight: 600;
    font-size: 14px;
  }

  .desc {
    /* font-weight: 600; */
    font-size: 14px;
  }
</style>
<div class='invisible'>gap fill</div>
<form class='checkout'>
  <div class="container">
    <div class="text-left w-100" style='margin-top:20px;font-size:25px'>
      <p>Checkout</p>
    </div>
    <div class='row'>
      <div class='col-8 p-4 mr-4' style='background:#f3f3f3'>
        <div class='col-12 p-0'>
          <p class='title'>Shipping Address</p>
        </div>
        <div class='row p-3'>
          <div class='col-12 col-lg-6 p-0'>
            <span class='desc'>First Name</span>
            <input class='form-control mb-2' required style='width:90%;max-width:400px' placeholder="" />
          </div>
          <div class='col-12 col-lg-6 p-0'>
            <span class='desc'>Last Name</span>
            <input class='form-control mb-2' required style='width:90%;max-width:400px' placeholder="" />
          </div>
          <div class='col-12 col-lg-6 p-0'>
            <span class='desc'>Email</span>
            <input class='form-control mb-2' required style='width:90%;max-width:400px' placeholder="" />
          </div>
          <div class='col-12 col-lg-6 p-0'>
            <span class='desc'>Phone no</span>
            <input class='form-control mb-2' required style='width:90%;max-width:400px' placeholder="" />
          </div>
          <div class='col-12 col-lg-6 p-0'>
            <span class='desc'>State</span>
            <input class='form-control mb-2' required style='width:90%;max-width:400px' placeholder="" />
          </div>
          <div class='col-12 col-lg-6 p-0'>
            <span class='desc'>City</span>
            <input class='form-control mb-2' required style='width:90%;max-width:400px' placeholder="" />
          </div>
          <div class='col-12 col-lg-12 p-0'>
            <span class='desc'>Address</span>
            <input class='form-control mb-2' required style='width:95%;' placeholder="" />
          </div>
        </div>
      </div>
      <div class='col-3 pt-4 pl-4 pr-4' style='background:#f3f3f3'>
        <div class='col-12 p-0'>
          <p class='title'>Order Summary</p>
        </div>
        <div style='overflow-x:hidden;overflow-y:scroll;max-height:300px'>
          <?php if (isset($cart_items) && !empty($cart_items)) {
            foreach ($cart_items as $row) { ?>
              <div class='row table-bordered p-2 mb-3' style='align-items:center'>
                <div class="col-lg-12 p-0 text-center"><img style='width:90%;max-width:100px;' src='<?= base_url('uploads/product_images/' . $row->image_name1) ?>' /></div>
                <div class="col-lg-12 mt-2 text-left" style='overflow-y: hidden;font-size:12px;line-height:1.5;max-height:32px;over-flow:hidden;'><?= $row->title ?></div>
                <div class="col-lg-12 mt-2 text-left" style='font-size:15px;font-weight:600'><?= '$' . $row->price ?></div>
              </div>
          <?php }
          } ?>
        </div>
        <div class="col-lg-12 mt-2 text-right mt-4" style='font-size:19px;font-weight:600'><?= 'Total $' . $cart_item_total[0]->total  ?></div>
      </div>
      <div class='col-8 p-4 mr-4' style='background:#f3f3f3'>
        <div class='col-12 p-0'>
          <p class='title'>Billing Address</p>
        </div>
        <div class='row p-3'>
          <div class='col-12 col-lg-6 p-0'>
            <span class='desc'>First Name</span>
            <input class='form-control mb-2' required style='width:90%;max-width:400px' placeholder="" />
          </div>
          <div class='col-12 col-lg-6 p-0'>
            <span class='desc'>Last Name</span>
            <input class='form-control mb-2' required style='width:90%;max-width:400px' placeholder="" />
          </div>
          <div class='col-12 col-lg-6 p-0'>
            <span class='desc'>Email</span>
            <input class='form-control mb-2' required style='width:90%;max-width:400px' placeholder="" />
          </div>
          <div class='col-12 col-lg-6 p-0'>
            <span class='desc'>Phone no</span>
            <input class='form-control mb-2' required style='width:90%;max-width:400px' placeholder="" />
          </div>
          <div class='col-12 col-lg-6 p-0'>
            <span class='desc'>State</span>
            <input class='form-control mb-2' required style='width:90%;max-width:400px' placeholder="" />
          </div>
          <div class='col-12 col-lg-6 p-0'>
            <span class='desc'>City</span>
            <input class='form-control mb-2' required style='width:90%;max-width:400px' placeholder="" />
          </div>
          <div class='col-12 col-lg-12 p-0'>
            <span class='desc'>Address</span>
            <input class='form-control mb-2' required style='width:95%;' placeholder="" />
          </div>
        </div>
      </div>
        <div class='col-3 p-3' style='background:#f3f3f3;height:70px;'>
          <div class='col-12 p-0 text-center'>
            <button class='btn btn-primary bg-dark'>Proceed to Payment</button>
          </div>
      </div>
    </div>
    <!-- <div class='row mt-4 mb-4'>
      <div class='col-11 p-3' style='background:#f3f3f3'>
        <div class='col-12 p-0'>
          <p class='title'>Select Your Payment</p>
        </div>
        <div class='row p-2'>
          <div class='col-6 col-lg-3 p-2' style=''>
            <span class='desc'>UPI</span>
          </div>
          <div class='col-6 col-lg-9 p-0' style='align-items: center;display: flex;'>
            <input type='radio' class='mb-2' checked name='payment' />
          </div> -->
    <!-- <div class='col-6 col-lg-3 p-2' style=''>
            <span class='desc'>CASH ON DELIVERY</span>
          </div>
          <div class='col-6 col-lg-9 p-0' style='align-items: center;display: flex;'>
            <input type='radio' class='mb-2' name='payment' />
          </div> -->
    <!-- </div> -->
    <!-- </div> -->
    <!-- </div> -->
    <!-- <div class='row mt-4 mb-4'>
      <div class='col-11 p-3' style='background:#f3f3f3'>
        <div class='col-12 p-0 text-center'>
          <button class='btn btn-primary bg-dark'>Proceed to Payment</button>
        </div>
      </div>
    </div> -->
  </div>
</form>
<button type="button" class="btn btn-primary modal-btn" style='display:none' data-toggle="modal" data-target="#exampleModal">
  dfd
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MAKE YOUR PAYMENT HERE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class='text-center'>
          <img src='<?= base_url('uploads/barcode.png'); ?>' width='40%' />
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('.checkout').submit(function(e) {
      e.preventDefault();
      // alert();
      $('.modal-btn').trigger('click');
    });
  });
</script>
<?= $this->endSection() ?>