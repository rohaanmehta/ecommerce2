<div style='background-color:#000;' class='pl3 pt-4 pr3 mt-5'>
    <div class='row d-flex m-0 mb-5 mobile_Head_Hide' style='padding:0px 80px 0px 80px'>
        <div class='col-md-3 col-xs-12 mb-4'>
            <div class='footer_Col'>
                <p class='footer_Tittle'><a href='#' style='text-decoration:none'>ONLINE SHOPPING</a></p>
                <div class="footer_Opt">
                    <?php if (isset($footersettings['categories']) && !empty($footersettings['categories'])) {
                        foreach ($footersettings['categories'] as $category_single) { ?>
                            <p><a href='<?= base_url($category_single->category_slug); ?>' style='text-decoration:none;text-transform:capitalize'><?= $category_single->category_name ?></a></p>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
        <div class='col-md-3 col-xs-12 mb-4'>
            <div class='footer_Col'>
                <p class='footer_Tittle'><a href='#' style='text-decoration:none'>CUSTOMER POLICIES</a></p>
                <div class="footer_Opt">
                    <p><a href='<?= base_url('pages/T&C'); ?>' style='text-decoration:none'>T&C</a></p>
                    <p><a href='<?= base_url('pages/Returns'); ?>' style='text-decoration:none'>Returns</a></p>
                    <p><a href='<?= base_url('pages/Cancellations'); ?>' style='text-decoration:none'>Cancellation</a></p>
                    <p><a href='<?= base_url('pages/Shipping'); ?>' style='text-decoration:none'>Shipping</a></p>
                    <p><a href='<?= base_url('pages/Privacy-Policy'); ?>' style='text-decoration:none'>Privacy Policy</a></p>
                </div>
            </div>
        </div>
        <div class='col-md-3 col-xs-12 mb-4'>
            <div class='footer_Col'>
                <p class='footer_Tittle'><a href='#' style='text-decoration:none'>USEFULL LINKS</a></p>
                <div class="footer_Opt">
                    <p><a href='<?= base_url('pages/About'); ?>' style='text-decoration:none'>About Us</a></p>
                    <p><a href='<?= base_url('pages/Contact-us'); ?>' style='text-decoration:none'>Contact Us</a></p>
                    <p><a href='<?= base_url('pages/FAQ'); ?>' style='text-decoration:none'>FAQ</a></p>
                </div>
            </div>
        </div>
        <div class='col-md-3 col-xs-12 mb-4'>
            <div class='footer_Col'>
                <p class='footer_Tittle'><a href='#' style='text-decoration:none'>ANY QUESTIONS?</a></p>
                <div class="footer_Opt mb-4">
                    <?php if (isset($footersettings['footer'][0]->call_or_sms) && !empty($footersettings['footer'][0]->call_or_sms)) { ?>
                        <p><a href='#' style='text-decoration:none'>Call or SMS: <?= ' ' . $footersettings['footer'][0]->call_or_sms ?></a></p>
                    <?php } ?>
                    <?php if (isset($footersettings['footer'][0]->footer_email) && !empty($footersettings['footer'][0]->footer_email)) { ?>
                        <p><a href='#' style='text-decoration:none'>Email: <?= ' ' . $footersettings['footer'][0]->footer_email ?></a></p>
                    <?php } ?>
                </div>
                <p class='footer_Tittle mb-1'><a href='#' style='text-decoration:none;'>FOLLOW US</a></p>
                <div class="footer_Opt">
                    <?php if (isset($footersettings['footer'][0]->instagram_link) && !empty($footersettings['footer'][0]->instagram_link)) { ?>
                        <a href="<?= $footersettings['footer'][0]->instagram_link ?>">
                            <i class="fa fa-instagram" style="font-size:25px; margin-right:15px;color:#fff;"></i>
                        </a>
                    <?php } ?>
                    <?php if (isset($footersettings['footer'][0]->fb_link) && !empty($footersettings['footer'][0]->fb_link)) { ?>
                        <a href="<?= $footersettings['footer'][0]->fb_link ?>">
                            <i class="fa fa-facebook-square" style="font-size:25px; margin-right:15px;color:#fff;"></i>
                        </a>
                    <?php } ?>
                    <?php if (isset($footersettings['footer'][0]->youtube_link) && !empty($footersettings['footer'][0]->youtube_link)) { ?>
                        <a href="<?= $footersettings['footer'][0]->youtube_link ?>">
                            <i class="fa fa-youtube" style="font-size:25px; margin-right:15px;color:#fff;"></i>
                        </a>
                    <?php } ?>
                </div>
                <!-- <input type='text' placeholder='subscribe' class='form-control pl-2 mt-3' style='border-radius:0px' /> -->
            </div>
        </div>
    </div>
    <!-- //mobile footer -->
    <div class='row m-0 mb-5 mobile_Head_Show' style='padding:0px 0px 0px 0px'>
        <div class='col-12 mb-5'>
            <p class='footer_Tittle mb-3'><a href='#' style='text-decoration:none;'>FOLLOW US</a></p>
            <div class="footer_Opt">
                <?php if (isset($footersettings['footer'][0]->instagram_link) && !empty($footersettings['footer'][0]->instagram_link)) { ?>
                    <a href="<?= $footersettings['footer'][0]->instagram_link ?>">
                        <i class="fa fa-instagram" style="font-size:25px; margin-right:15px;color:#fff;"></i>
                    </a>
                <?php } ?>
                <?php if (isset($footersettings['footer'][0]->fb_link) && !empty($footersettings['footer'][0]->fb_link)) { ?>
                    <a href="<?= $footersettings['footer'][0]->fb_link ?>">
                        <i class="fa fa-facebook-square" style="font-size:25px; margin-right:15px;color:#fff;"></i>
                    </a>
                <?php } ?>
                <?php if (isset($footersettings['footer'][0]->youtube_link) && !empty($footersettings['footer'][0]->youtube_link)) { ?>
                    <a href="<?= $footersettings['footer'][0]->youtube_link ?>">
                        <i class="fa fa-youtube" style="font-size:25px; margin-right:15px;color:#fff;"></i>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="col-12">
            <div class="row text-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <p class='col-10 footer_Tittle mb-2 pb-4'>ONLINE SHOPPING</p>
                <i style='text-align: end;' class='col-2 fa fa-angle-down'></i>
            </div>
            <div id="collapseOne" class="collapse" data-parent="#accordion">
                <div class="pb-3">
                    <div class="footer_Opt">
                        <?php if (isset($footersettings['categories']) && !empty($footersettings['categories'])) {
                            foreach ($footersettings['categories'] as $category_single) { ?>
                                <p><a href='<?= base_url($category_single->category_slug); ?>' style='text-decoration:none;text-transform:capitalize'><?= $category_single->category_name ?></a></p>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row text-light" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <p class='col-10 footer_Tittle mb-2 pb-4'>CUSTOMER POLICIES</p>
                <i style='text-align: end;' class='col-2 fa fa-angle-down'></i>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="pb-3">
                    <div class="footer_Opt">
                        <p><a href='<?= base_url('pages/T&C'); ?>' style='text-decoration:none'>T&C</a></p>
                        <p><a href='<?= base_url('pages/Returns'); ?>' style='text-decoration:none'>Returns</a></p>
                        <p><a href='<?= base_url('pages/Cancellations'); ?>' style='text-decoration:none'>Cancellation</a></p>
                        <p><a href='<?= base_url('pages/Shipping'); ?>' style='text-decoration:none'>Shipping</a></p>
                        <p><a href='<?= base_url('pages/Privacy-Policy'); ?>' style='text-decoration:none'>Privacy Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row text-light" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <p class='col-10 footer_Tittle mb-2 pb-4'>Usefull Links</p>
                <i style='text-align: end;' class='col-2 fa fa-angle-down'></i>
            </div>

            <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="pb-3">
                    <div class="footer_Opt">
                        <p><a href='<?= base_url('pages/About'); ?>' style='text-decoration:none'>About Us</a></p>
                        <p><a href='<?= base_url('pages/Contact-us'); ?>' style='text-decoration:none'>Contact Us</a></p>
                        <p><a href='<?= base_url('pages/FAQ'); ?>' style='text-decoration:none'>FAQ</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-12 mt-3'>
            <div class='footer_Col'>
                <p class='footer_Tittle'>ANY QUESTIONS?</p>
                <div class="footer_Opt mb-4">
                    <?php if (isset($footersettings['footer'][0]->call_or_sms) && !empty($footersettings['footer'][0]->call_or_sms)) { ?>
                        <p><a href='#' style='text-decoration:none'>Call or SMS: <?= ' ' . $footersettings['footer'][0]->call_or_sms ?></a></p>
                    <?php } ?>
                    <?php if (isset($footersettings['footer'][0]->footer_email) && !empty($footersettings['footer'][0]->footer_email)) { ?>
                        <p><a href='#' style='text-decoration:none'>Email: <?= ' ' . $footersettings['footer'][0]->footer_email ?></a></p>
                    <?php } ?>
                </div>
                <!-- <input type='text' placeholder='subscribe' class='form-control pl-2 mt-3' style='border-radius:0px' /> -->
            </div>
        </div>
    </div>
    <div style='font-size:12px;color:#e9e9e9' class='d-flex d-flex justify-content-center'>
        <p> © <?= date('Y') ?> www.<?= strtolower(str_replace(' ', '', $_ENV['websitename'])) ?>.com. All rights reserved</p>
    </div>
    <!-- popular links -->
    <div style='' class='popular-link-box pb-5'>
        <p>POPULAR SEARCHES</p>
        <?php if (isset($footersettings['footer'][0]->popular_links) && !empty($footersettings['footer'][0]->popular_links)) {
            $popular_links = explode(',', trim($footersettings['footer'][0]->popular_links, ','));
            foreach ($popular_links as $popular_link) { ?>
                <a class='popular-links' href='<?= base_url() . create_slug($popular_link) ?>'><?= $popular_link ?></a>
        <?php }
        } ?>
    </div>
</div>