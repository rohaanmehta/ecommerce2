<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Reviews extends BaseController
{
    public function pending_reviews_list()
    {
        $data['reviews'] = $this->db->table('reviews')->select('user_id,reviews.product_id,stars,review,first_name,last_name,title,category_name,product_slug,created_at,reviews.id')->join('users as u','u.id = reviews.user_id','left')->join('products as p','p.id = reviews.product_id')->join('product_category as pc','pc.product_id = p.id')->join('categories as c','c.id = pc.category_id')->groupBy('user_id')->groupBy('reviews.product_id')->where('status', '0')->where('soft_delete', '0')->get()->getResult();
        // echo '<pre>';print_r($data);exit;
        return view('Admin/Views/Reviews/Pending_review_list', $data);
    }
    public function reviews_list()
    {
        $data['reviews'] = $this->db->table('reviews')->select('user_id,reviews.product_id,stars,review,first_name,last_name,title,category_name,product_slug,created_at,reviews.id')->join('users as u','u.id = reviews.user_id','left')->join('products as p','p.id = reviews.product_id')->join('product_category as pc','pc.product_id = p.id')->join('categories as c','c.id = pc.category_id')->groupBy('user_id')->groupBy('reviews.product_id')->where('status', '1')->where('soft_delete', '0')->get()->getResult();
        // echo '<pre>';print_r($data);exit;
        return view('Admin/Views/Reviews/reviews_list', $data);
    }
    public function deleted_list()
    {
        $data['reviews'] = $this->db->table('reviews')->select('user_id,reviews.product_id,stars,review,first_name,last_name,title,category_name,product_slug,created_at,reviews.id')->join('users as u','u.id = reviews.user_id','left')->join('products as p','p.id = reviews.product_id')->join('product_category as pc','pc.product_id = p.id')->join('categories as c','c.id = pc.category_id')->groupBy('user_id')->groupBy('reviews.product_id')->where('soft_delete', '1')->get()->getResult();
        // echo '<pre>';print_r($data);exit;
        return view('Admin/Views/Reviews/deleted_reviews_list', $data);
    }


    public function delete_review($id)
    {
        $this->db->table('reviews')->where('id', $id)->update(['soft_delete' => '1']);
        return redirect()->to(base_url('Admin/pending-reviews-list'));
    }
    public function delete_review2($id)
    {
        $this->db->table('reviews')->where('id', $id)->update(['soft_delete' => '1']);
        return redirect()->to(base_url('Admin/reviews-list'));
    }


    public function accept_review($id)
    {
        $this->db->table('reviews')->where('id', $id)->update(['status' => '1']);
        return redirect()->to(base_url('Admin/pending-reviews-list'));
    }

    public function decline_review($id)
    {
        $this->db->table('reviews')->where('id', $id)->update(['status' => '0']);
        return redirect()->to(base_url('Admin/reviews-list'));
    }

    public function undelete_accept_review($id)
    {
        $this->db->table('reviews')->where('id', $id)->update(['status' => '1', 'soft_delete' => '0']);
        return redirect()->to(base_url('Admin/deleted-list'));
    }

    public function undelete_decline_review($id)
    {
        $this->db->table('reviews')->where('id', $id)->update(['status' => '0', 'soft_delete' => '0']);
        return redirect()->to(base_url('Admin/deleted-list'));
    }
}
