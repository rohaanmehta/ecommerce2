<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" />

    <!-- 360 degrees -->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/j360.js"></script> -->

    <link href="/3602/main.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url('public/dist/js/main.js') ?>"></script>
    <script src="<?= base_url('public/dist/js/j360.js') ?>"></script>
</head>
<style>
    .product_image {
        width: 500px;
        height: 500px;
    }

    .product_image_thumbnails {
        width: 100px;
        height: 100px;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .product_image_thumbnails:hover {
        border: 1px solid black;
    }

    .product_heading {
        font-size: 18px;
        color: #222222;
        font-weight: 600;
    }

    .product_shop_tittle {
        font-size: 15px;
        color: #a9a9a9;
        font-weight: 600;
        margin-top: 11px;
    }

    .shop_name {
        font-size: 15px;
        color: darkblue;
        text-decoration: none;
        font-weight: 600;
    }

    .shop_name:hover {
        text-decoration: none;
        color: darkblue;
    }

    .product_price {
        font-size: 26px;
        color: #222222;
        font-weight: 600;
        margin-top: 24px;
    }

    .product_info {
        font-size: 16px;
        font-weight: 600;
        margin-top: 15px;
    }

    .product_navs_tabs {
        font-size: 13px;
        font-weight: 600;
        margin-top: 15px;
    }

    .nav-link {
        padding: 0.6rem 2.4rem;
        background-color: #f9f9f9;
        margin-right: 5px;
        border: 1px solid rgba(0, 0, 0, 0.06) !important;
        border-bottom: 0 !important;
        border-radius: 1px 1px 0 0;
        color:#838383 !important;
        font-size:14px;
    }
    .active{
        color: #000 !important;
    }
</style>
<div class='invisible'>gap fill</div>


<div class='row p-4'>
    <div class='col-1'>
        <div class='row justify-content-center'>
            <img class='product_image_thumbnails' src='https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202311/img_1920x_654b6441ccb990-96367438-19638772.jpg' />
            <img class='product_image_thumbnails' src='https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202311/img_1920x_654b6441ccb990-96367438-19638772.jpg' />
            <img class='product_image_thumbnails' src='https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202311/img_1920x_654b6441ccb990-96367438-19638772.jpg' />
            <img class='product_image_thumbnails' src='https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202311/img_1920x_654b6441ccb990-96367438-19638772.jpg' />
            <img class='product_image_thumbnails' src='https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202311/img_1920x_654b6441ccb990-96367438-19638772.jpg' />
        </div>
    </div>
    <div class='col-12 col-md-5'>
        <div class='bg-info d-flex justify-content-center p-4'>
            <img class='product_image' src='https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202311/img_1920x_654b6441ccb990-96367438-19638772.jpg' />
        </div>
        <div class='d-flex justify-content-center mt-2'>
            <button class='btn btn-secondary rounded text-white tap-btn' data-toggle="modal" data-target="#exampleModalCenter">Tap to view 360</button>
        </div>
    </div>

    <div class='col-12 col-md-5'>
        <div class='product_heading'>
            Girls Orange Crepe Gold Striped Printed Kids Dress Kurta With Attached Dupatta
        </div>
        <div class='product_shop_tittle'>
            Shop the collection by <a href='#' class='shop_name'>G mentor </a>
        </div>

        <div class='product_price'>
            $50
        </div>
        <div class='product_info'>
            <span class='text-secondary' style='min-width:100px'> Status : </span><span class='text-success'>In Stock</span> <br>
            <span class='text-secondary' style='min-width:100px'> SKU : </span><span class='text-secondary'>16K-872-KSKUCRGP-2-3Y</span>
        </div>
    </div>
    <div class='product_navs_tabs p-5'>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Additional Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Reviews</a>
            </li>
        </ul>
        <div class='p-4'>
            <ul>
                <li>Top Color: Orange</li>
                <li>Top Fabric: Crepe</li>
                <li>Print And Work: Gold Foil Print</li>
                <li>Style : Layered</li>
                <li>Sleeves Type : Sleeveless</li>
                <li>Collar: Round</li>
                <li>Kurta Lenght: Ankle</li>
                <li>Shape Type: Maxi</li>
                <li>Package Details: Kids Dress</li>
                <li>Closure : Zip on</li>
                <li>Wash Care: Handwash or Machine Wash</li>
                <li>Occasion: Partywear, Festivalwear</li>
                <li>Disclaimer: There will be slight difference in digital to actual image</li>
            </ul>
        </div>
    </div>
</div>
<!-- Modal -->

<div id='main' style=''>
    <div id="product" style="border-radius:4px;border:5px solid #e3e3e3;transform: translate(-50%, -50%);top:50%;left:50%;position:fixed;display:none;width: 640px; height: 480px;">
    <button class='btn btn-primary'>x</button>

        <img src="<?= base_url('public/images/01.jpg') ?>" />
        <img src="<?= base_url('public/images/02.jpg') ?>" />
        <img src="<?= base_url('public/images/03.jpg') ?>" />
        <img src="<?= base_url('public/images/04.jpg') ?>" />
        <img src="<?= base_url('public/images/05.jpg') ?>" />
        <img src="<?= base_url('public/images/06.jpg') ?>" />
        <img src="<?= base_url('public/images/07.jpg') ?>" />
        <img src="<?= base_url('public/images/08.jpg') ?>" />
        <img src="<?= base_url('public/images/09.jpg') ?>" />
        <img src="<?= base_url('public/images/10.jpg') ?>" />
        <img src="<?= base_url('public/images/11.jpg') ?>" />
        <img src="<?= base_url('public/images/12.jpg') ?>" />
        <img src="<?= base_url('public/images/13.jpg') ?>" />
        <img src="<?= base_url('public/images/14.jpg') ?>" />
        <img src="<?= base_url('public/images/15.jpg') ?>" />
        <img src="<?= base_url('public/images/16.jpg') ?>" />
        <img src="<?= base_url('public/images/17.jpg') ?>" />
        <img src="<?= base_url('public/images/18.jpg') ?>" />
        <img src="<?= base_url('public/images/19.jpg') ?>" />
        <img src="<?= base_url('public/images/20.jpg') ?>" />
        <img src="<?= base_url('public/images/21.jpg') ?>" />
        <img src="<?= base_url('public/images/22.jpg') ?>" />
        <img src="<?= base_url('public/images/23.jpg') ?>" />
        <img src="<?= base_url('public/images/24.jpg') ?>" />
        <img src="<?= base_url('public/images/25.jpg') ?>" />
        <img src="<?= base_url('public/images/26.jpg') ?>" />
        <img src="<?= base_url('public/images/27.jpg') ?>" />
        <img src="<?= base_url('public/images/28.jpg') ?>" />
        <img src="<?= base_url('public/images/29.jpg') ?>" />
        <img src="<?= base_url('public/images/30.jpg') ?>" />
        <img src="<?= base_url('public/images/31.jpg') ?>" />
        <img src="<?= base_url('public/images/32.jpg') ?>" />
        <img src="<?= base_url('public/images/33.jpg') ?>" />
        <img src="<?= base_url('public/images/34.jpg') ?>" />
        <img src="<?= base_url('public/images/35.jpg') ?>" />
        <img src="<?= base_url('public/images/36.jpg') ?>" />
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.tap-btn').click(function() {
            $('#product').css('display', 'block');
            jQuery('#product').j360();
        });

        $('.nav-link').click(function(){
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>


<?= $this->endSection() ?>