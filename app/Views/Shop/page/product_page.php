<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<?php $session = session(); ?>

<head>
    <!-- 360 degrees -->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <!-- <link href="/3602/main.css" rel="stylesheet" type="text/css"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <script src="<//?= base_url('public/dist/js/main.js') ?>"></script> -->
    <script src="<?= base_url('public/dist/js/j360.js') ?>"></script>
</head>
<style>
    .share-icons {
        font-size: 22px;
        margin-right: 6px;
    }

    .accordion-desc {
        font-size: 14px;
        padding: 10px;
        padding-left: 17px;
        color: #5c5c5c;
        font-weight: 400;
    }

    .accordion-title {
        cursor: pointer;
        font-size: 16px;
        padding: 10px;
        padding-left: 17px;
        color: #5c5c5c;
        font-weight: 700;
        /* background: url(https://cdn0.iconfinder.com/data/icons/entypo/91/arrow56-512.png) no-repeat calc(100% - 10px) center; */
        /* background-size: 15px; */
    }

    .accordion-title::before {
        font-family: FontAwesome;
        content: "\f106";
        font-size: 21px;
        position: absolute;
        right: 20px;
    }

    .collapsed::before {
        font-family: FontAwesome;
        content: "\f107";
        font-size: 21px;
        position: absolute;
        right: 20px;
    }

    .product_price_tax_info {
        font-size: 14px;
        font-weight: 500 !important;
        color: #5e5e5e;
        margin-top: 2px;
    }

    .addtocart {
        background: #000;
        min-width: 240px;
        font-size: 15px;
        font-weight: 600;
        padding: 12px 25px 12px 25px;
    }

    .addtowishlist {
        background: #fff;
        color: #000;
        border: 1px solid #5e5e5e;
        /* min-width: 120px; */
        font-size: 13px;
        font-weight: 500;
        padding: 15px 25px 15px 25px;
    }

    .sizechart-modal .table table td {
        font-size: 13px;
        border: 1px solid #dfdfdf;
        text-align: center;
    }

    .sizechart-modal .table table {
        overflow-y: scroll;
        width: 100%;
    }

    .breadcrum {
        padding: 12px;
        padding-left: 0px;
        padding-top: 0px;
    }

    .breadcrum a {
        font-size: 14px;
        color: #000 !important;
        text-decoration: none;
        text-transform: capitalize !important;
    }

    .selector-item {
        /* flex-basis: calc(70% / 3); */
        height: 45px;
        width: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
    }

    .selector-item_radio {
        appearance: none;
        display: none;
    }

    .selector-item_label {
        cursor: pointer;
        font-size: 15px;
        position: relative;
        height: 100%;
        width: 100%;
        text-align: center;
        border: 1px solid #b9b9b9;
        border-radius: 4px;
        line-height: 40px;
        font-weight: 700;
        transition-duration: .5s;
        transition-property: transform, box-shadow;
        transform: none;
        color: #5c5c5c;
        margin-bottom: 0px;
    }

    .selector-item_radio:checked+.selector-item_label {
        /* background-color: #000; */
        border: 2px solid black;
        /* color: #000; */
    }

    /* @media (max-width:480px) {
        .selector {
            width: 90%;
        }
    } */

    .product_image {
        width: 100%;
        /* height: 500px; */
    }

    .product_image_thumbnails {
        width: 70px;
        /* height: 70px; */
        cursor: pointer;
        margin-bottom: 10px;
    }

    .product_image_thumbnails:hover {
        border: 1px solid #b5b5b5;
    }

    .product_heading {
        font-size: 21px;
        color: #5c5c5c;
        font-weight: 700;
    }

    .product_desc {
        font-size: 15px;
        color: #7e7e7e;
        font-weight: 500;
        margin-top: 10px;
    }

    .product_category {
        font-size: 15px;
        color: #7e7e7e;
        font-weight: 500;
        /* margin-top: 10px; */
    }

    .product_category a:hover {
        text-decoration: none;
        color: #7e7e7e;
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

    .product_price_main {
        font-size: 23px;
        color: #5c5c5c;
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
        width: 100%;
        /* height:100%; */
    }

    .backdrop {
        background-color: #93877975;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0px;
        /* z-index: 100; */
        display: none;
    }

    .product-360-box {
        background: #fff;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        position: fixed;
        display: none;
        width: 500px;
        height: 400px;
    }

    .product-360-border {
        background: #fff;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        position: fixed;
        display: none;
        width: 580px;
        height: 480px;
    }

    .responsive-product-360 {
        display: block;
    }

    @media all and (max-width: 768px) and (transform-3d),
    all and (max-width: 768px) and (-webkit-transform-3d) {
        .product-360-box {
            /* transform: translate(-50%, -50%); */
            /* top: 20%; */
            /* left: 50%; */
            position: fixed;
            width: 100%;
            height: 100%;
        }

        .responsive-product-360 {
            display: flex;
            align-items: center;
        }

        .product-360-border {
            width: 100vw;
            position: absolute;
            transform: none;
            top: 0%;
            left: 0%;
        }
    }

    .qty-desc {
        font-size: 15px;
        color: #585858;
    }
</style>
<div class='invisible mobile_Head_Hide'>gap fill</div>

<div class='pl-md-4 pr-md-4'>
    <div class='row m-0 p-0'>
        <div class='mobile_Head_Hide breadcrum'>
            <a href='<?= base_url(); ?>'> Home</a>
            <?php foreach ($all_categories as $row) { ?>
                / <a href='<?= base_url($row['slug']); ?>'> <?= $row['name']; ?> </a>
            <?php $category_id = $row['id'];
                $category_name = $row['name'];
                $category_slug = $row['slug'];
            } ?>
        </div>
    </div>

    <div class='row m-0 p-0'>
        <!-- thumbnails old design -->
        <!-- <div class='col-1 mobile_Head_Hide'>
        <div class='row pl-5 justify-content-end'>
            <//?php if (isset($product)) { ?>
                <//?php if ($product[0]->image_name1 != '') { ?>
                    <img class='product_image_thumbnails rounded' style='filter:brightness(80%);border:1px solid #b5b5b5' src='<//?= base_url('uploads/product_images/' . $product[0]->image_name1); ?>' />
                <//?php } ?>
                <//?php if ($product[0]->image_name2 != '') { ?>
                    <img class='product_image_thumbnails rounded' src='<//?= base_url('uploads/product_images/' . $product[0]->image_name2); ?>' />
                <//?php } ?>
                <//?php if ($product[0]->image_name3 != '') { ?>
                    <img class='product_image_thumbnails rounded' src='<//?= base_url('uploads/product_images/' . $product[0]->image_name3); ?>' />
                <//?php } ?>
                <//?php if ($product[0]->image_name4 != '') { ?>
                    <img class='product_image_thumbnails rounded' src='<//?= base_url('uploads/product_images/' . $product[0]->image_name4); ?>' />
            <//?php }
            } ?>
        </div>
    </div> -->
        <div class='col-12 col-md-7 p-0 mobile_Head_Hide'>
            <div class='row p-0 m-0'>
                <?php if (isset($product[0]->image_name1) && !empty($product[0]->image_name1) && is_file(ROOTPATH . 'uploads/product_images/' . $product[0]->image_name1)) { ?>
                    <div class='col-6 pr-0 pl-0'>
                        <img class='product_image round' alt='<?= $product[0]->title ?>' src='<?= base_url('uploads/product_images/' . $product[0]->image_name1); ?>' />
                    </div>
                <?php } ?>
                <?php if (isset($product[0]->image_name2) && !empty($product[0]->image_name2) && is_file(ROOTPATH . 'uploads/product_images/' . $product[0]->image_name2)) { ?>
                    <div class='col-6 pr-0'>
                        <img class='product_image round' alt='<?= $product[0]->title ?>' src='<?= base_url('uploads/product_images/' . $product[0]->image_name2); ?>' />
                    </div>
                <?php } ?>
                <?php if (isset($product[0]->image_name3) && !empty($product[0]->image_name3) && is_file(ROOTPATH . 'uploads/product_images/' . $product[0]->image_name3)) { ?>
                    <div class='col-6 pr-0 pl-0 pt-3'>
                        <img class='product_image round' alt='<?= $product[0]->title ?>' src='<?= base_url('uploads/product_images/' . $product[0]->image_name3); ?>' />
                    </div>
                <?php } ?>
                <?php if (isset($product[0]->image_name4) && !empty($product[0]->image_name4) && is_file(ROOTPATH . 'uploads/product_images/' . $product[0]->image_name4)) { ?>
                    <div class='col-6 pr-0 pt-3'>
                        <img class='product_image round' alt='<?= $product[0]->title ?>' src='<?= base_url('uploads/product_images/' . $product[0]->image_name4); ?>' />
                    </div>
                <?php } ?>
                <!-- tap to view 360  -->
                <!-- <div class='d-flex justify-content-center mt-2 mb-5 mb-md-2'>
                        <button class='btn rounded text-white tap-btn product-360' style='background:#000' data-toggle="modal" data-target="#exampleModalCenter">Tap to view 360
                            <i class="fa-solid fa-rotate"></i>
                        </button>
                    </div> -->
            </div>
        </div>
        <div class='col-12 col-md-7 p-0 mobile_Head_Show'>
            <div class='row p-4 m-0'>
                <?php if (isset($product[0]->image_name1) && !empty($product[0]->image_name1) && is_file(ROOTPATH . 'uploads/product_images/' . $product[0]->image_name1)) { ?>
                    <div class='col-12 p-0'>
                        <img class='product_image round' alt='<?= $product[0]->title ?>' src='<?= base_url('uploads/product_images/' . $product[0]->image_name1); ?>' />
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class='col-12 col-md-5 pl-4'>
            <div class='product_heading'>
                <?= $product[0]->title; ?>
            </div>
            <div class='product_category text-capitalize'>
                <a class='product_category' href='<?= base_url('/' . $category_slug); ?>'><?= $category_name //$product[0]->desc; 
                                                                                            ?></a>
            </div>
            <hr>
            <div class='product_shop_tittle'>
                <!-- Shop the collection by <a href='#' class='shop_name'>G mentor </a> -->
            </div>

            <div class='product_price_main'>
                $<?= $product[0]->price; ?>
            </div>
            <div class='product_price_tax_info'>
                MRP incl. of all taxes
            </div>


            <!-- status in stock and sku  -->

            <!-- <div class='product_info'>
            <span class='text-secondary' style='min-width:100px'> Status : </span>
            <?php if ($product[0]->stock > 0) { ?> <span class='text-success'>In Stock</span> <?php } else { ?> <span class='text-danger'>OUT of Stock</span> <?php } ?><br>
            <span class='text-secondary' style='min-width:100px'> SKU : </span><span class='text-secondary'> <?= $product[0]->sku ?> </span>
            </div> -->

            <!-- variation  -->
            <div class='row product_info d-flex' style='flex-wrap:wrap;align-items:center;'>
                <div class='pl-3 d-flex justify-content-between'>
                    <div class='col-12 pl-0'>Please select a size</div>
                </div>
                <!-- sizeguide -->
                <?php helper('custom');
                $sizechart = get_sizechart_by_productid($category_id);
                if (isset($sizechart) && !empty($sizechart)) { ?>
                    <div class='col-6 pl-0'>
                        <p style='cursor:pointer;font-size:13px;color:#000;font-weight:800;' class='m-0' data-toggle="modal" data-target="#exampleModalCenter">SIZE CHART <i class='fa fa-angle-right' style='font-size:14px'></i></p>
                        <!-- <button class='mt-3 btn btn-sm rounded'  style='background:#dfdfdf;color:#2e2e2e;font-weight:600'>
                            <i class="fa fa-sort-amount-asc"></i>
                        </button> -->
                    </div>
                <?php } ?>
                <div class='col-12 d-flex mt-2'>
                    <div class="selector-item">
                        <input type="radio" id="radio1" name="selector" class="selector-item_radio" checked>
                        <label for="radio1" class="selector-item_label">S</label>
                    </div>
                    <div class="selector-item">
                        <input type="radio" id="radio2" name="selector" class="selector-item_radio">
                        <label for="radio2" class="selector-item_label">M</label>
                    </div>
                    <div class="selector-item">
                        <input type="radio" id="radio3" name="selector" class="selector-item_radio">
                        <label for="radio3" class="selector-item_label">L</label>
                    </div>
                    <div class="selector-item">
                        <input type="radio" id="radio4" name="selector" class="selector-item_radio">
                        <label for="radio4" class="selector-item_label">XL</label>
                    </div>
                    <div class="selector-item">
                        <input type="radio" id="radio5" name="selector" class="selector-item_radio">
                        <label for="radio5" class="selector-item_label">XXL</label>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> SIZE CHART</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body sizechart-modal">
                            <?php print_r($sizechart) ?>
                        </div>
                        <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Save</button>
                    </div> -->
                    </div>
                </div>
            </div>

            <?php if ($product[0]->purchasable == 1) { ?>
                <div class='col-12 pl-0 mt-3 d-flex' style='align-items:center;'>
                    <span class='qty-desc mr-3'>Quantity</span>
                    <select class='form-control p-1' style='font-size:14px;width:50px;height:30px'>
                        <option value='01'>01</option>
                        <option value='02'>02</option>
                        <option value='03'>03</option>
                        <option value='04'>04</option>
                        <option value='05'>05</option>
                        <option value='06'>06</option>
                        <option value='07'>07</option>
                        <option value='08'>08</option>
                        <option value='09'>09</option>
                        <option value='10'>10</option>
                    </select>
                </div>
                <div class='col-12 pl-0 mt-0'>
                    <?php if ($product[0]->stock > 0) { ?>
                        <button class='mt-3 btn btn-lg rounded text-white addtocart'>
                            <i class="fa-solid fa-shopping-bag pr-3 font-sm"></i>ADD TO CART
                        </button>
                    <?php } else { ?>
                        <button class='mt-5 btn btn-lg rounded text-white' style='background:#000;min-width:220px'>OUT OF STOCK
                            <i class="fa-solid fa-ta[e"></i>
                        </button>
                    <?php } ?>

                    <?php $session = session();
                    if ($session->get('userid') != '') { ?>
                        <button class='mt-3 btn rounded addtowishlist' data-target="" id='<?= $product[0]->id; ?>'>
                            <?php if ($wishlist == 1) { ?>
                                <i style='font-size:17px' class='fa fa-heart'></i>
                            <?php } else { ?>
                                <i style='font-size:17px' class='fa fa-heart-o'></i>
                            <?php } ?>
                        </button>
                    <?php } else { ?>
                        <button class='mt-3 btn rounded addtowishlist' data-target="#loginexampleModal" data-toggle="modal">
                            <i style='font-size:17px' class='fa fa-heart'></i>
                        </button>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <button class='mt-5 btn btn-lg rounded text-white' data-toggle="modal" data-target="#exampleModal" style='background:#000;min-width:220px'>Enquiry
                    <i class="fa-solid fa-ta[e"></i>
                </button>
            <?php } ?>

            <div class='col-12 pl-0 d-flex mt-3 mb-3 mobile_Head_Hide' style='align-items:center'>
                <p class='m-0 mr-2'>Share</p>
                <a href='https://web.whatsapp.com/send?text=<?= current_url(); ?>' target="_blank" class='text-decoration-none text-secondary'><i class='share-icons fa fa-whatsapp'></i></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://google.com" target="popup" onclick="window.open('https\:\/\/www.facebook.com/sharer/sharer.php?u=https:\/\/google.com','name','width=600,height=400')" class='text-decoration-none text-secondary'><i class='share-icons fa fa-facebook-square'></i></a>
                <a href='' target="_blank" class='text-decoration-none text-secondary'><i class='share-icons fa fa-twitter'></i></a>
                <a href='https://www.instagram.com/TheSouledStore/' target="_blank" class='text-decoration-none text-secondary'><i class='share-icons fa fa-instagram'></i></a>
            </div>

            <div class='col-12 pl-0 d-flex mt-3 mb-3 mobile_Head_Show' style='align-items:center'>
                <p class='m-0 mr-2' style='cursor:pointer;' id="share">Share <i style='font-size:16px;' class='h6 pl-1 share-icons fa fa-share-alt'></i></p>
            </div>
            <div class="accordion mt-3" id="accordionExample">
                <div class="card" style='border-radius:0px !important'>
                    <div class="card-head" id="headingOne">
                        <p class="mb-0 accordion-title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Product Details
                        </p>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body accordion-desc">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head" id="headingTwo">
                        <p class="mb-0 accordion-title collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Product Description
                        </p>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body accordion-desc">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head" id="heading3">
                        <p class="mb-0 accordion-title collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Customer Reviews (<?php if (isset($reviews) && !empty($reviews)) {
                                                    echo sizeof($reviews);
                                                } else {
                                                    echo '0';
                                                } ?>)
                        </p>
                    </div>
                    <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
                        <div class="card-body accordion-desc">
                            <?php if (isset($reviews) && !empty($reviews)) {
                                $i = 0;
                                foreach ($reviews as $row) { ?>
                                    <?php if ($i != 0) {
                                        echo '<hr>';
                                    } ?>
                                    <div class=''>
                                        <div class='d-flex' style='flex-wrap:nowrap'>
                                            <div>
                                                <span class="badge badge-secondary" style='padding:4px;margin-top:5px;'><?= $row->stars; ?> <i class='fa fa-star'></i></span>
                                            </div>
                                            <div class='pl-2'>
                                                <div class=''>
                                                    <?= $row->review; ?>
                                                </div>
                                                <div class='mt-2' style='color:#7e7e7e;font-size:13px;'>
                                                    <?php if (isset($row->first_name) && $row->first_name != '') { ?>
                                                        <?= $row->first_name; ?>
                                                    <?php } else {
                                                        echo 'Anonymous';
                                                    } ?> | <?= date('d M Y', strtotime($row->created_at)); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php $i++;
                                }
                                if ($reviews_total > 10) { ?>
                                    <div class='d-flex justify-content-center mt-3'>
                                        <a class='text-dark' style='text-decoration:none;font-weight:bold' href='<?= base_url(); ?>'> View all reviews</a>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- you may also like  -->
<?php if (isset($section1) && !empty($section1)) { ?>
    <div class="mt-5" style="padding-left:10px;padding-right:10px;">
        <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
            <p style='font-size:25px;'><?php if (isset($productbanner1[0]) && $productbanner1[0]->value_1 != '') {
                                            echo $productbanner1[0]->value_1;
                                        } ?> </p>
        </div>
        <div class="row m-0 gallery gap <?php if (sizeof($section1) > 5) {
                                            echo 'section1-slider';
                                        } ?> products-5">
            <?php if (isset($section1)) {
                foreach ($section1 as $row) { ?>
                    <?php echo view('Shop/page/single_product', ['row' => $row, 'wishlist' =>  $session->get('userid')]); ?>
            <?php }
            } ?>
        </div>
    </div>
<?php } ?>

<?php if (isset($section2) && !empty($section2)) { ?>
    <!-- pair category products  -->
    <div class="" style="padding-left:10px;padding-right:10px;">
        <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
            <p style='font-size:25px;'><?php if (isset($productbanner2[0]) && $productbanner2[0]->value_1 != '') {
                                            echo $productbanner2[0]->value_1;
                                        } ?> </p>
        </div>
        <div class="row m-0 gallery gap <?php if (sizeof($section2) > 5) {
                                            echo 'section2-slider';
                                        } ?> products-5">
            <?php if (isset($section2)) {
                foreach ($section2 as $row) { ?>
                    <?php echo view('Shop/page/single_product', ['row' => $row, 'wishlist' =>  $session->get('userid')]); ?>
            <?php }
            } ?>
        </div>
    </div>
<?php } ?>


