<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Coupons extends BaseController
{
    public function view($id = null)
    {
        if ($id != null) {
            $data['coupon'] = $this->db->table('coupons')->where('id', $id)->get()->getResult();
        } else {
            $data = array();
        }

        return view('Admin/Views/Coupons/view', $data);
    }
    public function add_coupon_data()
    {
        $array = array(
            'code' => $_POST['code'],
            'min_cart_value' => $_POST['min_cart_value'],
            'discount' => $_POST['discount'],
            'type' => $_POST['type'],
            'start_date' => date('Y-m-d', strtotime($_POST['start_date'])),
            'end_date' => date('Y-m-d', strtotime($_POST['end_date'])),
            'status' => $_POST['status'],
        );

        // echo '<pre>';
        // print_r($array);
        // exit;

        if ($_POST['couponid'] == '') {
            $this->db->table('coupons')->insert($array);
            $data['status'] = 200;
        } else {
            $this->db->table('coupons')->where('id', $_POST['couponid'])->update($array);
            $data['status'] = 200;
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function coupon_list()
    {
        $data['coupons'] = $this->db->table('coupons')->get()->getResult();

        return view('Admin/Views/Coupons/list', $data);
    }

    public function deletecoupon($id)
    {
        $this->db->table('coupons')->where('id', $id)->delete();
        return redirect()->to(base_url('Admin/coupon_list'));
    }
}
