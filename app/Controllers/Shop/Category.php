<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;
use CodeIgniter\Database\RawSql;

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

        $url = current_url();
        $params   = $_SERVER['QUERY_STRING'];
        $url = $url . '?' . $params;



        if (strpos($url, '%3Asort=low') == true) {
            $builder =  $builder->orderBy('price', 'asc');
        } else if (strpos($url, '%3Asort=high') == true) {
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
        $data['filter_names'] = array_unique($data['filter_names']);
        // echo '<pre>';print_r($data['filter_names']);exit;

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

                        $data['filters'][$filter_name][$filter_values->filter_value]['value'] = $filter_values->filter_value;
                        $data['filters'][$filter_name][$filter_values->filter_value]['url'] = $filter_url['url'];
                        $data['filters'][$filter_name][$filter_values->filter_value]['checked'] = $filter_url['checked'];
                        // echo '<pre>';print_r($data['filters'][$filter_name][$filter_values->filter_value]);exit; 
                        $data['filters'][$filter_name][$filter_values->filter_value] = array_unique($data['filters'][$filter_name][$filter_values->filter_value]);
                        $i++;
                    }
                }
            }
        }


        $url = str_replace('%3Asort=low&', '', $url);
        $url = str_replace('%3Asort=low', '', $url);
        $url = str_replace('%3Asort=high&', '', $url);
        $url = str_replace('%3Asort=high', '', $url);
        $url = str_replace('%3Asort=new&', '', $url);
        $url = str_replace('%3Asort=new', '', $url);


        if (strpos($url, '?') !== false) {
            $data['new'] = $url . '%3Asort=new';
            $data['low'] = $url . '%3Asort=low';
            $data['high'] = $url . '%3Asort=high';
        } else {
            $data['new'] = $url . '?%3Asort=new';
            $data['low'] = $url . '?%3Asort=low';
            $data['high'] = $url . '?%3Asort=high';
        }

        $filters_db = ['colour', 'size'];

        //filter query 
        $filter_url = explode('%3A', $url);
        unset($filter_url[0]);

        // $filter_url = explode('%2', $url);

        $filters = array();


        if (isset($filter_url) && !empty($filter_url)) {
            foreach ($filter_url as $each => $key) {
                $name = trim($key, '%2');
                $name = explode('=', $name);
                // print_r($name);exit;
                $filters[$name[0]] = $name[1];
            }



            $builder = $this->db->table('products')->select('products.discount,product_slug,products.id as id,title,desc,price,stock,image_name1,image_name2,image_name3,image_name4,small_image_name1,small_image_name2,small_image_name3,small_image_name4,order')->join('product_category as pc', 'pc.product_id = products.id')->join('product_images as pi', 'pi.product_id = products.id')->wherein('category_id', $all_categories)->where('visibility', '1')->where('is_deleted', '0')->groupBy('id');

            $fil = array();
            if (isset($filters_db) && !empty($filters_db)) {
                foreach ($filters_db as $each => $key) {
                    if (isset($filters) && !empty($filters)) {
                        foreach ($filters as $each1 => $key2) {
                            if ($key == $each1) {
                                $each3 = explode('%2', $key2);
                                foreach ($each3 as $each4 => $key3) {
                                    // if ($key == $each4) {
                                    // echo $key3.'/';
                                    if ($key3 != '') {
                                        $fil[][$key] = $key3;
                                    }
                                    // }
                                }
                            }
                        }
                    }
                }
            }

            // $fil = array(
            //     'colour' => 'black',
            // );
            // echo '<pre>';print_r($fil);exit;
            if(isset($fil) && !empty($fil)){

            $builder = $builder->join('product_filters', 'product_filters.product_id = products.id', 'left');

            $i = 0;
            $sql = '';
            foreach ($fil as $each => $key) {
                $values = array_values($key);
                $k = array_keys($key);
                // print_r($values[0]);
                if ($values[0] != '') {
                    // exit;
                    // $array = array('filter_name' => $k[0], 'filter_value' => $values[0]);
                    // echo '<pre>';print_r($array);exit;
                    if ($i == 0) {
                        // $builder = $builder->where($array);
                        $sql = 'filter_name = "' . $k[0] . '" AND filter_value = "' . $values[0] . '"';
                        // AND filter_value = '."$values[0]".'';
                    } else {
                        $sql = $sql . ' OR filter_name = "' . $k[0] . '" AND filter_value = "' . $values[0] . '"';
                    }
                    $i++;
                }
            }
            // echo $sql;exit;
            // $sql = 'filter_name = "colour" AND filter_value = "black" OR filter_name = "colour" AND filter_value = "white"';
            $builder->where(new RawSql($sql));
        }
            // exit;
            // ->where($fil);

            if ($this->session->get('userid') != '') {
                $builder = $builder->select('wishlist.user_id as wishlist')->join('wishlist', 'wishlist.product_id = products.id AND user_id = ' . $this->session->get('userid') . '', 'left');
            }

            $total = $this->db->table('products')->select('products.id')->join('product_category as pc', 'pc.product_id = products.id')->join('product_images as pi', 'pi.product_id = products.id')->wherein('category_id', $all_categories)->where('visibility', '1')->where('is_deleted', '0')->groupBy('id')->countAllResults();

            $data['products'] = $builder->get($perPage, $offset)->getresult();

            // echo '<pre>';
            // print_r($this->db->getLastQuery());
            // exit;
        }



        // echo '<pre>';
        // print_r($fil);
        // exit;


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

        // if (str_contains($url, $filter_value)) {
        if (strpos($url, $filter_value) !== false) {
            $url = str_replace($filter_value . '%2', '', $url);
            $checked = 1;
        } else if (strpos($url, $filter_name) !== false) {
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
