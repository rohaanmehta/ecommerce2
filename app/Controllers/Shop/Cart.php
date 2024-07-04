<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Cart extends BaseController
{
    public function cart_view()
    {

        $userid = $this->session->get('userid');
        $this->checkcoupon();

        // if ($userid !== '') {
        //     $data['cart_items'] = $this->db->table('cart')->select('cart.product_id,cart.id as cartid,p.id,cart.price,p.title,pi.image_name1')->join('products as p', 'p.id = cart.product_id')->join('product_images as pi', 'pi.product_id = p.id')->where('user_id', $userid)->get()->getresult();

        //     $data['cart_item_total'] = $this->db->table('cart')->select('SUM(price) as total')->where('user_id', $userid)->get()->getResult();
        // }

        $data['cart_items'] = $this->session->get('cart');

        $total_price = 0;

        if (isset($data['cart_items']['items']) && !empty($data['cart_items']['items'])) {
            foreach ($data['cart_items']['items'] as $row) {
                $total_price = $total_price + $row['price'];
            }
        }

        //set coupon discount to 0 
        // $data['cart_items']['discount'] = '';
        // $this->session->set('cart',$data['cart_items']);

        if (isset($data['cart_items']['discount']) && !empty($data['cart_items']['discount'])) {
            $data['final_cart_value'] = $total_price - $data['cart_items']['discount'];
        } else {
            $data['final_cart_value'] = $total_price;
        }

        $data['total_cart_value'] = $total_price;

        $data['shipping'] = $this->db->table('general_settings')->where('name', 'shipping_settings')->get()->getResult();
        $data['coupons'] = $this->db->table('coupons')->where('start_date <=', date('Y-m-d'))->where('end_date >=', date('Y-m-d'))->where('status', '1')->get()->getResult();

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
            'unit_price' => $product_price[0]->price,
        );

        if (isset($_POST) && !empty($_POST)) {
            foreach ($_POST as $key => $single) {
                if ($key != 'productid' && $key != 'user_id' && $key != 'quantity') {
                    $item[$key] = $single;
                }
            }
        }

        //check if product already exist
        $duplicate_product = 0;
        $existing_cart = $this->session->get('cart');
        // echo '<pre>'; print_r($existing_cart);

        if (isset($existing_cart) && !empty($existing_cart)) {
            foreach ($existing_cart['items'] as $key => $single_item) {
                // if( $duplicate_product == 1){
                //     break;
                // }

                if ($single_item['product_id'] == $item['product_id'] && $duplicate_product == 0) {

                    if (sizeof($item) > 6) {
                        foreach ($item as $key2 => $variation) {
                            if ($key2 != 'product_id' && $key2 != 'user_id' && $key2 != 'quantity' && $key2 != 'cartid'  && $key2 != 'unit_price'  && $key2 != 'price') {
                                // echo '<pre>'; print_r($item);exit;
                                $duplicate_product = 1;
                                $existing_cart['items'][$key]['quantity'] = $single_item['quantity'] + $_POST['quantity'];

                                if (isset($single_item[$key2]) && $item[$key2] != $single_item[$key2]) {
                                    $duplicate_product = 0;
                                    // echo '<pre>'; print_r($single_item);

                                    // echo '<pre>'; print_r($item);
                                    $existing_cart['items'][$key]['quantity'] = $single_item['quantity'];
                                    break;
                                } else {
                                    // $duplicate_product = 0;
                                }
                            }
                        }
                    } else {
                        $existing_cart['items'][$key]['quantity'] = $single_item['quantity'] + $_POST['quantity'];
                        $duplicate_product = 1;
                        break;
                    }
                } else {
                    // $duplicate_product = 0;
                }
            }
        }
        // exit;
        if ($duplicate_product == 1) {
            $this->session->set('cart', $existing_cart);
        } else {
            $cart['items'][] = $item;
            $this->session->set('cart', $cart);
        }

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
            if ($cart['items']) {
                foreach ($cart['items'] as $key => $item) {
                    if ($item['cartid'] == $_POST['id']) {
                        // print_r($key);exit;
                        unset($cart['items'][$key]);
                        break;
                    }
                }
            }
        }
        // echo $_POST['id'];exit;

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
            if ($cart['items']) {
                foreach ($cart['items'] as $key => $item) {
                    if ($item['cartid'] == $_POST['id']) {
                        $product_id = $item['product_id'];
                        unset($cart['items'][$key]);
                        break;
                    }
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

    public function change_cart_qty()
    {
        if (!empty($this->session->get('cart'))) {
            $cart = $this->session->get('cart');
            if ($cart['items']) {
                foreach ($cart['items'] as $key => $item) {
                    if ($item['cartid'] == $_POST['id']) {
                        $cart['items'][$key]['quantity'] = $_POST['qty'];
                        $cart['items'][$key]['price'] = $cart['items'][$key]['unit_price'] * $_POST['qty'];
                        break;
                    }
                }
            }
        }

        $this->session->set('cart', $cart);
        $data = 200;

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
