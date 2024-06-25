<!-- Main Sidebar Container -->
<style>
    .fa-circle {
        font-size: 5px !important;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class='text-center'>
        <a href="<?= base_url(); ?>" target='_blank' class="brand-link">
            <!-- <img src="<?= base_url('uploads/logo/cara_small.png') ?>" alt="AdminLTE Logo" class="brand-image"> -->
            <span class="brand-text font-weight-light"><?= $_ENV['websitename']; ?></span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image"> -->
        <!-- <img src="<? //= base_url('public/dist/img/user2-160x160.jpg') 
                        ?>" class="img-circle elevation-2" alt="User Image"> -->
        <!-- </div>
            <div class="info">
                <a href="#" class="d-block"><//?= 'WELCOME: MALLIKA '?></a>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Homepage
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html') ?>" class="nav-link d-flex align-items-center">
                                                    <i class="nav-icon fa fa-circle"></i>

                    <p>Top Bar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html') ?>" class="nav-link d-flex align-items-center">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>Navigation Bar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html') ?>" class="nav-link d-flex align-items-center">
                    <i class="nav-icon fas fa-clone"></i>
                    <p>Carousel</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html') ?>" class="nav-link d-flex align-items-center">
                    <i class="nav-icon fas fa-flag"></i>
                    <p>Banner</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html') ?>" class="nav-link d-flex align-items-center">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Product Gallery</p>
                    </a>
                </li> -->
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/slider-view') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/banner-view') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Banners</p>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                    <a href="<?= base_url('pages/charts/chartjs.html') ?>" class="nav-link">
                    <i class="nav-icon fas fa-shoe-prints"></i>
                    <p>Footer</p>
                    </a>
                </li> -->
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/category') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Category List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/category-banner') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Category Banners</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?= base_url('Admin/add_category') ?>" class="nav-link">
                                                                <i class="nav-icon fa fa-circle"></i>

                                <p>Add Category</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/products') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Products List</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?= base_url('pages/charts/chartjs.html') ?>" class="nav-link d-flex align-items-center">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Product Badge</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="<?= base_url('add_products') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('bulk-product-update-view') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Bulk Product Update</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('bulk-product-download-view') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Bulk Product Download</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('bulk-product-delete-view') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Bulk Product Delete</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('bulk-product-badge-view') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Bulk Product Badge</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('temp_image_view') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Product Temp Images</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Orders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/website_settings') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Orders</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/add-users') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Add Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/users-list') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Users List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Enquiries
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('/job_enquiry') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Job Enquiries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/product_enquiry') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Product Enquiries</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Email
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('pages/charts/chartjs.html') ?>" class="nav-link d-flex align-items-center">
                                                                <i class="nav-icon fa fa-circle"></i>

                                <p>Template</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('pages/charts/chartjs.html') ?>" class="nav-link d-flex align-items-center">
                                                                <i class="nav-icon fa fa-circle"></i>

                                <p>Send Email</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                                                        <i class="nav-icon fa fa-circle"></i>

                        <p>
                            Performance
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                                                        <i class="nav-icon fa fa-circle"></i>

                        <p>
                            Website Settings
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Coupons
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/add_coupons') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Add Coupons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/coupon_list') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Coupons List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Reviews
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/pending-reviews-list') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Pending Reviews</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/reviews-list') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>
                                <p>Reviews List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/deleted-list') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>
                                <p>Deleted List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            Sale
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/add-coupons') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Add Sale</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/coupons-list') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Sale List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Reviews
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/review-list') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Reviews List</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sort-amount-asc"></i>
                        <p>
                            Size Chart
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- <li class="nav-item">
                            <a href="<? //= base_url('Admin/add-sizechart') 
                                        ?>" class="nav-link d-flex align-items-center">
                                                                <i class="nav-icon fa fa-circle"></i>

                                <p>Add Size Chart</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/sizechart-list') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Size Chart List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/pages') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Pages</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/add_page') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Add Page</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            General Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/website_settings') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Products Settings</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<//?= base_url('Admin/cache_settings') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Cache Settings</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/footer_settings') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Footer Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/payment-view') ?>" class="nav-link d-flex align-items-center">
                                <i class="nav-icon fa fa-circle"></i>

                                <p>Payment Settings</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>