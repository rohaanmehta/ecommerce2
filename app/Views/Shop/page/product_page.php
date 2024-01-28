<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>

<head>
    <!-- 360 degrees -->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <!-- <link href="/3602/main.css" rel="stylesheet" type="text/css"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <script src="<//?= base_url('public/dist/js/main.js') ?>"></script> -->
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
        border: 1px solid #b5b5b5;
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
        color: #838383 !important;
        font-size: 14px;
        cursor: pointer;
    }

    .active {
        color: #383838 !important;
    }
    #product img {
        width:100%;
        /* height:100%; */
    }
</style>
<div class='invisible'>gap fill</div>

<div class='row p-4'>
    <div class='col-1'>
        <div class='row pl-5 justify-content-center'>
            <img class='product_image_thumbnails rounded' src='https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202311/img_1920x_654b6441ccb990-96367438-19638772.jpg' />
            <img class='product_image_thumbnails rounded' src='https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202311/img_x300_656075fde69238-97863729-57278107.jpg' />
            <img class='product_image_thumbnails rounded' src='https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202311/img_1920x_654b6441ccb990-96367438-19638772.jpg' />
            <img class='product_image_thumbnails rounded' src='https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202311/img_1920x_654b6441ccb990-96367438-19638772.jpg' />
            <img class='product_image_thumbnails rounded' src='https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202311/img_1920x_654b6441ccb990-96367438-19638772.jpg' />
        </div>
    </div>
    <div class='col-12 col-md-5'>
        <div class='d-flex justify-content-center pl-4 pr-4'>
            <img class='product_image rounded' src='https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202311/img_1920x_654b6441ccb990-96367438-19638772.jpg' />
        </div>
        <div class='d-flex justify-content-center mt-2'>
            <button class='btn rounded text-white tap-btn product-360' style='background:#000' data-toggle="modal" data-target="#exampleModalCenter">Tap to view 360</button>
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
</div>
<div class='p-5'>
    <div class='product_navs_tabs'>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="product-description-btn" aria-current="page">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="product-additional-info-btn">Additional Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="product-reviews-btn">Reviews</a>
            </li>
        </ul>
    </div>
    <div class='pt-5 pb-5 product-description' style='font-size:14px;font-weight:100;color:#7e7e7e'>
        <ul>
            Product Features:
            <li> Color: Black </li>
            <li> Fabric: georgette </li>
            <li> Pattern: Embroidered </li>
            <li> Wash Care: Dry Clean </li>
            <li> Occasion: Festival/Party </li>
            <li> Product Type: Kurta Sets </li>
            <li> Disclaimer: There will be slight difference in digital to actual image </li>
        </ul>
    </div>
    <div class='pt-5 pb-5 w-100 product-additional-info' style='display:none;font-size:14px;font-weight:100;color:#7e7e7e'>
        <table class="table table-bordered" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="text-dark" style='background:#f3f3f3;width:200px'><b> Color</b> </td>
                    <td class="text-dark"> Black </td>
                </tr>
                <tr>
                    <td class="text-dark" style='background:#f3f3f3;width:200px'><b> Occassion</b> </td>
                    <td class="text-dark"> Diwali </td>
                </tr>
                <tr>
                    <td class="text-dark" style='background:#f3f3f3;width:200px'><b> Fabric</b> </td>
                    <td class="text-dark"> Cotton </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class='pt-5 pb-5 w-100 text-dark product-reviews' style='display:none;font-size:15px;font-weight:100;'>
        <p><b>Reviews</b></p>
        <p style='color:#7e7e7e'><b>No reviews found !</b></p>
    </div>
</div>
<!-- Modal -->

<div id='main' class='product-360'>
    <div id="product" style="background:#fff;border-radius:4px;border:5px solid #e3e3e3;transform: translate(-50%, -50%);top:50%;left:50%;position:fixed;display:none;width: 500px; height: 400px;" class='product-360'>
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

