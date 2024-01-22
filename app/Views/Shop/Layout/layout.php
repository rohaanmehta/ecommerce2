<?php
//dynamic variables
$topbar_bg = '#ff1e82';
$topbar_text_color = 'white';
$topbar_link = base_url();
$category_color = '#ff1e82';
?>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a670e6a37e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        * {
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
        }

        #slider-text {
            padding-top: 40px;
            display: block;
        }

        #slider-text .col-md-6 {
            overflow: hidden;
        }

        #slider-text h2 {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: 400;
            font-size: 30px;
            letter-spacing: 3px;
            margin: 30px auto;
            padding-left: 40px;
        }

        #slider-text h2::after {
            border-top: 2px solid #c7c7c7;
            content: "";
            position: absolute;
            bottom: 35px;
            width: 100%;
        }

        #itemslider h4 {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: 400;
            font-size: 12px;
            margin: 10px auto 3px;
        }

        #itemslider h5 {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: bold;
            font-size: 12px;
            margin: 3px auto 2px;
        }

        #itemslider h6 {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: 300;
            ;
            font-size: 10px;
            margin: 2px auto 5px;
        }

        .badge {
            background: #b20c0c;
            position: absolute;
            height: 40px;
            width: 40px;
            border-radius: 50%;
            line-height: 31px;
            font-family: 'Josefin Sans', sans-serif;
            font-weight: 300;
            font-size: 14px;
            border: 2px solid #FFF;
            box-shadow: 0 0 0 1px #b20c0c;
            top: 5px;
            right: 25%;
        }

        #slider-control img {
            padding-top: 60%;
            margin: 0 auto;
        }

        @media screen and (max-width: 992px) {
            #slider-control img {
                padding-top: 70px;
                margin: 0 auto;
            }
        }

        .carousel-showmanymoveone .carousel-control {
            /* width: 4%; */
            background-image: none;
            /* margin-top: 160px; */
        }

        /* .carousel-showmanymoveone .carousel-control.left {
            margin-left: 0px;
        } */

        .carousel-showmanymoveone .cloneditem-1,
        .carousel-showmanymoveone .cloneditem-2,
        .carousel-showmanymoveone .cloneditem-3,
        .carousel-showmanymoveone .cloneditem-4,
        .carousel-showmanymoveone .cloneditem-5 {
            display: none;
        }

        @media all and (min-width: 300px) {

            .carousel-showmanymoveone .carousel-inner>.active.left,
            .carousel-showmanymoveone .carousel-inner>.prev {
                left: -50%;
            }

            .carousel-showmanymoveone .carousel-inner>.active.right,
            .carousel-showmanymoveone .carousel-inner>.next {
                left: 50%;
            }

            .carousel-showmanymoveone .carousel-inner>.left,
            .carousel-showmanymoveone .carousel-inner>.prev.right,
            .carousel-showmanymoveone .carousel-inner>.active {
                left: 0;
            }

            .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
                display: block;
            }

            /* .carousel-showmanymoveone .carousel-inner .cloneditem-2 {
                display: block;
            } */
            .item .col-xs-12 {
                width: 50% !important;
            }

            .item .col-xs-2 {
                max-width: 50% !important;
            }
        }


        @media all and (min-width: 425px) and (transform-3d),
        all and (min-width: 425px) and (-webkit-transform-3d) {

            .carousel-showmanymoveone .carousel-inner>.item.active.right,
            .carousel-showmanymoveone .carousel-inner>.item.next {
                -webkit-transform: translate3d(50%, 0, 0);
                transform: translate3d(50%, 0, 0);
                left: 0;
            }

            .carousel-showmanymoveone .carousel-inner>.item.active.left,
            .carousel-showmanymoveone .carousel-inner>.item.prev {
                -webkit-transform: translate3d(-50%, 0, 0);
                transform: translate3d(-50%, 0, 0);
                left: 0;
            }

            .carousel-showmanymoveone .carousel-inner>.item.left,
            .carousel-showmanymoveone .carousel-inner>.item.prev.right,
            .carousel-showmanymoveone .carousel-inner>.item.active {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
                left: 0;
            }

            /* .carousel-showmanymoveone .carousel-control.left {
                margin-left: -18px;
            }

            .carousel-showmanymoveone .carousel-control.right {
                margin-right: 10px;
            } */
        }

        @media all and (min-width: 576px) {

            .carousel-showmanymoveone .carousel-inner>.active.left,
            .carousel-showmanymoveone .carousel-inner>.prev {
                left: -20%;
            }

            .carousel-showmanymoveone .carousel-inner>.active.right,
            .carousel-showmanymoveone .carousel-inner>.next {
                left: 20%;
            }

            .carousel-showmanymoveone .carousel-inner>.left,
            .carousel-showmanymoveone .carousel-inner>.prev.right,
            .carousel-showmanymoveone .carousel-inner>.active {
                left: 0;
            }

            .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
                display: block;
            }

            .carousel-showmanymoveone .carousel-inner .cloneditem-2 {
                display: block;
            }

            /* .carousel-showmanymoveone .carousel-inner .cloneditem-3 {
                display: block;
            } */

            /* .carousel-showmanymoveone .carousel-inner .cloneditem-4 {
                display: block;
            } */
            /* .carousel-showmanymoveone .carousel-control.left {
                margin-left: -12px;
            }

            .carousel-showmanymoveone .carousel-control.right {
                margin-right: 5px;
            } */
        }

        @media all and (min-width: 576px) and (transform-3d),
        all and (min-width: 576px) and (-webkit-transform-3d) {

            .carousel-showmanymoveone .carousel-inner>.item.active.right,
            .carousel-showmanymoveone .carousel-inner>.item.next {
                -webkit-transform: translate3d(33.333%, 0, 0);
                transform: translate3d(33.333%, 0, 0);
                left: 0;
            }

            .carousel-showmanymoveone .carousel-inner>.item.active.left,
            .carousel-showmanymoveone .carousel-inner>.item.prev {
                -webkit-transform: translate3d(-33.333%, 0, 0);
                transform: translate3d(-33.333%, 0, 0);
                left: 0;
            }

            .carousel-showmanymoveone .carousel-inner>.item.left,
            .carousel-showmanymoveone .carousel-inner>.item.prev.right,
            .carousel-showmanymoveone .carousel-inner>.item.active {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
                left: 0;
            }

            .item .col-xs-12 {
                width: 33.333% !important;
            }

            .item .col-md-2 {
                max-width: 33.333% !important;
            }

        }

        @media all and (min-width: 900px) {

            .carousel-showmanymoveone .carousel-inner>.active.left,
            .carousel-showmanymoveone .carousel-inner>.prev {
                left: -20%;
            }

            .carousel-showmanymoveone .carousel-inner>.active.right,
            .carousel-showmanymoveone .carousel-inner>.next {
                left: 20%;
            }

            .carousel-showmanymoveone .carousel-inner>.left,
            .carousel-showmanymoveone .carousel-inner>.prev.right,
            .carousel-showmanymoveone .carousel-inner>.active {
                left: 0;
            }

            .carousel-showmanymoveone .carousel-inner .cloneditem-2,
            .carousel-showmanymoveone .carousel-inner .cloneditem-3,
            .carousel-showmanymoveone .carousel-inner .cloneditem-4,
            .carousel-showmanymoveone .carousel-inner .cloneditem-5,
            .carousel-showmanymoveone .carousel-inner .cloneditem-6 {
                display: block;
            }
        }

        @media all and (min-width: 900px) and (transform-3d),
        all and (min-width: 900px) and (-webkit-transform-3d) {

            .carousel-showmanymoveone .carousel-inner>.item.active.right,
            .carousel-showmanymoveone .carousel-inner>.item.next {
                -webkit-transform: translate3d(20%, 0, 0);
                transform: translate3d(20%, 0, 0);
                left: 0;
            }

            .carousel-showmanymoveone .carousel-inner>.item.active.left,
            .carousel-showmanymoveone .carousel-inner>.item.prev {
                -webkit-transform: translate3d(-20%, 0, 0);
                transform: translate3d(-20%, 0, 0);
                left: 0;
            }

            .carousel-showmanymoveone .carousel-inner>.item.left,
            .carousel-showmanymoveone .carousel-inner>.item.prev.right,
            .carousel-showmanymoveone .carousel-inner>.item.active {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
                left: 0;
            }

            .item .col-lg-2 {
                width: 20% !important;
            }

            .item .col-md-2 {
                max-width: 20% !important;
            }

            /* .carousel-showmanymoveone .carousel-control.left {
                margin-left: 0px;
            } */
        }

        .carousel-control {
            opacity: 1 !important;
            top: 60%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .carousel-showmanymoveone .carousel-control.right {
            right: -11px !important;
            width: auto !important;
        }

        .carousel-showmanymoveone .carousel-control.left {
            left: -11px !important;
            width: auto !important;
        }


        .product-slider-img {
            position: relative;
        }

        .add-to-cart {
            display: none;
            position: absolute;
            bottom: 15%;
            left: 50%;
            transform: translate(-50%, 15%);
        }

        .product-slider-img:hover .add-to-cart {
            display: flex !important;
        }

        .add-to-cart-btn,
        .wishlist-btn {
            color: #7b838d;
        }

        .add-to-cart-btn-outer,
        .wishlist-btn-outer {
            color: #e5e5e5d9;
            box-shadow: #A1ADB9;
        }

        /* top bar */
        .top_Bar {
            background-color: #000;
            color: #fff;
            padding: 8px;
            font-size: 15px;
            font-weight: bolder;
        }

        /* nav categories */
        .nav_Categories {
            background-color: #fff;
            position: relative;
            padding: 15px;
        }

        .nav_Categories_Btn {
            padding: 0px 15px 0px 15px;
            font-size: 13px;
            cursor: pointer;
            color: #707070;
            font-weight: 800;
        }

        .nav_Categories_Btn:hover {
            border-bottom: 3px <?= 'solid ' . $category_color ?>;
            padding-bottom: 28px;
        }

        .nav_Categories_Sub_Menu {
            background-color: #fff;
            display: none;
            /* display: block; */
            width: 75vw;
            /* width: 100%; */
            /* padding: 50px; */
            position: absolute;
            left: 0;
            right: 0;
            /* top:0; */
            z-index: 100000;
            padding: 30px;
        }

        .nav_Categories_Sub_Menu_Tittle {
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            padding-bottom: 7px;
        }

        .nav_Categories_Sub_Menu_Item {
            color: #404040;
            padding: 2px;
            font-size: 11px;
            font-weight: 500;
            cursor: pointer;
        }

        .nav_Categories_Sub_Menu_Item:hover {
            color: #404040;
            font-weight: 800;
        }

        .nav_Categories_Sub_Menu_Tittle:hover {
            /* border-bottom: 1px solid #000; */
        }

        .anim_menu {
            transition: 10s;
            transform: translateY(1%);
            display: block !important;
        }

        /* head section */
        .head_Section {
            display: flex;
            justify-content: space-between;
            box-shadow: -1px 1px 1px 1px #f3f3f3;
        }

        .head_Icons {
            font-size: 20px;
            background: #0000;
            color: #a5a5a5;
            align-self: center;
        }

        /* banner */
        .banner,
        .banner4 {
            display: flex;
            justify-content: space-around;
        }

        .gap {
            margin-bottom: 35px !important;
        }


        @media all and (min-width: 450px) and (transform-3d),
        all and (min-width: 450px) and (-webkit-transform-3d) {
            .banner .col-xs-6 {
                width: 33.333% !important;
            }
        }

        .banner_img {
            width: 100%;
        }

        .banner_img_4 {
            width: 100%;
        }

        .banner .col-xs-6 .banner_img {
            margin-bottom: 15px;
            margin-top: 15px;
        }

        /* product gallery   */
        .gallery_img {
            width: 100%;
        }

        .gallery_container {
            margin: auto;
            width: 95%;
            border: 1px solid #dfdfdf;
        }

        @media all and (min-width: 450px) and (transform-3d),
        all and (min-width: 450px) and (-webkit-transform-3d) {
            .gallery .col-xs-6 {
                /* width: 50% !important; */
                max-width: 20%;
            }
        }

        @media all and (max-width: 500px) and (transform-3d),
        all and (max-width: 500px) and (-webkit-transform-3d) {
            .gallery_container {
                width: 100%;
            }
        }

        /* header mobile responsive */
        .mobile_Head_Show {
            display: none;
        }

        .mobile_Head_Hide {
            display: inline;
        }

        .shop_Name {
            font-size: 45px;
            text-align: center;
        }

        @media all and (max-width: 768px) and (transform-3d),
        all and (max-width: 768px) and (-webkit-transform-3d) {
            .mobile_Head_Show {
                display: flex;
            }

            .mobile_Head_Hide {
                display: none !important;
            }

            .shop_Name {
                font-size: 25px;
            }
        }

        /* header nav bar  */

        @media screen and (max-width: 760px) {
            #navbar-right {
                display: none;
            }
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 999;
            top: 0;
            left: 0;
            background-color: #fff;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 5px;
            max-width: 250px;
        }

        .sidenav .mobile-menu-bars {
            text-decoration: none;
            font-size: 12px;
            font-weight: 800;
            color: #686868;
            display: block;
            transition: 0.3s;
            padding: 12px 0px 12px 25px;
            border-bottom: 1px solid #e1e1e1;
        }

        .sidenav a:hover {
            color: #000;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* scrollbar  */

        /* footeer   \ */
        .footer_Col {
            width: 80%;
            margin: auto;
        }

        @media all and (max-width: 768px) and (transform-3d),
        all and (max-width: 768px) and (-webkit-transform-3d) {
            .footer_Col {
                width: 100%;
                margin: 0;
            }
        }

        .footer_Tittle {
            color: #fff;
            font-size: 14px;
            font-weight: 700;
        }

        .footer_Opt a {
            font-size: 11px;
            font-weight: 500;
            color: #fff;
        }

        .search-box {
            background-color: #f4f4f4;
            height: 45px;
            padding-left: 40px;
            font-size: 15px;
            border-radius: 8px;
            margin-right: 15px;
        }

        .search-wrapper {
            position: relative;
        }

        .font-awesome-icon {
            position: absolute;
            left: 10px;
            top: 13px;
            font-size: 20px;
            color: #b9b9b9;
            font-family: 'FontAwesome';
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #fff;
            z-index: 100;
        }

        .sticky+.content {
            padding-top: 102px;
        }
    </style>
</head>

<body>
    <!-- //topbar   -->
    <!-- //top bar  -->
    <div class='col-lg-12 text-center top_Bar' style='background:<?= $topbar_bg ?>'>
        <a href='<?= $topbar_link ?>' style='color:<?= $topbar_text_color ?>; text-decoration:none'>
            Delightful Deals Await! Shop From Our Republic Day Sale Now!
        </a>
    </div>
    <!-- header  -->
    <div class='col-lg-12 head_Section' id='myHeader'>
        <!-- mobile header  -->
        <div class='mobile_Head_Show' style='width:100%;justify-content:space-between'>
            <div style='display:flex;align-items: center;'>
                <a class='btn' onclick="openNav()" id='closebtn'><i id='ic' class='head_Icons fa fa-bars'></i></a>
                <a href='<?= base_url() ?>'>
                    <img src='<?= base_url('uploads/logo/logo.jpg'); ?>' width='90px' class='p-3' />
                </a>
            </div>
            <div style="display:flex;align-self: center;text-align:end; justify-content:end" class=''>
                <div style='text-align:center;display:flex;'>
                    <a class='btn' href='<?= base_url("login") ?>'>
                        <i class='head_Icons fa-light fa fa-user'></i>
                    </a>
                </div>
                <div style='text-align:center;display:flex;'>
                    <a class='btn' href='<?= base_url("login") ?>'><i class='head_Icons fa fa-heart'></i>
                    </a>
                </div>
                <div style='text-align:center;display:flex;'>
                    <a class='btn' href='<?= base_url("cart") ?>'><i class='head_Icons fa fa-shopping-bag'></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- pc header  -->
        <div class='d-flex col-lg-7 mobile_Head_Hide pt-4'>
            <a href='<?= base_url() ?>'>
                <img src='<?= base_url('uploads/logo/logo.jpg'); ?>' width='120px' class='p-3' />
            </a>
            <div class='col-lg-12 text-center nav_Categories mobile_Head_Hide pb-1'>
                <div class='nav_Categories_Btn_Hover' style='text-align:left'>
                    <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='11'>MEN</span>
                    <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='12'>WOMEN</span>
                    <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='13'>KIDS</span>
                    <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='14'>HOME & LIVING</span>
                    <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='14'>BEAUTY</span>
                </div>
                <div style='margin-top: 28px;border-top: 2px solid #e7e7e7;' class='pb-5 nav_Categories_Sub_Menu nav_Categories_Btn_Hover'>
                    <div class='row'>
                        <div class='col-lg-2 text-left'>
                            <div class='nav_Categories_Sub_Menu_Tittle' style='color: <?= $category_color ?>'>Fabric</div>
                            <div class='nav_Categories_Sub_Menu_Item'>COTTON</div>
                            <div class='nav_Categories_Sub_Menu_Item'>SILK</div>
                            <div class='nav_Categories_Sub_Menu_Item'>VELVET</div>
                            <div class='nav_Categories_Sub_Menu_Item'>POLYTHENE</div>
                            <div class='nav_Categories_Sub_Menu_Item'>SOFT FABRIC</div>
                        </div>
                        <div class='col-lg-2 text-left'>
                            <div class='nav_Categories_Sub_Menu_Tittle' style='color: <?= $category_color ?>'>Occassion</div>
                            <div class='nav_Categories_Sub_Menu_Item'>COTTON</div>
                            <div class='nav_Categories_Sub_Menu_Item'>SILK</div>
                            <div class='nav_Categories_Sub_Menu_Item'>VELVET</div>
                            <div class='nav_Categories_Sub_Menu_Item'>POLYTHENE</div>
                            <div class='nav_Categories_Sub_Menu_Item'>SOFT FABRIC</div>
                        </div>
                        <div class='col-lg-2 text-left'>
                            <div class='nav_Categories_Sub_Menu_Tittle' style='color: <?= $category_color ?>'>Material</div>
                            <div class='nav_Categories_Sub_Menu_Item'>COTTON</div>
                            <div class='nav_Categories_Sub_Menu_Item'>SILK</div>
                            <div class='nav_Categories_Sub_Menu_Item'>VELVET</div>
                            <div class='nav_Categories_Sub_Menu_Item'>POLYTHENE</div>
                            <div class='nav_Categories_Sub_Menu_Item'>SOFT FABRIC</div>
                        </div>
                        <div class='col-lg-2 text-left'>
                            <div class='nav_Categories_Sub_Menu_Tittle' style='color: <?= $category_color ?>'>Work</div>
                            <div class='nav_Categories_Sub_Menu_Item'>COTTON</div>
                            <div class='nav_Categories_Sub_Menu_Item'>SILK</div>
                            <div class='nav_Categories_Sub_Menu_Item'>VELVET</div>
                            <div class='nav_Categories_Sub_Menu_Item'>POLYTHENE</div>
                            <div class='nav_Categories_Sub_Menu_Item'>SOFT FABRIC</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-lg-5 pt-4 mobile_Head_Hide' style='display:flex;justify-content:end'>
            <div style="text-align:start;" class='pl-0'>
                <div class="mb-3 d-flex  justify-content-center mobile_Head_Hide search-wrapper">
                    <i class="fa fa-search font-awesome-icon" aria-hidden="true"></i>
                    <input type="text" class="form-control search-box" placeholder="Search on Nykaa" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <!-- <button class="btn rounded-0" style='background:#000;color:#fff'><i class='fa fa-search'></i></button> -->
                </div>
            </div>
            <div style="display:flex;align-self: center;text-align:end; justify-content:end" class=''>
                <div style='text-align:center;display:flex;'>
                    <a class='btn mobile_Head_Hide' href='<?= base_url("login") ?>'>
                        <i class='head_Icons fa-light fa fa-user'></i>
                        <p style='color:#858585;padding-top:3px;font-size:12px;font-weight:600'>Login</p>
                    </a>
                </div>
                <div style='text-align:center;display:flex;'>
                    <a class='btn mobile_Head_Hide' href='<?= base_url("login") ?>'><i class='head_Icons fa fa-heart'></i>
                        <p style='color:#858585;padding-top:3px;font-size:12px;font-weight:600'>Wishlist</p>
                    </a>
                </div>
                <div style='text-align:center;display:flex;'>
                    <a class='btn mobile_Head_Hide' href='<?= base_url("cart") ?>'><i class='head_Icons fa fa-shopping-bag'></i>
                        <p style='color:#858585;padding-top:3px;font-size:12px;font-weight:600'>Cart</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- nav bar mobile   -->
    <div id="mySidenav" class="sidenav">
        <!-- <a href="javascript:void(0)" class="closebtn" id='closebtn' onclick="closeNav()">&times;</a> -->
        <a href="index.php" id="link" class='mobile-menu-bars'> HOME </a>
        <a href="catalogue.php" id="link" class='mobile-menu-bars'> CATALOGUE </a>
        <a href="aboutus.php" id="link" class='mobile-menu-bars'> ABOUT US </a>
        <a href="contact.php" id="link" class='mobile-menu-bars'> CONTACT </a>
        <a href="dashboard.php" id="link" class='mobile-menu-bars'> DASHBOARD </a>
        <a href="myorder.php" id="link" class='mobile-menu-bars'> MY ORDERS </a>
        <a href="config/logout.php" id="link" class='mobile-menu-bars'> LOGOUT </a>
    </div>
    <!-- categories    -->
    <!-- <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center nav_Categories mobile_Head_Hide pb-1' style='border-bottom: 2px solid #e7e7e7;'> -->
    <!-- <div class='nav_Categories_Btn_Hover' style='width:fit-content;cursor:pointer;margin:auto'>
            <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='11'>WOMEN</span>
            <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='12'>KURTI</span>
            <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='13'>SAREE</span>
            <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='14'>LEHENGA</span>
            <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='14'>Men</span>
            <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='14'>Fusion</span>
            <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='15'>DRESS</span>
            <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='15'>KIDS</span>
            <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='15'>JEWELLERY</span>
            <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='15'>LIFESTYLE</span>
            <span class='nav_Categories_Btn nav_Categories_Btn_Hover' id='15'>SALE</span>
        </div> -->
    <!-- <div style='border: 2px solid #e7e7e7;width:90%;margin-left:5%;padding-left:6%;' class='pb-5 nav_Categories_Sub_Menu nav_Categories_Btn_Hover'>
            <div class='row'>
                <div class='col-lg-2 text-left'>
                    <div class='nav_Categories_Sub_Menu_Tittle'>Fabric</div>
                    <div class='nav_Categories_Sub_Menu_Item'>COTTON</div>
                    <div class='nav_Categories_Sub_Menu_Item'>SILK</div>
                    <div class='nav_Categories_Sub_Menu_Item'>VELVET</div>
                    <div class='nav_Categories_Sub_Menu_Item'>POLYTHENE</div>
                    <div class='nav_Categories_Sub_Menu_Item'>SOFT FABRIC</div>
                </div>
                <div class='col-lg-2 text-left'>
                    <div class='nav_Categories_Sub_Menu_Tittle'>Work</div>
                    <div class='nav_Categories_Sub_Menu_Item'>COTTON</div>
                    <div class='nav_Categories_Sub_Menu_Item'>SILK</div>
                    <div class='nav_Categories_Sub_Menu_Item'>VELVET</div>
                    <div class='nav_Categories_Sub_Menu_Item'>POLYTHENE</div>
                    <div class='nav_Categories_Sub_Menu_Item'>SOFT FABRIC</div>
                </div>
                <div class='col-lg-2 text-left'>
                    <div class='nav_Categories_Sub_Menu_Tittle'>Style</div>
                    <div class='nav_Categories_Sub_Menu_Item'>COTTON</div>
                    <div class='nav_Categories_Sub_Menu_Item'>SILK</div>
                    <div class='nav_Categories_Sub_Menu_Item'>VELVET</div>
                    <div class='nav_Categories_Sub_Menu_Item'>POLYTHENE</div>
                    <div class='nav_Categories_Sub_Menu_Item'>SOFT FABRIC</div>
                </div>
                <div class='col-lg-2 text-left'>
                    <div class='nav_Categories_Sub_Menu_Tittle'>Occassion</div>
                    <div class='nav_Categories_Sub_Menu_Item'>COTTON</div>
                    <div class='nav_Categories_Sub_Menu_Item'>SILK</div>
                    <div class='nav_Categories_Sub_Menu_Item'>VELVET</div>
                    <div class='nav_Categories_Sub_Menu_Item'>POLYTHENE</div>
                    <div class='nav_Categories_Sub_Menu_Item'>SOFT FABRIC</div>
                </div>
            </div>
        </div> -->
    <!-- </div> -->
    <?= $this->renderSection('content') ?>
    <!-- footer  -->
    <div style='background-color:#000;' class='p-5'>
        <div class='row m-0 p-0 mb-5' style='padding:30px'>
            <div class='col-md-3 col-xs-12 mb-4'>
                <div class='footer_Col'>
                    <p class='footer_Tittle'><a href='#' style='text-decoration:none'>ONLINE SHOPPING</a></p>
                    <div class="footer_Opt">
                        <p><a href='#' style='text-decoration:none'>Men</a></p>
                        <p><a href='#' style='text-decoration:none'>Women</a></p>
                        <p><a href='#' style='text-decoration:none'>Kids</a></p>
                        <p><a href='#' style='text-decoration:none'>Home & Living</a></p>
                        <p><a href='#' style='text-decoration:none'>Beauty</a></p>
                    </div>
                </div>
            </div>
            <div class='col-md-3 col-xs-12 mb-4'>
                <div class='footer_Col'>
                    <p class='footer_Tittle'><a href='#' style='text-decoration:none'>CUSTOMER POLICIES</a></p>
                    <div class="footer_Opt">
                        <p><a href='#' style='text-decoration:none'>T&C</a></p>
                        <p><a href='#' style='text-decoration:none'>Terms Of Use</a></p>
                        <p><a href='#' style='text-decoration:none'>Track Orders</a></p>
                        <p><a href='#' style='text-decoration:none'>Shipping</a></p>
                        <p><a href='#' style='text-decoration:none'>Privacy Policy</a></p>
                    </div>
                </div>
            </div>
            <div class='col-md-3 col-xs-12 mb-4'>
                <div class='footer_Col'>
                    <p class='footer_Tittle'><a href='#' style='text-decoration:none'>GET TO KNOW US</a></p>
                    <div class="footer_Opt">
                        <p><a href='#' style='text-decoration:none'>About Us</a></p>
                        <p><a href='#' style='text-decoration:none'>Contact Us</a></p>
                        <p><a href='#' style='text-decoration:none'>FAQ</a></p>
                        <p><a href='#' style='text-decoration:none'>Our Blog</a></p>
                        <p><a href='#' style='text-decoration:none'>Cancellation</a></p>
                    </div>
                </div>
            </div>
            <div class='col-md-3 col-xs-12 mb-4'>
                <div class='footer_Col'>
                    <input type='text' placeholder='subscribe' class='form-control pl-2 mb-3' style='border-radius:0px' />
                    <p class='footer_Tittle'><a href='#' style='text-decoration:none'>ANY QUESTIONS?</a></p>
                    <div class="footer_Opt mb-4">
                        <p><a href='#' style='text-decoration:none'>Call or SMS: +1 (201) 733-3934</a></p>
                        <p><a href='#' style='text-decoration:none'>Email: support @Nykaa.com</a></p>
                    </div>

                    <p class='footer_Tittle mb-1'><a href='#' style='text-decoration:none;'>FOLLOW US</a></p>
                    <div class="footer_Opt">
                        <a href="https://www.instagram.com/rohaan.mehta/">
                            <i class="fa fa-instagram" style="font-size:25px; margin-right:15px;color:#fff;"></i>
                        </a>
                        <a href="https://www.facebook.com/RohaanMehta/">
                            <i class="fa fa-facebook-square" style="font-size:25px; margin-right:15px;color:#fff;"></i>
                        </a>
                        <a href="gmail.com">
                            <i class="fa fa-envelope" style="font-size:25px; margin-right:15px;color:#fff;"></i>
                        </a>
                        <a href="https://wa.me/919766084748/?text= I need to book an appointment">
                            <i class="fa fa-whatsapp" style="font-size:25px; margin-right:15px;color:#fff;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div style='font-size:12px;' class='d-flex text-light d-flex justify-content-center'>
            <p>Copyright © 2023 Karmaplace.com</p>
        </div>
    </div>
    <script>
        window.onscroll = function() {
            myFunction()
        };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }

        $(document).ready(function() {
            $('#itemslider').carousel({
                // interval: 3000;
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

        //nav categories
        $(".nav_Categories_Btn_Hover").mouseover(function() {
            $(".nav_Categories_Sub_Menu").addClass("anim_menu");
            $('.dynamic_Test').html($(this).attr('id'));
        }).mouseout(function() {
            $(".nav_Categories_Sub_Menu").removeClass("anim_menu");
        });

        // respon header 

        $('body').click(function(evnt) {
            if (evnt.target.id != "closebtn" && evnt.target.id != "mySidenav" && evnt.target.id != "ic") {
                closeNav();
            }
        });

        function openNav() {
            document.getElementById("mySidenav").style.width = "80%";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>