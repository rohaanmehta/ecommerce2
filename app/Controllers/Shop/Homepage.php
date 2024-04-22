<?php
namespace App\Controllers\Shop;
use App\Controllers\BaseController;

class Homepage extends BaseController
{
    public function homepage()
    {
        $data['slider'] = $this->db->table('homepage_slider')->orderBy('order','ASC')->get()->getResult();
        $data['banner1'] = $this->db->table('homepage_banner')->orderBy('order','ASC')->where('type','banner1')->get()->getResult();
        $data['banner2'] = $this->db->table('homepage_banner')->orderBy('order','ASC')->where('type','banner2')->get()->getResult();
        $data['banner3'] = $this->db->table('homepage_banner')->orderBy('order','ASC')->where('type','banner3')->get()->getResult();
        $data['categories'] = $this->db->table('categories')->orderBy('category_order','ASC')->where('show_on_homepage','1')->get()->getResult();

        $data['section1'] = $this->db->table('products')->where('promote','section1')->join('product_images as pi','pi.product_id = products.id')->limit(5)->get()->getResult();

        
        $data['section2'] = $this->db->table('products')->where('promote','section2')->join('product_images as pi','pi.product_id = products.id')->limit(5)->get()->getResult();
        
        // echo '<pre>';print_r($data['product']);exit;
        return view('Shop/page/homepage',$data);
    }
}
