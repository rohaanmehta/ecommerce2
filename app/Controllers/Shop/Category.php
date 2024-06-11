<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function category_shop_page($slug)
    {
        $pager = service('pager');
        $perPage = 25;
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page-1) * $perPage;

        //all categories
        $all_categories = array();
        $categoryid = $this->db->table('categories')->select('id,category_slug')->where('category_slug', $slug)->get()->getresult();
        
        //redirect to 404
        if(isset($categoryid) && empty($categoryid)){
            echo view('errors/error404');exit;
        }

        array_push($all_categories, $categoryid[0]->id);

        //category banners
        $category_banners = $this->db->table('category_banner')->select('image,mobile_image')->orderBy('order','asc')->where('category_id', $categoryid[0]->id)->get()->getresult();

        $data['category_banners'] = $category_banners;

        //all sub categories 2nd layer
        $sub_array = array();
        $subcategories = $this->db->table('categories')->select('id,category_slug')->where('parent_category', $categoryid[0]->id)->get()->getresult();

        if (isset($subcategories) && !empty($subcategories)) {
            foreach ($subcategories as $row) {
                array_push($all_categories, $row->id);
                array_push($sub_array, $row->id);
            }

            foreach ($sub_array as $each) {
                $sub_subcategories = $this->db->table('categories')->select('id,category_slug')->where('parent_category', $each)->get()->getresult();
                foreach ($sub_subcategories as $each2) {
                    if (isset($sub_subcategories) && !empty($sub_subcategories)) {
                        array_push($all_categories, $each2->id);
                    }
                }
            }
        }

        //all products
        $builder = $this->db->table('products')->select('products.discount,product_slug,products.id as id,title,desc,price,stock,image_name1,image_name2,image_name3,image_name4,order')->join('product_category as pc', 'pc.product_id = products.id')->join('product_images as pi', 'pi.product_id = products.id')->wherein('category_id', $all_categories)->where('visibility', '1')->where('is_deleted', '0')->groupBy('id');

        if ($this->session->get('userid') != '') {
            $builder = $builder->select('wishlist.user_id as wishlist')->join('wishlist', 'wishlist.product_id = products.id AND user_id = ' . $this->session->get('userid') . '', 'left');
        }

        if (isset($_GET['sort']) && $_GET['sort'] == 'low') {
            $builder =  $builder->orderBy('price', 'asc');
        } else if (isset($_GET['sort']) && $_GET['sort'] == 'low') {
            $builder =  $builder->orderBy('price', 'desc');
        } else {
            $builder =  $builder->orderBy('id', 'desc');
        }

        $total = $this->db->table('products')->select('products.id')->join('product_category as pc', 'pc.product_id = products.id')->join('product_images as pi', 'pi.product_id = products.id')->wherein('category_id', $all_categories)->where('visibility', '1')->where('is_deleted', '0')->groupBy('id')->countAllResults();
        
        $data['products'] = $builder->get($perPage,$offset)->getresult();
        $data['categoriesinfo'] = $this->db->table('categories')->select('category_name,category_desc_bottom,category_desc_top,category_slug')->where('category_slug', $slug)->get()->getresult();
        $data['links'] = $pager->makeLinks($page,$perPage,$total);
        
        // $data['category_settings'] = $this->db->table('general_settings')->where('name', 'scrolltotop')->get()->getResult();

        // echo '<pre>';
        // print_r($data);
        // // echo $this->db->getLastQuery();
        // echo sizeof($data['products']); 
        // echo $total;
        // exit;

        return view('Shop/page/category_page', $data);
    }
}
