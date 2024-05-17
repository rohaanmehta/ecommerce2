<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;

class Wishlist extends BaseController
{
    public function view()
    {
        $pager = service('pager');

        $perPage = '20';
        $userid = $this->session->get('userid');
        $data['products'] = '';
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page-1) * $perPage;

       
        if ($userid !== '') {
            $data['products'] = $this->db->table('products')->select('products.id,products.title,products.price,product_images.image_name1,product_images.image_name2,product_images.image_name3,product_images.image_name4,products.product_slug,wishlist.user_id as wishlist')->join('wishlist','wishlist.product_id = products.id')->where('wishlist.user_id',$this->session->get('userid'))->join('product_images','product_images.product_id = products.id')->where('is_deleted','0')->where('visibility','1')->get($perPage,$offset)->getResult(); 
        }

        $total = $this->db->table('products')->select('products.id,products.title,products.price,product_images.image_name1,product_images.image_name2,product_images.image_name3,product_images.image_name4,products.product_slug,wishlist.user_id as wishlist')->join('wishlist','wishlist.product_id = products.id')->where('wishlist.user_id',$this->session->get('userid'))->join('product_images','product_images.product_id = products.id')->where('is_deleted','0')->where('visibility','1')->countAllResults();

        $data['links'] = $pager->makeLinks($page,$perPage,$total);

        $data[] = '';
        return view('Shop/page/wishlist', $data);
    }
}
