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

        if (isset($data['cart_items']['items']) && !empty($data['cart_items']['items'])) {
            foreach ($data['cart_items']['items'] as $row) {
                $total_price = $total_price + $row['price'];
            }
        }

        //validate existing coupon
        if (isset($data['cart_items']['couponcode']) && !empty($data['cart_items']['couponcode'] && $data['cart_items']['couponcode'] != '')) {
            $couponcode = $data['cart_items']['couponcode'];
            $coupondata = $this->db->table('coupons')->where('code', $couponcode)->get()->getResult();
            $result = 400;

            if (isset($coupondata[0]) && !empty($coupondata[0])) {
                if ($coupondata[0]->start_date <= date('Y-m-d') && $coupondata[0]->end_date >= date('Y-m-d')) {

                    $cart_items = $this->session->get('cart');
                    $total_price = 0;
                    if (isset($cart_items['items']) && !empty($cart_items['items'])) {
                        foreach ($cart_items['items'] as $row) {
                            $total_price = $total_price + $row['price'];
                        }
                    }

                    if ($total_price >= $coupondata[0]->min_cart_value) {
                        if ($coupondata[0]->type == 'Fixed') {
                            $cart_items['discount'] = $coupondata[0]->discount;
                            $this->session->set('cart', $cart_items);
                            $result = 200;
                        } else {
                            $discount_percentage = $total_price * $coupondata[0]->discount / 100;
                            $cart_items['discount'] = $discount_percentage;
                            $this->session->set('cart', $cart_items);
                            $result = 200;
                        }
                    } else {
                        $result = 400;
                    }
                } else {
                    $result = 400;
                }
            }
            if($result == '400'){
                $updatecoupon = $this->session->get('cart');
                $updatecoupon['couponcode'] = '';
                $updatecoupon['discount'] = '';
                $this->session->set('cart',$updatecoupon);
                $data['cart_items'] = $this->session->get('cart');
            }
        }

        //set coupon discount to 0 
        // $data['cart_items']['discount'] = '';
        // $this->session->set('cart',$data['cart_items']);

        if(isset($data['cart_items']['discount']) && !empty($data['cart_items']['discount'])){
            $data['final_cart_value'] = $total_price - $data['cart_items']['discount'];
        }else{
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

        $cart['items'][] = $item;

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
