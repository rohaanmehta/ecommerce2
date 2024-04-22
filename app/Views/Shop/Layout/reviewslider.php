<style>
    .review_slider_single_item {
    background-color: #ffffff;
    padding: 15px !important;
    min-height: 150px;
    /* box-shadow: 0px 2px 8px 4px #7a7a7a55; */
    border: 1px solid lightgray;
    }
</style>
<div class='row'>
    <div class="review_slider_single_item col-12 col-md-4">
        <div class='p-3'>
            <a href='<?= base_url('/'); ?>' style='text-decoration:none;'>
                <div class='row' style='display:flex'>
                    <div class='col-4 p-0'>
                        <img width='90%' src="<?= 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTFiR65NX1rh48qiw_y9kg2tiZngbiLtH5LJiqkg7QFg&s' ?>">
                    </div>
                    <div class='col-8 p-0'>
                        <div class='text-dark pl-4 mb-2 h6'>
                            <?php echo character_limiter('This is a test tittle for the review products on homepage', 40, '...'); ?>
                        </div>
                        <div class='text-dark pl-4 mb-3'>
                            <!-- <? //php $this->load->view('reviewstars', ['review' => '4']); 
                                    ?> -->

                        </div><br>
                        <div class='text-dark pl-4' style='font-size:15px;color:#626262;'>
                            <i style='font-size:10px;' class="fa fa-quote-left" aria-hidden="true"></i>
                            <?php echo character_limiter('This is the review of the actual product by the customer', 50, '...'); ?>
                            <i style='font-size:10px;' class="fa fa-quote-right" aria-hidden="true"></i>
                        </div>
                        <div class='d-flex justify-content-center mt-1'>
                            <!-- <? //php $this->load->view('partials/_review_stars', ['review' => $item->rating]); 
                                    ?> -->
                            <p class='mt-1' style='font-size:15px;'> - <?= 'rohaan' . ' ' . 'mehta' ?></p>
                        </div>
                    </div>
                </div>
            </a>
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