<!-- Item slider 5 items more from shop-->
<div class="container-fluid product-slider gap">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'>More from G MENTOR </p>
        <div class='text-center gap mobile_Head_Hide'><button class='btn rounded' style='background:#000;color:#fff;'>View All </button></div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-xs-12 col-sm-4 col-md-2 product-slider-img">
                            <a href="#"><img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" class="img-responsive center-block"></a>
                            <h4 class="text-center">MAYORAL SUKNJA</h4>
                            <h5 class="text-center">200,00 TK</h5>
                            <div class='add-to-cart'>
                                <a href='#'>
                                    <span class="fa-stack fa-2x">
                                        <i class="fa-solid fa-circle fa-stack-2x add-to-cart-btn-outer"></i>
                                        <i class="fa-solid fa-cart-shopping fa-stack-1x add-to-cart-btn" style='top:2'></i>
                                    </span>
                                </a>
                                <a href='#'>
                                    <span class="fa-stack fa-2x">
                                        <i class="fa-solid fa-circle fa-stack-2x wishlist-btn-outer"></i>
                                        <i class="fa-regular fa-bounce fa-heart fa-stack-1x fa-inverse wishlist-btn" style='top:2'></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1524010349062-860def6649c3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e725946a3f177dce83a705d4b12019c2&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <h4 class="text-center">MAYORAL KOŠULJA</h4>
                            <h5 class="text-center">800 TK</h5>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1511556820780-d912e42b4980?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=04aebe9a22884efa1a5f61e434215597&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <span class="badge">10%</span>
                            <h4 class="text-center">PANTALONE TERI 2</h4>
                            <h5 class="text-center">4000,00 TK</h5>
                            <h6 class="text-center">5000,00 TK</h6>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1531925470851-1b5896b67dcd?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=91fe0ca1b5d72338a8aac04935b52148&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <h4 class="text-center">CVETNA HALJINA</h4>
                            <h5 class="text-center">4000,00 RSD</h5>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1516961642265-531546e84af2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=74065eec3c2f6a8284bbe30402432f1d&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <h4 class="text-center">MAJICA FOTO</h4>
                            <h5 class="text-center">40,00 TK</h5>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1532086853747-99450c17fa2e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=61a42a11f627b0d21d0df757d9b8fe23&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <h4 class="text-center">MAJICA MAYORAL</h4>
                            <h5 class="text-center">100,00 TK</h5>
                        </div>
                    </div>

                </div>

                <div id="slider-control">
                    <a class="left carousel-control" href="#itemslider" data-slide="prev">
                        <span class="fa-stack fa-1x">
                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-angle-left fa-stack-1x" style='color:#7b838d'></i>
                        </span>
                    </a>
                    <a class="right carousel-control" href="#itemslider" data-slide="next">
                        <span class="fa-stack fa-1x">
                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-angle-right fa-stack-1x" style='color:#7b838d'></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class='text-center gap mobile_Head_Show' style='justify-content: center;'><button class='btn rounded-0' style='background:#000;color:#fff;'>View All</button></div>
</div>

<!-- Item slider 5 items you may also like-->
<div class="container-fluid product-slider gap">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'>SIMILAR PRODUCTS</p>
        <!-- <div class='text-center gap mobile_Head_Hide'><button class='btn rounded' style='background:#000;color:#fff;'>View All </button></div> -->
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-xs-12 col-sm-4 col-md-2 product-slider-img">
                            <a href="#"><img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" class="img-responsive center-block"></a>
                            <h4 class="text-center">MAYORAL SUKNJA</h4>
                            <h5 class="text-center">200,00 TK</h5>
                            <div class='add-to-cart'>
                                <a href='#'>
                                    <span class="fa-stack fa-2x">
                                        <i class="fa-solid fa-circle fa-stack-2x add-to-cart-btn-outer"></i>
                                        <i class="fa-solid fa-cart-shopping fa-stack-1x add-to-cart-btn" style='top:2'></i>
                                    </span>
                                </a>
                                <a href='#'>
                                    <span class="fa-stack fa-2x">
                                        <i class="fa-solid fa-circle fa-stack-2x wishlist-btn-outer"></i>
                                        <i class="fa-regular fa-bounce fa-heart fa-stack-1x fa-inverse wishlist-btn" style='top:2'></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1524010349062-860def6649c3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e725946a3f177dce83a705d4b12019c2&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <h4 class="text-center">MAYORAL KOŠULJA</h4>
                            <h5 class="text-center">800 TK</h5>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1511556820780-d912e42b4980?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=04aebe9a22884efa1a5f61e434215597&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <span class="badge">10%</span>
                            <h4 class="text-center">PANTALONE TERI 2</h4>
                            <h5 class="text-center">4000,00 TK</h5>
                            <h6 class="text-center">5000,00 TK</h6>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1531925470851-1b5896b67dcd?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=91fe0ca1b5d72338a8aac04935b52148&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <h4 class="text-center">CVETNA HALJINA</h4>
                            <h5 class="text-center">4000,00 RSD</h5>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1516961642265-531546e84af2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=74065eec3c2f6a8284bbe30402432f1d&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <h4 class="text-center">MAJICA FOTO</h4>
                            <h5 class="text-center">40,00 TK</h5>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1532086853747-99450c17fa2e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=61a42a11f627b0d21d0df757d9b8fe23&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <h4 class="text-center">MAJICA MAYORAL</h4>
                            <h5 class="text-center">100,00 TK</h5>
                        </div>
                    </div>

                </div>

                <div id="slider-control">
                    <a class="left carousel-control" href="#itemslider" data-slide="prev">
                        <span class="fa-stack fa-1x">
                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-angle-left fa-stack-1x" style='color:#7b838d'></i>
                        </span>
                    </a>
                    <a class="right carousel-control" href="#itemslider" data-slide="next">
                        <span class="fa-stack fa-1x">
                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-angle-right fa-stack-1x" style='color:#7b838d'></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class='text-center gap mobile_Head_Show' style='justify-content: center;'><button class='btn rounded-0' style='background:#000;color:#fff;'>View All</button></div> -->
