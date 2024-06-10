<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function page($slug)
    {
        $data['page'] = $this->db->table('pages')->where('page_name', $slug)->get()->getResult();
        //redirect to 404
        if (isset($data['page']) && empty($data['page'])) {
            echo view('errors/error404');
            exit;
        }
        return view('Shop/Page/page', $data);
    }
}
