<?php foreach ($section1 as $row) { ?>
    <a href='<?= base_url('products/'.$row->product_slug); ?>' style='display:contents;color:#000'>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center p-0 mb-4">
            <div class='gallery_container'>
                <img class='gallery_img' src='<?= base_url('/uploads/product_images/'.$row->image_name1) ?>' />
                <div class='text-left p-2'>
                    <p class='product_price'>$ <?= $row->price ?></p>
                    <p class='product_title'><?= $row->title ?></p>
                </div>
            </div>
        </div>
    </a>
<?php } ?>