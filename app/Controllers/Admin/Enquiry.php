<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Enquiry extends BaseController
{
    public function job_enquiry()
    {
        $data['list'] = $this->db->table('contact_form')->get()->getResult();
        return view('Admin/Views/Dashboard/job_enquiry', $data);
    }
    public function product_enquiry()
    {
        $data['list'] = $this->db->table('product_enquiry')->join('products as p', 'p.id = product_enquiry.product')->get()->getResult();
        return view('Admin/Views/Dashboard/product_enquiry', $data);
    }
    public function add_enquiry()
    {
        $array = array(
            'name' => $_POST['name'],
            'contact' => $_POST['contact'],
            'product' => $_POST['product_id']
        );

        if ($this->db->table('product_enquiry')->insert($array)) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
