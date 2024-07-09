<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Checkout extends BaseController
{
    public function checkout_view()
    {
        $userid = $this->session->get('userid');
        $this->checkcoupon();

        $data['cart_items'] = $this->session->get('cart');

        $total_price = 0;

        if (isset($data['cart_items']['items']) && !empty($data['cart_items']['items'])) {
            foreach ($data['cart_items']['items'] as $row) {
                $total_price = $total_price + $row['price'];
            }
        }

        $data['readytocheckoout'] = $this->db->table('user_address')->where('user_id', $userid)->where('is_default', '1')->countAllResults();

        if (isset($data['cart_items']['discount']) && !empty($data['cart_items']['discount'])) {
            $data['final_cart_value'] = $total_price - $data['cart_items']['discount'];
        } else {
            $data['final_cart_value'] = $total_price;
        }

        $data['total_cart_value'] = $total_price;

        $data['shipping'] = $this->db->table('general_settings')->where('name', 'shipping_settings')->get()->getResult();
        $data['coupons'] = $this->db->table('coupons')->where('start_date <=', date('Y-m-d'))->where('end_date >=', date('Y-m-d'))->where('status', '1')->get()->getResult();

        $data['address'] = $this->db->table('user_address')->select('*')->where('user_id', $userid)->get()->getResult();

        return view('Shop/page/checkout', $data);
    }
    public function place_order()
    {
        $userid = $this->session->get('userid');
        $shipping_address =  $this->db->table('user_address')->select('*')->where('user_id', $userid)->where('is_default', '1')->get()->getResult();

        $cart_items = $this->session->get('cart');
        $total_price = 0;
        $discount = 0;
        $couponcode = '';

        if (isset($cart_items['items']) && !empty($cart_items['items'])) {
            foreach ($cart_items['items'] as $row) {
                $total_price = $total_price + $row['price'];
            }

            if (isset($cart_items['discount']) && !empty($cart_items['discount'])) {
                $discount = $cart_items['discount'];
                $couponcode = $cart_items['couponcode'];
            }
        }

        $final_cart_value = $total_price - $discount;
        $shipping_standard_price = $this->db->table('general_settings')->where('name', 'shipping_settings')->get()->getResult();
        if ($final_cart_value >= $shipping_standard_price[0]->value_2) {
            $shipping_cost = 0;
        } else {
            $shipping_cost = $shipping_standard_price[0]->value_2;
        }

        $final_cart_value = $final_cart_value + $shipping_cost;

        $last_order = $this->db->table('orders')->select('order_no')->orderBy('id','desc')->limit(1)->get()->getResult();
        $order_no = '10000';
        if(isset($last_order) && !empty($last_order)){
            // print_r($last_order);exit;
            $order_no = $last_order[0]->order_no + 1;
        }

        $order = array(
            'order_no' => $order_no,
            'user_id' => $userid,
            'coupon_code' => $couponcode,
            'total_price' => $total_price,
            'discount_price' => $discount,
            'final_price' => $final_cart_value,
            'shipping_price' => $shipping_cost,
            'currency' => 'INR',
            'order_status' => 'In Process',
            'payment_status' => 'PAID',
        );

        $this->db->table('orders')->insert($order);
        $order_id = $this->db->insertID();

        $order_shipping = array(
            'order_id' => $order_id,
            'first_name' => $shipping_address[0]->first_name,
            'last_name' => $shipping_address[0]->last_name,
            'mobile_no' => $shipping_address[0]->mobile_no,
            'postal_code' => $shipping_address[0]->postal_code,
            'state' => $shipping_address[0]->state,
            'city' => $shipping_address[0]->city,
            'address' => $shipping_address[0]->address_1,
            'landmark' => $shipping_address[0]->landmark,
            'instructions' => $shipping_address[0]->instructions,
        );

        $this->db->table('order_shipping')->insert($order_shipping);

        if (isset($cart_items['items']) && !empty($cart_items['items'])) {
            foreach ($cart_items['items'] as $row) {
                $product = $this->db->table('products')->where('id', $row['product_id'])->get()->getResult();
                $order_products = array(
                    'order_id' => $order_id,
                    'product_id' => $row['product_id'],
                    'product_title' => $product[0]->title,
                    'unit_price' => $product[0]->price,
                    'total_price' => $product[0]->price * $row['quantity'],
                    'quantity' => $row['quantity'],
                );
                
                $this->db->table('order_products')->insert($order_products);

                $variation_array = array();
                $variation_array['order_id'] = $order_id;
                $variation_array['product_id'] = $row['product_id'];

                foreach($row as $key => $variation){
                    if($key != 'product_id' && $key != 'cartid' && $key != 'user_id' && $key != 'quantity' && $key != 'price' && $key != 'unit_price'){
                        $variation_array['varaiation_name'] = str_replace('variation_','',$key);
                        $variation_array['variation_value'] = $variation;
                    }
                }
                $this->db->table('order_variation')->insert($variation_array);
            }
        }
    }
}
