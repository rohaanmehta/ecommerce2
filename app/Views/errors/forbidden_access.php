<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<div class='row mt-4'>
    <div class='col-12 text-center'>
        <img class='m-4' src='<?= base_url('uploads/website/404error.png');?>'/>
        <p style='font-size:27px;font-weight:500' class='m-0'>FORBIDDEN</p>
        <p style='color:#858585;font-size:14px;font-weight:400' class='mt-0'>You do not have access to this page</p>
        <a href='<?= base_url();?>'><button class='btn black-btn'>GO BACK TO HOMEPAGE</button></a>
    </div>
</div>

<?= $this->endSection() ?>