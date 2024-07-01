<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Homepage');
$routes->setDefaultMethod('homepage');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function () {
    echo view('errors/error404');
});


$routes->group('', ['namespace' => 'App\controllers\Admin', "filter" => "Auth"], static function ($routes) {
    //dashboard
    $routes->get('Admin/dashboard', 'Dashboard::dashboard');

    $routes->get('Admin/website_settings', 'Website_settings::view');
    $routes->post('add_website_settings', 'Website_settings::add_website_settings');
    $routes->post('add_website_settings_banner', 'Website_settings::add_website_settings_banner');
    $routes->post('add_website_settings_product_page', 'Website_settings::add_website_settings_product_page');
    $routes->post('add_website_settings_product_share', 'Website_settings::add_website_settings_product_share');
    $routes->get('Admin/visual_settings', 'Website_settings::visual_settings');
    $routes->post('add_visual_settings', 'Website_settings::add_visual_settings');
    $routes->post('add_visual_settings2', 'Website_settings::add_visual_settings2');
    $routes->post('category-settings', 'Website_settings::category_settings');


    $routes->get('Admin/shipping-view', 'Website_settings::shipping_view');
    $routes->post('add_shipping_settings', 'Website_settings::add_shipping_settings');

    
    $routes->get('Admin/footer_settings', 'Website_settings::footer_settings');
    $routes->post('add_footer_data', 'Website_settings::add_footer_data');

    //cache setting
    $routes->get('Admin/cache_settings', 'Website_settings::cache_view');

    //coupons
    $routes->get('Admin/add_coupons/?(:any)', 'Coupons::view/$1');
    $routes->get('Admin/coupon_list', 'Coupons::coupon_list');
    $routes->post('add_coupon_data', 'Coupons::add_coupon_data');
    $routes->get('deletecoupon/?(:any)', 'Coupons::deletecoupon/$1');

    // products
    // $routes->get('Admin/product_slider', 'Dashboard::dashboard');
    $routes->get('Admin/slider-view', 'Dashboard::slider_view');
    $routes->post('add_slider_data', 'Dashboard::add_slider_data');
    $routes->post('get_slider_data', 'Dashboard::get_slider_data');
    $routes->get('delete-slider/?(:any)', 'Dashboard::delete_slider/$1');


    $routes->get('Admin/banner-view', 'Dashboard::banner_view');
    $routes->post('add_banner_data', 'Dashboard::add_banner_data');
    $routes->get('delete-banner/?(:any)', 'Dashboard::delete_banner/$1');

    $routes->get('Admin/category', 'Category::category_view');
    $routes->post('add_category_data', 'Category::add_category_data');
    $routes->post('edit_category_data', 'Category::edit_category_data');
    $routes->get('delete-category/?(:any)', 'Category::delete_category/$1');
    $routes->get('export-categories', 'Category::export_categories');
    $routes->get('Admin/category-banner', 'Category::category_banner_view');
    $routes->post('add_category_banner_data', 'Category::add_category_banner_data');
    $routes->get('deletecategorybanner/?(:any)', 'Category::delete_category_banner/$1');
    $routes->post('edit_category_banner', 'Category::edit_category_banner');

    $routes->get('Admin/products', 'Products::products_view');
    $routes->get('add_products/?(:any)', 'Products::add_products/$1');
    $routes->post('add_product_data', 'Products::add_product_data');
    $routes->get('delete-product/?(:any)', 'Products::delete_product/$1');
    $routes->get('bulk-product-update-view', 'Products::bulk_product_update_view');
    $routes->get('bulk-product-delete-view', 'Products::bulk_product_delete_view');
    $routes->get('bulk-product-download-view', 'Products::bulk_product_download_view');
    $routes->get('bulk-product-badge-view', 'Products::bulk_product_badge_view');
    $routes->get('temp_image_view', 'Products::temp_image_view');
    $routes->get('delete_temp_image/?(:any)', 'TempImage::delete_temp_image/$1');
    $routes->post('product_temp_image_upload', 'TempImage::product_temp_image_upload');
    $routes->post('product_badge_update', 'Products::product_badge_update');
    $routes->post('product_badge_delete', 'Products::product_badge_delete');
    $routes->get('product_badge_download', 'Products::product_badge_download');


    $routes->get('product_download', 'Products::product_download');
    $routes->get('product_varients_download', 'Products::product_varients_download');
    $routes->get('product_image_download', 'Products::product_image_download');
    $routes->post('bulk_product_varient_delete', 'Products::bulk_product_varient_delete');
    $routes->post('bulk_product_image_delete', 'Products::bulk_product_image_delete');
    $routes->post('bulk_product_varient_update', 'Products::bulk_product_varient_update');
    $routes->post('bulk_product_update_data', 'Products::bulk_product_update_data');
    $routes->post('bulk_product_image_update', 'Products::bulk_product_image_update');
    $routes->post('bulk_product_delete', 'Products::bulk_product_delete');




    $routes->get('Admin/sizechart-list', 'Sizechart::view');
    $routes->get('Admin/sizechart-list', 'Sizechart::view');
    $routes->post('add_sizechart', 'Sizechart::add_sizechart');
    $routes->post('get_sizechart', 'Sizechart::get_sizechart');
    $routes->get('delete_sizechart/?(:any)', 'Sizechart::delete_sizechart/$1');


    //users
    $routes->get('Admin/add-users', 'Users::add_users');
    $routes->get('Admin/add-users', 'Users::add_users');
    $routes->post('add_user_data', 'Users::add_user_data');
    $routes->get('Admin/users-list', 'Users::users_list');

    $routes->get('Admin/pending-reviews-list', 'Reviews::pending_reviews_list');
    $routes->get('Admin/reviews-list', 'Reviews::reviews_list');
    $routes->get('Admin/deleted-list', 'Reviews::deleted_list');
    $routes->get('Admin/delete-review/?(:any)', 'Reviews::delete_review/$1');
    $routes->get('Admin/delete-review2/?(:any)', 'Reviews::delete_review2/$1');
    $routes->get('Admin/accept-review/?(:any)', 'Reviews::accept_review/$1');
    $routes->get('Admin/decline-review/?(:any)', 'Reviews::decline_review/$1');
    $routes->get('Admin/undelete-accept-review/?(:any)', 'Reviews::undelete_accept_review/$1');
    $routes->get('Admin/undelete-decline-review/?(:any)', 'Reviews::undelete_decline_review/$1');


    $routes->get('Admin/pages', 'Pages::pages_view');
    $routes->get('Admin/add_page/?(:any)', 'Pages::add_page_view/$1');
    $routes->post('add_page_data', 'Pages::add_page_data');
    $routes->get('Admin/delete-page/?(:any)', 'Pages::delete_page/$1');
    $routes->get('Admin/delete_account', 'Pages::delete_account');




    $routes->get('job_enquiry', 'Enquiry::job_enquiry');
    $routes->get('product_enquiry', 'Enquiry::product_enquiry');
    $routes->post('add_enquiry', 'Enquiry::add_enquiry');
});


