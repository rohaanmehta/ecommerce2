<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Cart extends BaseController
{
    public function cart_view()
    {

        $data['categories'] = $this->db->table('categories')->orderBy('category_order', 'ASC')->where('show_on_homepage', '1')->get()->getResult();

        $userid = $this->session->get('userid');

        if ($userid !== '') {
            $data['cart_items'] = $this->db->table('cart')->select('cart.product_id,cart.id as cartid,p.id,cart.price,p.title,pi.image_name1')->join('products as p', 'p.id = cart.product_id')->join('product_images as pi', 'pi.product_id = p.id')->where('user_id', $userid)->get()->getresult();

            $data['cart_item_total'] = $this->db->table('cart')->select('SUM(price) as total')->where('user_id', $userid)->get()->getResult();
        }

        // echo'<pre>';print_r($data['cart_items']);exit;

        return view('Shop/page/cart', $data);
    }

    public function add_to_cart()
    {
        // echo '<pre>';print_r($_POST);exit;

        $userid = $this->session->get('userid');
        if ($userid == '') {
            $data['status'] = 100;
        } else {
            $array = array(
                'product_id' => $_POST['product_id'],
                'user_id' => $userid,
                'price' => $_POST['price'],
            );


            if ($this->db->table('cart')->insert($array)) {
                $data['status'] = 200;
            } else {
                $data['status'] = 400;
            }
        }
        // echo $check;exit;
        // return response(json_encode($data));
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function delete_from_cart()
    {
        if ($this->db->table('cart')->where('id', $_POST['id'])->delete()) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