<!-- mobile desc  -->
<!-- <div class='row m-0 mb-5 mobile_Head_Show' style='padding:0px 0px 0px 0px'>
    <div class="col-12">
        <div class="row" data-toggle="collapse" data-target="#Description-box" aria-expanded="false" aria-controls="Description-box">
            <p class='col-10 footer_Tittle mb-2 pb-4'><a style='text-decoration:none'>Description</a></p>
            <i style='text-align: end;' class='col-2 fa fa-angle-down'></i>
        </div>
        <div id="Description-box" class="collapse" data-parent="#accordion">
            <div class="pb-3">
                <div class="" style='color:#000'>
                    <ul class='pl-4'>
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
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row" data-toggle="collapse" data-target="#additional-box" aria-expanded="false" aria-controls="additional-box">
            <p class='col-10 footer_Tittle mb-2 pb-4'><a style='text-decoration:none'>Additional Information</a></p>
            <i style='text-align: end;' class='col-2 fa fa-angle-down'></i>
        </div>
        <div id="additional-box" class="collapse" data-parent="#accordion">
            <div class="pb-3">
                <div class="" style='color:#000'>
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
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row" data-toggle="collapse" data-target="#Reviews-box" aria-expanded="false" aria-controls="Reviews-box">
            <p class='col-10 footer_Tittle mb-2 pb-4'><a style='text-decoration:none'>Reviews</a></p>
            <i style='text-align: end;' class='col-2 fa fa-angle-down'></i>
        </div>
        <div id="Reviews-box" class="collapse" data-parent="#accordion">
            <div class="pb-3">
                <div class="" style='color:#000'>
                    <p style='color:#7e7e7e'><b>No reviews found !</b></p>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- pc desc  -->
