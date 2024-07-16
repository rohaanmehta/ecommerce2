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
        $this->validation = \Config\Services::validation();

        $this->validation->setRule('first_name', 'First Name', 'required|trim');
        // $this->validation->setRule('last_name', 'Last Name', 'required|trim');
        $this->validation->setRule('email', 'Email', 'required|valid_email|is_unique[users.email]|trim');
        // $this->validation->setRule('mobile', 'Mobile Number', 'required|numeric|is_unique[users.mobile_no]|max_length[12]|trim');
        // $this->validation->setRule('password', 'Password', 'required|min_length[6]|trim|matches[confirm-password]');
        // $this->validation->setRule('confirm-password', 'Confirm Password', 'required|trim');
        $this->validation->setRule('password', 'Password', 'required|min_length[6]|trim|matches[confirm-password]');

        if ($this->validation->withRequest($this->request)->run()) {
            $data = array(
                'full_name' => $_POST['first_name'],
                // 'last_name' => $_POST['last_name'],
                // 'country' => $_POST['country'],
                // 'state' => $_POST['state'],
                // 'city' => $_POST['city'],
                'email' => $_POST['email'],
                // 'mobile_no' => $_POST['mobile'],
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
                $json['error'] = false;
            }
        } else {
            $json = array(
                "error" => true,
                "first_name" => $this->validation->getError("first_name"),
                // "last_name" => $this->validation->getError("last_name"),
                "email" => $this->validation->getError("email"),
                // "mobile" => $this->validation->getError("mobile"),
                "password" => $this->validation->getError("password"),
                // "confirm-password" => $this->validation->getError("confirm-password"),
            );
            // $data['status'] = 400;
        }

        header('Content-Type: application/json');
        echo json_encode($json);
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to($_SERVER['HTTP_REFERER']);
        // return redirect()->to(base_url('/'));
    }

    public function login_user()
    {
        // echo '<pre>';print_r($_POST);exit;
        $this->validation = \Config\Services::validation();

        $this->validation->setRule('email', 'email', 'required|trim');
        $this->validation->setRule('password', 'password', 'required|trim');

        if ($this->validation->withRequest($this->request)->run()) {

            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $check = $this->db->table('users')->where('email', $email)->where('password', $password)->where('status', '1')->countAllResults();
            $user = $this->db->table('users')->where('email', $email)->where('password', $password)->get()->getResult();


            if ($check > 0) {
                $username = $user[0]->first_name;
                $userid = $user[0]->id;
                $wishlist_total = $this->db->table('wishlist')->where('user_id', $userid)->countAllResults();
                $data['status'] = 200;
                $this->session->set('userid', $userid);
                $this->session->set('username', $username);
                $this->session->set('role', $user[0]->role);
                $this->session->set('wishlist_total', $wishlist_total);
                $json['loggedin'] = true;
            } else {
                $json['loggedin'] = false;
            }
            $json['error'] = false;
        } else {
            // exit;
            $json = array(
                "error" => true,
                "loggedin" => false,
                "email" => $this->validation->getError("email"),
                "password" => $this->validation->getError("password"),
            );
            // $data['status'] = 400;
        }
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function forgot_password()
    {
        return view('Shop/page/forgot-password');
    }

    public function forgot_password_mail()
    {
        $this->session->removeTempdata('otp');

        if ($_POST['email'] != '') {
            $is_valid_email = $this->db->table('users')->where('email', $_POST['email'])->countAllResults();
            if ($is_valid_email > 0) {
                $otp = $this->send_otp();

                $array = array(
                    'otp'=>$otp,
                    'mail'=>$_POST['email'],
                );

                $this->session->setTempdata('otp',$array, 600);

                $json = array(
                    "error" => false,
                    'otp' => $otp
                );
            } else {
                $json = array(
                    "error" => true,
                );
            }
        } else {
            $json = array(
                "error" => true,
            );
        }

        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function forgot_password_otp()
    {

        if ($_POST['otp'] != '') {
            $otp = $this->session->getTempdata('otp');

            if ($otp['otp'] == $_POST['otp']) {
                $json = array(
                    "error" => false,
                );
            } else {
                $json = array(
                    "error" => true,
                );
            }
        } else {
            $json = array(
                "error" => true,
            );
        }

        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function send_otp()
    {
        $otp = rand(111111, 999999);
        return $otp;
    }

    public function forgot_password_reset()
    {
        $this->validation = \Config\Services::validation();
        $this->validation->setRule('password', 'password', 'required|min_length[6]|trim');

        if ($this->validation->withRequest($this->request)->run()) {
            $json['error'] = false;
            $array['password'] = md5($_POST['password']);
            $email = $this->session->getTempdata('otp');
            $this->db->table('users')->where('email',$email['mail'])->update($array);
        } else {
            $json = array(
                "error" => true,
                "password" => $this->validation->getError("password"),
            );
        }
        header('Content-Type: application/json');
        echo json_encode($json);
    }
}
