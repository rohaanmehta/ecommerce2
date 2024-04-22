<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<!-- corousel -->
<div id="carouselExampleIndicators" style='z-index:-100;' class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php if (isset($slider)) {
            $i = 0;
            foreach ($slider as $row) { ?>
                <div class="carousel-item <?php if ($i == 0) {
                                                echo 'active';
                                            } ?>">
                    <img class="d-block w-100" src="<?= base_url('uploads/slider/' . $row->name) ?>" alt="corousel">
                </div>
        <?php $i++;
            }
        } ?>
    </div>
    <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->
</div>

<!-- maliaka Edit -->
<!-- landing padding-left -->
<!-- <div class='row p-3 pb-0 m-0 mb-4' id='philosophy' style='background:#7C0935;'>
    <div class='col-6 p-4'>
        <p class='h2 mb-3 text-light'>OUR PHILOSOPHY</p>
        <p style='font-size:15px;' class='text-light'>Cara, believes in redefining spaces to inspire lives. Our philosophy is rooted in the idea that every kitchen and living area should not just be functional, but also reflect the unique personality and lifestyle of its inhabitants. We strive to blend innovation with practicality, offering modular kitchen and furniture solutions that seamlessly adapt to diverse needs and preferences. From sleek and modern designs to timeless classics, our goal is to empower our customers to create spaces that they truly love to live in. With a commitment to quality craftsmanship and unparalleled customer service, we're dedicated to helping you transform your vision into reality, one modular piece at a time. Welcome to a world where your imagination knows no bounds, and your space becomes an expression of your individuality.</p>

    </div>
    <div class='col-6 p-0'>
        <img width='100%' src='<//?= base_url('/uploads/philosophy.jpg'); ?>'>
    </div>
</div> -->


<!-- banner  for 6 images -->
<?php if (isset($banner1)) { ?>
    <div class="" style="padding-left:10px;padding-right:10px;">
        <div class="row m-0 banner gap">
            <?php foreach ($banner1 as $row) { ?>
                <div class="col-lg-2 col-md-4 col-xs-6 text-center">
                    <img class='banner_img rounded' src='<?= base_url('uploads/banner/' . $row->name) ?>' />
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<!-- product gallery for 10 items -->
<div class="" style="padding-left:10px;padding-right:10px;">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'>FURNITURE</p>
        <!-- <div class='text-center gap mobile_Head_Hide'><button class='btn rounded' style='background:#7C0935;color:#fff;'> VIEW MORE </button></div> -->
    </div>

    <div class="row m-0 gallery gap">
        <?php if (isset($section1)) {
            include('section1.php');
        } ?>
    </div>
    <!-- <div class='text-center gap mobile_Head_Show' style='justify-content: center;'><button class='btn rounded-0' style='background:#000;color:#fff;'>GO TO BEST SELLERS</button></div> -->
</div>


<!-- mallika our story # -->
<!-- <div class='row p-3 pb-0 m-0 mb-5' style='background:#7C0935;'>
    <div class='col-6 p-0'>
        <img width='100%' src='<?= base_url('/uploads/story.jpg'); ?>'>
    </div>
    <div class='col-6 p-4' id='story'>
        <p class='h2 mb-3  text-light'>OUR STORY</p>
        <p style='font-size:15px;color:#dfdfdf' class=''>At the heart of Cara's ethos lies a dedication to quality craftsmanship and functional design. Established in 2003, Cara gained popularity with setting up its first showroom that displays kitchen layouts with aesthetic appeal and practical solutions to everyday living and furniture that suit specific room dimensions.
            Started by Ms.Mallika Shaikh, driven by a passion for innovation, continually pushes the boundaries of design, incorporating the latest trends and technological advancements to deliver products that exceed expectations. From sleek, minimalist kitchens to multifunctional furniture solutions, each Cara creation is a testament to the brand's commitment to elevating the way we live and interact with our surroundings.
            With Cara, the journey to a dream home begins with endless possibilities. Discover the art of modular living and transform your space with Cara's exquisite collection of kitchen and furniture designs. </p>
        <a href='<//?= base_url('/story'); ?>'><button class='btn bg-light text-dark'> Read More </button></a>
    </div>
</div> -->

<!-- banner for 4 images -->
<?php if (isset($banner2[0])) { ?>
    <div class="" style="padding-left:10px;padding-right:10px;">
        <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
            <p style='font-size:25px;'>OUR TOP FINISHES</p>
        </div>
        <div class="row m-0 banner4 gap">
            <?php foreach ($banner2 as $row) { ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 text-center">
                    <img class='banner_img_4 mb-4' src='<?= base_url('uploads/banner/' . $row->name) ?>' />
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<!-- banner for 1 images -->
<?php if (isset($banner3)) { ?>
    <div class="" style="padding-left:10px;padding-right:10px;">
        <!-- <div class='galler_heading text-center'>
        <p style='font-size:35px;font-weight:700'>Coupons Corner</p>
    </div> -->
        <div class="row m-0 banner4 gap">
            <?php foreach ($banner3 as $row) { ?>
                <div class="col-12 text-center">
                    <img style='width:100%' class='mb-4' src='<?= base_url('uploads/banner/' . $row->name) ?>' />
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<!-- product gallery for 5 items -->
<div class="" style="padding-left:10px;padding-right:10px;">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'>CHAIRS </p>
        <!-- <div class='text-center gap mobile_Head_Hide'><button class='btn rounded' style='background:#7C0935;color:#fff;'>VIEW MORE</button></div> -->
    </div>
    <div class="row m-0 gallery gap">
        <?php if (isset($section2)) {
            include('section2.php');
        } ?>
    </div>
    <!-- <div class='text-center gap mobile_Head_Show' style='justify-content: center;'><button class='btn rounded-0' style='background:#000;color:#fff;'>GO TO TRENDING WEAR</button></div> -->
</div>

<!-- banner for 2 images -->
<div class="" style="padding-left:10px;padding-right:10px;">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'>COUPONS CORNER</p>
    </div>
    <div class="row m-0 banner4 gap">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
            <img style='width:100%' class='mb-4' src='<?= base_url('uploads/banner/coupon1.png') ?>' />
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
            <img style='width:100%' class='mb-4' src='<?= base_url('uploads/banner/coupon1.png') ?>' />
        </div>
    </div>
</div>
<!-- Item slider 5 items-->
<!-- <div class="container-fluid product-slider gap">
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
</div> -->


<?php include('app\Views\Shop\Layout\reviewslider.php'); ?>

<?= $this->endSection() ?>