<!-- <div class='mobile_Head_hide'>
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
</div> -->

<!-- Modal -->
<div class='backdrop'></div>

<div id="product3" style="" class='product-360-border backdrop'>
    <button class='close-360' style="z-index:1903;top:10px;border:none;background:none;right:10px;position:absolute;"><i style='font-size:x-large' class='fa fa-xmark'></i></button>
</div>
<div id='main' class=''>
    <div id="product" style="" class='product-360-box'>
        <img src="<?= base_url('public/images/1.png') ?>" />
        <img src="<?= base_url('public/images/2.png') ?>" />
        <img src="<?= base_url('public/images/3.png') ?>" />
        <img src="<?= base_url('public/images/4.png') ?>" />
        <img src="<?= base_url('public/images/5.png') ?>" />
        <img src="<?= base_url('public/images/6.png') ?>" />
        <img src="<?= base_url('public/images/7.png') ?>" />
        <img src="<?= base_url('public/images/8.png') ?>" />
        <img src="<?= base_url('public/images/9.png') ?>" />
        <img src="<?= base_url('public/images/10.png') ?>" />
        <img src="<?= base_url('public/images/11.png') ?>" />
        <img src="<?= base_url('public/images/12.png') ?>" />
        <img src="<?= base_url('public/images/13.png') ?>" />
        <img src="<?= base_url('public/images/14.png') ?>" />
        <img src="<?= base_url('public/images/15.png') ?>" />
        <img src="<?= base_url('public/images/16.png') ?>" />
        <img src="<?= base_url('public/images/17.png') ?>" />
        <img src="<?= base_url('public/images/18.png') ?>" />
        <img src="<?= base_url('public/images/19.png') ?>" />
        <img src="<?= base_url('public/images/20.png') ?>" />
        <img src="<?= base_url('public/images/21.png') ?>" />
        <img src="<?= base_url('public/images/22.png') ?>" />
        <img src="<?= base_url('public/images/23.png') ?>" />
        <img src="<?= base_url('public/images/24.png') ?>" />
        <img src="<?= base_url('public/images/25.png') ?>" />
        <img src="<?= base_url('public/images/26.png') ?>" />
        <img src="<?= base_url('public/images/27.png') ?>" />
        <img src="<?= base_url('public/images/28.png') ?>" />
        <img src="<?= base_url('public/images/29.png') ?>" />
        <img src="<?= base_url('public/images/30.png') ?>" />
        <img src="<?= base_url('public/images/31.png') ?>" />
        <img src="<?= base_url('public/images/32.png') ?>" />
        <img src="<?= base_url('public/images/33.png') ?>" />
        <img src="<?= base_url('public/images/34.png') ?>" />
        <img src="<?= base_url('public/images/35.png') ?>" />
        <img src="<?= base_url('public/images/36.png') ?>" />
        <img src="<?= base_url('public/images/36.png') ?>" />
        <img src="<?= base_url('public/images/37.png') ?>" />
        <img src="<?= base_url('public/images/38.png') ?>" />
        <img src="<?= base_url('public/images/39.png') ?>" />
        <img src="<?= base_url('public/images/40.png') ?>" />
        <img src="<?= base_url('public/images/41.png') ?>" />
        <img src="<?= base_url('public/images/42.png') ?>" />
        <img src="<?= base_url('public/images/43.png') ?>" />
        <img src="<?= base_url('public/images/44.png') ?>" />
        <img src="<?= base_url('public/images/45.png') ?>" />
        <img src="<?= base_url('public/images/46.png') ?>" />
        <img src="<?= base_url('public/images/47.png') ?>" />
        <img src="<?= base_url('public/images/48.png') ?>" />
        <img src="<?= base_url('public/images/49.png') ?>" />
        <!-- <img src="<?= base_url('public/images/50.png') ?>" /> -->
    </div>
