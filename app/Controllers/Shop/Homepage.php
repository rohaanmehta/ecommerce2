<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;

class Homepage extends BaseController
{
    public function homepage()
    {
        return view('Shop/page/homepage');
    }
}
