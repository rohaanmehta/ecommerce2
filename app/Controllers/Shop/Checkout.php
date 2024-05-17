<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;

class Checkout extends BaseController
{
    public function checkout_view()
    {
        $userid = $this->session->get('userid');

        if ($userid !== '') {
            $data['cart_items'] = $this->db->table('cart')->select('cart.product_id,cart.id as cartid,p.id,cart.price,p.title,pi.image_name1')->join('products as p', 'p.id = cart.product_id')->join('product_images as pi', 'pi.product_id = p.id')->where('user_id', $userid)->get()->getresult();

            $data['cart_item_total'] = $this->db->table('cart')->select('SUM(price) as total')->where('user_id', $userid)->get()->getResult();
            if(empty($data['cart_items'])){
                return view('Shop/page/cart',$data);
            }
        }
        return view('Shop/page/checkout',$data);
    }
}