</div>

<!-- malika enquiry modal  -->
<!-- Modal -->
<!-- <form class='enquiry-form'>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enquiry </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class='mb-2'>
                        <span class='form-label'>Name</span>
                        <input type='text' name='name' required class='form-control w-50 name' placeholder='Name' />
                    </div>
                    <div class='mb-2'>
                        <span class='form-label'>Contact</span>
                        <input type='text' name='contact' required class='form-control w-50 contact' placeholder='Contact' />
                    </div>
                    <input type='hidden' class='product_id' value='<?= $product[0]->id; ?>' name='product_id'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form> -->

<!-- Item slider 5 items you may also like-->
<!-- <div class="container-fluid product-slider gap">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'>You Might Also Like</p> -->
<!-- <div class='text-center gap mobile_Head_Hide'><button class='btn rounded' style='background:#000;color:#fff;'>View All </button></div> -->
<!-- </div>
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
    </div> -->
<!-- <div class='text-center gap mobile_Head_Show' style='justify-content: center;'><button class='btn rounded-0' style='background:#000;color:#fff;'>View All</button></div> -->
</div>

<!-- Item slider 5 items recently view-->
<!-- <div class="container-fluid product-slider gap">
    <div class='galler_heading d-flex justify-content-between' style='border-bottom: 1px solid #d5d5d5;height:40px;margin:0px 20px 10px 20px;padding-bottom:45px;'>
        <p style='font-size:25px;'> RECENTLY VIEWED</p> -->
