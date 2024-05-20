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
        <a href='<?= base_url($category.'/'. $row->product_slug); ?>' style='display:contents;color:#000'>
            <div class='single-product-slider'>
                <img alt='<?= $row->title;?>' class='gallery_img' src='<?= base_url('/uploads/product_images/' . $row->image_name1) ?>' />
                <?php if ($row->image_name2 != '') { ?>
                    <img alt='<?= $row->title;?>' class='gallery_img product-slider-image' src='<?= base_url('/uploads/product_images/' . $row->image_name2) ?>' />
                <?php } ?>
                <?php if ($row->image_name3 != '') { ?>
                    <img alt='<?= $row->title;?>' class='gallery_img product-slider-image' src='<?= base_url('/uploads/product_images/' . $row->image_name3) ?>' />
                <?php } ?>
                <?php if ($row->image_name4 != '') { ?>
                    <img alt='<?= $row->title;?>' class='gallery_img product-slider-image' src='<?= base_url('/uploads/product_images/' . $row->image_name4) ?>' />
                <?php } ?>
            </div>
            <div class='text-left p-2'>
                <p class='product_title'><?= $row->title ?></p>
                <p class='product_price'>$ <?= $row->price ?></p>
            </div>
        </a>
    </div>
</div>