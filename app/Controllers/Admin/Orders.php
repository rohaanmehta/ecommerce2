<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Orders extends BaseController
{
    public function orders_list()
    {
        $pager = service('pager');
        $perPage = 10;
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $data['list'] = $this->db->table('orders')->select('orders.*,users.full_name')->join('users', 'users.id = orders.user_id')->like('order_no', $_GET['search'])->orlike('first_name', $_GET['search'])->orlike('last_name', $_GET['search'])->get()->getResult();
            $total =  $this->db->table('orders')->join('users', 'users.id = orders.user_id')->like('order_no', $_GET['search'])->orlike('first_name', $_GET['search'])->orlike('last_name', $_GET['search'])->countAllResults();
        } else {
            $data['list'] = $this->db->table('orders')->select('orders.*,users.full_name')->join('users', 'users.id = orders.user_id')->orderBy('orders.id', 'desc')->get($perPage, $offset)->getResult();
            $total = $this->db->table('orders')->countAllResults();
        }

        $data['links'] = $pager->makeLinks($page, $perPage, $total);

        return view('Admin/Views/Orders/orders', $data);
    }

    public function order($orderno)
    {
        $data['order'] = $this->db->table('orders')->select('orders.*,users.full_name,users.gender,users.email,users.dob')->join('users', 'users.id = orders.user_id')->where('order_no', $orderno)->get()->getResult();
        // print_r($data['order'][0]->id);exit;
        $data['order_products'] = $this->db->table('order_products')->select('order_products.*,order_products.id as oid,products.*')->join('products', 'products.id = order_products.product_id')->where('order_id', $data['order'][0]->id)->get()->getResult();
        $data['order_shipping'] = $this->db->table('order_shipping')->where('order_id', $data['order'][0]->id)->get()->getResult();
        return view('Admin/Views/Orders/order', $data);
    }

    public function update_order_status()
    {
        $array = array(
            'order_status' => $_POST['order-status'],
        );
        // print_r($_POST);
        $this->db->table('orders')->where('id', $_POST['order-id'])->update($array);
        return redirect('Admin/orders-list');
    }

    public function update_tracking_status()
    {
        $array = array(
            'tracking_url' => $_POST['trackinglink'],
            'tracking_no' => $_POST['trackingno'],
        );
        // print_r($_POST);exit;
        $this->db->table('orders')->where('id', $_POST['order-id'])->update($array);
        return redirect('Admin/orders-list');
    }

    public function ajax_order_info()
    {
        $data['order'] = $this->db->table('orders')->where('id', $_POST['id'])->get()->getResult();
        
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
