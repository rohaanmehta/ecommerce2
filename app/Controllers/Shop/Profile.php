<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function profile_view()
    {
        $userid = $this->session->get('userid');
        $data['user'] = $this->db->table('users')->where('id', $userid)->get()->getResult();
        return view('Shop/Profile/profile', $data);
    }
}
