<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Cart extends BaseController
{
    public function cart_view()
    {

        $userid = $this->session->get('userid');

        // if ($userid !== '') {
        //     $data['cart_items'] = $this->db->table('cart')->select('cart.product_id,cart.id as cartid,p.id,cart.price,p.title,pi.image_name1')->join('products as p', 'p.id = cart.product_id')->join('product_images as pi', 'pi.product_id = p.id')->where('user_id', $userid)->get()->getresult();

        //     $data['cart_item_total'] = $this->db->table('cart')->select('SUM(price) as total')->where('user_id', $userid)->get()->getResult();
        // }
        $data['cart_items'] = $this->session->get('cart');
        $total_price = 0;
        if(isset($data['cart_items']) && !empty($data['cart_items'])){
            foreach($data['cart_items'] as $row){
                $total_price = $total_price + $row['price'];
            }
        }

        $data['total_cart_value'] = $total_price;
        $data['shipping'] = $this->db->table('general_settings')->where('name','shipping_settings')->get()->getResult();
        // echo'<pre>';print_r($data['cart_items']);exit;

        return view('Shop/page/cart', $data);
    }

    public function add_to_cart()
    {
        $userid = $this->session->get('userid');
        // $this->session->set('cart','');exit; 
        if (!empty($this->session->get('cart'))) {
            $cart = $this->session->get('cart');
        } else {
            $cart = array();
        }

        $product_price = $this->db->table('products')->where('id', $_POST['productid'])->get()->getResult();

        $item = array(
            'product_id' => $_POST['productid'],
            'cartid' => date('dmYHis'),
            'user_id' => $userid,
            'quantity' => $_POST['quantity'],
            'price' => $product_price[0]->price * $_POST['quantity'],
        );

        if (isset($_POST) && !empty($_POST)) {
            foreach ($_POST as $key => $single) {
                if ($key != 'productid' && $key != 'user_id' && $key != 'quantity') {
                    $item[$key] = $single;
                }
            }
        }

        $cart[] = $item;

        $this->session->set('cart', $cart);

        // echo '<pre>';print_r($this->session->get('cart'));exit;

        $data['msg'] = 'Added to Cart !';
        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function delete_from_cart()
    {
        if (!empty($this->session->get('cart'))) {
            $cart = $this->session->get('cart');
            foreach ($cart as $key => $item) {
                if ($item['cartid'] == $_POST['id']) {
                    unset($cart[$key]);
                    break;
                }
            }
        }

        $this->session->set('cart', $cart);
        $data['status'] = 200;
        
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function delete_from_cart_wishlist()
    {
        $product_id = '';
        if (!empty($this->session->get('cart'))) {
            $cart = $this->session->get('cart');
            foreach ($cart as $key => $item) {
                if ($item['cartid'] == $_POST['id']) {
                    $product_id = $item['product_id'];
                    unset($cart[$key]);
                    break;
                }
            }
        }

        $this->session->set('cart', $cart);

        $array = array(
            'product_id' => $product_id,
            'user_id' => $this->session->get('userid')

        );

        $count = $this->db->table('wishlist')->where($array)->countAllResults();
        if ($count == 0) {
            $this->db->table('wishlist')->insert($array);
        }
        $data['status'] = 200;

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
