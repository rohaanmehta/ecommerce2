<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function pages_view()
    {
        $data['pages'] = $this->db->table('pages')->get()->getResult();

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
