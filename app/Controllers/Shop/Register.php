<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;

class Register extends BaseController
{
    public function register_view()
    {
        return view('Shop/page/register');
    }
}
