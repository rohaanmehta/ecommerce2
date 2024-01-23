<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;

class Checkout extends BaseController
{
    public function checkout_view()
    {
        return view('Shop/page/checkout');
    }
}
