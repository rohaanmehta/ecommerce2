<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;

class Login extends BaseController
{
    public function login_view()
    {
        return view('Shop/page/login');
    }
}
