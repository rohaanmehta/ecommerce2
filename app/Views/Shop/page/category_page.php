<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<?php $session = session();
$url = current_url();
$params = $_SERVER['QUERY_STRING'];
$url = $url . '?' . $params;
?>

<style>
    .filters-heading {
        font-size: 15px;
        font-weight: 700;
        color: #606060;
        margin-bottom: 6px;
    }

    .filter-box {
        border-bottom: 2px solid #e7e7e7;
        padding-bottom: 15px !important;
        max-height: 300px;
        overflow-y: auto;
        margin-top: 20px;
    }

    .filter-box::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    .filter-box::-webkit-scrollbar {
        width: 7px;
        background-color: #F5F5F5;
    }

    .filter-box::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #cccccc;
    }

    .category_name {
        font-size: 22px;
        font-weight: 600;
    }

    .sort_by {
        font-size: 15px;
        font-weight: 600;
    }

    .category-desc {
        font-size: 12px;
        color: #878787;
    }

    .filter_checkbox {
        cursor: pointer;
    }

    .filter_value {
        cursor: pointer;
        color: #000;
        text-decoration: none !important;
    }

    .filter_value:active {
        color: #000 !important;
    }

    .filter_value:hover {
        color: #000 !important;
    }

    input[type=checkbox] {
        position: relative;
        border: 2px solid #000;
        border-radius: 2px;
        background: none;
        cursor: pointer;
        line-height: 0;
        margin: 0 .6em 0 0;
        outline: 0;
        padding: 0 !important;
        vertical-align: text-top;
        height: 20px;
        width: 20px;
        -webkit-appearance: none;
        opacity: .5;
    }

    input[type=checkbox]:hover {
        opacity: 1;
    }

    input[type=checkbox]:checked {
        background-color: #000;
        opacity: 1;
    }

    input[type=checkbox]:before {
        content: '';
        position: absolute;
        right: 50%;
        top: 50%;
        width: 4px;
        height: 10px;
        border: solid #FFF;
        border-width: 0 2px 2px 0;
        margin: -1px -1px 0 -1px;
        transform: rotate(45deg) translate(-50%, -50%);
        z-index: 2;
    }

    .filter-sort-btn {
        height: 55px;
        color: #a9a9a9;
        border: none;
        border-right: 1px solid #a9a9a9;
    }

    .filter-filter-btn {
        height: 55px;
        color: #a9a9a9;
        border: none;
    }

    .sort-options {
        margin: 13px;
        font-size: 13px;
        font-weight: 400;
        cursor: pointer;
        color: #000 !important;
        text-decoration: none !important;
    }

    .sort-options:active {
        color: #000 !important;
    }

    .active-filter {
        font-weight: 700;
    }

    .filter-filter-box,
    .filter-filter-box2 {
        padding: 10px;
    }

    .mobile-filter-box {
        margin: 7px;
        color: #000;
        font-size: 13px;
        text-transform: capitalize;
    }
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
                <?php if (isset($filters) && !empty($filters)) {
                    foreach ($filters as $key => $filter) { ?>
                        <div class='filter-box p-1'>
                            <div class='filters-heading text-capitalize'>
                                <?php print_r($key) ?>
                            </div>
                            <?php
                            foreach ($filter as $key => $fil) { ?>
                                <a href="<?= $fil['url']; ?>" class="filter_value">
                                    <div class='d-flex'>
                                        <div>
                                            <input type='checkbox' url='<?= $fil['url']; ?>' class='filter_checkbox mr-2' <?php if ($fil['checked'] == '1') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                        </div>
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
                        <input class='form-control mr-2' placeholder="Min Price" />
                        <input class='form-control mr-2' placeholder="Max Price" />
                        <button class='btn black-btn'>Go</button>
                    </div>
                </div>
            </div>
            <!-- <//?php echo'<pre>';print_r($products);exit?> -->

            <div class='d-flex col-md-9 products-5' style='flex-wrap:wrap;'>
                <?php if (isset($products) && !empty($products)) {
                    foreach ($products as $row) { ?>
                        <?php echo view('Shop/page/single_product', ['row' => $row, 'wishlist' =>  $session->get('userid')]); ?>
                <?php }
                } ?>
            </div>
        </div>
        <div class="d-flex w-100 bg-light mobile_Head_Show" style="border:1px solid #dbdbdb;position:sticky;bottom:0;z-index:2;">
            <button style='' class="filter-sort-btn btn bg-light w-50"><i style='color:#a9a9a9;' class="mr-2 fa fa-sort-amount-asc"></i>SORT</button>
            <button style='' class="filter-filter-btn btn bg-light w-50"><i style='color:#a9a9a9;' class="mr-2 fa fa fa-filter"></i>FILTERS</button>
        </div>

        <div class="filter-filter-box w-100 bg-light" style="display:none;position:sticky;bottom:0;z-index:3;height:300px;">
            <div class='d-flex justify-content-end close-sort-filter'><i class='fa fa-times'></i></div>
            <div style="color:#4e4e4e;padding:10px;font-size:13px;font-weight:700;border-bottom:1px solid #c5c5c5">SORT BY</div>
            <a class='sort-options' href='<?= $new; ?>'>
                <div class="sort-options <?php if (strpos($url, '%3Asort=new') == true){ echo 'active-filter';}?>">What's New</div>
            </a>
            <a class='sort-options' href='<?= $low; ?>'>
                <div class="sort-options <?php if (strpos($url, '%3Asort=low') == true){ echo 'active-filter';}?>">Price:Low to High</div>
            </a>
            <a class='sort-options' href='<?= $high; ?>'>
                <div class="sort-options <?php if (strpos($url, '%3Asort=high') == true){ echo 'active-filter';}?>">Price:High to Low</div>
            </a>
        </div>

        <div class="filter-filter-box2 w-100 bg-light" style="display:none;position:sticky;bottom:0;z-index:3;height:300px;">
            <div class='d-flex justify-content-end close-filter-filter'><i class='fa fa-times'></i></div>
            <div style="color:#4e4e4e;padding:10px;font-size:13px;font-weight:700;border-bottom:1px solid #c5c5c5">FILTERS</div>
            <div class='row'>
                <div class='col-6 p-0 pl-3'>
                    <div class=''>
                        <?php if (isset($filters) && !empty($filters)) {
                            foreach ($filters as $key => $filter) { ?>
                                <div class='mobile-filter-box' id='<?= $key; ?>' style='border-right: 1px solid #dfdfdf;height:20px'><?= $key; ?></div>
                        <?php }
                        } ?>
                    </div>
                </div>
                <div class='col-6 p-0 pl-2 pt-2'>
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
                </div>
            </div>
        </div>
    </div>

    <div class='filter-filter-box row pt-3' style='border-top:1px solid #dfdfdf'>
        <div class='col-md-3 p-0' style='max-width:280px;background:#fff'></div>
        <div class='col-9'>
            <?= $links ?>
        </div>
    </div>
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

        $('.filter_checkbox').click(function() {
            window.location.href = $(this).attr('url');
        });

        $('.filter-sort-btn').click(function() {
            $('.filter-filter-box').css('display', 'block');
        });

        $('.close-sort-filter').click(function() {
            $('.filter-filter-box').css('display', 'none');
        });

        $('.close-filter-filter').click(function() {
            $('.filter-filter-box2').css('display', 'none');
        });

        $('.filter-filter-btn').click(function() {
            $('.filter-filter-box2').css('display', 'block');
        });

        $('.mobile-filter-box').click(function() {
            $('.mobile-filter-options').css('display', 'none');
            var id = $(this).attr('id');
            console.log(id);

            $('.' + id).css('display', 'block');
        });
    });
</script>
<?= $this->endSection('scripts') ?>