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
    $routes->get('Admin/product_slider', 'Dashboard::dashboard');
});


$routes->group('',['namespace' => 'App\controllers\Shop'], static function ($routes) {
    $routes->get('/', 'Homepage::homepage');
    $routes->get('login', 'Login::login_view');
    $routes->get('register', 'Register::register_view');
    $routes->get('cart', 'Cart::cart_view');
    $routes->get('checkout', 'Checkout::checkout_view');
    $routes->get('product_page', 'Product::product_page_view');
});


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