</div>

<!-- Item slider 5 items recently view-->
<div class="container-fluid product-slider gap">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'> RECENTLY VIEWED</p>
        <!-- <div class='text-center gap mobile_Head_Hide'><button class='btn rounded' style='background:#000;color:#fff;'>View All </button></div> -->
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-xs-12 col-sm-4 col-md-2 product-slider-img">
                            <a href="#"><img src="https://images.unsplash.com/photo-1539840093138-9b3e230e5206?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=765a2eb222b1851840a4a157780fb487&auto=format&fit=crop&w=1534&q=80" class="img-responsive center-block"></a>
                            <h4 class="text-center">MAYORAL SUKNJA</h4>
                            <h5 class="text-center">200,00 TK</h5>
                            <div class='add-to-cart'>
                                <a href='#'>
                                    <span class="fa-stack fa-2x">
                                        <i class="fa-solid fa-circle fa-stack-2x add-to-cart-btn-outer"></i>
                                        <i class="fa-solid fa-cart-shopping fa-stack-1x add-to-cart-btn" style='top:2'></i>
                                    </span>
                                </a>
                                <a href='#'>
                                    <span class="fa-stack fa-2x">
                                        <i class="fa-solid fa-circle fa-stack-2x wishlist-btn-outer"></i>
                                        <i class="fa-regular fa-bounce fa-heart fa-stack-1x fa-inverse wishlist-btn" style='top:2'></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1524010349062-860def6649c3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e725946a3f177dce83a705d4b12019c2&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <h4 class="text-center">MAYORAL KOŠULJA</h4>
                            <h5 class="text-center">800 TK</h5>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1511556820780-d912e42b4980?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=04aebe9a22884efa1a5f61e434215597&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <span class="badge">10%</span>
                            <h4 class="text-center">PANTALONE TERI 2</h4>
                            <h5 class="text-center">4000,00 TK</h5>
                            <h6 class="text-center">5000,00 TK</h6>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1531925470851-1b5896b67dcd?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=91fe0ca1b5d72338a8aac04935b52148&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <h4 class="text-center">CVETNA HALJINA</h4>
                            <h5 class="text-center">4000,00 RSD</h5>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1516961642265-531546e84af2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=74065eec3c2f6a8284bbe30402432f1d&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <h4 class="text-center">MAJICA FOTO</h4>
                            <h5 class="text-center">40,00 TK</h5>
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-xs-12 col-sm-4 col-md-2">
                            <a href="#"><img src="https://images.unsplash.com/photo-1532086853747-99450c17fa2e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=61a42a11f627b0d21d0df757d9b8fe23&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a>
                            <h4 class="text-center">MAJICA MAYORAL</h4>
                            <h5 class="text-center">100,00 TK</h5>
                        </div>
                    </div>

                </div>

                <div id="slider-control">
                    <a class="left carousel-control" href="#itemslider" data-slide="prev">
                        <span class="fa-stack fa-1x">
                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-angle-left fa-stack-1x" style='color:#7b838d'></i>
                        </span>
                    </a>
                    <a class="right carousel-control" href="#itemslider" data-slide="next">
                        <span class="fa-stack fa-1x">
                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-angle-right fa-stack-1x" style='color:#7b838d'></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class='text-center gap mobile_Head_Show' style='justify-content: center;'><button class='btn rounded-0' style='background:#000;color:#fff;'>View All</button></div> -->
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.tap-btn').click(function() {
            $('#product').css('display', 'block');
            jQuery('#product').j360();
        });

        $('.nav-link').click(function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');

            if ($(this).attr('id') == 'product-additional-info-btn') {
                $('.product-reviews').css('display', 'none');
                $('.product-description').css('display', 'none');
                $('.product-additional-info').css('display', 'block');
            }
            if ($(this).attr('id') == 'product-reviews-btn') {
                $('.product-additional-info').css('display', 'none');
                $('.product-description').css('display', 'none');
                $('.product-reviews').css('display', 'block');
            }
            if ($(this).attr('id') == 'product-description-btn') {
                $('.product-reviews').css('display', 'none');
                $('.product-additional-info').css('display', 'none');
                $('.product-description').css('display', 'block');
            }
        });
        $('.product_image_thumbnails').click(function() {
            $('.product_image').attr('src', $(this).attr('src'));
            $('.product_image').addClass('w3-animate-opacity');
            setTimeout(function() {
                $('.product_image').removeClass('w3-animate-opacity');
            }, 1000);
        });
    });
</script>

<?= $this->endSection() ?>