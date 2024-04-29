<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-0 mb-4">
    <a href='<?= base_url('products/' . $row->product_slug); ?>' style='display:contents;color:#000'>
        <?php
        if ($wishlist != '') { ?>
            <div class='product-items-icon add-to-wishlist' id='<?= $row->id ?>'>
                <?php if ($row->wishlist == '') { ?>
                    <i class='fa fa-heart-o'></i>
                <?php } else { ?>
                    <i class='fa fa-heart'></i>
                <?php } ?>
            </div>
        <?php } ?>
        <div class='gallery_container'>
            <div class='single-product-slider'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/' . $row->image_name1) ?>' />
                <?php if ($row->image_name2 != '') { ?>
                    <img class='gallery_img product-slider-image' src='<?= base_url('/uploads/product_images/' . $row->image_name2) ?>' />
                <?php } ?>
                <?php if ($row->image_name3 != '') { ?>
                    <img class='gallery_img product-slider-image' src='<?= base_url('/uploads/product_images/' . $row->image_name3) ?>' />
                <?php } ?>
                <?php if ($row->image_name4 != '') { ?>
                    <img class='gallery_img product-slider-image' src='<?= base_url('/uploads/product_images/' . $row->image_name4) ?>' />
                <?php } ?>
            </div>
            <div class='wishlist-box'>
                <button class='border-0 btn btn-sm btn-light add-to-wishlist' id='<?= $row->id ?>'>
                <i class='fa fa-heart-o mr-1'></i>  WISHLIST
                </button>
            </div>
            <div class='text-left p-2'>
                <p class='product_title'><?= $row->title ?></p>
                <p class='product_price'>$ <?= $row->price ?></p>
            </div>
        </div>
    </a>
</div>