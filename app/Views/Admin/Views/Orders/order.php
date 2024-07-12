<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order No #<?= $order[0]->order_no ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order </li>
                    </ol>
                </div>
            </div>
            <div class="row mb-2">
                <div class='col-12 col-md-6 p-3' style="background:#fff">
                    <div class='w-100'>
                        <p class='h6' style='font-size:22px;font-weight:500;'>User Details</p>
                    </div>
                    <div class='w-100 d-flex'>
                        <p class='h6' style='font-size:15px;font-weight:600;'>First Name : </p>
                        <p class='h6' style='font-size:15px;font-weight:500;'><?= $order[0]->first_name; ?></p>
                    </div>
                    <div class='w-100 d-flex'>
                        <p class='h6' style='font-size:15px;font-weight:600;'>Last Name : </p>
                        <p class='h6' style='font-size:15px;font-weight:500;'><?= $order[0]->last_name; ?></p>
                    </div>
                    <div class='w-100 d-flex'>
                        <p class='h6' style='font-size:15px;font-weight:600;'>Email : </p>
                        <p class='h6' style='font-size:15px;font-weight:500;'><?= $order[0]->email; ?></p>
                    </div>
                    <div class='w-100 d-flex'>
                        <p class='h6' style='font-size:15px;font-weight:600;'>Gender : </p>
                        <p class='h6' style='font-size:15px;font-weight:500;'><?= $order[0]->gender; ?></p>
                    </div>
                    <div class='w-100 d-flex'>
                        <p class='h6' style='font-size:15px;font-weight:600;'>DOB : </p>
                        <p class='h6' style='font-size:15px;font-weight:500;'><?= date('d-m-Y', strtotime($order[0]->dob)); ?></p>
                    </div>
                </div>
                <div class='col-12 col-md-6 p-0'>
                    <div class='w-100  p-3 ml-2' style="background:#fff">
                        <div class='w-100'>
                            <p class='h6' style='font-size:22px;font-weight:500;'>Shipping Details</p>
                        </div>
                        <div class='w-100 d-flex'>
                            <p class='h6' style='font-size:15px;font-weight:600;'>First Name : </p>
                            <p class='h6' style='font-size:15px;font-weight:500;'><?= $order_shipping[0]->first_name; ?></p>
                        </div>
                        <div class='w-100 d-flex'>
                            <p class='h6' style='font-size:15px;font-weight:600;'>Last Name : </p>
                            <p class='h6' style='font-size:15px;font-weight:500;'><?= $order_shipping[0]->last_name; ?></p>
                        </div>
                        <div class='w-100 d-flex'>
                            <p class='h6' style='font-size:15px;font-weight:600;'>Mobile No : </p>
                            <p class='h6' style='font-size:15px;font-weight:500;'><?= $order_shipping[0]->mobile_no; ?></p>
                        </div>
                        <div class='w-100 d-flex'>
                            <p class='h6' style='font-size:15px;font-weight:600;'>Address: </p>
                            <p class='h6' style='font-size:15px;font-weight:500;'> <?= $order_shipping[0]->address . ' ' . $order_shipping[0]->landmark . ' ' . $order_shipping[0]->city . ' ' . $order_shipping[0]->state . ' ' . $order_shipping[0]->postal_code ?>
                            </p>
                        </div>
                        <div class='w-100 d-flex'>
                            <p class='h6' style='font-size:15px;font-weight:600;'>Order placed at : </p>
                            <p class='h6' style='font-size:15px;font-weight:500;'><?= date('d-m-Y H:i:s', strtotime($order_shipping[0]->created_at)); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2" style='align-content:rightend'>
                <div class='col-12 col-md-12 p-3' style="background:#fff">
                    <div class='w-100'>
                        <p class='h6' style='font-size:22px;font-weight:500;'>Order Details</p>
                    </div>
                    <table class='table tabled-bordered table-sm'>
                        <thead>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Variation</th>
                            <th>QTY</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <!-- <th>Tracking URL</th> -->
                            <!-- <th>Action</th> -->
                        </thead>
                        <tbody>
                            <?php foreach ($order_products as $row) { ?>
                                <tr>
                                    <td style='align-content:center'>
                                        <img height='60px' src='<?= base_url('uploads/product_images/' . get_product_image($row->product_id)); ?>' />
                                    </td>
                                    <td style='align-content:center'>
                                        <?= $row->product_title ?>
                                    </td>
                                    <td style='align-content:center'>
                                        <?php $variation = get_order_variation($row->oid); if(isset($variation) && !empty($variation)){ foreach($variation as $row2){?>
                                        <div class='d-flex'><p class='m-0'><?= $row2->varaiation_name.' :'.$row2->variation_value ?></p></div>
                                        <?php } } ?>
                                    </td>
                                    <td style='align-content:center'>
                                        <?= $row->quantity ?>
                                    </td>
                                    <td style='align-content:center'>
                                        <?= $row->unit_price ?>
                                    </td>
                                    <td style='align-content:center'>
                                        <?= $row->total_price ?>
                                    </td>
                                    <!-- <td style='align-content:center'>
                                        <//?= $row->tracking_url ?>
                                    </td> -->

                                <tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class='d-flex w-100' style='justify-content:end'>
                    <div class="mt-3 col-12 col-md-3 p-3" style="background:#fff">
                        <div class='w-100 d-flex'>
                            <p class='h6' style='font-size:15px;font-weight:600;'>Order Total : </p>
                            <p class='h6 ml-2' style='font-size:15px;font-weight:500;'><?= price_format($order[0]->total_price); ?></p>
                        </div>
                        <div class='w-100 d-flex'>
                            <p class='h6' style='font-size:15px;font-weight:600;'>Coupon Discount :</p>
                            <p class='h6 ml-2' style='font-size:15px;font-weight:500;'> <?= '-' . $order[0]->discount_price . ' (' . $order[0]->coupon_code . ') '; ?></p>
                        </div>
                        <div class='w-100 d-flex'>
                            <p class='h6' style='font-size:15px;font-weight:600;'>Shipping Price : </p>
                            <p class='h6 ml-2' style='font-size:15px;font-weight:500;'><?= price_format($order[0]->shipping_price); ?></p>
                        </div>
                        <hr class='m-1 p-0'>
                        <div class='w-100 d-flex'>
                            <p class='h6' style='font-size:15px;font-weight:600;'>Final Price : </p>
                            <p class='h6 ml-2' style='font-size:15px;font-weight:500;'><?= price_format($order[0]->final_price); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class='row p-5'>
        </div>

    </section>
</div>
<?= $this->endSection() ?>