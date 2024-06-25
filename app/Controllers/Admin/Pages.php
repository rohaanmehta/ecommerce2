<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function pages_view()
    {
        $pager = service('pager');
        $perPage = 10;
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $data['pages'] = $this->db->table('pages')->like('page_name', $_GET['search'])->get($perPage, $offset)->getResult();
            $total =  $this->db->table('pages')->like('page_name', $_GET['search'])->countAllResults();
        } else {
            $data['pages'] = $this->db->table('pages')->get($perPage, $offset)->getResult();
            $total = $this->db->table('pages')->countAllResults();
        }

        $data['links'] = $pager->makeLinks($page, $perPage, $total);
        return view('Admin/Views/Pages/list', $data);
    }
    public function add_page_view($id)
    {
        if ($id != '') {
            $data['page'] = $this->db->table('pages')->where('id', $id)->get()->getResult();
        } else {
            $data = array();
        }
        return view('Admin/Views/Pages/add_page', $data);
    }
    public function add_page_data()
    {
        // echo'<pre>';print_r($_POST);exit;
        $array = array(
            'page_name' => str_replace([' ', '/', '(', ')', '.', '\'', '\"'], '-', $_POST['name']),
            'page_content' => $_POST['content'],
        );

        if ($_POST['id'] == '') {
            if ($this->db->table('pages')->insert($array)) {
                $data['status'] = 200;
            } else {
                $data['status'] = 400;
            }
        } else {
            if ($this->db->table('pages')->where('id', $_POST['id'])->update($array)) {
                $data['status'] = 200;
            } else {
                $data['status'] = 400;
            }
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function delete_page($id)
    {
        $this->db->table('pages')->where('id', $id)->delete();
        return redirect()->to(base_url('Admin/pages'));
    }

    public function delete_account()
    {
        $userid = $this->session->get('userid');
        $array = array(
            'status' => '0'
        );
        if ($this->db->table('users')->where('id', $userid)->update($array)) {
            $this->session->destroy();
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }
}
