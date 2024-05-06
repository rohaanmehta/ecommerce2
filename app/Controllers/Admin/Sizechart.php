<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Sizechart extends BaseController
{
    public function view()
    {
        $data['sizechart'] = $this->db->table('categories')->select('sizechart.sizechart,categories.id,categories.category_name,')->join('sizechart', 'sizechart.category_id = categories.id', 'left')->get()->getResult();
        // echo '<pre>';print_r($data);exit;
        return view('Admin/Views/Sizechart/view', $data);
    }
    public function add_sizechart()
    {
        // echo '<pre>';print_r($_POST);exit;

        $array = array(
            'category_id' => $_POST['id'],
            'sizechart' => $_POST['sizechart'],
        );

        if ($this->db->table('sizechart')->insert($array)) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function get_sizechart()
    {
        if ($data['sizechart'] = $this->db->table('sizechart')->where('category_id', $_POST['id'])->get()->getResult()) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function delete_sizechart($id)
    {
        $this->db->table('sizechart')->where('category_id', $id)->delete();
        return redirect()->to(base_url('Admin/sizechart-list'));
    }
}
