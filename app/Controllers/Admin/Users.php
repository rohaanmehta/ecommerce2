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
        $data['users'] = $this->db->table('users')->get()->getResult();
        return view('Admin/Views/Users/users_list',$data);
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
