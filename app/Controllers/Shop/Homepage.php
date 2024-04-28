<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Homepage extends BaseController
{
    public function homepage()
    {
        $data['slider'] = $this->db->table('homepage_slider')->orderBy('order', 'ASC')->get()->getResult();
        $data['banner1'] = $this->db->table('homepage_banner')->orderBy('order', 'ASC')->where('type', 'banner1')->get()->getResult();
        $data['banner2'] = $this->db->table('homepage_banner')->orderBy('order', 'ASC')->where('type', 'banner2')->get()->getResult();
        $data['banner3'] = $this->db->table('homepage_banner')->orderBy('order', 'ASC')->where('type', 'banner3')->get()->getResult();
        $data['banner4'] = $this->db->table('homepage_banner')->orderBy('order', 'ASC')->where('type', 'banner4')->get()->getResult();

        $data['categories'] = $this->db->table('categories')->orderBy('category_order', 'ASC')->where('show_on_homepage', '1')->get()->getResult();

        $data['banner1_info'] = $this->db->table('general_settings')->where('name', 'bannersection1')->get()->getResult();
        $data['banner2_info'] = $this->db->table('general_settings')->where('name', 'bannersection2')->get()->getResult();


        $data['banner_section1name'] = $this->db->table('general_settings')->where('name', 'banner_section1name')->get()->getResult();
        $data['banner_section2name'] = $this->db->table('general_settings')->where('name', 'banner_section2name')->get()->getResult();
        $data['banner_section3name'] = $this->db->table('general_settings')->where('name', 'banner_section3name')->get()->getResult();
        $data['banner_section4name'] = $this->db->table('general_settings')->where('name', 'banner_section4name')->get()->getResult();

        $section1 = $this->db->table('products')->select('products.id,products.title,products.price,pi.image_name1,products.product_slug')->where('promote', 'section1');

        if ($this->session->get('userid') != '') {
            $section1 = $section1->select('wishlist.user_id as wishlist')->join('wishlist', 'wishlist.product_id = products.id AND user_id = ' . $this->session->get('userid') . '', 'left');
        }

        $section1 = $section1->join('product_images as pi', 'pi.product_id = products.id')->where('is_deleted', '0')->limit(10)->orderBy('products.id', 'ASC');

        $data['section1'] = $section1->get()->getResult();


        $section2 = $this->db->table('products')->select('products.id,products.title,products.price,pi.image_name1,products.product_slug')->where('promote', 'section2');
        
        if ($this->session->get('userid') != '') {
            $section2 = $section2->select('wishlist.user_id as wishlist')->join('wishlist', 'wishlist.product_id = products.id AND user_id = ' . $this->session->get('userid') . '', 'left');
        }
        
        $section2 = $section2->join('product_images as pi', 'pi.product_id = products.id')->where('is_deleted', '0')->limit(10)->orderBy('products.id', 'ASC');

        $data['section2'] =  $section2->get()->getResult();

        // echo '<pre>';print_r($data['section2']);exit;
        return view('Shop/page/homepage', $data);
    }
}
