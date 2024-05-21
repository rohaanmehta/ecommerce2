<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function login_view()
    {
        return view('Shop/page/login');
    }
    public function add_register_data()
    {
        $data = array(
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            // 'country' => $_POST['country'],
            // 'state' => $_POST['state'],
            // 'city' => $_POST['city'],
            'email' => $_POST['email'],
            'mobile_no' => $_POST['mobile'],
            'role' => 'customer',
            'password' => md5($_POST['password']),
        );

        if ($this->db->table('users')->insert($data)) {

            // $user = $this->db->insertID();

            // $data2 = array(
            //     'user' => $user,
            //     'product_view' => 0,
            //     'product_add' => 0,
            //     'product_edit' => 0,
            //     'product_delete' => 0,
            // );

            // $this->db->table('permission')->insert($data2);
            $userid = $this->db->insertID();
            $this->session->set('userid', $userid);
            $this->session->set('username', $_POST['first_name']);

            $data['status'] = 200;
        } else {
            $data['status'] = 400;
        }
        // echo $check;exit;
        // return response(json_encode($data));
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('/'));
    }
    public function login_user()
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $check = $this->db->table('users')->where('email', $email)->where('password', $password)->countAllResults();
        $user = $this->db->table('users')->where('email', $email)->where('password', $password)->get()->getResult();
        

        if ($check > 0) {
            $username = $user[0]->first_name;
            $userid = $user[0]->id;
            $wishlist_total = $this->db->table('wishlist')->where('user_id',$userid)->countAllResults();
            $data['status'] = 200;
            $this->session->set('userid', $userid);
            $this->session->set('username', $username);
            $this->session->set('role', $user[0]->role);
            $this->session->set('wishlist_total', $wishlist_total);

        } else {
            $data['status'] = 400;
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
