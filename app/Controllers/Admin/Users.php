<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function add_users()
    {
        return view('Admin/Views/Users/add_users');
    }

    public function users_list()
    {
        $pager = service('pager');
        $perPage = 10;
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $data['users'] = $this->db->table('users')->like('first_name', $_GET['search'])->orlike('last_name', $_GET['search'])->orlike('email', $_GET['search'])->get($perPage, $offset)->getResult();
            $total = $this->db->table('users')->like('first_name', $_GET['search'])->orlike('last_name', $_GET['search'])->orlike('email', $_GET['search'])->countAllResults();

        } else {
            $data['users'] = $this->db->table('users')->get($perPage, $offset)->getResult();
            $total = $this->db->table('users')->countAllResults();
        }

        $data['links'] = $pager->makeLinks($page, $perPage, $total);

        return view('Admin/Views/Users/users_list', $data);
    }

    public function add_user_data()
    {
        $password = md5($_POST['password']);
        $array = array(
            'first_name' =>  $_POST['firstname'],
            'last_name' => $_POST['lastname'],
            'email' => $_POST['email'],
            'password' => $password,
            'role' => $_POST['role']
        );

        if ($this->db->table('users')->insert($array)) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
