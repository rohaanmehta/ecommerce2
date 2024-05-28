<?php

namespace App\Controllers\Shop;

use App\Controllers\BaseController;

class Product extends BaseController
{
    public function product_page_view($category = null, $slug)
    {
        $data['productbanner1'] = $this->db->table('general_settings')->select('name,value_1,value_2,value_3')->where('name', 'productbannersection1')->get()->getResult();
        $data['productbanner2'] = $this->db->table('general_settings')->select('name,value_1,value_2,value_3')->where('name', 'productbannersection2')->get()->getResult();
        $limit1 = 1;
        $limit2 = 1;
        if (isset($data['productbanner1'][0]) && $data['productbanner1'][0]->value_2 != '') {
            $limit1 = $data['productbanner1'][0]->value_2;
        }
        if (isset($data['productbanner2'][0]) && $data['productbanner2'][0]->value_2 != '') {
            $limit2 = $data['productbanner2'][0]->value_2;
        }


        $data['product'] = $this->db->table('products')->select('products.desc,products.id,products.title,pi.image_name1,pi.image_name2,products.stock,products.sku,products.purchasable,products.product_slug,,pi.image_name3,pi.image_name4,products.price')->where('product_slug', $slug)->join('product_images as pi', 'pi.product_id = products.id')->get()->getResult();

        //redirect to 404
        if (isset($data['product']) && empty($data['product'])) {
            echo view('errors/error404');
            exit;
        }

        //check wishlisted
        if (!empty($this->session->get('userid')) && $this->session->get('userid') != '') {
            $check_wishlist =  $this->db->table('wishlist')->where('product_id', $data['product'][0]->id)->countAllResults();
            if ($check_wishlist > 0) {
                $data['wishlist'] = 1;
            } else {
                $data['wishlist'] = 0;
            }
        } else {
            $data['wishlist'] = 0;
        }


        // $section2 = $this->db->table('products')->select('products.id,products.title,products.price,pi.image_name1,pi.image_name2,pi.image_name3,pi.image_name4,products.product_slug')->where('promote', 'section2');

        // if ($this->session->get('userid') != '') {
        //     $section2 = $section2->select('wishlist.user_id as wishlist')->join('wishlist', 'wishlist.product_id = products.id AND user_id = ' . $this->session->get('userid') . '', 'left');
        // }

        // $section2 = $section2->join('product_images as pi', 'pi.product_id = products.id')->where('is_deleted', '0')->limit($limit2)->orderBy('products.id', 'ASC');

        // $data['section2'] =  $section2->get()->getResult();

        //all product categories for breadcrum
        $product_category = $this->db->table('products')->select('categories.id')->join('product_category', 'product_category.product_id = products.id')->join('categories', 'categories.id = product_category.category_id')->where('parent_category', '')->limit(1)->where('product_slug', $slug)->get()->getResult();

        $last_category_id = $this->db->table('categories')->where('category_slug', $category)->get()->getresult();

        if (empty($product_category[0]->id)) {
            $main_category = $last_category_id[0]->id;
        } else {
            $main_category = $product_category[0]->id;
        }

        $data['all_categories'] = $this->all_product_categories($main_category, $last_category_id[0]->id);

        // echo $category;
        foreach ($data['all_categories'] as $row) {
            $product_last_category_id = $row['id'];
            $product_pair_category = $row['pair_category'];
        }


        $section1 = $this->db->table('products')->select('products.id,products.title,products.price,pi.image_name1,pi.image_name2,pi.image_name3,pi.image_name4,products.product_slug')->join('product_category', 'product_category.product_id = products.id')->where('visibility', '1')->where('is_deleted', '0')->where('product_slug !=', $slug)->where('category_id', $product_last_category_id);

        if ($this->session->get('userid') != '') {
            $section1 = $section1->select('wishlist.user_id as wishlist')->join('wishlist', 'wishlist.product_id = products.id AND user_id = ' . $this->session->get('userid') . '', 'left');
        }

        $section1 = $section1->join('product_images as pi', 'pi.product_id = products.id')->where('is_deleted', '0')->orderBy('products.id', 'ASC');

        $data['section1'] = $section1->get()->getResult();

        //pair category

        $section2 = $this->db->table('products')->select('products.id,products.title,products.price,pi.image_name1,pi.image_name2,pi.image_name3,pi.image_name4,products.product_slug')->join('product_category', 'product_category.product_id = products.id')->where('visibility', '1')->where('is_deleted', '0')->where('product_slug !=', $slug)->where('category_id', $product_pair_category);

        if ($this->session->get('userid') != '') {
            $section2 = $section2->select('wishlist.user_id as wishlist')->join('wishlist', 'wishlist.product_id = products.id AND user_id = ' . $this->session->get('userid') . '', 'left');
        }

        $section2 = $section2->join('product_images as pi', 'pi.product_id = products.id')->where('is_deleted', '0')->orderBy('products.id', 'ASC');

        $data['section2'] = $section2->get()->getResult();

        //reviews 
        $data['reviews'] =  $this->db->table('reviews')->where('status', '1')->where('product_id', $data['product'][0]->id)->limit(10)->get()->getResult();
        $data['reviews_total'] =  $this->db->table('reviews')->where('status', '1')->where('product_id', $data['product'][0]->id)->countAllResults();


        // echo '<pre>';print_r($product_pair_category);exit;

        return view('Shop/page/product_page', $data);
    }

    public function all_product_categories($id, $last_category_id)
    {
        $category_array = array();
        $first_category = $this->db->table('categories')->select('id,category_name,category_slug,pair_category')->where('id', $id)->get()->getResult();

        $category_array[0]['id'] = $first_category[0]->id;
        $category_array[0]['name'] = $first_category[0]->category_name;
        $category_array[0]['slug'] = $first_category[0]->category_slug;
        $category_array[0]['pair_category'] = $first_category[0]->pair_category;
        $first_cat = 0;

        for ($i = 1; $i < 6; $i++) {
            $count = $this->db->table('categories')->select('id,category_name,category_slug,pair_category')->where('parent_category', $id)->get()->getResult();

            if (isset($count[0]) && !empty($count[0])) {
                $category_array[$i]['id'] = $count[0]->id;
                $category_array[$i]['name'] = $count[0]->category_name;
                $category_array[$i]['slug'] = $count[0]->category_slug;
                $category_array[$i]['pair_category'] = $count[0]->pair_category;

                // print_r($count);
                if ($count[0]->id == $last_category_id) {
                    $first_cat = 1;
                    break;
                }
                $id = $count[0]->id;
            } else {
                break;
            }
        }
        if ($first_cat == 0) {
            $category_array = array();
            $category_array[0]['id'] = $first_category[0]->id;
            $category_array[0]['name'] = $first_category[0]->category_name;
            $category_array[0]['slug'] = $first_category[0]->category_slug;
            $category_array[0]['pair_category'] = $first_category[0]->pair_category;
        }

        return $category_array;
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

    public function product_review($slug)
    {
        $data['product'] =  $this->db->table('products')->join('product_images as pi', 'pi.product_id = products.id')->where('product_slug', $slug)->get()->getResult();
        $data['reviews'] =  $this->db->table('reviews')->where('status', '1')->where('product_id', $data['product'][0]->id)->get()->getResult();
        $data['reviews_total'] =  $this->db->table('reviews')->where('status', '1')->where('product_id', $data['product'][0]->id)->countAllResults();
        $data['reviews_average'] =  $this->db->table('reviews')->select('AVG(stars) as average_review')->where('status', '1')->where('product_id', $data['product'][0]->id)->get()->getResult();

        return view('Shop/page/product_review', $data);
    }
}