<!-- <div class='text-center gap mobile_Head_Hide'><button class='btn rounded' style='background:#000;color:#fff;'>View All </button></div> -->
<!-- </div> -->
<!-- <div class="row">
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
    </div> -->
<!-- <div class='text-center gap mobile_Head_Show' style='justify-content: center;'><button class='btn rounded-0' style='background:#000;color:#fff;'>View All</button></div> -->
</div>

<script type="text/javascript">
    $(document).ready(function() {
        //share button mobile 
        const share = e => {
            if (navigator.share) {
                navigator
                    .share({
                        title: "Share my blog",
                        text: "Web development tutorial blogs",
                        url: "<?= base_url(); ?>"
                    })
                    .then(() => console.log("thanks for share"))
                    .catch(error => console.log("error", error));
            }
        };
        if (!navigator.share) {
            document.getElementById('tip').className = 'show'
        }
        document.getElementById("share").addEventListener("click", share);
        //end


        <?php if (isset($productbanner1) && !empty(($productbanner1) && $productbanner1[0]->value_3 == 'YES')) { ?>
            $('.section1-slider').slick({
                // dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 5,
                slidesToScroll: 5,
                prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 5,
                            infinite: true,
                            // dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        <?php } ?>

        <?php if (isset($productbanner2) && !empty(($productbanner2) && $productbanner2[0]->value_3 == 'YES')) { ?>
            $('.section2-slider').slick({
                // dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 5,
                slidesToScroll: 5,
                prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
                nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 5,
                            infinite: true,
                            // dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        <?php } ?>

        $('.addtocart').click(function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('add_to_cart') ?>",
                data: {
                    product_id: '<?= $product[0]->id; ?>',
                    price: '<?= $product[0]->price; ?>'
                },
                // contentType: false,
                // cache: false,
                // processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '100') {
                        alert('Login to add product in your cart !');
                    } else if (data.status == '200') {
                        alert('Added to Cart !');
                        setTimeout(function() {
                            // $('#download').css('display', 'block');
                            // $('#loader').css('visibility', 'hidden');
                            window.location.reload();
                        }, 1000);
                        // alert('registered_successfully');

                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });


        $('.enquiry-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "<?= base_url('add_enquiry') ?>",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == '200') {
                        alert('Application Sent Successfully');
                        setTimeout(function() {
                            // $('#download').css('display', 'block');
                            // $('#loader').css('visibility', 'hidden');
                            window.location.reload();
                        }, 1000);
                        // alert('registered_successfully');

                    } else {
                        alert('something went wrong');
                    }
                }
            });
        });


        $(".wishlist-btn").mouseover(function() {
            $("#www").css("display", "none !important");
        });

        $('.tap-btn').click(function() {
            // $('#product').css('display', 'block');
            $('#product').addClass('responsive-product-360');

            $('.backdrop').css('display', 'block');
            $('#main').css('display', 'block');

            $('body').css('position', 'fixed');

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
            $('.product_image_thumbnails').css('border', 'none');
            $('.product_image_thumbnails').css('filter', 'none');
            $(this).css('border', '1px solid #b5b5b5');
            $(this).css('filter', 'brightness(80%)');
            $('.product_image').addClass('w3-animate-opacity');
            setTimeout(function() {
                $('.product_image').removeClass('w3-animate-opacity');
            }, 500);
        });

        $('.close-360').click(function() {
            // $('#product').css('display', 'none');
            $('#product').removeClass('responsive-product-360');

            $('.backdrop').css('display', 'none');
            $('#main').css('display', 'none');

            $('body').css('position', 'initial');
        });
    });
</script>

<?= $this->endSection() ?>