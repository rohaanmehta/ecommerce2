<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function dashboard()
    {
        return view('Admin/Views/Dashboard/Dashboard');
    }
}
