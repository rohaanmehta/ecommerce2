<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Sizechart extends BaseController
{
    public function view()
    {
        $pager = service('pager');
        $perPage = 10;
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        if (isset($_GET['search']) && !empty($_GET['search'])) {

            $data['sizechart'] = $this->db->table('categories')->select('sizechart.sizechart,categories.id,categories.category_name,')->join('sizechart', 'sizechart.category_id = categories.id', 'left')->like('category_name', $_GET['search'])->get($perPage, $offset)->getResult();
            $total = $this->db->table('categories')->select('sizechart.sizechart')->join('sizechart', 'sizechart.category_id = categories.id', 'left')->like('category_name', $_GET['search'])->countAllResults();
        } else {
            $data['sizechart'] = $this->db->table('categories')->select('sizechart.sizechart,categories.id,categories.category_name,')->join('sizechart', 'sizechart.category_id = categories.id', 'left')->get($perPage, $offset)->getResult();

            $total = $this->db->table('categories')->select('sizechart.sizechart')->join('sizechart', 'sizechart.category_id = categories.id', 'left')->countAllResults();
        }

        $data['links'] = $pager->makeLinks($page, $perPage, $total);

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

        $this->db->table('sizechart')->where('category_id', $_POST['id'])->delete();

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
