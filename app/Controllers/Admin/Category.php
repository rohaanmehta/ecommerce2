<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function category_view()
    {
        $pager = service('pager');
        $perPage = 10;
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $data['category'] = $this->db->table('categories')->like('category_name', $_GET['search'])->get($perPage, $offset)->getResult();
            $total = $this->db->table('categories')->like('category_name', $_GET['search'])->countAllResults();
        } else {
            $data['category'] = $this->db->table('categories')->get($perPage, $offset)->getResult();
            $total = $this->db->table('categories')->countAllResults();
        }
        $data['links'] = $pager->makeLinks($page, $perPage, $total);


        return view('Admin/Views/Category/view', $data);
    }

    public function category_banner_view()
    {
        $pager = service('pager');
        $perPage = 10;
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $data['category'] = $this->db->table('category_banner')->select('mobile_image,category_banner.image,category_banner.order,category_banner.id,c.category_name')->join('categories as c', 'c.id = category_banner.category_id')->like('category_name', $_GET['search'])->get($perPage, $offset)->getResult();

            $total = $this->db->table('category_banner')->select('mobile_image,category_banner.image,category_banner.order,category_banner.id,c.category_name')->join('categories as c', 'c.id = category_banner.category_id')->like('category_name', $_GET['search'])->countAllResults();

        } else {
            $data['category'] = $this->db->table('category_banner')->select('mobile_image,category_banner.image,category_banner.order,category_banner.id,c.category_name')->join('categories as c', 'c.id = category_banner.category_id')->get($perPage, $offset)->getResult();

            $total = $this->db->table('category_banner')->select('mobile_image,category_banner.image,category_banner.order,category_banner.id,c.category_name')->join('categories as c', 'c.id = category_banner.category_id')->countAllResults();
        }
        $data['links'] = $pager->makeLinks($page, $perPage, $total);

        $data['all_categories'] = $this->db->table('categories')->get()->getResult();
        return view('Admin/Views/Category/category_banner_view', $data);
    }

    public function add_category_banner_data()
    {
        // print_r($_POST);exit;
        $array = array(
            'category_id' => $_POST['category_id'],
            'order' => $_POST['order'],
        );

        $img1 = $this->request->getFile('image');
        $img1name = '1' . date('dmyHis') . '.png';


        $img2 = $this->request->getFile('mobile-image');
        $img2name = '2' . date('dmyHis') . '.png';

        if ($_POST['id'] == '') {
            if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                $img1->move(ROOTPATH . 'uploads/category_banners/', $img1name);
                $fileName = $this->image_upload($img1name, IMAGETYPE_WEBP, 'uploads/category_banners/', '1366x350');

                $array['image'] = $fileName;
            }

            if (isset($_FILES['mobile-image']['name']) && !empty($_FILES['mobile-image']['name'])) {
                $img2->move(ROOTPATH . 'uploads/category_banners/', $img2name);
                $fileName2 = $this->image_upload($img2name, IMAGETYPE_WEBP, 'uploads/category_banners/', '768x600');

                $array['mobile_image'] = $fileName2;
            }

            if ($this->db->table('category_banner')->insert($array)) {
                $data['status'] = 200;
            } else {
                $data['status'] = 400;
            }
        } else {
            $category_info = $this->db->table('category_banner')->where('id', $_POST['id'])->get()->getResult();

            if (isset($category_info[0]) && !empty($category_info[0])) {
                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $img1->move(ROOTPATH . 'uploads/category_banners/', $img1name);
                    $fileName = $this->image_upload($img1name, IMAGETYPE_WEBP, 'uploads/category_banners/', '1366x350');
                    $array['image'] = $fileName;

                    if (is_file(ROOTPATH . 'uploads/category_banners/' . $category_info[0]->image)) {
                        unlink(ROOTPATH . 'uploads/category_banners/' . $category_info[0]->image);
                    }
                }
                if (isset($_FILES['mobile-image']['name']) && !empty($_FILES['mobile-image']['name'])) {
                    $img2->move(ROOTPATH . 'uploads/category_banners/', $img2name);
                    $fileName2 = $this->image_upload($img2name, IMAGETYPE_WEBP, 'uploads/category_banners/', '768x600');
                    $array['mobile_image'] = $fileName2;

                    if (is_file(ROOTPATH . 'uploads/category_banners/' . $category_info[0]->mobile_image)) {
                        unlink(ROOTPATH . 'uploads/category_banners/' . $category_info[0]->mobile_image);
                    }
                }
            }
            if ($this->db->table('category_banner')->where('id', $_POST['id'])->update($array)) {
                $data['status'] = 200;
            } else {
                $data['status'] = 400;
            }
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function add_category_data()
    {
        // print_r($_POST);exit;
        $array = array(
            'category_name' => $_POST['name'],
            'show_on_homepage' => $_POST['show_on_home_page'],
            'category_order' => $_POST['order'],
            'parent_category' => $_POST['parent_category'],
            'pair_category' => $_POST['pair_category'],
            'category_desc_top' => $_POST['category_desc_top'],
            'category_desc_bottom' => $_POST['category_desc_bottom'],
            'category_slug' => create_slug($_POST['name']),
        );

        if ($_POST['category_id'] == '') {
            if ($this->db->table('categories')->insert($array)) {
                $data['status'] = 200;
            } else {
                $data['status'] = 400;
            }
        } else {
            if ($this->db->table('categories')->where('id', $_POST['category_id'])->update($array)) {
                $data['status'] = 200;
            } else {
                $data['status'] = 400;
            }
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function edit_category_data()
    {
        // print_r($_POST);exit;
        $data['data'] = $this->db->table('categories')->where('id', $_POST['id'])->get()->getResult();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function edit_category_banner()
    {
        // print_r($_POST);exit;
        $data['data'] = $this->db->table('category_banner')->where('id', $_POST['id'])->get()->getResult();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function delete_category($id)
    {
        $this->db->table('categories')->where('id', $id)->delete();
        return redirect()->to(base_url('Admin/category'));
    }

    public function delete_category_banner($id)
    {
        $category_info = $this->db->table('category_banner')->where('id', $id)->get()->getResult();

        if (isset($category_info[0]) && !empty($category_info[0])) {
            if (is_file(ROOTPATH . 'uploads/category_banners/' . $category_info[0]->image)) {
                unlink(ROOTPATH . 'uploads/category_banners/' . $category_info[0]->image);
            }
            if (is_file(ROOTPATH . 'uploads/category_banners/' . $category_info[0]->mobile_image)) {
                unlink(ROOTPATH . 'uploads/category_banners/' . $category_info[0]->mobile_image);
            }
        }

        $this->db->table('category_banner')->where('id', $id)->delete();
        return redirect()->to(base_url('Admin/category-banner'));
    }

    public function export_categories()
    {
        $data['csv'] = $this->db->table('categories')->select('*')->get()->getresult();
        return view('Admin/Views/Category/category_download', $data);
    }
}
