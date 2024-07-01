<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Shipping Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shipping Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <form class='shipping-form'>
            <div class='p-5 m-3 card'>
                <div class='border border-secondary col-8 rounded p-4 m-4'>
                    <p class='form-label h5 mb-3'> Shipping Settings </p>
                    <div class='row'>
                        <div class='mb-2 col-4'>
                            <span class='form-label'> Standard Shipping Fees</span>
                            <input name='shipping_fees' class='form-control' value='<?php if (isset($shipping) && !empty(($shipping))) {
                                                                                        echo $shipping[0]->value_1;
                                                                                    } ?>'>
                        </div>
                        <div class='mb-2 col-6'>
                            <span class='form-label'> Free Shipping Above </span>
                            <input name='free_shipping' class='form-control' value='<?php if (isset($shipping) && !empty(($shipping))) {
                                                                                        echo $shipping[0]->value_2;
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
    </section>
</div>

<script>
    $(document).ready(function() {

        $('.shipping-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_shipping_settings') ?>",
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
                            window.location.href = '<?= base_url('/Admin/shipping-view'); ?>';
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