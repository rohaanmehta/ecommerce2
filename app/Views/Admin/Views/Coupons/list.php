<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Coupons List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Coupons List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class='row p-5'>
            <div class="mb-2 w-100 d-flex justify-content-end">
                <input type="text" value="<?php if (isset($_GET['search'])) {
                                                echo $_GET['search'];
                                            } ?>" name="search" placeholder='Search Code , Discount , Minimum cart value' class="search-input form-control rounded-0" style="max-width:200px;" />
                <button class="search-btn btn btn-dark rounded-0">GO</button>
            </div>
            <table class='table table-bordered table-striped'>
                <tr>
                    <td>Code</td>
                    <td>Min Cart Value</td>
                    <td>Discount</td>
                    <td>Type</td>
                    <td>Start Date</td>
                    <td>End Date</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>

                <?php if (isset($coupons[0])) {
                    foreach ($coupons as $row) { ?>
                        <tr style='<?php if (strtotime($row->end_date) < strtotime(date('Y-m-d'))) {
                                        echo 'background:#ff7070';
                                    } ?>'>
                            <td><?= $row->code; ?></td>
                            <td><?= $row->min_cart_value; ?></td>
                            <td><?= $row->discount; ?></td>
                            <td><?= $row->type; ?></td>
                            <td><?= date('d-m-Y', strtotime($row->start_date)); ?></td>
                            <td><?= date('d-m-Y', strtotime($row->end_date)); ?></td>
                            <td><?php if ($row->status == '1') {
                                    echo 'Active';
                                } else {
                                    echo 'Not Active';
                                } ?></td>
                            <td>
                                <a href='<?= base_url('Admin/add_coupons/' . $row->id); ?>' class='edit_coupon'><button type='button' class='btn-sm btn btn-info'>Edit</button></a>
                                <a href='<?= base_url('deletecoupon/' . $row->id); ?>'><button class='btn-sm btn btn-danger'>Delete</button></a>
                            </td>
                        </tr>
                    <?php  }
                } else {  ?>
                    <tr>
                        <td class='text-center' colspan='8'> No Data Available !</td>
                    </tr>
                <?php } ?>
            </table>
            <div class='w-100 row justify-content-end pt-2'>
                <div class='text-center'>
                    <?= $links ?>
                </div>
            </div>
        </div>

    </section>
</div>

<script>
    $(document).ready(function() {
        $('.search-btn').click(function() {
            window.location.href = '<?= base_url('Admin/coupon_list/?search='); ?>' + $('.search-input').val();
        });

        $('.category-banner-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_category_banner_data') ?>",
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
                            window.location.href = '<?= base_url('/Admin/category-banner'); ?>';
                        }, 1000);
                        // alert('registered_successfully');

                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });
        $('.edit_category_banner').click(function(e) {
            // alert($(this).attr('id'));
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('edit_category_banner') ?>",
                data: {
                    id: $(this).attr('id')
                },
                // contentType: false,
                cache: false,
                // processData: false,
                dataType: "json",
                success: function(data) {
                    $('.edit-category-btn').trigger('click');
                    $('.image-prev').css('display', 'block');
                    $('.image-prev').attr('src', '<?= base_url('uploads/category_banners/'); ?>' + data.data[0]['image']);
                    $('.mobile-image-prev').attr('src', '<?= base_url('uploads/category_banners/'); ?>' + data.data[0]['mobile_image']);
                    // console.log(data);
                    $('.category').val(data.data[0]['category_id']);
                    $('.order').val(data.data[0]['order']);
                    $('.category_id').val(data.data[0]['id']);
                    // console.log(data.data[0]['parent_category']);

                }
            });
        });

        $('.edit-category-btn').click(function() {
            $('.image-prev').css('display', 'none');
            $('.order').val('');
            $('.category').val('');
            $('.category_id').val('');
        });
    });
</script>

<?= $this->endSection() ?>