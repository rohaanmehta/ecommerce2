<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Visual Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Visual Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class='p-5 m-3 card'>
            <form class='setting-form' enctype="multipart/form-data">
                <div class='col-12 rounded p-2'>
                    <div class='row'>
                        <div class='mb-2 col-4'>
                            <span class='form-label'> Website Logo Big</span>
                            <input type='file' class='form-control mt-2' name='image1' />
                            <?php if (isset($info[0]) && !empty($info[0]->value_1)) { ?>
                                <img class='mt-2' style='max-width:100%' src='<?= base_url('uploads/website/' . $info[0]->value_1); ?>'>
                            <?php } ?>
                        </div>
                        <div class='mb-2 col-4'>
                            <span class='form-label'> Website Logo Small</span>
                            <input type='file' class='form-control mt-2' name='image2' />
                            <?php if (isset($info[0]) && !empty($info[0]->value_2)) { ?>
                                <img class='mt-2' style='max-width:100%' src='<?= base_url('uploads/website/' . $info[0]->value_2); ?>'>
                            <?php } ?>
                        </div>
                        <div class='mb-2 col-4'>
                            <span class='form-label'> Favicon</span>
                            <input type='file' class='form-control mt-2' name='image3' />
                            <?php if (isset($info[0]) && !empty($info[0]->value_3)) { ?>
                                <img class='mt-2' style='max-width:100%' src='<?= base_url('uploads/website/' . $info[0]->value_3); ?>'>
                            <?php } ?>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='mb-2 col-12'>
                            <div class="mt-3 d-flex justify-content-center">
                                <button class='btn btn-primary'> Save </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form class='banner-form' enctype="multipart/form-data">
                <div class='col-12 rounded p-2'>
                    <div class='row'>
                        <div class='mb-2 col-4'>
                            <span class='form-label'> PC Popup Image</span>
                            <input type='file' class='form-control mt-2' name='image1' />
                            <?php if (isset($info2[0]) && !empty($info2[0]->value_1)) { ?>
                                <img class='mt-2' style='max-width:100%' src='<?= base_url('uploads/website/' . $info2[0]->value_1); ?>'>
                            <?php } ?>
                        </div>
                        <div class='mb-2 col-4'>
                            <span class='form-label'> Sidebar Mobile Banner</span>
                            <input type='file' class='form-control mt-2' name='image2' />
                            <?php if (isset($info2[0]) && !empty($info2[0]->value_2)) { ?>
                                <img class='mt-2' style='max-width:100%' src='<?= base_url('uploads/website/' . $info2[0]->value_2); ?>'>
                            <?php } ?>
                            <div class='mt-2'>
                                <span class='form-label'> Sidebar Mobile Banner Link</span>
                                <input type='text' class='form-control mt-2' name='link' value='<?php if (isset($info2[0]) && !empty($info2[0]->value_2)) {
                                                                                                    echo $info2[0]->value_3;
                                                                                                } ?>' />
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='mb-2 col-12'>
                            <div class="mt-3 d-flex justify-content-center">
                                <button class='btn btn-primary'> Save </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form class='category-settings-form card p-4'>
                <div class='row'>
                    <div class='mb-2 col-4'>
                        <span class='form-label'> Show Scroll to top btn on category page ? </span>
                        <select class='form-control mt-2' name='scroll-to-top'>
                            <option value='1' <?php if (isset($category_settings) && !empty($category_settings) && $category_settings[0]->value_1 == '1') {
                                                    echo 'selected';
                                                }; ?>>YES</option>
                            <option value='0' <?php if (isset($category_settings) && !empty($category_settings) && $category_settings[0]->value_1 == '0') {
                                                    echo 'selected';
                                                }; ?>>NO</option>
                        </select>
                    </div>
                    <div class='mb-2 col-4'>
                        <span class='form-label'> Colour </span>
                        <input type="color" class='form-control mt-2' id="color" name="color" value="<?php if (isset($category_settings) && !empty($category_settings)){ echo $category_settings[0]->value_2;}?>">
                    </div>
                    <div class='mb-2 col-4'>
                        <span class='form-label'> Font Colour </span>
                        <input type="color" class='form-control mt-2' id="font-color" name="font-color" value="<?php if (isset($category_settings) && !empty($category_settings)){ echo $category_settings[0]->value_3;}?>">
                    </div>
                </div>
                <div class='row'>
                    <div class='mb-2 col-12'>
                        <div class="mt-3 d-flex justify-content-center">
                            <button class='btn btn-primary'> Save </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        $('.category-settings-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('category-settings') ?>",
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
                            window.location.href = '<?= base_url('/Admin/visual_settings'); ?>';
                        }, 1000);
                        // alert('registered_successfully');
                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });

        $('.setting-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_visual_settings') ?>",
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
                            window.location.href = '<?= base_url('/Admin/visual_settings'); ?>';
                        }, 1000);
                        // alert('registered_successfully');
                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });

        $('.banner-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_visual_settings2') ?>",
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
                            window.location.href = '<?= base_url('/Admin/visual_settings'); ?>';
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