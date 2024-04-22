<?= $this->extend('Shop/Layout/layout') ?>
<?= $this->section('content') ?>
<style>
    .category_name {
        font-size: 22px;
        font-weight: 600;
    }

    .sort_by {
        font-size: 15px;
        font-weight: 600;
    }
</style>
<div class=''>
    <div class='card'>
        <div class="pt-5 pl-5 pr-4 row" style='align-items: center;'>
            <div class='col-4 pl-0 category_name'>
                <span>
                    <?= $categoriesinfo[0]->category_name; ?>
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
            <div class='col-12 pl-0 pt-4' style='font-size:13px;color:#747474;'>
                <span>
                    <?= $categoriesinfo[0]->category_desc_top; ?>
                </span>
            </div>
        </div>

        <div class="row m-4 gallery gap">
            <?php if (isset($products)) {
                include('single_product.php');
            } ?>
        </div>
        <div class=''>
            <?= $links ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.sort').change(function() {
            window.location.href = '<?= base_url('category/' . $categoriesinfo[0]->category_slug . '?sort='); ?>' + $('.sort').val();
        });
    });
</script>
<?= $this->endSection() ?>