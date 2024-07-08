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

        if (isset($data['cart_items']['discount']) && !empty($data['cart_items']['discount'])) {
            $data['final_cart_value'] = $total_price - $data['cart_items']['discount'];
        } else {
            $data['final_cart_value'] = $total_price;
        }

        $data['total_cart_value'] = $total_price;

        $data['shipping'] = $this->db->table('general_settings')->where('name', 'shipping_settings')->get()->getResult();
        $data['coupons'] = $this->db->table('coupons')->where('start_date <=', date('Y-m-d'))->where('end_date >=', date('Y-m-d'))->where('status', '1')->get()->getResult();
        
        $data['address'] = $this->db->table('users')->select('address1,address2,address3')->where('id', $userid)->get()->getResult();

        return view('Shop/page/checkout', $data);
    }
}
