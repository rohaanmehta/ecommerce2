<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<!-- corousel -->
<div id="carouselExampleIndicators" style='z-index:-100;' class="carousel slide gap" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url('uploads/carousel1.webp') ?>" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url('uploads/carousel2.webp') ?>" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url('uploads/carousel3.webp') ?>" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- banner  for 6 images -->
<div class="" style="padding-left:10px;padding-right:10px;">
    <div class="row m-0 banner gap">
        <div class="col-lg-2 col-md-4 col-xs-6 text-center">
            <img class='banner_img rounded' src='<?= base_url('uploads/banner/banner1.jpg') ?>' />
        </div>
        <div class="col-lg-2 col-md-4 col-xs-6 text-center">
            <img class='banner_img rounded' src='<?= base_url('uploads/banner/banner2.jpg') ?>' />
        </div>
        <div class="col-lg-2 col-md-4 col-xs-6 text-center">
            <img class='banner_img rounded' src='<?= base_url('uploads/banner/banner3.jpg') ?>' />
        </div>
        <div class="col-lg-2 col-md-4 col-xs-6 text-center">
            <img class='banner_img rounded' src='<?= base_url('uploads/banner/banner4.jpg') ?>' />
        </div>
        <div class="col-lg-2 col-md-4 col-xs-6 text-center">
            <img class='banner_img rounded' src='<?= base_url('uploads/banner/banner5.jpg') ?>' />
        </div>
        <div class="col-lg-2 col-md-4 col-xs-6 text-center">
            <img class='banner_img rounded' src='<?= base_url('uploads/banner/banner6.jpg') ?>' />
        </div>
    </div>
</div>
<!-- product gallery for 10 items -->
<div class="" style="padding-left:10px;padding-right:10px;">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'>BEST SELLERS</p>
        <div class='text-center gap mobile_Head_Hide'><button class='btn rounded' style='background:#000;color:#fff;'>GO TO BEST SELLERS</button></div>
    </div>
    <div class="row m-0 gallery gap">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product1.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product2.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product3.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product4.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product5.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product6.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product7.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product8.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product3.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product4.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
    </div>
    <div class='text-center gap mobile_Head_Show' style='justify-content: center;'><button class='btn rounded-0' style='background:#000;color:#fff;'>GO TO BEST SELLERS</button></div>
</div>
<!-- banner for 4 images -->
<div class="" style="padding-left:10px;padding-right:10px;">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'>CRAZY DEALS</p>
    </div>
    <div class="row m-0 banner4 gap">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 text-center">
            <img class='banner_img_4 mb-4' src='<?= base_url('uploads/banner/crazydeals1.jpg') ?>' />
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 text-center">
            <img class='banner_img_4 mb-4' src='<?= base_url('uploads/banner/crazydeals2.jpg') ?>' />
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 text-center">
            <img class='banner_img_4 mb-4' src='<?= base_url('uploads/banner/crazydeals3.jpg') ?>' />
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 text-center">
            <img class='banner_img_4 mb-4' src='<?= base_url('uploads/banner/crazydeals4.jpg') ?>' />
        </div>
    </div>
</div>
<!-- banner for 1 images -->
<div class="" style="padding-left:10px;padding-right:10px;">
    <!-- <div class='galler_heading text-center'>
        <p style='font-size:35px;font-weight:700'>Coupons Corner</p>
    </div> -->
    <div class="row m-0 banner4 gap">
        <div class="col-12 text-center">
            <img style='width:100%' class='mb-4' src='<?= base_url('uploads/banner/banner_full.avif') ?>' />
        </div>
    </div>
</div>
<!-- product gallery for 5 items -->
<div class="" style="padding-left:10px;padding-right:10px;">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'>TRENDING WEAR</p>
        <div class='text-center gap mobile_Head_Hide'><button class='btn rounded' style='background:#000;color:#fff;'>GO TO TRENDING WEAR</button></div>
    </div>
    <div class="row m-0 gallery gap">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product4.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product5.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product6.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product7.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-3">
            <div class='p-3 gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/product8.webp') ?>' />
                <div class='text-left pt-3'>
                    <p class='mb-2'>$118</p>
                    <p>Men's Art Silk Embroided joghpuri Jacket</p>
                </div>
            </div>
        </div>
    </div>
    <div class='text-center gap mobile_Head_Show' style='justify-content: center;'><button class='btn rounded-0' style='background:#000;color:#fff;'>GO TO TRENDING WEAR</button></div>
</div>
<!-- banner for 2 images -->
<div class="" style="padding-left:10px;padding-right:10px;">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'>COUPONS CORNER</p>
    </div>
    <div class="row m-0 banner4 gap">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
            <img style='width:100%' class='mb-4' src='<?= base_url('uploads/banner/coupon1.jpg') ?>' />
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
            <img style='width:100%' class='mb-4' src='<?= base_url('uploads/banner/coupon2.jpg') ?>' />
        </div>
    </div>
</div>
<!-- Item slider 5 items-->
<div class="container-fluid product-slider gap">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'>SALE AND OFFERS </p>
        <div class='text-center gap mobile_Head_Hide'><button class='btn rounded' style='background:#000;color:#fff;'>GO TO SALE AND OFFERS </button></div>
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
    <div class='text-center gap mobile_Head_Show' style='justify-content: center;'><button class='btn rounded-0' style='background:#000;color:#fff;'>GO TO SALE AND OFFERS</button></div>
</div>

<!-- email signup   -->
<div class="row justify-content-center m-0 gap">
    <div class='col-lg-12 text-center col-md-12 mb-0 mt-4'>
        <p style='font-size:20px;font-weight:700;margin:0px'>BE IN THE KNOW AT NYKAA</p>
    </div>
    <div class='col-lg-12 text-center col-md-12 mb-4'>
        <p style='font-size:12px;font-weight:500;margin:0px'>Subscribe to hear about our sales, special discounts, and new product launches</p>
    </div>
    <div class='col-lg-12 col-md-12 mb-4 d-flex justify-content-center'>
        <input type="text" class="form-control rounded-0" placeholder="Enter your Email" style='width:220px' />
        <button class="btn rounded-0" style='background:#000;color:#fff'>Subscribe</button>
    </div>
</div>
<?= $this->endSection() ?>