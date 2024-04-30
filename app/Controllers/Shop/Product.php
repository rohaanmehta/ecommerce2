<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Product extends BaseController
{
    public function product_page_view($slug)
    {
        $data['product'] = $this->db->table('products')->select('products.desc,products.id,products.title,pi.image_name1,pi.image_name2,products.stock,products.sku,products.purchasable,products.product_slug,,pi.image_name3,pi.image_name4,products.price')->where('product_slug', $slug)->join('product_images as pi', 'pi.product_id = products.id')->get()->getResult();

        $section1 = $this->db->table('products')->select('products.id,products.title,products.price,pi.image_name1,pi.image_name2,pi.image_name3,pi.image_name4,products.product_slug')->where('promote', 'section1');

        if ($this->session->get('userid') != '') {
            $section1 = $section1->select('wishlist.user_id as wishlist')->join('wishlist', 'wishlist.product_id = products.id AND user_id = ' . $this->session->get('userid') . '', 'left');
        }

        $section1 = $section1->join('product_images as pi', 'pi.product_id = products.id')->where('is_deleted', '0')->limit(10)->orderBy('products.id', 'ASC');

        $data['section1'] = $section1->get()->getResult();


        $section2 = $this->db->table('products')->select('products.id,products.title,products.price,pi.image_name1,pi.image_name2,pi.image_name3,pi.image_name4,products.product_slug')->where('promote', 'section2');

        if ($this->session->get('userid') != '') {
            $section2 = $section2->select('wishlist.user_id as wishlist')->join('wishlist', 'wishlist.product_id = products.id AND user_id = ' . $this->session->get('userid') . '', 'left');
        }

        $section2 = $section2->join('product_images as pi', 'pi.product_id = products.id')->where('is_deleted', '0')->limit(10)->orderBy('products.id', 'ASC');

        $data['section2'] =  $section2->get()->getResult();

        $data['categories'] = $this->db->table('categories')->orderBy('category_order', 'ASC')->where('show_on_homepage', '1')->get()->getResult();
        return view('Shop/page/product_page', $data);
    }

    public function search_product()
    {
        // print_r($_POST);exit;
        $data['product'] = $this->db->table('products')->select('title,product_slug,image_name1')->like('title', $_POST['search'])->limit(20)->join('product_images as pi', 'pi.product_id = products.id')->get()->getResult();
        foreach ($data['product'] as $row) {
            $row->title = character_limiter($row->title, 50, '...');
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function add_to_wishlist()
    {
        $array = array(
            'product_id' => $_POST['productid'],
            'user_id' => $this->session->get('userid')

        );

        $resp['status'] = 400;

        $count = $this->db->table('wishlist')->where($array)->countAllResults();
        if ($count == 0) {
            if ($this->db->table('wishlist')->insert($array)) {
                $resp['status'] = 200;
            }
        } else {
            if ($this->db->table('wishlist')->delete($array)) {
                $resp['status'] = 200;
            }
        }


        $wishlist_total = $this->db->table('wishlist')->where('user_id', $this->session->get('userid'))->countAllResults();
        $this->session->set('wishlist_total', $wishlist_total);

        header('Content-Type: application/json');
        echo json_encode($resp);
    }
}
