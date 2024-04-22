<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function category_view()
    {
        $data['category'] = $this->db->table('categories')->get()->getResult();

        return view('Admin/Views/Category/view', $data);
    }

    public function add_category_data()
    {
        // print_r($_POST);exit;
        $array = array(
            'category_name' => $_POST['name'],
            'show_on_homepage' => $_POST['show_on_home_page'],
            'category_order' => $_POST['order'],
            'parent_category' => $_POST['parent_category'],
            'category_desc_top' => $_POST['category_desc_top'],
            'category_slug' => str_replace([' ',',','/','-','_'],'',$_POST['name']),
        );

        if ($_POST['category_id'] == '') {
            if ($this->db->table('categories')->insert($array)) {
                $data['status'] = 200;
            } else {
                $data['status'] = 400;
            }
        } else {
            if ($this->db->table('categories')->where('id',$_POST['category_id'])->update($array)) {
                $data['status'] = 200;
            } else {
                $data['status'] = 400;
            }
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function edit_category_data(){
        // print_r($_POST);exit;
        $data['data'] = $this->db->table('categories')->where('id',$_POST['id'])->get()->getResult();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function delete_category($id)
    {
        $this->db->table('categories')->where('id', $id)->delete();
        return redirect()->to(base_url('Admin/category'));
    }
}
