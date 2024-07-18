<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<?php $session = session();
$url = current_url();
$params = $_SERVER['QUERY_STRING'];
$url = $url . '?' . $params;
?>
<style>
</style>

<div class=''>
    <div class='card'>
        <div class='row mobile_Head_Hide'>
            <?php if (isset($category_banners) && !empty($category_banners)) {
                foreach ($category_banners as $row) { ?>
                    <div class='col-12'>
                        <img class='w-100' src='<?= base_url('uploads/category_banners/' . $row->image); ?>' />
                    </div>
            <?php }
            } ?>
        </div>
        <div class='row mobile_Head_Show'>
            <?php if (isset($category_banners) && !empty($category_banners)) {
                foreach ($category_banners as $row) { ?>
                    <div class='col-12'>
                        <img class='w-100' src='<?= base_url('uploads/category_banners/' . $row->mobile_image); ?>' />
                    </div>
            <?php }
            } ?>
        </div>
        <div class="pt-2 pb-0 pt-md-5 pl-5 pr-md-4 row" style='align-items: center;'>
            <div class='col-12 col-md-4 pl-0 category_name'>
                <span>
                    <?= $categoriesinfo[0]->category_name;
                    ?>
                </span>
            </div>
            <?php if (isset($products) && !empty($products)) { ?>
                <div class='col-8 text-right mobile_Head_Hide' style='display:flex;justify-content:end;align-items: center;'>
                    <p class='m-0 sort_by mr-3'>Sort By: </p>
                    <select class='form-control sort' style='max-width:210px;'>
                        <option value='<?= $new; ?>'>What's New</option>
                        <option value='<?= $low; ?>' <?php if (strpos($url, '%3Asort=low') == true) {
                                                            echo 'selected';
                                                        } ?>>Price:Low to High</option>
                        <option value='<?= $high; ?>' <?php if (strpos($url, '%3Asort=high') == true) {
                                                            echo 'selected';
                                                        } ?>>Price:High to Low</option>
                    </select>
                </div>
            <?php } ?>
            <div class='col-12 pl-0 pt-4 category-desc'>
                <span>
                    <?= $categoriesinfo[0]->category_desc_top;
                    ?>
                </span>
            </div>
        </div>
        <!-- <//?//php echo '<pre>';print_r($filters);exit;?> -->

        <div class="row ml-2 mr-2 mt-2 ml-md-4 mr-md-4 gallery mt-md-2" style="position:relative;">
            <div class='col-md-3 p-0 pr-3 mobile_Head_Hide' style='max-width:280px;background:#fff;border-right:1px solid #dfdfdf;'>
                <?php if (isset($subcategories) && !empty($subcategories)) { ?>
                    <div class='filter-box p-1'>
                        <div class='filters-heading'>
                            Categories
                        </div>
                        <div class=''>
                            <?php foreach ($subcategories as $filter) { ?>
                                <a class="filter_value text-capitalize" href='<?= base_url($filter['url']); ?>'><?= $filter['name']; ?> </a><br>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isset($filters) && !empty($filters)) {
                    $showcolor = '0';
                    foreach ($filters as $key => $filter) { ?>
                        <div class='filter-box p-1'>
                            <div class='filters-heading text-capitalize'>
                                <?php
                                $keyy = print_r($key);
                                if ($key == 'colour') {
                                    $showcolor = '1';
                                } else {
                                    $showcolor = '0';
                                } ?>
                            </div>
                            <?php
                            foreach ($filter as $key => $fil) { ?>
                                <a href="<?= $fil['url']; ?>" class="filter_value">
                                    <div class='d-flex' style='align-items:center;'>
                                        <div>
                                            <input type='checkbox' url='<?= $fil['url']; ?>' class='filter_checkbox mr-2' <?php if ($fil['checked'] == '1') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                        </div>
                                        <?php if ($showcolor == '1') { ?>
                                            <div style='filter:brightness(0.9);margin-right:7px;height:17px;width:17px;border-radius:100px;background-color:<?= $fil['value'] ?>'></div>
                                        <?php } ?>
                                        <div class='text-capitalize filter_value'>
                                            <?= $fil['value'] ?>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div><?php
                            }
                        } ?>

                <div class='filter-box p-1'>
                    <div class='filters-heading'>
                        Price
                    </div>
                    <div class='d-flex'>
                        <input class='form-control mr-2 min-price' placeholder="Min Price" value='<?php if (isset($min_price) && $min_price != 0) {
                                                                                                        echo $min_price;
                                                                                                    } ?>' />
                        <input class='form-control mr-2 max-price' placeholder="Max Price" value='<?php if (isset($max_price) && $max_price != 0) {
                                                                                                        echo $max_price;
                                                                                                    } ?>' />
                        <button class='btn black-btn price-filter-btn' url='<?= $price_filter_url; ?>'>Go</button>
                    </div>
                </div>
            </div>
            <!-- <//?php echo'<pre>';print_r($products);exit?> -->

            <div class='d-flex col-md-9' style='flex-wrap:wrap;'>
                <?php if (isset($products) && !empty($products)) {
                    foreach ($products as $row) { ?>
                        <?php echo view('Shop/page/single_product', ['row' => $row, 'wishlist' =>  $session->get('userid')]); ?>
                    <?php }
                } else { ?>
                    <div class='w-100 text-center h6' style='font-weight:600'>No Products Found !</div>
                <?php } ?>
            </div>
        </div>
        <?php if (isset($products) && !empty($products)) { ?>
            <div class="d-flex w-100 bg-light mobile_Head_Show" style="border:1px solid #dbdbdb;position:sticky;bottom:0;z-index:1;">
                <button style='' class="filter-sort-btn btn bg-light w-50"><i style='color:#a9a9a9;' class="mr-2 fa fa-sort-amount-asc"></i>SORT</button>
                <button style='' class="filter-filter-btn btn bg-light w-50"><i style='color:#a9a9a9;' class="mr-2 fa fa fa-filter"></i>FILTERS</button>
            </div>
        <?php } ?>

        <div class="filter-filter-box w-100 bg-light" style="display:none;position:sticky;bottom:0;z-index:3;height:300px;">
            <div class='d-flex justify-content-end close-sort-filter'><i class='fa fa-times'></i></div>
            <div style="color:#4e4e4e;padding:10px;font-size:13px;font-weight:700;border-bottom:1px solid #c5c5c5">SORT BY</div>
            <a class='sort-options' href='<?= $new; ?>'>
                <div class="sort-options <?php if (strpos($url, '%3Asort=low') == false && strpos($url, '%3Asort=high') == false) {
                                                echo 'active-filter';
                                            } ?>">What's New</div>
            </a>
            <a class='sort-options' href='<?= $low; ?>'>
                <div class="sort-options <?php if (strpos($url, '%3Asort=low') == true) {
                                                echo 'active-filter';
                                            } ?>">Price:Low to High</div>
            </a>
            <a class='sort-options' href='<?= $high; ?>'>
                <div class="sort-options <?php if (strpos($url, '%3Asort=high') == true) {
                                                echo 'active-filter';
                                            } ?>">Price:High to Low</div>
            </a>
        </div>

        <?php if (isset($products) && !empty($products)) { ?>
            <div class="filter-filter-box2 w-100 bg-light" style="display:none;position:sticky;bottom:0;z-index:3;height:300px;">
                <div class='d-flex justify-content-end close-filter-filter'><i class='fa fa-times'></i></div>
                <div style="color:#4e4e4e;padding:10px;font-size:13px;font-weight:700;border-bottom:1px solid #c5c5c5">FILTERS</div>
                <div class='row'>
                    <div class='col-6 p-0 pl-3'>
                        <div class=''>
                            <?php if (isset($subcategories) && !empty($subcategories)) { ?>
                                <div class='mobile-filter-box' id='categories' style='border-right: 1px solid #dfdfdf;height:20px'> Categories</div>
                            <?php } ?>
                            <?php if (isset($filters) && !empty($filters)) {
                                foreach ($filters as $key => $filter) { ?>
                                    <div class='mobile-filter-box' id='<?= $key; ?>' style='border-right: 1px solid #dfdfdf;height:20px'><?= $key; ?></div>
                            <?php }
                            } ?>
                            <div class='mobile-filter-box' id='prices' style='border-right: 1px solid #dfdfdf;height:20px'> Price</div>
                        </div>
                    </div>
                    <div class='col-6 p-0 pl-2 pt-2'>
                        <?php if (isset($subcategories) && !empty($subcategories)) { ?>
                            <div class='mobile-filter-options categories' style="display:none;max-height:300px;overflow-y:auto;">
                                <?php foreach ($subcategories as $filter) { ?>
                                    <a class="filter_value text-capitalize" href='<?= base_url($filter['url']); ?>'><?= $filter['name']; ?> </a><br>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if (isset($filters) && !empty($filters)) {
                            foreach ($filters as $key => $filter) { ?>
                                <div class='mobile-filter-options <?= $key; ?>' style="display:none;max-height:300px;overflow-y:auto;">
                                    <?php foreach ($filter as $key => $fil) { ?>
                                        <a href="<?= $fil['url']; ?>" class="filter_value">
                                            <div class='text-capitalize'><input type='checkbox' url='<?= $fil['url']; ?>' class='filter_checkbox mr-2' <?php if ($fil['checked'] == '1') {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?>> <?= $fil['value'] ?>
                                            </div>
                                        </a>
                                        <!-- </div> -->
                                    <?php } ?>
                                </div> <?php
                                    }
                                } ?>
                        <div class="mobile-filter-options prices w-100 bg-light" id='' style="display:none;position:sticky;bottom:0;z-index:3;height:300px;">
                            <input class='form-control min-price2 mb-2' style="width:90%;font-size:13px;" placeholder="Min Price" value='<?php if (isset($min_price) && $min_price != 0) {
                                                                                                            echo $min_price;
                                                                                                        } ?>' />
                            <input class='form-control max-price2 mb-2' style="width:90%;font-size:13px;" placeholder="Max Price" value='<?php if (isset($max_price) && $max_price != 0) {
                                                                                                            echo $max_price;
                                                                                                        } ?>' />
                            <button class='btn black-btn price-filter-btn2 rounded' style="width:90%;font-size:13px;" url='<?= $price_filter_url; ?>'>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


    </div>
    <?php if (isset($products) && !empty($products)) { ?>
        <div class='filter-filter-box row pt-3' style='border-top:1px solid #dfdfdf'>
            <div class='col-md-3 p-0' style='max-width:280px;background:#fff'></div>
            <div class='col-9'>
                <?= $links ?>
            </div>
        </div>
    <?php } ?>
</div>
<div class='row p-4 category-desc'>
    <span class='col-12'>
        <?= $categoriesinfo[0]->category_desc_bottom;
        ?>
    </span>
</div>
</div>
<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {
        $('.sort').change(function() {
            window.location.href = $('.sort').val();
        });

        $('.price-filter-btn').click(function() {
            // console.log($(this).attr('url'));
            var min = $('.min-price').val();
            var max = $('.max-price').val();
            if ($('.min-price').val() == '') {
                min = 0;
            }
            if ($('.max-price').val() == '') {
                max = 0;
            }
            window.location.href = $(this).attr('url') + '%3Amin-price=' + min + 'max-price' + max + '+';
        });

        $('.price-filter-btn2').click(function() {
            // console.log($(this).attr('url'));
            var min = $('.min-price2').val();
            var max = $('.max-price2').val();
            if ($('.min-price2').val() == '') {
                min = 0;
            }
            if ($('.max-price2').val() == '') {
                max = 0;
            }
            window.location.href = $(this).attr('url') + '%3Amin-price=' + min + 'max-price' + max + '+';
        });

        $('.filter_checkbox').click(function() {
            window.location.href = $(this).attr('url');
        });

        $('.filter-sort-btn').click(function() {
            $('.filter-filter-box').css('display', 'block');
            $('.filter-filter-box2').css('display', 'none');
        });

        $('.close-sort-filter').click(function() {
            $('.filter-filter-box').css('display', 'none');
        });

        $('.close-filter-filter').click(function() {
            $('.filter-filter-box2').css('display', 'none');
        });

        $('.filter-filter-btn').click(function() {
            $('.filter-filter-box2').css('display', 'block');
            $('.filter-filter-box').css('display', 'none');
        });

        $('.mobile-filter-box').click(function() {
            $('.mobile-filter-options').css('display', 'none');
            var id = $(this).attr('id');
            // console.log(id);

            $('.' + id).css('display', 'block');
        });
    });
</script>
<?= $this->endSection('scripts') ?>