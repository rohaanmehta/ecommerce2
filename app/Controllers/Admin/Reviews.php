<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Reviews extends BaseController
{
    public function pending_reviews_list()
    {
        $pager = service('pager');
        $perPage = 10;
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $data['reviews'] = $this->db->table('reviews')->select('first_name,last_name,user_id,reviews.product_id,stars,review,first_name,last_name,title,category_name,product_slug,created_at,reviews.id')->join('users as u', 'u.id = reviews.user_id', 'left')->join('products as p', 'p.id = reviews.product_id')->join('product_category as pc', 'pc.product_id = p.id')->join('categories as c', 'c.id = pc.category_id')->where('reviews.status', '0')->where('soft_delete', '0')->like('first_name', $_GET['search'])->orlike('last_name', $_GET['search'])->orlike('title', $_GET['search'])->orlike('review', $_GET['search'])->groupBy('first_name')->groupBy('last_name')->groupBy('title')->get($perPage, $offset)->getResult();

            $total = $this->db->table('reviews')->select('reviews.id')->join('users as u', 'u.id = reviews.user_id', 'left')->join('products as p', 'p.id = reviews.product_id')->join('product_category as pc', 'pc.product_id = p.id')->join('categories as c', 'c.id = pc.category_id')->where('reviews.status', '0')->where('soft_delete', '0')->like('first_name', $_GET['search'])->orlike('last_name', $_GET['search'])->orlike('title', $_GET['search'])->orlike('review', $_GET['search'])->groupBy('first_name')->groupBy('last_name')->groupBy('title')->countAllResults();
        } else {
            $data['reviews'] = $this->db->table('reviews')->select('first_name,last_name,user_id,reviews.product_id,stars,review,first_name,last_name,title,category_name,product_slug,created_at,reviews.id')->join('users as u', 'u.id = reviews.user_id', 'left')->join('products as p', 'p.id = reviews.product_id')->join('product_category as pc', 'pc.product_id = p.id')->join('categories as c', 'c.id = pc.category_id')->where('reviews.status', '0')->where('soft_delete', '0')->get($perPage, $offset)->getResult();

            $total = $this->db->table('reviews')->select('reviews.id')->join('users as u', 'u.id = reviews.user_id', 'left')->join('products as p', 'p.id = reviews.product_id')->join('product_category as pc', 'pc.product_id = p.id')->join('categories as c', 'c.id = pc.category_id')->where('reviews.status', '0')->where('soft_delete', '0')->countAllResults();
        }

        $data['links'] = $pager->makeLinks($page, $perPage, $total);

        // echo '<pre>';print_r($data);exit;
        return view('Admin/Views/Reviews/Pending_review_list', $data);
    }
    public function reviews_list()
    {
        $pager = service('pager');
        $perPage = 10;
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $data['reviews'] = $this->db->table('reviews')->select('first_name,last_name,user_id,reviews.product_id,stars,review,first_name,last_name,title,category_name,product_slug,created_at,reviews.id')->join('users as u', 'u.id = reviews.user_id', 'left')->join('products as p', 'p.id = reviews.product_id')->join('product_category as pc', 'pc.product_id = p.id')->join('categories as c', 'c.id = pc.category_id')->where('reviews.status', '1')->where('soft_delete', '0')->like('first_name', $_GET['search'])->orlike('last_name', $_GET['search'])->orlike('title', $_GET['search'])->orlike('review', $_GET['search'])->groupBy('first_name')->groupBy('last_name')->groupBy('title')->get($perPage, $offset)->getResult();

            $total = $this->db->table('reviews')->select('reviews.id')->join('users as u', 'u.id = reviews.user_id', 'left')->join('products as p', 'p.id = reviews.product_id')->join('product_category as pc', 'pc.product_id = p.id')->join('categories as c', 'c.id = pc.category_id')->where('reviews.status', '1')->where('soft_delete', '0')->like('first_name', $_GET['search'])->orlike('last_name', $_GET['search'])->orlike('title', $_GET['search'])->orlike('review', $_GET['search'])->groupBy('first_name')->groupBy('last_name')->groupBy('title')->countAllResults();
        } else {
            $data['reviews'] = $this->db->table('reviews')->select('first_name,last_name,user_id,reviews.product_id,stars,review,first_name,last_name,title,category_name,product_slug,created_at,reviews.id')->join('users as u', 'u.id = reviews.user_id', 'left')->join('products as p', 'p.id = reviews.product_id')->join('product_category as pc', 'pc.product_id = p.id')->join('categories as c', 'c.id = pc.category_id')->where('reviews.status', '1')->where('soft_delete', '0')->get($perPage, $offset)->getResult();

            $total = $this->db->table('reviews')->select('reviews.id')->join('users as u', 'u.id = reviews.user_id', 'left')->join('products as p', 'p.id = reviews.product_id')->join('product_category as pc', 'pc.product_id = p.id')->join('categories as c', 'c.id = pc.category_id')->where('reviews.status', '1')->where('soft_delete', '0')->countAllResults();
        }

        $data['links'] = $pager->makeLinks($page, $perPage, $total);

        // echo '<pre>';print_r($data);exit;
        return view('Admin/Views/Reviews/reviews_list', $data);
    }
    public function deleted_list()
    {
        $pager = service('pager');
        $perPage = 10;
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $data['reviews'] = $this->db->table('reviews')->select('first_name,last_name,user_id,reviews.product_id,stars,review,first_name,last_name,title,category_name,product_slug,created_at,reviews.id')->join('users as u', 'u.id = reviews.user_id', 'left')->join('products as p', 'p.id = reviews.product_id')->join('product_category as pc', 'pc.product_id = p.id')->join('categories as c', 'c.id = pc.category_id')->where('soft_delete', '1')->like('first_name', $_GET['search'])->orlike('last_name', $_GET['search'])->orlike('title', $_GET['search'])->orlike('review', $_GET['search'])->groupBy('first_name')->groupBy('last_name')->groupBy('title')->get($perPage, $offset)->getResult();

            $total = $this->db->table('reviews')->select('reviews.id')->join('users as u', 'u.id = reviews.user_id', 'left')->join('products as p', 'p.id = reviews.product_id')->join('product_category as pc', 'pc.product_id = p.id')->join('categories as c', 'c.id = pc.category_id')->where('soft_delete', '1')->like('first_name', $_GET['search'])->orlike('last_name', $_GET['search'])->orlike('title', $_GET['search'])->orlike('review', $_GET['search'])->groupBy('first_name')->groupBy('last_name')->groupBy('title')->countAllResults();
        } else {
            $data['reviews'] = $this->db->table('reviews')->select('first_name,last_name,user_id,reviews.product_id,stars,review,first_name,last_name,title,category_name,product_slug,created_at,reviews.id')->join('users as u', 'u.id = reviews.user_id', 'left')->join('products as p', 'p.id = reviews.product_id')->join('product_category as pc', 'pc.product_id = p.id')->join('categories as c', 'c.id = pc.category_id')->where('soft_delete', '1')->get($perPage, $offset)->getResult();

            $total = $this->db->table('reviews')->select('reviews.id')->join('users as u', 'u.id = reviews.user_id', 'left')->join('products as p', 'p.id = reviews.product_id')->join('product_category as pc', 'pc.product_id = p.id')->join('categories as c', 'c.id = pc.category_id')->where('soft_delete', '1')->countAllResults();
        }

        $data['links'] = $pager->makeLinks($page, $perPage, $total);

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
