<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<style>
    .review-text {
        font-size: 14px;
        color: #5c5c5c;
        font-weight: 400;
    }
</style>
<div class="mb-5">
    <div class='row m-4 p-0'>
        <div class='col-12 col-md-4 p-0 mobile_Head_Hide' style='max-width:400px;'>
            <a href='<?= base_url($category.'/'.$product[0]->product_slug); ?>' style='text-decoration:none;color:black'>
                <div class='row p-0 m-0'>
                    <?php if (isset($product[0]->image_name1) && !empty($product[0]->image_name1) && is_file(ROOTPATH . 'uploads/product_images/' . $product[0]->image_name1)) { ?>
                        <img class='product_image round w-100' alt='<?= $product[0]->title ?>' src='<?= base_url('uploads/product_images/' . $product[0]->image_name1); ?>' />
                    <?php } ?>
                </div>
                <div class='col-12 col-md-8 pl-0 pt-3'>
                    <div class='product_heading'>
                        <p class='mb-2' style='font-size:20px;font-weight:600;'><?= $product[0]->title; ?></p>
                    </div>
                    <div class='product_price_main pt-0'>
                        <p style='font-size:18px;font-weight:600;'>$<?= $product[0]->price; ?></p>
                    </div>
                </div>
            </a>
        </div>
        <div class='col-12 p-0 mobile_Head_Show'>
            <a href='<?= base_url($category.'/'.$product[0]->product_slug); ?>' style='text-decoration:none;color:black'>
                <div class='row p-0 m-0'>
                    <?php if (isset($product[0]->image_name1) && !empty($product[0]->image_name1) && is_file(ROOTPATH . 'uploads/product_images/' . $product[0]->image_name1)) { ?>
                        <div class='col-12 p-0'>
                            <img class='product_image round w-100' alt='<?= $product[0]->title ?>' src='<?= base_url('uploads/product_images/' . $product[0]->image_name1); ?>' />
                        </div>
                    <?php } ?>
                </div>
            </a>
        </div>
        <div class='col-12 col-md-8 p-0 pt-2 pt-md-0 pl-md-4'>
            <div class='product_heading'>
                <span style='font-weight:700;font-size:15px;'>RATINGS </span>
                <!-- <i class='fa fa-star-o'></i> -->
            </div>
            <div class='product_heading' style='display:flex;align-items:center;'>
                <?php if (isset($reviews_average) && !empty($reviews_average)) { ?>
                    <span style='font-weight:400;font-size:30px;'><?= round($reviews_average[0]->average_review, '1') ?> </span><i style='font-size:20px;padding-top:2px;padding-left:3px;' class='fa fa-star-o'></i>
                <?php } ?>
            </div>
            <div class='product_heading mt-2'>
                <?php if (isset($reviews_total) && $reviews_total != '') { ?>
                    <span style='font-weight:400;font-size:14px;color:#818181'><?= $reviews_total ?> reviews </span>
                <?php } ?>
            </div>
            <hr>
            <div class=''>
                <p class='h6' style='font-weight:600;'>Customer Reviews</p>
            </div>
            <div class='reviews-box pt-2'>
            </div>
            <div class='pt-2 row load-more'>
                <a class='pl-4 load-more-reviews text-dark' style='font-weight:600;font-size:15px;cursor:pointer;'> View More </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>

<script type="text/javascript">
    $(document).ready(function() {
        get_reviews();
        $('.load-more-reviews').click(function() {
            get_reviews();
        });
    });

    const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    function get_reviews() {
        var count = $('.review-count').length;
        $.ajax({
            type: "POST",
            url: "<?= base_url('get_product_review') ?>",
            data: {
                id: '<?= $product[0]->id; ?>',
                count: count
            },
            // contentType: false,
            // cache: false,
            // processData: false,
            dataType: "json",
            success: function(data) {
                // console.log(data);
                if (data.status == '200') {
                    for ($i = 0; $i < data.reviews.length; $i++) {
                        // console.log(data.reviews[$i]['first_name']);
                        if (data.reviews[$i]['first_name'] != null) {
                            var name = data.reviews[$i]['first_name'];
                        } else {
                            var name = 'Anonymous';
                        }

                        var time = new Date(Date.parse(data.reviews[$i]['created_at']));
                        time = time.getDate() + ' ' + month[time.getMonth()] + ' ' + time.getFullYear();

                        var html = "<div class='review-count d-flex' style='flex-wrap:nowrap'><div><span class='badge badge-secondary' style='padding:4px;margin-top:5px;'>" + data.reviews[$i]['stars'] + "<i class='fa fa-star'></i></span></div><div class='pl-2'><div class='review-text'>" + data.reviews[$i]['review'] + "</div><div class='mt-2' style='color:#7e7e7e;font-size:13px;'>" + name + " | " + time + "</div></div></div><hr>";
                        $('.reviews-box').append(html);
                    }
                } else {
                    alert('something went wrong');
                }
                if ($('.review-count').length >= data.reviews_total) {
                    $('.load-more').html('');
                }
            }
        });
    }
</script>
<?= $this->endSection('scripts') ?>