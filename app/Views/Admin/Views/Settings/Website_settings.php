<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Website Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Website Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <form class='setting-form'>
            <div class='p-5 m-3 card'>
                <div class='border border-secondary col-8 rounded p-4 m-4'>
                    <p class='form-label h5 mb-3'> Homepage Products Section </p>
                    <div class='row'>
                        <div class='mb-2 col-4'>
                            <span class='form-label'> Section 1 Name </span>
                            <input name='banner1name' class='form-control' value='<?php if (isset($banner1) && !empty(($banner1))) {
                                                                                        echo $banner1[0]->value_1;
                                                                                    } ?>'>
                        </div>
                        <div class='mb-2 col-6'>
                            <span class='form-label'> Section 1 Link </span>
                            <input name='banner1link' class='form-control' value='<?php if (isset($banner1) && !empty(($banner1))) {
                                                                                        echo $banner1[0]->value_2;
                                                                                    } ?>'>
                        </div>
                        <div class='mb-2 col-2'>
                            <span class='form-label'> Is Slider ? </span>
                            <select class='form-control' name='banner1slider'>
                                <option value='YES' <?php if (isset($banner1) && !empty($banner1) && $banner1[0]->value_3 == 'YES') {
                                                        echo 'selected';
                                                    }; ?>>YES</option>
                                <option value='NO' <?php if (isset($banner1) && !empty($banner1) && $banner1[0]->value_3 == 'NO') {
                                                        echo 'selected';
                                                    }; ?>>NO</option>
                            </select>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='mb-2 col-4'>
                            <span class='form-label'> Section 2 Name </span>
                            <input name='banner2name' class='form-control' value='<?php if (isset($banner2) && !empty(($banner2))) {
                                                                                        echo $banner2[0]->value_1;
                                                                                    } ?>'>
                        </div>
                        <div class='mb-2 col-6'>
                            <span class='form-label'> Section 2 Link </span>
                            <input name='banner2link' class='form-control' value='<?php if (isset($banner2) && !empty(($banner2))) {
                                                                                        echo $banner2[0]->value_1;
                                                                                    } ?>'>
                        </div>
                        
                        <div class='mb-2 col-2'>
                            <span class='form-label'> Is Slider ? </span>
                            <select class='form-control' name='banner2slider'>
                                <option value='YES' <?php if (isset($banner2) && !empty($banner2) && $banner2[0]->value_3 == 'YES') {
                                                        echo 'selected';
                                                    }; ?>>YES</option>
                                <option value='NO' <?php if (isset($banner2) && !empty($banner2) && $banner2[0]->value_3 == 'NO') {
                                                        echo 'selected';
                                                    }; ?>>NO</option>
                            </select>
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
            </div>
        </form>

        <form class='banner-form'>
            <div class='p-5 m-3 card'>
                <div class='border border-secondary col-6 rounded p-4 m-4'>
                    <p class='form-label h5 mb-3'> Homepage Banners Section </p>
                    <div class='row'>
                        <div class='mb-2 col-12'>
                            <span class='form-label'> Banner 1 Name </span>
                            <input name='banner_section1name' class='form-control' value='<?php if (isset($banner_section1name) && !empty(($banner_section1name))) {
                                                                                                echo $banner_section1name[0]->value_1;
                                                                                            } ?>'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='mb-2 col-12'>
                            <span class='form-label'> Banner 2 Name </span>
                            <input name='banner_section2name' class='form-control' value='<?php if (isset($banner_section2name) && !empty(($banner_section2name))) {
                                                                                                echo $banner_section2name[0]->value_1;
                                                                                            } ?>'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='mb-2 col-12'>
                            <span class='form-label'> Banner 3 Name </span>
                            <input name='banner_section3name' class='form-control' value='<?php if (isset($banner_section3name) && !empty(($banner_section3name))) {
                                                                                                echo $banner_section3name[0]->value_1;
                                                                                            } ?>'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='mb-2 col-12'>
                            <span class='form-label'> Banner 4 Name </span>
                            <input name='banner_section4name' class='form-control' value='<?php if (isset($banner_section4name) && !empty(($banner_section4name))) {
                                                                                                echo $banner_section4name[0]->value_1;
                                                                                            } ?>'>
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
            </div>
        </form>

        <form class='product-page-form'>
            <div class='p-5 m-3 card'>
                <div class='border border-secondary col-8 rounded p-4 m-4'>
                    <p class='form-label h5 mb-3'> Product Page Section </p>
                    <div class='row'>
                        <div class='mb-2 col-6'>
                            <span class='form-label'> Section 1 Name </span>
                            <input name='banner1name' class='form-control' value='<?php if (isset($productbanner1) && !empty(($productbanner1))) {
                                                                                        echo $productbanner1[0]->value_1;
                                                                                    } ?>'>
                        </div>
                        <div class='mb-2 col-3'>
                            <span class='form-label'> Max Product Count </span>
                            <input name='banner1count' class='form-control' value='<?php if (isset($productbanner1) && !empty(($productbanner1))) {
                                                                                        echo $productbanner1[0]->value_2;
                                                                                    } ?>'>
                        </div>
                        <div class='mb-2 col-3'>
                            <span class='form-label'> Is Slider ? </span>
                            <select class='form-control' name='banner1slider'>
                                <option value='YES' <?php if (isset($productbanner1) && !empty($productbanner1) && $productbanner1[0]->value_3 == 'YES') {
                                                        echo 'selected';
                                                    }; ?>>YES</option>
                                <option value='NO' <?php if (isset($productbanner1) && !empty($productbanner1) && $productbanner1[0]->value_3 == 'NO') {
                                                        echo 'selected';
                                                    }; ?>>NO</option>
                            </select>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='mb-2 col-6'>
                            <span class='form-label'> Section 2 Name </span><span class='text-secondary' style='font-size:12px'>(Product comes from pair category)</span>
                            <input name='banner2name' class='form-control' value='<?php if (isset($productbanner2) && !empty(($productbanner2))) {
                                                                                        echo $productbanner2[0]->value_1;
                                                                                    } ?>'>
                        </div>
                        <div class='mb-2 col-3'>
                            <span class='form-label'> Max Product Count </span>
                            <input name='banner2count' class='form-control' value='<?php if (isset($productbanner2) && !empty(($productbanner2))) {
                                                                                        echo $productbanner2[0]->value_2;
                                                                                    } ?>'>
                        </div>
                        
                        <div class='mb-2 col-3'>
                            <span class='form-label'> Is Slider ? </span>
                            <select class='form-control' name='banner2slider'>
                                <option value='YES' <?php if (isset($productbanner2) && !empty($productbanner2) && $productbanner2[0]->value_3 == 'YES') {
                                                        echo 'selected';
                                                    }; ?>>YES</option>
                                <option value='NO' <?php if (isset($productbanner2) && !empty($productbanner2) && $productbanner2[0]->value_3 == 'NO') {
                                                        echo 'selected';
                                                    }; ?>>NO</option>
                            </select>
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
            </div>
        </form>
    </section>
</div>

<script>
    $(document).ready(function() {
        
        $('.setting-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_website_settings') ?>",
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
                            window.location.href = '<?= base_url('/Admin/website_settings'); ?>';
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
                url: "<?= base_url('add_website_settings_banner') ?>",
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
                            window.location.href = '<?= base_url('/Admin/website_settings'); ?>';
                        }, 1000);
                        // alert('registered_successfully');

                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });
        
        $('.product-page-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_website_settings_product_page') ?>",
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
                            window.location.href = '<?= base_url('/Admin/website_settings'); ?>';
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