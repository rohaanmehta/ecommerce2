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
            $data['products'] = $this->db->table('products')->join('product_images','product_images.product_id = products.id')->where('is_deleted','0')->where('visibility','1')->get()->getResult(); 
        }

        $data[] = '';

        return view('Shop/page/wishlist', $data);
    }
}
