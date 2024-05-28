<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<div class="mb-5">
    <div class='row m-4 p-0'>
        <div class='col-12 col-md-4 p-0 mobile_Head_Hide' style='max-width:400px;'>
            <div class='row p-0 m-0'>
                <?php if (isset($product[0]->image_name1) && !empty($product[0]->image_name1) && is_file(ROOTPATH . 'uploads/product_images/' . $product[0]->image_name1)) { ?>
                    <img class='product_image round w-100' alt='<?= $product[0]->title ?>' src='<?= base_url('uploads/product_images/' . $product[0]->image_name1); ?>' />
                <?php } ?>
            </div>
        </div>
        <div class='col-12 p-0 mobile_Head_Show'>
            <div class='row p-4 m-0'>
                <?php if (isset($product[0]->image_name1) && !empty($product[0]->image_name1) && is_file(ROOTPATH . 'uploads/product_images/' . $product[0]->image_name1)) { ?>
                    <div class='col-12 p-0'>
                        <img class='product_image round' alt='<?= $product[0]->title ?>' src='<?= base_url('uploads/product_images/' . $product[0]->image_name1); ?>' />
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class='col-12 col-md-8 pl-4'>
            <div class='product_heading'>
                <span style='font-weight:700;font-size:15px;'>RATINGS </span><i class='fa fa-star-o'></i>
            </div>
            <div class='product_heading'>
                <?php if(isset($reviews_average) && !empty($reviews_average)){ ?>
                    <span style='font-weight:400;font-size:30px;'><?= round($reviews_average[0]->average_review,'1') ?> </span><i style='font-size:20px;' class='fa fa-star'></i>
                <?php } ?>
            </div>
            <div class='product_heading mt-2'>
                <?php if(isset($reviews_total) && $reviews_total != ''){ ?>
                    <span style='font-weight:400;font-size:14px;color:#818181'><?= $reviews_total ?> reviews </span>
                <?php } ?>
            </div>
            <hr>
        </div>
        <!-- <div class='col-12 col-md-8 pl-4'>
            <div class='product_heading'>
                <//?= $product[0]->title; ?>
            </div>
            <hr>
            <div class='product_price_main'>
                $<//?= $product[0]->price; ?>
            </div>
        </div> -->
    </div>
</div>
</div>

<script>
    $(document).ready(function() {});
</script>
<?= $this->endSection() ?>