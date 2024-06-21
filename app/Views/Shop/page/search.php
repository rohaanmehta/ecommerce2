<?php $session = session(); ?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php if (isset($meta_title)) {
                echo $meta_title . ' ';
            }
            echo  ucfirst(strtolower($_ENV['websitename'])) ?></title>

    <meta name=description content="<?php if (isset($meta_desc)) {
                                        echo $meta_desc . ' ';
                                    } ?>" id=desc>
    <meta name=keywords content="<?php if (isset($meta_keywords)) {
                                        echo $meta_keywords . ' ';
                                    } ?>" id=keywords>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script type="text/javascript" src="<?= base_url('assets/js/fontawesome.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/bootsrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/mystyle.css'); ?>">


    <link rel="stylesheet" href="<?= base_url('assets/css/googlefont.css'); ?>" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/lato.css'); ?>" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
        .search-input {
            box-shadow: 0px -4px 4px 4px grey;
            height: 45px;
            border-radius: 0px;
            padding-left: 50px;
        }

        .form-control:focus {
            box-shadow: 0px -4px 4px 4px grey !important;
        }
    </style>
</head>
<div class="mb-5">
    <!-- <form class='search-form' autocomplete="off"> -->
    <div class=''>
        <?php $url = uri_string();
        if (isset($url) && !empty($url)) {
            $search = explode('/', $url);
            if (isset($search[1]) && !empty($search[1])) {
                $key = $search[1];
            }
        } ?>
        <input type='text' value='<?php if (isset($key) && !empty($key)) {
                                        echo urldecode($key);
                                    } ?>' class='form-control border-0 search-input' name='search' Placeholder='Search for Products ?' />
        <a href='<?= base_url(); ?>' class='text-dark' style='position:absolute;top:15px;left:15px;'><i class='fa fa-arrow-left'></i></a>
        <a href='<?= base_url('search/'); ?>' class='text-dark search-btn' style='position:absolute;top:15px;right:25px;'><i class='fa fa-search'></i></a>
    </div>
    <!-- </form> -->

    <div class='row m-0 mt-3 gallery products-5 pr-4 pl-4'>
        <?php if (isset($products) && !empty($products)) {
            foreach ($products as $row) { ?>
                <?php echo view('Shop/page/single_product', ['row' => $row, 'wishlist' =>  $session->get('userid')]); ?>
        <?php }
        } else { ?>
            <div class='text-dark w-100 d-flex justify-content-center' style='font-size:14px;font-weight:500;'>No Products Found !</div>
        <?php } ?>
    </div>
</div>
<?php if (isset($products) && !empty($products)) { ?>
    <div class='row pt-3' style='border-top:1px solid #dfdfdf'>
        <div class='col-md-3 p-0' style='max-width:280px;background:#fff'></div>
        <div class='col-9'>
            <?= $links ?>
        </div>
    </div>
<?php } ?>
</div>

<script>
    $(document).ready(function() {
        $('.search-btn').attr('href', '<?= base_url(); ?>search/' + $('.search-input').val());
        $('.search-input').keyup(function() {
            $('.search-btn').attr('href', '<?= base_url(); ?>search/' + $('.search-input').val());
        });
        if ($(window).width() < 768) {
            $('.single-product-slider').css('display','none');
            $('.mobile-product-slider').css('display','block');
        }
    });
</script>

</html>