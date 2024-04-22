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
$routes->set404Override();


$routes->group('',['namespace' => 'App\controllers\Admin'], static function ($routes) {
    //dashboard
    $routes->get('Admin/dashboard', 'Dashboard::dashboard');
    // products
    // $routes->get('Admin/product_slider', 'Dashboard::dashboard');
    $routes->get('Admin/slider-view', 'Dashboard::slider_view');
    $routes->post('add_slider_data', 'Dashboard::add_slider_data');
    $routes->get('delete-slider/?(:any)', 'Dashboard::delete_slider/$1');

    
    $routes->get('Admin/banner-view', 'Dashboard::banner_view');
    $routes->post('add_banner_data', 'Dashboard::add_banner_data');
    $routes->get('delete-banner/?(:any)', 'Dashboard::delete_banner/$1');

    $routes->get('Admin/category', 'Category::category_view');
    $routes->post('add_category_data', 'Category::add_category_data');
    $routes->post('edit_category_data', 'Category::edit_category_data');
    $routes->get('delete-category/?(:any)', 'Category::delete_category/$1');

    
    $routes->get('Admin/products', 'Products::products_view');
    $routes->get('add_products/?(:any)', 'Products::add_products/$1');
    $routes->post('add_product_data', 'Products::add_product_data');
    $routes->get('delete-product/?(:any)', 'Products::delete_product/$1');


    $routes->get('job_enquiry', 'Enquiry::job_enquiry');
    $routes->get('product_enquiry', 'Enquiry::product_enquiry');
    $routes->post('add_enquiry', 'Enquiry::add_enquiry');

});


$routes->group('',['namespace' => 'App\controllers\Shop'], static function ($routes) {
    $routes->get('/', 'Homepage::homepage');
    $routes->get('login', 'Login::login_view');
    $routes->get('register', 'Register::register_view');
    $routes->get('cart', 'Cart::cart_view');
    $routes->get('checkout', 'Checkout::checkout_view');
    // $routes->get('product_page', 'Product::product_page_view');
    $routes->post('add_register_data', 'Login::add_register_data');
    $routes->get('logout', 'Login::logout');
    $routes->post('login-user', 'Login::login_user');
    $routes->get('category/?(:any)', 'Category::category_shop_page/$1');
    $routes->get('products/?(:any)', 'Product::product_page_view/$1');


    //static pages
    $routes->get('projects', 'Page::project');
    $routes->get('career', 'Page::career');
    $routes->post('contact_form', 'Page::contact_form');
    $routes->get('story', 'Page::story');

    $routes->post('add_to_cart', 'Cart::add_to_cart');    
    $routes->post('delete-from-cart', 'Cart::delete_from_cart');    
});


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
