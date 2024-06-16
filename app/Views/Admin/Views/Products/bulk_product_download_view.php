<?= $this->extend('Admin/Layouts/Layout') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bulk Product Download</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Bulk Product Download</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class='p-5 m-3 card'>
            <div class='row'>
                <div class='col-6'>
                    <div class='mb-2 col-12 bg-light p-3 border-rounded rounded'>
                        <p><b>Bulk Product Data Download</b></p>
                        <div class="col-12 d-flex justify-content-center">
                            <a href='<?= base_url('/product_download'); ?>'><button class='btn btn-primary'> Download</button></a>
                        </div>
                    </div>
                </div>
                <div class='col-6'>
                    <div class='mb-2 col-12 bg-light p-3 border-rounded rounded'>
                        <p><b>Bulk Product Varients Download</b></p>
                        <div class="col-12 d-flex justify-content-center">
                            <a href='<?= base_url('/product_varients_download'); ?>'><button class='btn btn-primary'> Download</button></a>
                        </div>
                    </div>
                </div>
                <div class='col-6'>
                    <div class='mb-2 col-12 bg-light p-3 border-rounded rounded'>
                        <p><b>Bulk Product Image Data Download</b></p>
                        <div class="col-12 d-flex justify-content-center">
                            <a href='<?= base_url('/product_image_download'); ?>'><button class='btn btn-primary'> Download</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection() ?>