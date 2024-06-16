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
        $offset = ($page - 1) * $perPage;

        //all categories
        $all_categories = array();
        $categoryid = $this->db->table('categories')->select('id,category_slug')->where('category_slug', $slug)->get()->getresult();

        //redirect to 404
        if (isset($categoryid) && empty($categoryid)) {
            echo view('errors/error404');
            exit;
        }

        array_push($all_categories, $categoryid[0]->id);

        //category banners
        $category_banners = $this->db->table('category_banner')->select('image,mobile_image')->orderBy('order', 'asc')->where('category_id', $categoryid[0]->id)->get()->getresult();

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
        $builder = $this->db->table('products')->select('products.discount,product_slug,products.id as id,title,desc,price,stock,image_name1,image_name2,image_name3,image_name4,small_image_name1,small_image_name2,small_image_name3,small_image_name4,order')->join('product_category as pc', 'pc.product_id = products.id')->join('product_images as pi', 'pi.product_id = products.id')->wherein('category_id', $all_categories)->where('visibility', '1')->where('is_deleted', '0')->groupBy('id');

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


        $data['products'] = $builder->get($perPage, $offset)->getresult();

        //filter names
        $data['filter_names'] = array();
        foreach ($data['products'] as $filters) {
            $filter_info = $this->db->table('product_filters')->select('filter_name')->where('product_id', $filters->id)->groupBy('filter_name')->get()->getresult();
            // print_r($filter_info);
            // exit;

            if (isset($filter_info) && !empty($filter_info)) {
                // $data['filter_names'][] = $filter_info[0]->filter_name;
                foreach ($filter_info as $filter) {
                    array_push($data['filter_names'], $filter->filter_name);
                }
            }
        }

        //filter values
        $data['filters'] = array();

        if (isset($data['filter_names']) && !empty($data['filter_names'])) {
            $i = 0;
            foreach ($data['filter_names'] as $filter_name) {
                $filter_info = $this->db->table('product_filters')->select('filter_value')->where('filter_name', $filter_name)->get()->getresult();
                // print_r($filter_info);
                // exit;
                // $data['filters'][] = $filter_name;

                if (isset($filter_info) && !empty($filter_info)) {
                    // $data['filter_names'][] = $filter_info[0]->filter_name;
                    foreach ($filter_info as $filter_values) {
                        $filter_url = $this->filter_url($filter_name, $filter_values->filter_value);

                        $data['filters'][$filter_name][$i]['value'] = $filter_values->filter_value;
                        $data['filters'][$filter_name][$i]['url'] = $filter_url['url'];
                        $data['filters'][$filter_name][$i]['checked'] = $filter_url['checked'];
                        $i++;
                    }
                }
            }
        }

        $data['categoriesinfo'] = $this->db->table('categories')->select('category_name,category_desc_bottom,category_desc_top,category_slug')->where('category_slug', $slug)->get()->getresult();
        $data['links'] = $pager->makeLinks($page, $perPage, $total);

        // $data['category_settings'] = $this->db->table('general_settings')->where('name', 'scrolltotop')->get()->getResult();
        // $url = current_url(true);
        // echo $url;
        // echo '<pre>';
        // print_r($data['filters']);
        // // echo $this->db->getLastQuery();
        // echo sizeof($data['products']); 
        // echo $total;
        // exit;

        return view('Shop/page/category_page', $data);
    }

    public function filter_url($filter_name, $filter_value)
    {
        $url = current_url();
        $params   = $_SERVER['QUERY_STRING'];
        $url = $url . '?' . $params;

        if (str_contains($url, $filter_value)) {
            $url = str_replace($filter_value . '%2', '', $url);
            $checked = 1;
        } else if (str_contains($url, $filter_name)) {
            $url = str_replace($filter_name . '=', $filter_name . '=' . $filter_value . '%2', $url);
            $checked = 0;
        } else {
            $url = $url . '%3A' . $filter_name . '=' . $filter_value . '%2';
            $checked = 0;
        }

        $array = array(
            'url' => $url,
            'checked' => $checked,
        );

        return $array;
    }
}
