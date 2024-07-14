<?php
//dynamic variables
$topbar_bg = '#000';
$topbar_text_color = '#fff';
$topbar_link = base_url();
$category_color = '#ff1e82';
$header_color = '#ff1e82';
$category_color = '#ff1e82';
$session = session();
helper('custom_helper');
$website_images = website_settings();
$categories = get_categories_header();
$footersettings = footer_settings();
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php if (isset($meta_title)) {
                echo $meta_title . ' ';
            }
            echo  ucfirst(strtolower($_ENV['websitename'])) ?></title>

    <meta name=description content="<?php if (isset($meta_desc)) {
                                        echo $meta_desc . ' ';
                                    } ?>" id=desc>
    <meta name=keywords content="<?php if (isset($meta_keywords)) {
                                        echo $meta_keywords . ' ';
                                    } ?>" id=keywords>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <link media="all" rel="stylesheet" href="<?= base_url('assets/css/mobile_nav.scss'); ?>" crossorigin="anonymous">

    <link media="all" rel="stylesheet" href="<?= base_url('assets/css/googlefont.css'); ?>" crossorigin="anonymous">
    <!-- <link media="all" rel="stylesheet" href="<//?= base_url('assets/css/fontawesome.css'); ?>"> -->
    <link media="all" rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" crossorigin="anonymous">
    <link media="all" rel="stylesheet" href="<?= base_url('assets/css/lato.css'); ?>" crossorigin="anonymous">


    <!-- <link rel="stylesheet" href="https://unpkg.com/blaze-slider@latest/dist/blaze.css" /> -->


    <link media="all" rel="stylesheet" href="<?= base_url('assets/css/mystyle.css'); ?>">

    <link media="all" rel="stylesheet" href="<?= base_url('assets/css/blaze_slider.css'); ?>">
    <link media="all" rel="stylesheet" href="<?= base_url('assets/css/toastify.min.css'); ?>">

    <!-- used  -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://kit.fontawesome.com/a670e6a37e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->


    <!-- <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" media="all" rel="stylesheet"> -->
    <!-- <link media="all" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet"> -->



    <!-- unused -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->



    <!-- favicon -->
    <?php if (isset($website_images[0]->value_3) && !empty($website_images[0]->value_3)) { ?>
        <link rel="icon" type="image/x-icon" href="<?= base_url('uploads/website/' . $website_images[0]->value_3); ?>">
    <?php } ?>
</head>
<style>
</style>

