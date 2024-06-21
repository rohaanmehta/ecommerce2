<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Coupons</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Coupons</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <!-- <div class="container-fluid">
            <div class="">
                <div class="d-flex justify-content-center">
                    <button class='btn btn-primary' data-toggle="modal" data-target="#exampleModal">Upload Banner <i class='pl-2 nav-icon fas fa-upload'></i></button>

                </div>
            </div>
        </div> -->
        <form class='coupon-form'>
            <div class='p-5 m-3 card'>
                <div class='mb-2'>
                    <span class='form-label'> Coupon Code </span>
                    <input required name='code' class='form-control' placeholder="Coupon Code" value='<?php if(isset($coupon[0])){ echo $coupon[0]->code;}?>'>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Min Cart Value </span>
                    <input required name='min_cart_value' class='form-control' placeholder="Min Cart Value" value='<?php if(isset($coupon[0])){ echo $coupon[0]->min_cart_value;}?>'>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Discount </span>
                    <input required name='discount' class='form-control' placeholder="Discount" value='<?php if(isset($coupon[0])){ echo $coupon[0]->discount;}?>'>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Type </span>
                    <select required name='type' class='form-control'>
                        <option value='Fixed' <?php if(isset($coupon[0])){if($coupon[0]->type == 'Fixed'){ echo 'selected';}}?>>Fixed</option>
                        <option value='Percentage' <?php if(isset($coupon[0])){if($coupon[0]->type == 'Percentage'){ echo 'selected';}}?>>Percentage</option>
                    </select>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Start Date </span>
                    <input required type='date' name='start_date' class='form-control' value='<?php if(isset($coupon[0])){ echo $coupon[0]->start_date;}?>'>

                </div>
                <div class='mb-2'>
                    <span class='form-label'> End Date </span>
                    <input required type='date' name='end_date' class='form-control' value='<?php if(isset($coupon[0])){ echo $coupon[0]->end_date;}?>'>
                </div>
                <div class='mb-2'>
                    <span class='form-label'> Status </span>
                    <select required name='status' class='form-control'>
                        <option value='1' <?php if(isset($coupon[0])){if($coupon[0]->status == '1'){ echo 'selected';}}?>>YES</option>
                        <option value='0' <?php if(isset($coupon[0])){if($coupon[0]->status == '0'){ echo 'selected';}}?>>NO</option>
                    </select>
                </div>

                <input name='couponid' class='form-control' placeholder="" type='hidden' value='<?php if(isset($coupon[0])){ echo $coupon[0]->id;}?>'>

                
                <div class="d-flex justify-content-center">
                    <button class='btn btn-primary'> Save Coupon</button>
                </div>
            </div>
        </form>

    </section>
</div>

<script>
    $(document).ready(function() {
        $('.coupon-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_coupon_data') ?>",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        alert('uploaded successfully');
                        setTimeout(function() {
                            // $('#download').css('display', 'block');
                            // $('#loader').css('visibility', 'hidden');
                            window.location.href = '<?= base_url('/Admin/coupon_list'); ?>';
                        }, 1000);
                        // alert('registered_successfully');

                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>