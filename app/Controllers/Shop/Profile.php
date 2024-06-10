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
        $array = array(
            'address1' => $_POST['address1'],
            'address2' => $_POST['address2'],
            'address3' => $_POST['address3'],
        );
        // print_r($_POST);exit;
        $userid = $this->session->get('userid');
        $this->db->table('users')->where('id', $userid)->update($array);
        $this->session->setFlashdata('message', 'Your address has been updated !');
        return redirect()->to(base_url('profile/address'));
    }

    public function address_view()
    {
        $userid = $this->session->get('userid');
        $data['user'] = $this->db->table('users')->select('address1,address2,address3')->where('id', $userid)->get()->getResult();
        return view('Shop/Profile/profile_address', $data);
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
}
