<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;

class Wishlist extends BaseController
{
    public function view()
    {
        $userid = $this->session->get('userid');
        $data['products'] = '';

        if ($userid !== '') {
            $data['products'] = $this->db->table('products')->select('products.id,products.title,products.price,product_images.image_name1,products.product_slug,wishlist.user_id as wishlist')->join('wishlist','wishlist.product_id = products.id')->where('wishlist.user_id',$this->session->get('userid'))->join('product_images','product_images.product_id = products.id')->where('is_deleted','0')->where('visibility','1')->get()->getResult(); 
        }

        $data[] = '';
        return view('Shop/page/wishlist', $data);
    }
}
