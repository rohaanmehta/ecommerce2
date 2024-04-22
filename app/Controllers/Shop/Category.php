<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function category_shop_page($slug)
    {
        $perPage = 20;
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        
        $data['products'] = $this->db->table('products')->join('product_category as pc', 'pc.product_id = products.id')->join('categories as pc2', 'pc2.id = pc.category_id')->join('product_images as pi', 'pi.product_id = products.id')->where('category_slug', $slug)->orderBy('products.id', 'DESC')->get($perPage, $offset)->getresult();

        if (isset($_GET['sort']) && $_GET['sort'] == 'low') {
            $data['products'] = $this->db->table('products')->join('product_category as pc', 'pc.product_id = products.id')->join('categories as pc2', 'pc2.id = pc.category_id')->join('product_images as pi', 'pi.product_id = products.id')->where('category_slug', $slug)->orderBy('products.price', 'ASC')->get($perPage, $offset)->getresult();
        } else if (isset($_GET['sort']) && $_GET['sort'] == 'high') {
            $data['products'] = $this->db->table('products')->join('product_category as pc', 'pc.product_id = products.id')->join('categories as pc2', 'pc2.id = pc.category_id')->join('product_images as pi', 'pi.product_id = products.id')->where('category_slug', $slug)->orderBy('products.price', 'DESC')->get($perPage, $offset)->getresult();
        }


        $total = $this->db->table('products')->join('product_category as pc', 'pc.product_id = products.id')->join('categories as pc2', 'pc2.id = pc.category_id')->join('product_images as pi', 'pi.product_id = products.id')->where('category_slug', $slug)->countAllResults();

        $data['links'] = $pager->makeLinks($page, $perPage, $total);

        $data['categoriesinfo'] = $this->db->table('categories')->select('category_desc_top,category_name,category_slug')->where('category_slug', $slug)->get()->getResult();

        $data['categories'] = $this->db->table('categories')->orderBy('category_order', 'ASC')->where('show_on_homepage', '1')->get()->getResult();

        // echo '<pre>';print_r($data);exit;
        return view('Shop/page/category_page', $data);
    }
}
