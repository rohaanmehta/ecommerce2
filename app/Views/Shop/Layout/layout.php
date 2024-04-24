<?php
//dynamic variables
$topbar_bg = '#000';
$topbar_text_color = '#fff';
$topbar_link = base_url();
$category_color = '#ff1e82';
$header_color = '#ff1e82';
$category_color = '#ff1e82';
?>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a670e6a37e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= base_url('assets/mobile_nav.scss'); ?>" crossorigin="anonymous">

    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <style>
        .zoom-img-box {
            overflow: hidden;
        }

        .banner-homepage-sections img {
            width: 100%;
            transition: transform 0.4s ease;
            transform-origin: 50% 50%;
        }

        .banner-homepage-sections img:hover {
            transform: scale(1.1);
            width: 100%;
        }

        .black-btn {
            border: none;
            border-radius: 0px;
            background: #000;
            color: #fff;
        }

        .dropdown-toggle::after {
            content: none;
        }

        * {
            font-family: "Lato", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        body {
            /* background-color: #f2f2f2; */
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

            .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
                display: block;
            }

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
            height: auto;
        }

        /* nav categories */
        .nav_Categories {
            background-color: #fff;
            position: relative;
            padding: 15px;
        }

        .nav_Categories_Btn {
            margin: 0px 15px 0px 15px;
            font-size: 13px;
            cursor: pointer;
            color: #707070;
            font-weight: 800;
        }

        .nav_Categories_Btn:hover {
            border-bottom: 3px <?= 'solid ' . $category_color ?>;
            /* padding-bottom: 29px; */
            padding-bottom: 10px;
        }

        .bordertest {
            padding-bottom: 29px !important;
            border-bottom: 3px <?= 'solid ' . $category_color ?>;
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
            /* transition: 10s; */
            /* transform: translateY(1%); */
            display: block !important;
        }

        /* head section */
        .head_Section {
            display: flex;
            justify-content: space-between;
            box-shadow: -1px 1px 1px 1px #f3f3f3;
            background-color: #fff;

            /* //topbar */
            z-index: 2;
            position: sticky;
            top: 0px;
        }

        .head_Icons {
            font-size: 20px;
            background: #0000;
            color: #a5a5a5;
            align-self: center;
            margin-bottom: 0px;
        }

        /* banner */
        .banner,
        .banner4 {
            display: flex;
            justify-content: space-around;
        }

        .gap {
            margin-bottom: 25px !important;
        }

        /* @media (min-width: 1200px) {
            .col-md-4 {
                width: 20% !important;
            }
        }

        @media (min-width: 992px) {
            .col-md-4 {
                width: 20% !important;
            }
        } */

        @media all and (min-width: 992px) {
            .col-lg-3 {
                /* flex: 0 0 20%; */
            }
        }

        @media all and (min-width: 750px) and (transform-3d),
        all and (max-width: 1024px) and (-webkit-transform-3d) {
            .gallery .col-xs-6 {
                /* width: 50% !important; */
                max-width: 25%;
            }
        }

        @media all and (min-width: 550px) and (transform-3d),
        all and (max-width: 750px) and (-webkit-transform-3d) {
            .gallery .col-xs-6 {
                /* width: 50% !important; */
                max-width: 33.33%;
            }
        }

        @media all and (min-width: 450px) and (transform-3d),
        all and (max-width: 550px) and (-webkit-transform-3d) {
            .gallery .col-xs-6 {
                /* width: 50% !important; */
                max-width: 50%;
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

        .popular-link-box {
            font-size: 12px;
            border-top: 1px solid #464646;
            margin: 10px 60px 0px 60px;
            padding-top: 20px;
            color: #998d8d
        }

        @media all and (max-width: 768px) and (transform-3d),
        all and (max-width: 768px) and (-webkit-transform-3d) {
            .popular-link-box {
                margin: 10px 25px 0px 25px;
            }

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
            margin-top: 45px;
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
            display: flex;
            justify-content: space-between;
            padding-right: 20px;
            transition: 0.3s;
            padding: 12px 20px 12px 25px;
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

        .footer_Tittle a {
            color: #fff;
            font-size: 14px;
            font-weight: 600;
        }

        .footer_Opt a {
            font-size: 12px;
            font-weight: 100;
            color: #e9e9e9;
        }

        .search-box {
            background-color: #f5f5f6;
            height: 45px;
            width: 350px;
            padding: 8px 10px 10px 50px;
            font-size: 14px;
            border-radius: 3px;
            margin-right: 15px;
            color: #696e79;
            border: 1px solid #f5f5f6;
        }

        .search-wrapper {
            position: relative;
        }

        .font-awesome-icon {
            position: absolute;
            left: 20px;
            top: 13px;
            font-size: 17px;
            color: #b9b9b9;
            font-family: 'FontAwesome';
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #fff;
            /* background-color: #fff; */
            z-index: 100;
        }

        .sticky2 {
            margin-top: 104px !important;
        }

        .sticky+.content {
            padding-top: 102px;
        }

        .mobile-menu-angle {
            font-size: 15px;
        }

        .blink {
            animation: blinker 2s linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: 0.6;
            }
        }

        .popular-links {
            color: #998d8d;
            text-decoration: none;
        }

        .popular-links::after {
            content: " |";
        }

        .popular-links:hover {
            color: #998d8d;
            text-decoration: none;
        }

        .w3-animate-opacity {
            animation: opac 0.6s
        }

        @keyframes opac {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        .form-control:focus,
        button {
            /* color: #495057; */
            /* background-color: #fff; */
            border-color: #ccc !important;
            outline: none !important;
            box-shadow: none !important;
        }

        .pagination {
            justify-content: end;
            margin-right: 20px;
        }

        .pagination .active a {
            width: 40px;
            height: 40px;
            display: block;
            background-color: #000;
            text-align: center;
            margin-right: 5px;
            color: #f2f2f2;
            text-decoration: none;
            padding-top: 8px;
        }

        .pagination a {
            width: 40px;
            height: 40px;
            display: block;
            background-color: #f2f2f2;
            border: 1px solid #dfdfdf;
            text-align: center;
            margin-right: 5px;
            color: #686868;
            text-decoration: none;
            padding-top: 8px;
        }

        .product_title {
            font-size: 12px;
            font-weight: 400;
            line-height: 1.5em;
            height: 3em;
            /* height is 2x line-height, so two lines will display */
            overflow: hidden;
        }

        .product_price {
            font-size: 17px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .gallery_container:hover {
            border: 1px solid #979797;
        }

        .dropdown:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-item:hover>.dropdown-menu {
            display: block;
        }

        ul li {
            list-style-type: none;
            display: inline;
        }

        .navbar-nav .nav-link {
            display: inline-block;
        }

        .ml-auto {
            display: inline-block !important;
        }

        .dropdown>.dropdown-toggle:active {
            pointer-events: none;
        }

        .dropdown-item {
            /* margin: 0px 15px 0px 15px; */
            font-size: 13px;
            cursor: pointer;
            color: #707070;
            font-weight: 800;
        }

        a::after {
            box-sizing: unset;
        }
    </style>
</head>

<body>
    <!-- //topbar   -->
    <!-- //top bar  -->

    <!-- <div class='col-lg-12 text-center top_Bar' style='background:<?= $topbar_bg ?>'>
        <a class='blink' href='<?= $topbar_link ?>' style='color:<?= $topbar_text_color ?>; text-decoration:none'>
            Transform Your Kitchen with Cara: Where Style Meets Functionality in Modular Design!
        </a>
    </div> -->


    <?php $session = session();
    if ($session->get('role') == 'admin') { ?>
        <div class='col-lg-12 text-right pr-5 top_Bar' style='background:#fff'>
            <a class='text-dark' href='<?= base_url('Admin/dashboard'); ?>'>Go to Admin </a>
        </div>
    <?php } ?>


    <!-- multiple dropdown header  -->
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
                <?php $session = session();
                $session->get('userid');
                if ($session->get('userid') == '') { ?>
                    <div style='text-align:center;display:flex;'>
                        <a class='btn' href='<?= base_url("login") ?>'>
                            <i class='head_Icons fa-light fa fa-user'></i>
                        </a>
                    </div>
                <?php } ?>
                <div style='text-align:center;display:flex;'>
                    <a class='btn' href='<?= base_url("wishlist") ?>'><i class='head_Icons fa-light fa-heart'></i>
                    </a>
                </div>
                <div style='text-align:center;display:flex;'>
                    <a class='btn' href='<?= base_url("cart") ?>'><i class='head_Icons fa-light fa-shopping-bag'></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- pc header  -->
        <div class='d-flex col-lg-7 mobile_Head_Hide pt-3'>
            <a href='<?= base_url() ?>'>
                <img src='<?= base_url('uploads/logo/logo.jpg'); ?>' width='120px' class='p-3' />
            </a>
            <div class='col-lg-12 text-center nav_Categories mobile_Head_Hide pb-1' style='background:#fff'>

                <div class='d-flex' style='text-align:left;align-items: baseline;'>
                    <!-- <a style='text-decoration:none' href='<? //= base_url('finishes'); 
                                                                ?>'>
                        <span class='nav_Categories_Btn'> OUR FINISHES </span>
                    </a> -->
                </div>

                <!-- uncomment this for multiple dropdown header  -->

                <div class='' style='text-align:left'>
                    <?php if (isset($categories) && !empty($categories)) {
                        foreach ($categories as $row) { ?>
                            <span class='nav_Categories_Btn exit-menu nav_Categories_Btn_Hover' id='11'><?= $row->category_name ?></span>
                    <?php }
                    } ?>
                </div>


                <div style='margin-top: 31px;border-top: 1px solid #e7e7e7;' class='exit-menu nav_Categories_Btn_Hover_anim pb-5 nav_Categories_Sub_Menu nav_Categories_Btn_Hover'>
                    <div class='exit-menu row nav_Categories_Sub_Menu_Tittle'>
                        <div class='exit-menu col-lg-2 text-left'>
                            <div class='exit-menu nav_Categories_Sub_Menu_Tittle' style='color: <?= $category_color ?>'>Fabric</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>COTTON</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>SILK</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>VELVET</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>POLYTHENE</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>SOFT FABRIC</div>
                        </div>
                        <div class='exit-menu col-lg-2 text-left'>
                            <div class='exit-menu nav_Categories_Sub_Menu_Tittle' style='color: <?= $category_color ?>'>Occassion</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>COTTON</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>SILK</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>VELVET</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>POLYTHENE</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>SOFT FABRIC</div>
                        </div>
                        <div class='exit-menu col-lg-2 text-left'>
                            <div class='exit-menu nav_Categories_Sub_Menu_Tittle' style='color: <?= $category_color ?>'>Material</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>COTTON</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>SILK</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>VELVET</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>POLYTHENE</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>SOFT FABRIC</div>
                        </div>
                        <div class='exit-menu col-lg-2 text-left'>
                            <div class='exit-menu nav_Categories_Sub_Menu_Tittle' style='color: <?= $category_color ?>'>Work</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>COTTON</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>SILK</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>VELVET</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>POLYTHENE</div>
                            <div class='exit-menu nav_Categories_Sub_Menu_Item'>SOFT FABRIC</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class='col-lg-5 pt-3 pb-2 mobile_Head_Hide' style='display:flex;justify-content:end'>
            <!-- search bar  -->
            <div style="text-align:start;" class='pl-0'>
                <div class="mb-0 d-flex  justify-content-center mobile_Head_Hide search-wrapper">
                    <i class="fa fa-search font-awesome-icon" aria-hidden="true"></i>
                    <input type="text" class="form-control search-box" placeholder="Search for products" aria-label="Recipient's username" aria-describedby="basic-addon2">
                </div>
            </div>

            <div style="display:flex;align-self: center;text-align:end; justify-content:end" class=''>
                <?php $session = session();
                $session->get('userid');
                if ($session->get('userid') == '') { ?>
                    <div style='text-align:center;display:flex;'>
                        <a class='btn mobile_Head_Hide' data-toggle="modal" data-target="#loginexampleModal">
                            <i class='head_Icons fa-light fa fa-user'></i>
                            <p style='color:#858585;padding-top:3px;font-size:12px;font-weight:600;margin-bottom:0px'>Login</p>
                        </a>
                    </div>
                <?php } else { ?>
                    <div style='text-align:center;display:flex;'>
                        <a class='btn mobile_Head_Hide' href='<?= base_url("logout") ?>'>
                            <i class='head_Icons fa-light fa fa-sign-out'></i>
                            <p style='color:#858585;padding-top:3px;font-size:12px;font-weight:600;margin-bottom:0px'>Logout</p>
                        </a>
                    </div>
                <?php } ?>
                <!-- wishlist  -->
                <div style='text-align:center;display:flex;'>
                    <a class='btn mobile_Head_Hide' href='<?= base_url("wishlist") ?>'><i class='head_Icons fa-light fa fa-heart'></i>
                        <p style='color:#858585;padding-top:3px;font-size:12px;font-weight:600;margin-bottom:0px'>Wishlist</p>
                    </a>
                </div>
                <div style='text-align:center;display:flex;'>
                    <a class='btn mobile_Head_Hide' href='<?= base_url("cart") ?>'><i class='head_Icons fa fa-shopping-bag'></i>
                        <p style='color:#858585;padding-top:3px;font-size:12px;font-weight:600;margin-bottom:0px'>Cart</p>
                    </a>
                </div>
            </div>
        </div>
    </div>




    <!-- nav bar mobile   -->
    <div id="mySidenav" class="sidenav nav-mobile">
        <div id='sidenav-menus' class='menu-container'>
            <!-- <a href="#" id="link" class='mobile-menu-bars'>HOME </a>

            <a href="#" id="link" class='mobile-menu-bars'> CATALOGUE
                <i class="mobile-menu-angle fa-solid fa-angle-right"></i>
            </a>
            <a href="#" id="link" class='mobile-menu-bars'> ABOUT US </a>
            <a href="#" id="link" class='mobile-menu-bars'> CONTACT </a>
            <a href="#" id="link" class='mobile-menu-bars'> DASHBOARD </a>
            <a href="#" id="link" class='mobile-menu-bars'> MY ORDERS </a>
            <a href="#" id="link" class='mobile-menu-bars'> LOGOUT </a> -->

            <!-- <ul class="">
                <li>Open, Sesame!</li>
                <li class="menu-container"> -->
            <input id="menu-toggle" type="checkbox">
            <!-- <label for="menu-toggle" class="menu-button">
                        <svg class="icon-open" viewBox="0 0 24 24">
                            <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                        </svg>
                        <svg class="icon-close" viewBox="0 0 100 100">
                            <path d="M83.288 88.13c-2.114 2.112-5.575 2.112-7.69 0L53.66 66.188c-2.113-2.112-5.572-2.112-7.686 0l-21.72 21.72c-2.114 2.113-5.572 2.113-7.687 0l-4.693-4.692c-2.114-2.114-2.114-5.573 0-7.688l21.72-21.72c2.112-2.115 2.112-5.574 0-7.687L11.87 24.4c-2.114-2.113-2.114-5.57 0-7.686l4.842-4.842c2.113-2.114 5.57-2.114 7.686 0l21.72 21.72c2.114 2.113 5.572 2.113 7.688 0l21.72-21.72c2.115-2.114 5.574-2.114 7.688 0l4.695 4.695c2.112 2.113 2.112 5.57-.002 7.686l-21.72 21.72c-2.112 2.114-2.112 5.573 0 7.686L88.13 75.6c2.112 2.11 2.112 5.572 0 7.687l-4.842 4.84z" />
                        </svg>
                    </label> -->
            <ul class="menu-sidebar">
                <li><a href="#">Item</a></li>
                <li><a href="#">Item</a></li>
                <li><a href="#">Item</a></li>
                <li>
                    <input type="checkbox" id="sub-one" class="submenu-toggle">
                    <label class="submenu-label" for="sub-one">Category</label>
                    <div class="arrow right">&#8250;</div>
                    <ul class="menu-sub">
                        <li class="menu-sub-title">
                            <label class="submenu-label" for="sub-one">Back</label>
                            <div class="arrow left">&#8249;</div>
                        </li>
                        <li><a href="#">Sub-item</a></li>
                        <li><a href="#">Sub-item</a></li>
                        <li><a href="#">Sub-item</a></li>
                        <li><a href="#">Sub-item</a></li>
                    </ul>
                </li>
                <li>
                    <input type="checkbox" id="sub-two" class="submenu-toggle">
                    <label class="submenu-label" for="sub-two">Category</label>
                    <div class="arrow right">&#8250;</div>
                    <ul class="menu-sub">
                        <li class="menu-sub-title">
                            <label class="submenu-label" for="sub-two">Back</label>
                            <div class="arrow left">&#8249;</div>
                        </li>
                        <li><a href="#">Sub-item</a></li>
                        <li><a href="#">Sub-item</a></li>
                        <li><a href="#">Sub-item</a></li>
                        <li><a href="#">Sub-item</a></li>
                    </ul>
                </li>
            </ul>
            <!-- </li>
            </ul> -->
        </div>
    </div>


    <!-- categories    -->
    <!-- <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center nav_Categories mobile_Head_Hide pb-1' style='border-bottom: 2px solid #e7e7e7;'>
    <div class='nav_Categories_Btn_Hover' style='width:fit-content;cursor:pointer;margin:auto'>
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
        </div>
    <div style='border: 2px solid #e7e7e7;width:90%;margin-left:5%;padding-left:6%;' class='pb-5 nav_Categories_Sub_Menu nav_Categories_Btn_Hover'>
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
        </div>
    </div> -->


    <?= $this->renderSection('content') ?>
    <!-- footer  -->


    <?php include('footer.php'); ?>

    <!-- login modal  -->
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginexampleModal">
        Launch demo modal
    </button> -->

    <?php include('login.php'); ?>

    <script>
        //top bar 
        // window.onscroll = function() {
        //     myFunction()
        // };

        // var header = document.getElementById("myHeader");
        // var sidenav = document.getElementById("mySidenav");
        // var sticky = header.offsetTop;

        //  function myFunction() {
        //      if (window.pageYOffset > sticky) {
        //          header.classList.add("sticky");
        //       $('#mySidenav').css('margin-top', '45');
        //     } else {
        //         header.classList.remove("sticky");
        //         // console.log($('.top_Bar').css('height'));
        //      var height = parseFloat($('.top_Bar').css('height')) + parseFloat(45);
        //     $('#mySidenav').css('margin-top', height);

        //   }
        //   }

        $(document).ready(function() {

            $('.mobile-menu-bars').click(function() {
                if ($(this).children().hasClass('fa-rotate-90')) {
                    $(this).children().removeClass('fa-rotate-90');
                } else {
                    $(this).children().addClass('fa-rotate-90');
                }

                // if ($(this).children().hasClass('d-none')) {
                //     $(this).children().removeClass('d-none');
                // } else {
                //     $(this).children().addClass('d-none');
                // }
            });

            // myFunction();
            $('#itemslider').carousel({
                interval: 3000;
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

        $(".nav_Categories_Btn_Hover").mouseover(function() {
            $(".nav_Categories_Sub_Menu").addClass("anim_menu");
            $(".nav_Categories_Sub_Menu").addClass("w3-animate-opacity");
        }).mouseout(function(evnt) {
            $(".nav_Categories_Sub_Menu").removeClass("anim_menu");
        });

        $(".nav_Categories_Btn ").mouseover(function() {
            $(".nav_Categories_Btn ").removeClass('bordertest');
            $(this).addClass('bordertest');
        });

        $('body').mouseover(function(evnt) {
            if (!$(evnt.target).hasClass('exit-menu')) {
                $(".nav_Categories_Btn ").removeClass('bordertest');
                // alert();
            }
        });


        // respon header 

        $('body').click(function(evnt) {
            if (evnt.target.id != "link" && evnt.target.id != "mySidenav" && evnt.target.id != "ic") {
                closeNav();
            }
            // if (evnt.target.id != "product") {
            //     if (!$(event.target).hasClass('product-360')) {
            //         $('#product').css('display', 'none');
            //         $('.backdrop').css('display', 'none');
            //     }
            // }
        });

        function openNav() {
            if (document.getElementById("mySidenav").style.width == '80%') {
                document.getElementById("mySidenav").style.width = "0";

            } else {
                document.getElementById("mySidenav").style.width = "80%";
            }
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>