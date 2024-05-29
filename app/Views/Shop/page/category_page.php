<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<?php $session = session(); ?>

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
        <div class="pt-5 pl-5 pr-4 row" style='align-items: center;'>
            <div class='col-4 pl-0 category_name'>
                <span>
                    <?= $categoriesinfo[0]->category_name;
                    ?>
                </span>
            </div>
            <div class='col-8 text-right' style='display:flex;justify-content:end;align-items: center;'>
                <p class='m-0 sort_by mr-3'>Sort By: </p>
                <select class='form-control sort' style='max-width:210px;'>
                    <option value=''>Most Recent</option>
                    <option value='low' <?php if (isset($_GET['sort']) && $_GET['sort'] == 'low') {
                                            echo 'selected';
                                        } ?>>Lowest Price</option>
                    <option value='high' <?php if (isset($_GET['sort']) && $_GET['sort'] == 'high') {
                                                echo 'selected';
                                            } ?>>Highest Price</option>
                </select>
            </div>
            <div class='col-12 pl-0 pt-4 category-desc'>
                <span>
                    <?= $categoriesinfo[0]->category_desc_top;
                    ?>
                </span>
            </div>
        </div>

        <div class="row ml-4 mr-4 gallery mt-5">
            <div class='col-md-3 p-0' style='max-width:280px;background:#fff;border-right:1px solid #dfdfdf;'>
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
            <div class='d-flex col-md-9 products-5' style='flex-wrap:wrap'>
                <?php if (isset($products) && !empty($products)) {
                    foreach ($products as $row) { ?>
                        <?php echo view('Shop/page/single_product', ['row' => $row, 'wishlist' =>  $session->get('userid')]); ?>
                <?php }
                } ?>
            </div>
        </div>
        <div class='row pt-3' style='border-top:1px solid #dfdfdf'>
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
<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {
        $('.sort').change(function() {
            window.location.href = '<?= base_url('/' . $categoriesinfo[0]->category_slug . '?sort=');
                                    ?>' + $('.sort').val();
        });
    });
</script>
<?= $this->endSection('scripts') ?>

<?= $this->endSection('content') ?>
