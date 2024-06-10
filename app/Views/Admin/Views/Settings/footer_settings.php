<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Footer Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Footer Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <form class='footer-form'>
            <div class='p-5 m-3 card'>
                <div class='border border-secondary col-12 rounded p-3'>
                    <div class='row'>
                        <div class='mb-2 col-12'>
                            <span class='form-label'> Categories to Show</span>
                            <input name='categories' class='form-control' value='<?php if (isset($footer) && !empty(($footer))) {
                                                                                        echo $footer[0]->category_limit;
                                                                                    } ?>'>
                        </div>
                        <div class='mb-2 col-12'>
                            <span class='form-label'> Footer Call or SMS </span>
                            <input name='callorsms' class='form-control' value='<?php if (isset($footer) && !empty(($footer))) {
                                                                                        echo $footer[0]->call_or_sms;
                                                                                    } ?>'>
                        </div>
                        <div class='mb-2 col-12'>
                            <span class='form-label'> Footer Email </span>
                            <input name='email' class='form-control' value='<?php if (isset($footer) && !empty(($footer))) {
                                                                                        echo $footer[0]->footer_email;
                                                                                    } ?>'>
                        </div>

                    </div>
                    <div class='row'>
                        <div class='mb-2 col-12'>
                            <span class='form-label'> FB LINK</span>
                            <input name='fb' class='form-control' value='<?php if (isset($footer) && !empty(($footer))) {
                                                                                        echo $footer[0]->fb_link;
                                                                                    } ?>'>
                        </div>
                        <div class='mb-2 col-12'>
                            <span class='form-label'> INSTAGRAM LINK </span>
                            <input name='insta' class='form-control' value='<?php if (isset($footer) && !empty(($footer))) {
                                                                                        echo $footer[0]->instagram_link;
                                                                                    } ?>'>
                        </div>
                        <div class='mb-2 col-12'>
                            <span class='form-label'> YOUTUBE </span>
                            <input name='youtube' class='form-control' value='<?php if (isset($footer) && !empty(($footer))) {
                                                                                        echo $footer[0]->youtube_link;
                                                                                    } ?>'>
                        </div>
                        <div class='mb-2 col-12'>
                            <span class='form-label'> POPULAR LINKS </span>
                            <textarea name='popularlinks' rows='5' class='form-control'><?php if (isset($footer) && !empty(($footer))) {
                                                                                        echo $footer[0]->popular_links;
                                                                                    } ?></textarea>
                        </div>
                        <div class='mb-2 col-12'>
                            <span class='form-label'> Back To Top Button </span>
                            <select class="form-control" name="backtotop">
                                <option value="1" <?php if (isset($footer) && !empty(($footer))) {
                                                                                        if($footer[0]->backtotop == '1'){ echo ' selected';}
                                                                                    } ?>>YES</option>
                                <option value="0" <?php if (isset($footer) && !empty(($footer))) {
                                                                                        if($footer[0]->backtotop == '0'){ echo ' selected';}
                                                                                    } ?>>NO</option>
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

        $('.footer-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_footer_data') ?>",
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
                            window.location.href = '<?= base_url('/Admin/footer_settings'); ?>';
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