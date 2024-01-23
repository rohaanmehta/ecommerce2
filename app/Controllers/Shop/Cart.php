<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;

class Cart extends BaseController
{
    public function cart_view()
    {
        return view('Shop/page/cart');
    }
}
