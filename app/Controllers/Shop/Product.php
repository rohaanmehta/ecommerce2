<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;

class Product extends BaseController
{
    public function product_page_view($slug)
    {
        $data['product'] = $this->db->table('products')->select('products.desc,products.id,products.title,pi.image_name1,pi.image_name2,products.stock,products.sku,products.purchasable,products.product_slug,,pi.image_name3,pi.image_name4,products.price')->where('product_slug',$slug)->join('product_images as pi','pi.product_id = products.id')->get()->getResult();
       
        $data['section1'] = $this->db->table('products')->select('products.id,products.title,pi.image_name1,pi.image_name2,products.stock,products.sku,products.purchasable,products.product_slug,,pi.image_name3,pi.image_name4,products.price')->orderBy('rand()')->join('product_images as pi','pi.product_id = products.id')->limit(5)->get()->getResult();

        
        $data['section2'] = $this->db->table('products')->select('products.id,products.title,pi.image_name1,pi.image_name2,products.stock,products.sku,products.purchasable,products.product_slug,,pi.image_name3,pi.image_name4,products.price')->orderBy('rand()')->join('product_images as pi','pi.product_id = products.id')->limit(5)->get()->getResult();

        $data['categories'] = $this->db->table('categories')->orderBy('category_order', 'ASC')->where('show_on_homepage', '1')->get()->getResult();
        return view('Shop/page/product_page',$data);
    }

    public function search_product(){
        // print_r($_POST);exit;
        $data['product'] = $this->db->table('products')->like('title',$_POST['search'])->join('product_images as pi','pi.product_id = products.id')->get()->getResult();

        
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
