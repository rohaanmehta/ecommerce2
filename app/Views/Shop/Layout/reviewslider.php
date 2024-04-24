<style>
    .review_slider_single_item {
        background-color: #ffffff;
        padding: 15px !important;
        min-height: 150px;
        /* box-shadow: 0px 2px 8px 4px #7a7a7a55; */
        border: 1px solid lightgray;
    }

    .review-star-empty {
        color: #d1d1d1;
    }
</style>
<div class="galler_heading d-flex justify-content-center">
    <div>
        <p style="font-size:25px;">FROM OUR CUSTOMERS...</p>
    </div>
</div>
<div class='row pl-3 pr-2 pl-sm-4 pr-sm-4 pt-3 pb-5'>
    <div class='col-12 col-sm-12 col-md-4 mb-4'>
        <div class="review_slider_single_item">
            <div class='p-3'>
                <a href='<?= base_url('/'); ?>' style='text-decoration:none;color:#000 !important'>
                    <div class='row' style='display:flex'>
                        <div class='col-4 p-0'>
                            <img width='120px' src="<?= 'https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202403/img_x300_65f97792bcb5f5-51048392-25522130.webp' ?>">
                        </div>
                        <div class='col-8 p-0'>
                            <div class='text-dark pl-4 mb-2'>
                                <?php echo character_limiter('Magenta Silk Solid Readymade Saree Blouse', 70, '...'); ?>
                            </div>
                            <div class='text-dark pl-4 mb-3'>
                                <?php echo view('Shop/Layout/reviewstars'); ?>
                            </div>
                            <div class='text-dark pl-4' style='font-size:15px;font-weight:400;color:#626262;'>
                                <i style='font-size:10px;' class="fa fa-quote-left" aria-hidden="true"></i>
                                <?php echo character_limiter('Came quickly and fit perfectly. Beautiful color!', 80, '...'); ?>
                                <i style='font-size:10px;' class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                            <div class='d-flex justify-content-center mt-1'>
                                <p class='mt-1' style='font-size:15px;'> - <?= 'rohaan' . ' ' . 'mehta' ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class='col-12 col-sm-12 col-md-4 mb-4'>
        <div class="review_slider_single_item">
            <div class='p-3'>
                <a href='<?= base_url('/'); ?>' style='text-decoration:none;color:#000 !important'>
                    <div class='row' style='display:flex'>
                        <div class='col-4 p-0'>
                            <img width='120px' src="<?= 'https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202403/img_x300_65f97792bcb5f5-51048392-25522130.webp' ?>">
                        </div>
                        <div class='col-8 p-0'>
                            <div class='text-dark pl-4 mb-2'>
                                <?php echo character_limiter('Magenta Silk Solid Readymade Saree Blouse', 70, '...'); ?>
                            </div>
                            <div class='text-dark pl-4 mb-3'>
                                <?php echo view('Shop/Layout/reviewstars'); ?>
                            </div>
                            <div class='text-dark pl-4' style='font-size:15px;font-weight:400;color:#626262;'>
                                <i style='font-size:10px;' class="fa fa-quote-left" aria-hidden="true"></i>
                                <?php echo character_limiter('Came quickly and fit perfectly. Beautiful color!', 80, '...'); ?>
                                <i style='font-size:10px;' class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                            <div class='d-flex justify-content-center mt-1'>
                                <p class='mt-1' style='font-size:15px;'> - <?= 'rohaan' . ' ' . 'mehta' ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class='col-12 col-sm-12 col-md-4 mb-4'>
        <div class="review_slider_single_item">
            <div class='p-3'>
                <a href='<?= base_url('/'); ?>' style='text-decoration:none;color:#000 !important'>
                    <div class='row' style='display:flex'>
                        <div class='col-4 p-0'>
                            <img width='120px' src="<?= 'https://d31cu6kgfv0h34.cloudfront.net/uploads/images/202403/img_x300_65f97792bcb5f5-51048392-25522130.webp' ?>">
                        </div>
                        <div class='col-8 p-0'>
                            <div class='text-dark pl-4 mb-2'>
                                <?php echo character_limiter('Magenta Silk Solid Readymade Saree Blouse', 70, '...'); ?>
                            </div>
                            <div class='text-dark pl-4 mb-3'>
                                <?php echo view('Shop/Layout/reviewstars'); ?>
                            </div>
                            <div class='text-dark pl-4' style='font-size:15px;font-weight:400;color:#626262;'>
                                <i style='font-size:10px;' class="fa fa-quote-left" aria-hidden="true"></i>
                                <?php echo character_limiter('Came quickly and fit perfectly. Beautiful color!', 80, '...'); ?>
                                <i style='font-size:10px;' class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                            <div class='d-flex justify-content-center mt-1'>
                                <p class='mt-1' style='font-size:15px;'> - <?= 'rohaan' . ' ' . 'mehta' ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



<!-- // add in helper -->
<?php
function character_limiter($str, $n = 500, $end_char = '&#8230;')
{
    if (mb_strlen($str) < $n) {
        return $str;
    }

    // a bit complicated, but faster than preg_replace with \s+
    $str = preg_replace('/ {2,}/', ' ', str_replace(array("\r", "\n", "\t", "\v", "\f"), ' ', $str));

    if (mb_strlen($str) <= $n) {
        return $str;
    }

    $out = '';
    foreach (explode(' ', trim($str)) as $val) {
        $out .= $val . ' ';

        if (mb_strlen($out) >= $n) {
            $out = trim($out);
            return (mb_strlen($out) === mb_strlen($str)) ? $out : $out . $end_char;
        }
    }
}
?>