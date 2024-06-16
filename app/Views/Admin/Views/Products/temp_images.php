<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Temp Images</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Temp Images</li>
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
        <div class='p-5 m-3 card'>
            <div class='row'>
                <div class='col-12'>
                    <form class='product-temp-image'>
                        <div class='mb-2 col-12 bg-light p-3 border-rounded rounded'>
                            <p><b>Upload Product Temp Images</b></p>
                            <div class='mb-2 col-12'>
                                <span class='form-label'> Upload File </span>
                                <input name='images[]' class='form-control' type='file' multiple='multiple'>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button class='btn btn-primary'> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class='col-6'>
                </div>
            </div>
            <div class='row' style='display:flex;'>
                <?php if (isset($images)) {
                    foreach ($images as $image) { ?>
                        <div class='m-1' style='position:relative;'>
                            <img style='width:150px;height:150px;' src='<?= base_url('uploads/product_images_temp/' . $image); ?>'>
                            <a class='' href='<?= base_url('/delete_temp_image/'.$image);?>'>
                                <i class='fa fa-trash' style='color:red;font-size:16px;position:absolute;top:8px;right:8px;'></i>
                            </a>
                        </div>
                <?php }
                } ?>
            </div>
        </div>

    </section>
</div>

<script>
    $(document).ready(function() {
        $('.product-temp-image').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('product_temp_image_upload') ?>",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        alert('uploaded successfully');
                        setTimeout(function() {
                            window.location.href = '<?= base_url('/temp_image_view'); ?>';
                        }, 1000);
                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>