<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function profile_view()
    {
        $userid = $this->session->get('userid');
        $data['user'] = $this->db->table('users')->select('full_name,gender,dob,email,mobile_no')->where('id', $userid)->get()->getResult();
        return view('Shop/Profile/profile', $data);
    }
    public function edit_profile_view()
    {
        $userid = $this->session->get('userid');
        $data['user'] = $this->db->table('users')->select('full_name,gender,dob,email,mobile_no')->where('id', $userid)->get()->getResult();
        return view('Shop/Profile/edit_profile', $data);
    }
    public function save_edit_profile()
    {
        $gender = '';
        if (isset($_POST['gender']) && !empty($_POST['gender'])) {
            $gender = $_POST['gender'];
        }

        $dob = null;
        if (isset($_POST['dob']) && !empty($_POST['dob'])) {
            $dob = date('Y-m-d', strtotime($_POST['dob']));
        }

        $array = array(
            'full_name' => $_POST['full_name'],
            'mobile_no' => $_POST['mobile_no'],
            // 'email' => $_POST['email'],
            'dob' => $dob,
            'gender' => $gender,
        );
        // print_r($_POST);exit;
        $userid = $this->session->get('userid');
        $this->db->table('users')->where('id', $userid)->update($array);

        $this->session->setFlashdata('message', 'Your details has been updated !');
        return redirect()->to(base_url('profile'));
    }

    public function save_edit_address()
    {
        $this->validation = \Config\Services::validation();

        $this->validation->setRule('first_name', 'First Name', 'required|trim');
        $this->validation->setRule('last_name', 'last_name', 'required|trim');
        $this->validation->setRule('mobile_no', 'mobile_no', 'required|trim');
        $this->validation->setRule('postal_code', 'postal_code', 'required|trim');
        $this->validation->setRule('state', 'state', 'required|trim');
        $this->validation->setRule('city', 'city', 'required|trim');
        $this->validation->setRule('address', 'address', 'required|trim');
        $this->validation->setRule('landmark', 'landmark', 'required|trim');
        // $this->validation->setRule('instructions', 'instructions', 'required|trim');

        if ($this->validation->withRequest($this->request)->run()) {
            $userid = $this->session->get('userid');

            $array = array(
                'user_id' => $userid,
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'mobile_no' => $_POST['mobile_no'],
                'postal_code' => $_POST['postal_code'],
                'state' => $_POST['state'],
                'city' => $_POST['city'],
                'address_1' => $_POST['address'],
                'landmark' => $_POST['landmark'],
                'instructions' => $_POST['instructions'],
                // 'is_default' => $_POST['instructions'],
            );

            if (isset($_POST['default-address']) && !empty($_POST['default-address']) && $_POST['default-address'] == 'on') {
                $this->db->table('user_address')->where('user_id', $userid)->update(['is_default' => '0']);
                $array['is_default'] = '1';
            } else {
                $array['is_default'] = '0';
            }

            if ($_POST['address_id'] == '') {
                $this->db->table('user_address')->insert($array);
            } else {
                $this->db->table('user_address')->where('id', $_POST['address_id'])->update($array);
            }
            $json['status'] = 200;

            $this->session->setFlashdata('message', 'Your address has been saved !');
            // return redirect()->to(base_url('profile/address'));
            header('Content-Type: application/json');
            echo json_encode($json);
        } else {
            $json = array(
                "error" => true,
                "first_name" => $this->validation->getError("first_name"),
                "last_name" => $this->validation->getError("last_name"),
                "mobile_no" => $this->validation->getError("mobile_no"),
                "postal_code" => $this->validation->getError("postal_code"),
                "state" => $this->validation->getError("state"),
                "city" => $this->validation->getError("city"),
                "address" => $this->validation->getError("address"),
                "landmark" => $this->validation->getError("landmark"),
                // "instructions" => $this->validation->getError("instructions"),
            );

            $json['status'] = 400;
            header('Content-Type: application/json');
            echo json_encode($json);
        }
    }

    public function deliver_address()
    {
        $userid = $this->session->get('userid');
        $this->db->table('user_address')->where('user_id', $userid)->update(['is_default' => '0']);
        $this->db->table('user_address')->where('id', $_POST['id'])->update(['is_default' => '1']);
        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function remove_address()
    {
        $this->db->table('user_address')->where('id', $_POST['id'])->delete();
        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function address_view()
    {
        $userid = $this->session->get('userid');
        $data['user'] = $this->db->table('user_address')->select('*')->where('user_id', $userid)->get()->getResult();
        return view('Shop/Profile/profile_address', $data);
    }

    public function get_address()
    {
        $data['user'] = $this->db->table('user_address')->select('*')->where('id', $_POST['id'])->get()->getResult();
        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function delete_address()
    {
        $this->db->table('user_address')->where('id', $_POST['id'])->delete();
        $this->session->setFlashdata('message', 'Your address has been deleted !');

        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }


    public function change_password_view()
    {
        return view('Shop/Profile/change_password');
    }

    public function change_password_post()
    {
        $userid = $this->session->get('userid');
        $user = $this->db->table('users')->select('email')->where('id', $userid)->get()->getResult();
        $old_password = md5($_POST['old_password']);
        $info = $this->db->table('users')->where('email', $user[0]->email)->where('password', $old_password)->countAllResults();

        if ($info > 0) {
            $data['status'] = 200;
            $array = array(
                'password' => md5($_POST['new_password'])
            );

            $this->db->table('users')->where('id', $userid)->update($array);
        } else {
            $data['status'] = 400;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function delete_account_view()
    {
        $data['page'] = $this->db->table('pages')->where('page_name', 'delete-page')->get()->getResult();
        return view('Shop/Profile/delete_account_view', $data);
    }
    public function coupons()
    {
        $data['coupons'] = $this->db->table('coupons')->where('start_date <=', date('Y-m-d'))->where('end_date >=', date('Y-m-d'))->where('status', '1')->get()->getResult();
        return view('Shop/Profile/coupons', $data);
    }
}
