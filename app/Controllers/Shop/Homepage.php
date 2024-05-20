<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Homepage extends BaseController
{
    public function homepage()
    {

        $cache_row = $this->db->table('general_settings')->select('name,value_1,value_2,value_3')->where('name', 'cache')->get()->getResult();

        //carousel
        $cache_slider = cache('slider');

        if (isset($cache_slider) && !empty($cache_row) && $cache_row[0]->value_1 <= $cache_slider['time']) {
            $data['slider'] = $cache_slider['slider'];
            // echo'<pre>';print_r($data);exit;

        } else {
            // Save into the cache for seconds
            $data['slider'] = $this->db->table('homepage_slider')->select('name,mobile_name,alt_text,link,storage')->orderBy('order', 'ASC')->get()->getResult();
            $data['time'] = strtotime(date('Y-m-d H:i:s'));

            cache()->save('slider', $data, 0);
        }

        //banners
        $cache_banner = cache('banner');

        if (isset($cache_banner) && !empty($cache_row) && $cache_row[0]->value_2 <= $cache_banner['time']) {
            $data['banner1'] = $cache_banner['banner1'];
            $data['banner2'] = $cache_banner['banner2'];
            $data['banner3'] = $cache_banner['banner3'];
            $data['banner4'] = $cache_banner['banner4'];

            $data['banner1_info'] = $cache_banner['banner1_info'];
            $data['banner2_info'] = $cache_banner['banner2_info'];

            $data['banner_section1name'] = $cache_banner['banner_section1name'];
            $data['banner_section1name'] = $cache_banner['banner_section1name'];
            $data['banner_section1name'] = $cache_banner['banner_section1name'];
            $data['banner_section1name'] = $cache_banner['banner_section1name'];
            // array_push($data,$cache_banner[0]);
        } else {
            // Save into the cache for seconds
            $banner['banner1'] = $this->db->table('homepage_banner')->select('name,alt_text,link,storage')->orderBy('order', 'ASC')->where('type', 'banner1')->get()->getResult();
            $banner['banner2'] = $this->db->table('homepage_banner')->select('name,alt_text,link,storage')->orderBy('order', 'ASC')->where('type', 'banner2')->get()->getResult();
            $banner['banner3'] = $this->db->table('homepage_banner')->select('name,alt_text,link,storage')->orderBy('order', 'ASC')->where('type', 'banner3')->get()->getResult();
            $banner['banner4'] = $this->db->table('homepage_banner')->select('name,alt_text,link,storage')->orderBy('order', 'ASC')->where('type', 'banner4')->get()->getResult();

            $banner['banner1_info'] = $this->db->table('general_settings')->select('name,value_1,value_2,value_3')->where('name', 'bannersection1')->get()->getResult();
            $banner['banner2_info'] = $this->db->table('general_settings')->select('name,value_1,value_2,value_3')->where('name', 'bannersection2')->get()->getResult();

            $banner['banner_section1name'] = $this->db->table('general_settings')->select('name,value_1,value_2,value_3')->where('name', 'banner_section1name')->get()->getResult();
            $banner['banner_section2name'] = $this->db->table('general_settings')->select('name,value_1,value_2,value_3')->where('name', 'banner_section2name')->get()->getResult();
            $banner['banner_section3name'] = $this->db->table('general_settings')->select('name,value_1,value_2,value_3')->where('name', 'banner_section3name')->get()->getResult();
            $banner['banner_section4name'] = $this->db->table('general_settings')->select('name,value_1,value_2,value_3')->where('name', 'banner_section4name')->get()->getResult();
            $banner['time'] = strtotime(date('Y-m-d H:i:s'));

            cache()->save('banner', $banner, 0);
            // $cache_banner = cache('banner');
            $data['banner1'] = $banner['banner1'];
            $data['banner2'] = $banner['banner2'];
            $data['banner3'] = $banner['banner3'];
            $data['banner4'] = $banner['banner4'];

            $data['banner1_info'] = $banner['banner1_info'];
            $data['banner2_info'] = $banner['banner2_info'];

            $data['banner_section1name'] = $banner['banner_section1name'];
            $data['banner_section1name'] = $banner['banner_section1name'];
            $data['banner_section1name'] = $banner['banner_section1name'];
            $data['banner_section1name'] = $banner['banner_section1name'];
        }


        $cache_products = cache('products');

        if (isset($cache_products) && !empty($cache_row) && $cache_row[0]->value_3 <= $cache_products['time']) {
            $data['section1'] = $cache_products['section1'];
            $data['section2'] = $cache_products['section2'];
        } else {
            //section1
            $section1 = $this->db->table('products')->select('products.id,products.title,products.price,pi.image_name1,pi.image_name2,pi.image_name3,pi.image_name4,products.product_slug')->where('promote', 'section1');

            if ($this->session->get('userid') != '') {
                $section1 = $section1->select('wishlist.user_id as wishlist')->join('wishlist', 'wishlist.product_id = products.id AND user_id = ' . $this->session->get('userid') . '', 'left');
            }

            $section1 = $section1->join('product_images as pi', 'pi.product_id = products.id')->where('is_deleted', '0')->limit(10)->orderBy('products.id', 'ASC');

            $products['section1'] = $section1->get()->getResult();

            //section2
            $section2 = $this->db->table('products')->select('products.id,products.title,products.price,pi.image_name1,pi.image_name2,pi.image_name3,pi.image_name4,products.product_slug')->where('promote', 'section2');

            if ($this->session->get('userid') != '') {
                $section2 = $section2->select('wishlist.user_id as wishlist')->join('wishlist', 'wishlist.product_id = products.id AND user_id = ' . $this->session->get('userid') . '', 'left');
            }

            $section2 = $section2->join('product_images as pi', 'pi.product_id = products.id')->where('is_deleted', '0')->limit(10)->orderBy('products.id', 'ASC');

            $products['section2'] =  $section2->get()->getResult();
            $products['time'] = strtotime(date('Y-m-d H:i:s'));

            cache()->save('products', $products, 0);

            $data['section1'] = $products['section1'];
            $data['section2'] = $products['section2'];
            // exit;

        }

        //seo
        $data['meta_title'] = 'Online Shopping for Men & Women Clothing, Accessories at';
        $data['meta_desc'] = 'Online Shopping for Men & Women Clothing, Accessories at';
        $data['meta_keywords'] = 'Designer T-shirts, Frames, Posters, Badges, Stickers, Notebooks, Coasters';

        return view('Shop/page/homepage', $data);
    }
}
