<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Coupon extends BaseController
{
    public function coupon_validate()
    {
        $couponcode = $_POST['coupon'];
        $coupondata = $this->db->table('coupons')->where('code', $couponcode)->get()->getResult();
        $json['result'] = 400;
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
                        $cart_items['couponcode'] = $_POST['coupon'];
                        $this->session->set('cart', $cart_items);
                        $json['result'] = 200;
                    } else {
                        $discount_percentage = $total_price*$coupondata[0]->discount/100;
                        $cart_items['discount'] = $discount_percentage;
                        $cart_items['couponcode'] = $_POST['coupon'];
                        $this->session->set('cart', $cart_items);
                        $json['result'] = 200;
                    }
                } else {
                    $json['msg'] = 'Add more items to avail this coupon';
                }
            } else {
                $json['msg'] = 'Coupon has expired';
            }
            // echo '<pre>';
            // print_r($coupondata[0]);
            // exit;
        }
        header('Content-Type: application/json');
        echo json_encode($json);
    }
}
