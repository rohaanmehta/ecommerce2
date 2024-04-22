<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Page extends BaseController
{
    public function project()
    {
        $data['categories'] = $this->db->table('categories')->orderBy('category_order', 'ASC')->where('show_on_homepage', '1')->get()->getResult();
        return view('Shop/page/projects', $data);
    }
    public function career()
    {
        $data['categories'] = $this->db->table('categories')->orderBy('category_order', 'ASC')->where('show_on_homepage', '1')->get()->getResult();
        return view('Shop/page/career', $data);
    }
    
    public function finishes()
    {
        $data['categories'] = $this->db->table('categories')->orderBy('category_order', 'ASC')->where('show_on_homepage', '1')->get()->getResult();
        return view('Shop/page/finishes', $data);
    }

    public function contact_form()
    {
        $array = array(
            'name' => $_POST['name'],
            'mobile' => $_POST['number'],
            'email' => $_POST['email'],
        );

        if ($this->db->table('contact_form')->insert($array)) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function story()
    {
        $data['categories'] = $this->db->table('categories')->orderBy('category_order', 'ASC')->where('show_on_homepage', '1')->get()->getResult();
        return view('Shop/page/story', $data);
    }
}
