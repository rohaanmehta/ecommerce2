<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-1 mb-4 main-product-slider">
    <?php
    if ($wishlist != '') { ?>
        <!-- <div class='product-items-icon add-to-wishlist' id='<?= $row->id ?>'>
            <?php if ($row->wishlist == '') { ?>
                <i class='fa fa-heart-o'></i>
            <?php } else { ?>
                <i class='fa fa-heart'></i>
            <?php } ?>
        </div> -->
    <?php } ?>
    <div class='gallery_container'>
        <?php helper('custom');
        $badge = get_product_badge($row->id);
        $category = get_category_by_productid($row->id);

        // if(isset($category[0]->category_slug) && !empty($category[0]->category_slug)){
        $category = $category[0]->category_slug;
        // }else{
        //     $category = 'products';
        // }

        if (!empty($badge)) { ?>
            <div class="badge badge-primary text-wrap" style="font-weight:bolder;font-size:11px;border-radius:0px 4px 4px 0px;background:#000;width:95px;position:absolute;z-index:1;top:6px;left:0px;">
                <?= $badge[0]->badge_text; ?>
            </div>
        <?php } ?>

        <div class='wishlist-box'>
            <?php if ($wishlist != '') { ?>
                <button class='border-0 btn btn-sm btn-light add-to-wishlist' data-target='' id='<?= $row->id ?>'>
                    <?php if ($row->wishlist == '') { ?>
                        <i class='fa fa-heart-o mr-1'></i>
                    <?php } else { ?>
                        <i class='fa fa-heart mr-1'></i>
                    <?php } ?>
                    WISHLIST
                </button>
            <?php } else { ?>
                <button class='border-0 btn btn-sm btn-light add-to-wishlist' data-target="#loginexampleModal" data-toggle="modal">
                    <i class='fa fa-heart-o mr-1'></i>
                    WISHLIST
                </button>
            <?php } ?>
        </div>

        <a href='<?= base_url($category . '/' . $row->product_slug); ?>' style='display:contents;color:#000'>
            <div class="single-product-slider">
                <div class="blaze-container">
                    <div class="blaze-track-container">
                        <div class="blaze-track products-5">
                            <!-- <div class=''> -->
                            <img alt='<?= $row->title; ?>' class='gallery_img w-100' src='<?= base_url('/uploads/product_images/' . $row->small_image_name1) ?>' />
                            <?php if ($row->small_image_name2 != '') { ?>
                                <picture class='product-slider-image gallery_img'>
                                    <source srcset="<?= base_url('/uploads/product_images/' . $row->small_image_name2) ?>" media="(min-width: 768px)">
                                    <img alt='<?= $row->title; ?>' loading='lazy' class='gallery_img product-slider-image' src='data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' />
                                </picture>
                            <?php } ?>
                            <?php if ($row->small_image_name3 != '') { ?>
                                <picture class='product-slider-image gallery_img'>
                                    <source srcset="<?= base_url('/uploads/product_images/' . $row->small_image_name3) ?>" media="(min-width: 768px)">
                                    <img alt='<?= $row->title; ?>' loading='lazy' class='gallery_img product-slider-image' src='data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' />
                                </picture>
                            <?php } ?>
                            <?php if ($row->small_image_name4 != '') { ?>
                                <picture class='product-slider-image gallery_img'>
                                    <source srcset="<?= base_url('/uploads/product_images/' . $row->small_image_name4) ?>" media="(min-width: 768px)">
                                    <img alt='<?= $row->title; ?>' loading='lazy' class='gallery_img product-slider-image' src='data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' />
                                </picture>
                            <?php } ?>
                            <!-- </div> -->
                        </div>
                        <div class="blaze-pagination"></div>
                    </div>
                </div>
            </div>
            <div class='mobile-product-slider' style='display:none'>
                <img alt='<?= $row->title; ?>' class='gallery_img' src='<?= base_url('/uploads/product_images/' . $row->image_name1) ?>' />
            </div>
            <div class='text-left p-2'>
                <p class='product_title'><?= $row->title ?></p>
                <p class='product_price'>
                    <?php if ($row->discount != '') { ?>
                        $<?php echo get_product_discount_price($row->price, $row->discount); ?> <span class='single_product_discount_price'>$<?= $row->price; ?></span>
                    <?php } else { ?>
                        $<?= $row->price; ?>
                    <?php } ?>
                </p>
            </div>
        </a>
    </div>
</div>