$routes->group('', ['namespace' => 'App\controllers\Shop', "filter" => "Profile"], static function ($routes) {
    //static pages
    $routes->get('profile', 'Profile::profile_view');
    $routes->get('profile/edit_profile', 'Profile::edit_profile_view');
    $routes->post('profile/save_edit_profile', 'Profile::save_edit_profile');
    $routes->post('profile/save_edit_address', 'Profile::save_edit_address');
    $routes->get('profile/address', 'Profile::address_view');
    $routes->get('profile/change_password', 'Profile::change_password_view');
    $routes->post('change_password_post', 'Profile::change_password_post');
    $routes->get('profile/delete_account', 'Profile::delete_account_view');
    //
});


$routes->group('', ['namespace' => 'App\controllers\Shop'], static function ($routes) {
    $routes->get('profile/coupons', 'Profile::coupons');

    $routes->get('/', 'Homepage::homepage');

    $routes->get('forbidden-access', function () {
        echo view('errors/forbidden_access');
    });

    $routes->get('search/?(:any)', 'Homepage::search_view/$1');
    $routes->get('pages/?(:any)', 'Pages::page/$1');

    $routes->get('login', 'Login::login_view');
    $routes->get('register', 'Register::register_view');
    $routes->get('cart', 'Cart::cart_view');
    $routes->get('checkout', 'Checkout::checkout_view');
    // $routes->get('product_page', 'Product::product_page_view');
    $routes->post('add_register_data', 'Login::add_register_data');
    $routes->get('logout', 'Login::logout');
    $routes->post('login-user', 'Login::login_user');
    $routes->get('review/(:any)/(:any)', 'Product::product_review/$1/$2');
    $routes->post('get_product_review', 'Product::get_product_review');

    $routes->get('projects', 'Page::project');
    $routes->get('career', 'Page::career');
    $routes->post('contact_form', 'Page::contact_form');
    $routes->get('story', 'Page::story');

    $routes->post('add_to_cart', 'Cart::add_to_cart');
    $routes->post('delete-from-cart', 'Cart::delete_from_cart');
    $routes->post('delete-from-cart-wishlist', 'Cart::delete_from_cart_wishlist');
    
    $routes->get('wishlist', 'Wishlist::view');

    $routes->post('search-product', 'Product::search_product');
    $routes->post('add-to-wishlist', 'Product::add_to_wishlist');


    $routes->get('(:any)/(:any)', 'Product::product_page_view/$1/$2');
    $routes->get('/(:any)', 'Category::category_shop_page/$1');
});


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