<body style='position:relative'>
    <!-- blocker -->
    <div class='bg-dark blocker' style='display:none;width:100vw;min-height:100vh;opacity:0.4;position:fixed;margin-top:2px;z-index:2;'></div>
    <div class='bg-dark mobileblocker' style='display:none;width:100vw;min-height:100vh;opacity:0.4;position:fixed;margin-top:2px;z-index:2;'></div>
    <!-- //topbar   -->
    <!-- //top bar  -->

    <!-- <div class='col-lg-12 text-center top_Bar' style='background:<?= $topbar_bg ?>'>
        <a class='blink' href='<?= $topbar_link ?>' style='color:<?= $topbar_text_color ?>; text-decoration:none'>
            Transform Your Kitchen with Cara: Where Style Meets Functionality in Modular Design!
        </a>
    </div> -->

    <!--  header  -->
    <div class='col-lg-12 head_Section' id='myHeader'>
        <!-- mobile header  -->
        <div class='mobile_Head_Show' style='width:100%;justify-content:space-between;height:50px;'>
            <div style='display:flex;align-items: center;'>
                <span id="show-nav" class='show-nav mobile-nav-bar'><i class="show-nav mobile-nav-bar head_Icons fa fa-bars"></i></span>
                <!-- <a class='btn' onclick="openNav()" id='closebtn'><i id='ic' class='head_Icons fa fa-bars'></i></a> -->
                <?php if (isset($website_images[0]->value_2) && !empty($website_images[0]->value_2)) { ?>
                    <a href='<?= base_url() ?>'>
                        <img alt='logo' src='<?= base_url('uploads/website/' . $website_images[0]->value_2); ?>' height='52px' class='pl-3 pt-3 pb-3' />
                    </a>
                <?php } ?>
            </div>
            <div style="display:flex;align-self: center;text-align:end; justify-content:end" class=''>
                <div style='text-align:center;display:flex;'>
                    <a class='btn' href='<?= base_url("search") ?>'><i class='head_Icons fa fa-search'></i>
                    </a>
                </div>
                <div style='text-align:center;display:flex;'>
                    <a class='btn' href='<?= base_url("wishlist") ?>'><i class='head_Icons fa fa-heart'></i>
                    </a>
                </div>
                <div style='text-align:center;display:flex;'>
                    <a class='btn' href='<?= base_url("cart") ?>'><i class='head_Icons fa fa-shopping-bag'></i>
                    </a>
                </div>
            </div>
            <?php if (isset($categories) && !empty($categories)) {
                echo view('Shop/Layout/mobile_sidenav.php', ['categories' => $categories]);
            } ?>
        </div>
        <!-- pc header  -->
        <div class='d-flex col-lg-7 mobile_Head_Hide pt-3'>
            <?php if (isset($website_images[0]->value_1) && !empty($website_images[0]->value_1)) { ?>
                <a href='<?= base_url() ?>'>
                    <img alt='logo' src='<?= base_url('uploads/website/' . $website_images[0]->value_1); ?>' width='120px' class='p-3' />
                </a>
            <?php } ?>
            <div class='col-lg-12 text-center nav_Categories mobile_Head_Hide pb-1' style='background:#fff;'>
                <div class='nav_Categories_Btn_out' style='text-align:left;width: fit-content;height:100%;'>
                    <?php if (isset($categories) && !empty($categories)) {
                        foreach ($categories as $row) {
                            if ($row->parent_category == '') { ?>
                                <a class='link-none text-uppercase nav_Categories_Btn_out' href='<?= base_url('/' . $row->category_slug); ?>'><span class='nav_Categories_Btn hover_category ml-0 mt-0 mr-0 pt-2 pl-2 pr-2' showid='<?= $row->id; ?>'><?= $row->category_name ?></span></a>
                    <?php }
                        }
                    } ?>
                </div>
            </div>
        </div>

        <!-- search bar  -->

        <div class='col-lg-5 pt-3 pb-2 mobile_Head_Hide' style='display:flex;justify-content:end'>
            <div style="text-align:start;position:relative;" class='pl-0 exit-search'>
                <div class="mb-0 d-flex  justify-content-center mobile_Head_Hide search-wrapper exit-search">
                    <i class="fa fa-search font-awesome-icon exit-search" aria-hidden="true"></i>
                    <input type="text" class="form-control search-box exit-search" placeholder="Search for products">
                </div>
                <div class='search-results exit-search'>
                </div>
            </div>

            <div style="display:flex;align-self: center;text-align:end; justify-content:end" class=''>
                <!-- user     -->
                <div class='profile-hover' style='text-align:center;display:flex;position:relative'>
                    <a href='<?= base_url('/profile'); ?>' class='btn mobile_Head_Hide'>
                        <i class='head_Icons fa-light fa fa-user'></i>
                        <p style='color:#858585;padding-top:3px;font-size:12px;font-weight:600;margin-bottom:0px'>Profile</p>
                    </a>

                    <div class='profile-box'>
                        <b>
                            <p class='m-0'>Welcome</p>
                        </b>

                        <?php
                        if ($session->get('userid') == '') { ?>
                            <p style='font-weight:300'>To access account and manage orders</p>
                            <button class='btn btn-outline-dark mb-3' data-toggle="modal" data-target="#loginexampleModal">Login / Signup</button>
                        <?php } else { ?>
                            <p style='font-weight:300' class='mb-2'><?= $session->get('username') ?></p>
                        <?php } ?>

                        <hr style='width:100%;border-width:1px;margin-top:0px;margin-bottom:10px;'>
                        </hr>
                        <?php if ($session->get('userid') == '') { ?>
                            <a href='<?= base_url(); ?>' class='profile-box-links' style='text-decoration:none' data-toggle="modal" data-target="#loginexampleModal"> Profile </a><br>
                            <a href='<?= base_url(); ?>' class='profile-box-links' style='text-decoration:none' data-toggle="modal" data-target="#loginexampleModal"> Orders </a><br>
                            <a href='<?= base_url(); ?>' class='profile-box-links' style='text-decoration:none' data-toggle="modal" data-target="#loginexampleModal"> Wishlist </a><br>
                            <a href='<?= base_url('profile/coupons'); ?>' class='profile-box-links' style='text-decoration:none'> Coupons </a>
                        <?php } else { ?>
                            <?php
                            if ($session->get('role') == 'admin') { ?>
                                <a target='_blank' href='<?= base_url('Admin/dashboard'); ?>' class='profile-box-links' style='text-decoration:none'> Go to Admin </a><br>
                            <?php } ?>
                            <a href='<?= base_url('/profile'); ?>' class='profile-box-links' style='text-decoration:none'> Profile </a><br>
                            <a href='<?= base_url('/profile/myorders'); ?>' class='profile-box-links' style='text-decoration:none'> Orders </a><br>
                            <a href='<?= base_url('/wishlist'); ?>' class='profile-box-links' style='text-decoration:none'> Wishlist </a><br>
                            <a href='<?= base_url('profile/coupons'); ?>' class='profile-box-links' style='text-decoration:none'> Coupons </a><br>
                            <a href='<?= base_url("logout") ?>' class='profile-box-links' style='text-decoration:none'>Logout</a>
                        <?php } ?>
                    </div>
                </div>
                <!-- wishlist  -->
                <div style='text-align:center;display:flex;position:relative'>
                    <a class='btn mobile_Head_Hide' href='<?= base_url("wishlist") ?>'><i class='head_Icons fa-light fa fa-heart'></i>
                        <p style='color:#858585;padding-top:3px;font-size:12px;font-weight:600;margin-bottom:0px'>Wishlist</p>
                    </a>
                    
                    <?php
                    if ($session->get('userid') != '') { 
                        $wishlist_total = get_wishlist_count($session->get('userid'));
                        if($wishlist_total > 0 ){?>
                        <span class="mybadge"><?= $wishlist_total ?></span>
                    <?php } } ?>

                </div>
                <div style='text-align:center;display:flex;position:relative'>
                    <a class='btn mobile_Head_Hide' href='<?= base_url("cart") ?>'><i class='head_Icons fa fa-shopping-bag'></i>
                        <p style='color:#858585;padding-top:3px;font-size:12px;font-weight:600;margin-bottom:0px'>Cart</p>
                    </a>
                    <?php
                        $cart_total = get_cart_count();
                        if($cart_total > 0 ){?>
                        <span class="mybadgecart"><?= $cart_total ?></span>
                    <?php }  ?>
                </div>
            </div>
        </div>
    </div>
    <!-- multiple categories pc  -->
    <div class='d-flex justify-content-center' style='position:relative;'>
        <div class='nav_Categories_Btn_out_box' style='display:none;min-height:300px;z-index:1;width:80%;margin-top:0px;padding: 30px;padding-top:0px;border: 1px solid #e7e7e7;border-top:none;position:fixed;background:#fff;'></div>
        <?php if (isset($categories) && !empty($categories)) {
            foreach ($categories as $row_main) {
                if ($row_main->parent_category == '') {  ?>
                    <div id='' showid='<?= $row_main->id; ?>' style='max-height:300px;z-index:3;width:80%;margin-top:2px;display:none;padding: 30px;padding-top:0px;border: 1px solid #e7e7e7;border-top:none;position:fixed;background:#fff' class='show<?= $row_main->id ?> pb-3 text-left allcategories allcategories-show'>
                        <div class='nav_Categories_Sub_Menu_Tittle allcategories-show' style='border-right:1px solid #dfdfdf;width:180px;height:300px;display:flex;flex-wrap:wrap;flex-direction:column'>
                            <?php
                            foreach ($categories as $row) {
                                if ($row->parent_category == $row_main->id) { ?>
                                    <a class='link-none text-capitalize' href='<?= base_url('/' . $row->category_slug); ?>'>
                                        <div class='nav_Categories_Sub_Menu_Tittle allcategories-show' style='color: <?= $category_color ?>'><?= $row->category_name ?></div>
                                    </a>
                                    <?php foreach ($categories as $row3) {
                                        if ($row3->parent_category == $row->id) { ?>
                                            <a class='link-none text-capitalize' href='<?= base_url('/' . $row3->category_slug); ?>'>
                                                <div class='nav_Categories_Sub_Menu_Item allcategories-show'><?= $row3->category_name; ?></div>
                                            </a>
                                    <?php }
                                    } ?>
                            <?php }
                            } ?>
                        </div>
                    </div>
        <?php }
            }
        } ?>
    </div>

    <?= $this->renderSection('content') ?>

    <!-- back to top button  -->
    <?php if (isset($footersettings['footer'][0]->backtotop) && !empty($footersettings['footer'][0]->backtotop) && $footersettings['footer'][0]->backtotop == '1') { ?>
        <a id="back-to-top"></a>
    <?php } ?>

    <?php include('footer.php'); ?>

    <!-- login modal  -->
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginexampleModal">
        Launch demo modal
    </button> -->

    <?php include('login.php'); ?>

    <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>

    <!-- //slider -->
    <script async defer type="text/javascript" src="<?= base_url('assets/js/blaze.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/blaze.js'); ?>"></script>


    <script async defer type="text/javascript" src="<?= base_url('assets/js/fontawesome.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/bootsrap.min.js'); ?>"></script>

    <!-- <script async defer type="text/javascript" src="<//?= base_url('assets/js/popper.min.js'); ?>"></script> -->

    <!-- <Script src='https://unpkg.com/blaze-slider@latest/dist/blaze-slider.min.js'></script> -->
    <!-- <Script src='https://unpkg.com/blaze-slider@latest/dist/blaze-slider.dev.js'></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script async defer type="text/javascript" src="<?= base_url('assets/js/toastify.js'); ?>"></script>

    <?= $this->renderSection('scripts') ?>

    <script>
        //top bar 
        // window.onscroll = function() {
        //     myFunction()
        // };
        var btn = $('#back-to-top');

        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, '500');
        });

        $(document).ready(function() {
            $('.login-form').submit(function(e) {
                e.preventDefault();
                $('.login_Input_submit').attr('disabled', true);
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('login-user') ?>",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        $('#loginmsg').css('display', 'none');

                        if (data.error == true) {
                            $.each(data, function(key, value) {
                                if (value) {
                                    $("#" + key).addClass("border-danger");
                                } else {
                                    $("#" + key).removeClass("border-danger");
                                }
                            });
                            $('.login_Input_submit').attr('disabled', false);
                            return false;
                        }
                        if (data.loggedin == false) {
                            $('#loginmsg').css('display', 'block');
                            $('.login_Input_submit').attr('disabled', false);
                            return false;
                        }

                        if (data.error == false && data.loggedin == true) {
                            // setTimeout(function() {
                                window.location.reload();
                            // }, 500);
                        }
                    }
                });
            });

            // setTimeout(function() {
            if ($(window).width() > 768) {
                $('.single-product-slider').css('display', 'block');
                $('.mobile-product-slider').css('display', 'none');
                // load_product_sliders();
            } else {
                $('.single-product-slider').css('display', 'none');
                $('.mobile-product-slider').css('display', 'block');
            }
            // }, 500);
            var productslider;

            $('.main-product-slider').hover(
                function() {
                    $(this).find('.product-slider-image').css('display', 'block')
                    var index = $('.main-product-slider').index(this);

                    var el3 = document.querySelectorAll('.single-product-slider')[index];
                    productslider = new BlazeSlider(el3, {
                        all: {
                            draggable: false,
                            enableAutoplay: true,
                            autoplayInterval: 1500,
                            transitionDuration: 300,
                            slidesToShow: 1,
                            loop: true,
                            slideGap: "0px",
                        },
                    });
                },

                function() {
                    $(this).find('.product-slider-image').css('display', 'none')
                    productslider.destroy();
                }
            );

            $('.addtowishlist').click(function(e) {
                e.preventDefault();
                if ($(this).attr('data-target') == '') {
                    if ($(this).children().attr('class') == 'fa fa-heart') {
                        $(this).children().attr('class', 'fa fa-heart-o');
                    } else {
                        $(this).children().attr('class', 'fa fa-heart');
                    }

                    // console.log($(this).children().attr('class'));
                    // return false;
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('add-to-wishlist') ?>",
                        data: {
                            productid: $(this).attr('id')
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.status == 200) {
                                Toastify({
                                    text: data.msg,
                                    duration: 3000,
                                    destination: "<?= base_url('/wishlist'); ?>",
                                }).showToast();
                            } else {
                                // alert('something went wrong');
                            }
                        }
                    });
                }
            });

            $('.add-to-wishlist').click(function(e) {
                e.preventDefault();
                if ($(this).attr('data-target') == '') {
                    if ($(this).children().attr('class') == 'fa fa-heart mr-1') {
                        $(this).children().attr('class', 'fa fa-heart-o mr-1');
                    } else {
                        $(this).children().attr('class', 'fa fa-heart mr-1');
                    }

                    // console.log($(this).children().attr('class'));
                    // return false;
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('add-to-wishlist') ?>",
                        data: {
                            productid: $(this).attr('id')
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.status == 200) {
                                // alert('product added to wishlist');
                                Toastify({
                                    text: data.msg,
                                    duration: 3000,
                                    destination: "<?= base_url('/wishlist'); ?>",
                                }).showToast();

                            } else {
                                // alert('something went wrong');
                            }
                        }
                    });
                }
            });

            $('.add-to-wishlist-mobile').click(function(e) {
                e.preventDefault();
                if ($(this).attr('data-target') == '') {
                    if ($(this).attr('class') == 'fa fa-heart mr-1 add-to-wishlist-mobile') {
                        $(this).attr('class', 'fa fa-heart-o mr-1 add-to-wishlist-mobile');
                    } else {
                        $(this).attr('class', 'fa fa-heart mr-1 add-to-wishlist-mobile');
                    }

                    // console.log($(this).children().attr('class'));
                    // return false;
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('add-to-wishlist') ?>",
                        data: {
                            productid: $(this).attr('id')
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.status == 200) {
                                // alert('product added to wishlist');
                                Toastify({
                                    text: data.msg,
                                    duration: 3000,
                                    destination: "<?= base_url('/wishlist'); ?>",
                                }).showToast();

                            } else {
                                // alert('something went wrong');
                            }
                        }
                    });
                }
            });


            $('.search-box').keyup(function() {
                if ($('.search-box').val().length >= 4) {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('search-product') ?>",
                        data: {
                            search: $('.search-box').val()
                        },
                        dataType: "json",
                        success: function(data) {
                            $('.search-results').html('');
                            for (var i = 0; i < data.product.length; i++) {
                                var html = "<a class='exit-search' style='text-decoration:none' href='<?= base_url('products/') ?>" + data.product[i]['product_slug'] + "'><div class='search-item row p-2 exit-search'><div class='col-3 text-center exit-search'><img height='50px' src='<?= base_url('uploads/product_images/') ?>" + data.product[i]['image_name1'] + "'></div><div class='col-8 p-0 exit-search'><p class='mb-0 search-product-title exit-search'>" + data.product[i]['title'] + "</p></div></div></a>";
                                $('.search-results').append(html);
                            }
                            // console.log(data);
                            // console.log(data.product.length);
                        }
                    });
                }
            });
            // myFunction();
            $('#itemslider').carousel({
                interval: 3000,
                interval: false
            });

            $('.carousel-showmanymoveone .item').each(function() {
                var itemToClone = $(this);

                for (var i = 1; i < 5; i++) {
                    itemToClone = itemToClone.next();

                    if (!itemToClone.length) {
                        itemToClone = $(this).siblings(':first');
                    }

                    itemToClone.children(':first-child').clone()
                        .addClass("cloneditem-" + (i))
                        .appendTo($(this));
                }
            });
        });

        $('body').mouseover(function(evnt) {
            if (!$(evnt.target).hasClass('hover_category') && !$(evnt.target).hasClass('allcategories') && !$(evnt.target).hasClass('allcategories-show')) {
                // setTimeout(function() {
                $('.allcategories').css('display', 'none');
                $('.hover_category').css('border-bottom', 'none');
                // }, 1000);
            }

            if (!$(evnt.target).hasClass('nav_Categories_Btn_out') && !$(evnt.target).hasClass('hover_category') && !$(evnt.target).hasClass('allcategories') && !$(evnt.target).hasClass('allcategories-show')) {
                $('.blocker').css('display', 'none');
                $('.nav_Categories_Btn_out_box').css('display', 'none');
            };

        });

        $('body').click(function(evnt) {
            if ($(evnt.target).hasClass('exit-search')) {
                // $('.search-results').html('');
            } else {
                $('.search-results').html('');
            }

            if (!$(evnt.target).hasClass('mobile-nav-bar') && $('#show-nav').hasClass('open')) {
                $('#show-nav').trigger('click');
                $('.mobileblocker').css('display', 'none');
                document.body.style.overflow = 'auto';
            }
        });

        $('.show-nav').click(function() {
            $('.mobileblocker').css('display', 'block');
        });

        $('.hover_category').hover(
            function() {
                $('.allcategories').css('display', 'none');
                var d = '.show' + $(this).attr('showid') + '';
                $(d).css('display', 'block');
                $('.hover_category').css('border-bottom', 'none');
                $(this).css('border-bottom', ' 5px <?= 'solid ' . $category_color ?>');
            }
        );

        $('.nav_Categories_Btn_out').hover(
            function() {
                $('.blocker').css('display', 'block');
                $('.nav_Categories_Btn_out_box').css('display', 'block');
            }
        );
    </script>
</body>

</html>