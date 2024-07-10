<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bulk Product Update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Bulk Product Update</li>
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
                <div class='col-6'>
                    <form class='bulk_product_update'>
                        <div class='mb-2 col-12 bg-light p-3 border-rounded rounded'>
                            <p><b>Bulk Product Update</b></p>
                            <div class='mb-2 col-12'>
                                <span class='form-label'> Upload File </span>
                                <input name='file' class='form-control' type='file'>
                                <div class='row p-0 m-0 justify-content-end'>
                                    <a class='text-sm' href='<?= base_url('assets/files/bulk_product_update.csv'); ?>' download>Download Example File</a>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button class='btn btn-primary'> Save Product</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class='col-6'>
                    <form class='bulk_product_varient_update'>
                        <div class='mb-2 col-12 bg-light p-3 border-rounded rounded'>
                            <p><b>Bulk Product Varient Update</b></p>
                            <div class='mb-2 col-12'>
                                <span class='form-label'> Upload File </span>
                                <input name='file' class='form-control' type='file'>
                                <div class='row p-0 m-0 justify-content-end'>
                                    <a class='text-sm' href='<?= base_url('assets/files/bulk_product_varient_update.csv'); ?>' download>Download Example File</a>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button class='btn btn-primary'> Save Product</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class='col-6'>
                    <form class='bulk_product_image_update'>
                        <div class='mb-2 col-12 bg-light p-3 border-rounded rounded'>
                            <p><b>Bulk Product Image Update</b></p>
                            <div class='mb-2 col-12'>
                                <span class='form-label'> Upload File </span>
                                <input name='file' class='form-control' type='file'>
                                <div class='row p-0 m-0 justify-content-end'>
                                    <a class='text-sm' href='<?= base_url('assets/files/bulk_product_image_update.csv'); ?>' download>Download Example File</a>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button class='btn btn-primary'> Save Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>

<script>
    $(document).ready(function() {
        $('.bulk_product_update').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('bulk_product_update_data') ?>",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        alert('uploaded successfully');
                        // setTimeout(function() {
                        //     // $('#download').css('display', 'block');
                        //     // $('#loader').css('visibility', 'hidden');
                        //     window.location.href = '<?= base_url('/Admin/products'); ?>';
                        // }, 1000);
                        // alert('registered_successfully');

                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });

        $('.bulk_product_varient_update').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('bulk_product_varient_update') ?>",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        alert('uploaded successfully');
                        // setTimeout(function() {
                        // $('#download').css('display', 'block');
                        // $('#loader').css('visibility', 'hidden');
                        // window.location.href = '<?= base_url('/Admin/products'); ?>';
                        // }, 1000);
                        // alert('registered_successfully');

                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });

        $('.bulk_product_image_update').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('bulk_product_image_update') ?>",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        alert('uploaded successfully');
                        // setTimeout(function() {
                        // $('#download').css('display', 'block');
                        // $('#loader').css('visibility', 'hidden');
                        // window.location.href = '<?= base_url('/Admin/products'); ?>';
                        // }, 1000);
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