<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category Banners</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category Banners</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="">
                <div class="d-flex justify-content-center">
                    <button class='btn btn-primary edit-category-btn mr-2' data-toggle="modal" data-target="#exampleModal">Upload Category Banners <i class='pl-2 nav-icon fas fa-upload'></i></button>
                </div>
            </div>
        </div>
        <div class='row p-5'>
            <div class="mb-2 w-100 d-flex justify-content-end">
                <input type="text" value="<?php if (isset($_GET['search'])) {
                                                echo $_GET['search'];
                                            } ?>" name="search" placeholder='Search Name' class="search-input form-control rounded-0" style="max-width:200px;" />
                <button class="search-btn btn btn-dark rounded-0">GO</button>
            </div>
            <table class='table table-bordered table-striped'>
                <tr>
                    <td>ID</td>
                    <td>Category Name</td>
                    <td>Image</td>
                    <td>Mobile Image</td>
                    <td>Image Order</td>
                    <td>Action</td>
                </tr>

                <?php if (isset($category[0])) {
                    foreach ($category as $row) { ?>
                        <tr>
                            <td><?= $row->id; ?></td>
                            <td><?= $row->category_name; ?></td>
                            <td><img width='80px' src='<?= base_url('uploads/category_banners/' . $row->image); ?>' /></td>
                            <td><img width='80px' src='<?= base_url('uploads/category_banners/' . $row->mobile_image); ?>' /></td>
                            <td><?= $row->order; ?></td>
                            <td>
                                <a href='' id='<?= $row->id ?>' class='edit_category_banner'><button type='button' class='btn-sm btn btn-info'>Edit</button></a>
                                <a href='<?= base_url('deletecategorybanner/' . $row->id); ?>'><button class='btn-sm btn btn-danger'>Delete</button></a>
                            </td>
                        </tr>
                    <?php  }
                } else {  ?>
                    <tr>
                        <td class='text-center' colspan='5'> No Data Available !</td>
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

<!-- Modal -->
<form class='category-banner-form'>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Category Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class='mb-2'>
                        <span class='form-label'>Category</span>
                        <select class='form-control category' name='category_id'>
                            <?php foreach ($all_categories as $row) { ?>
                                <option value='<?= $row->id ?>'><?= $row->category_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Image</span>
                        <input type='file' class='form-control' name='image' placeholder='Select Image' />
                        <img class='image-prev' src='' width='150px' />
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Mobile Image</span>
                        <input type='file' class='form-control' name='mobile-image' placeholder='Select Image' />
                        <img class='mobile-image-prev' src='' width='150px' />
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Order</span>
                        <input type='text' name='order' class='order form-control w-50' placeholder='Order' />
                    </div>
                    <input type='hidden' class='category_id' name='id'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('.search-btn').click(function() {
            window.location.href = '<?= base_url('Admin/category-banner/?search='); ?>' + $('.search-input').val();
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