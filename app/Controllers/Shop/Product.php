<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;

class Product extends BaseController
{
    public function product_page_view()
    {
        return view('Shop/page/product_page');
    }
}
