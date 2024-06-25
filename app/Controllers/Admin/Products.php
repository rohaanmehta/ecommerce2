<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Products extends BaseController
{
    public function product_badge_download()
    {
        $data['data'] = $this->db->table('product_badge')->get()->getresult();
        return view('Admin/Views/Products/bulk_product_download_data', $data);
    }

    public function product_varients_download()
    {
        $data['data'] = $this->db->table('product_varient')->get()->getresult();
        return view('Admin/Views/Products/bulk_product_varient_download_data', $data);
    }

    public function product_image_download()
    {
        $data['data'] = $this->db->table('product_images')->get()->getresult();
        return view('Admin/Views/Products/bulk_product_image_download_data', $data);
    }

    public function product_download()
    {
        $data['data'] = $this->db->table('products')->get()->getresult();

        if (isset($data) && !empty($data)) {
            foreach ($data['data'] as $key => $row) {
                $data['data'][$key]->title = str_replace(',', ' ', $data['data'][$key]->title);
                $data['data'][$key]->desc = str_replace(',', ' ', $data['data'][$key]->desc);

                if ($row->visibility == '1') {
                    $data['data'][$key]->visibility = 'Y';
                } else {
                    $data['data'][$key]->visibility = 'N';
                }

                $category_info = $this->db->table('product_category')->select('id')->where('product_id', $row->id)->get()->getResult();

                if (isset($category_info[0]) && !empty($category_info[0])) {
                    $category = '';
                    foreach ($category_info as $row2) {
                        $category .= '|' . $row2->id;
                    }
                    $category = trim($category, '|');
                    $data['data'][$key]->category = $category;
                } else {
                    $data['data'][$key]->category = '';
                }
                // echo $key;exit;
                // echo'<pre>';print_r($data[$key]);
            }
        }
        // echo'<pre>';print_r($data);exit;
        return view('Admin/Views/Products/bulk_product_details_download', $data);
    }


    public function product_badge_delete()
    {
        $csv = array();
        $lines = file($_FILES['file']['tmp_name'], FILE_IGNORE_NEW_LINES);

        $i = 0;
        foreach ($lines as $key => $value) {
            $csv = str_getcsv($value);
            $this->db->table('product_badge')->where('product_id', $csv[0])->delete();
        }

        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function bulk_product_varient_delete()
    {
        $csv = array();
        $lines = file($_FILES['file']['tmp_name'], FILE_IGNORE_NEW_LINES);

        $i = 0;
        foreach ($lines as $key => $value) {
            if ($i != 0) {
                $csv = str_getcsv($value);
                // echo '<pre>';print_r($csv);exit;

                if ($csv[0] != '') {
                    $this->db->table('product_varient')->where('product_id', $csv[0])->where('option_name', $csv[1])->where('option_value', $csv[2])->delete();
                }
            }
            $i++;
        }
        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function bulk_product_image_delete()
    {
        $csv = array();
        $lines = file($_FILES['file']['tmp_name'], FILE_IGNORE_NEW_LINES);

        $i = 0;
        foreach ($lines as $key => $value) {
            if ($i != 0) {
                $csv = str_getcsv($value);
                // echo '<pre>';print_r($csv);exit;

                if ($csv[0] != '') {
                    $count = $this->db->table('product_images')->where('image_name1', $csv[0])->orwhere('image_name2', $csv[0])->orwhere('image_name3', $csv[0])->orwhere('image_name4', $csv[0])->orwhere('small_image_name1', $csv[0])->orwhere('small_image_name2', $csv[0])->orwhere('small_image_name3', $csv[0])->orwhere('small_image_name4', $csv[0])->countAllResults();

                    if ($count > 0) {

                        $info = $this->db->table('product_images')->where('image_name1', $csv[0])->orwhere('image_name2', $csv[0])->orwhere('image_name3', $csv[0])->orwhere('image_name4', $csv[0])->orwhere('small_image_name1', $csv[0])->orwhere('small_image_name2', $csv[0])->orwhere('small_image_name3', $csv[0])->orwhere('small_image_name4', $csv[0])->get()->getResult();

                        if ($info[0]->image_name1 == $csv[0]) {
                            $array['image_name1'] = '';
                        } else if ($info[0]->image_name2 == $csv[0]) {
                            $array['image_name2'] = '';
                        } else if ($info[0]->image_name3 == $csv[0]) {
                            $array['image_name3'] = '';
                        } else if ($info[0]->image_name4 == $csv[0]) {
                            $array['image_name4'] = '';
                        } else if ($info[0]->small_image_name1 == $csv[0]) {
                            $array['small_image_name1'] = '';
                        } else if ($info[0]->small_image_name2 == $csv[0]) {
                            $array['small_image_name2'] = '';
                        } else if ($info[0]->small_image_name3 == $csv[0]) {
                            $array['small_image_name3'] = '';
                        } else if ($info[0]->small_image_name4 == $csv[0]) {
                            $array['small_image_name4'] = '';
                        }

                        $count = $this->db->table('product_images')->where('image_name1', $csv[0])->orwhere('image_name2', $csv[0])->orwhere('image_name3', $csv[0])->orwhere('image_name4', $csv[0])->orwhere('small_image_name1', $csv[0])->orwhere('small_image_name2', $csv[0])->orwhere('small_image_name3', $csv[0])->orwhere('small_image_name4', $csv[0])->update($array);

                        if (is_file(ROOTPATH . 'uploads/product_images/' . $csv[0])) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $csv[0]);
                        }
                    }
                }
            }
            $i++;
        }
        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function bulk_product_delete()
    {
        $csv = array();
        $lines = file($_FILES['file']['tmp_name'], FILE_IGNORE_NEW_LINES);

        $i = 0;
        foreach ($lines as $key => $value) {
            if ($i != 0) {
                $csv = str_getcsv($value);
                // echo '<pre>';print_r($csv);exit;

                if ($csv[0] != '') {
                    $productinfo = $this->db->table('product_images')->where('product_id', $csv[0])->get()->getResult();

                    if (isset($productinfo[0]) && !empty($productinfo[0])) {
                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name1)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name1);
                        }
                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name2)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name2);
                        }
                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name3)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name3);
                        }
                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name4)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name4);
                        }
                    }

                    $this->db->table('product_varient')->where('product_id', $csv[0])->delete();
                    $this->db->table('product_images')->where('product_id', $csv[0])->delete();
                    $this->db->table('product_category')->where('product_id', $csv[0])->delete();
                    $this->db->table('product_badge')->where('product_id', $csv[0])->delete();
                    $this->db->table('products')->where('id', $csv[0])->delete();
                }
            }
            $i++;
        }
        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function product_badge_update()
    {
        $csv = array();
        $lines = file($_FILES['file']['tmp_name'], FILE_IGNORE_NEW_LINES);

        $i = 0;
        foreach ($lines as $key => $value) {
            if ($i != 0) {
                $csv = str_getcsv($value);

                $array = array(
                    'product_id' => $csv[0],
                    'badge_text' => $csv[1],
                );

                $count = $this->db->table('product_badge')->where('product_id', $csv[0])->countAllResults();
                if ($count == 0) {
                    $this->db->table('product_badge')->insert($array);
                } else {
                    $this->db->table('product_badge')->where('product_id', $csv[0])->update($array);
                }
            }
            $i++;
        }

        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function bulk_product_download_view()
    {
        return view('Admin/Views/Products/bulk_product_download_view');
    }

    public function bulk_product_badge_view()
    {
        return view('Admin/Views/Products/bulk_product_badge_view');
    }

    public function temp_image_view()
    {
        $path    = ROOTPATH . 'uploads/\product_images_temp/';
        $files = scandir($path);
        $i = 0;
        $filearray = array();
        foreach ($files as $file) {
            if ($i > 1) {
                $filearray[] = $file;
            }
            $i++;
        }
        // echo '<pre>';
        // print_r($filearray);
        // exit;

        $data['images'] = $filearray;
        return view('Admin/Views/Products/temp_images', $data);
    }

    public function bulk_product_update_view()
    {
        return view('Admin/Views/Products/bulk_product_update_view');
    }

    public function bulk_product_delete_view()
    {
        return view('Admin/Views/Products/bulk_product_delete_view');
    }

    public function products_view()
    {
        $pager = service('pager');
        $perPage = 10;
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $perPage;

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $data['products'] = $this->db->table('products')->join('product_category as pc', 'pc.product_id = products.id')->join('categories as c', 'c.id = pc.category_id')->like('title', $_GET['search'])->orlike('category_name', $_GET['search'])->orlike('sku', $_GET['search'])->orlike('promote', $_GET['search'])->groupby('pc.product_id')->get($perPage, $offset)->getResult();
            $total = $this->db->table('products')->select('products.id')->join('product_category as pc', 'pc.product_id = products.id')->join('categories as c', 'c.id = pc.category_id')->like('title', $_GET['search'])->orlike('category_name', $_GET['search'])->orlike('sku', $_GET['search'])->orlike('promote', $_GET['search'])->groupby('pc.product_id')->countAllResults();
        } else {
            $data['products'] = $this->db->table('products')->join('product_category as pc', 'pc.product_id = products.id')->join('categories as c', 'c.id = pc.category_id')->groupby('pc.product_id')->get($perPage, $offset)->getResult();

            $total = $this->db->table('products')->select('products.id')->join('product_category as pc', 'pc.product_id = products.id')->join('categories as c', 'c.id = pc.category_id')->groupby('pc.product_id')->countAllResults();
        }
        $data['links'] = $pager->makeLinks($page, $perPage, $total);


        return view('Admin/Views/Products/view', $data);
    }

    public function add_products($id = '')
    {
        $data = array();

        if ($id != '') {
            $data['product'] =  $this->db->table('products')->select('products.*,pc.*,pi.*,pb.badge_text')->join('product_category as pc', 'pc.product_id = products.id')->join('product_images as pi', 'pi.product_id = products.id')->join('product_badge as pb', 'pb.product_id = products.id', 'left')->where('products.id', $id)->get()->getresult();
            $data['product_categories'] = $this->db->table('product_category')->where('product_id', $id)->get()->getresult();
        }
        // echo'<pre>';print_r($data['product']);exit;
        $data['categories'] = $this->db->table('categories')->get()->getresult();
        return view('Admin/Views/Products/add_product', $data);
    }

    public function add_product_data()
    {
        // echo '<pre>';
        // print_r($_FILES);
        // print_r($_POST);
        // exit;

        helper('custom');

        $img1 = $this->request->getFile('image1');
        $img2 = $this->request->getFile('image2');
        $img3 = $this->request->getFile('image3');
        $img4 = $this->request->getFile('image4');

        $img1name = '1' . date('dmyHis') . '.png';
        $img2name = '2' . date('dmyHis') . '.png';
        $img3name = '3' . date('dmyHis') . '.png';
        $img4name = '4' . date('dmyHis') . '.png';

        $array = array(
            'title' =>  $_POST['title'],
            'desc' => $_POST['desc'],
            'price' => $_POST['price'],
            'stock' => $_POST['stock'],
            'sku' => $_POST['sku'],
            'promote' => $_POST['promote'],
            'purchasable' => $_POST['purchasable'],
            'product_slug' => create_slug($_POST['title']),
        );


        if ($_POST['productid'] == '') {
            if ($this->db->table('products')->insert($array)) {
                $data['status'] = 200;
                $productid = $this->db->insertID();


                $image_array = array(
                    'product_id' => $productid,
                    'storage' => 'local'
                );

                if (isset($_FILES['image1']['name']) && !empty($_FILES['image1']['name'])) {
                    $img1->move(ROOTPATH . 'uploads/product_images/', $img1name);
                    $fileName = $this->image_upload_dont_delete($img1name, IMAGETYPE_WEBP, 'uploads/product_images/', '500x667');
                    $small_fileName = $this->image_upload($img1name, IMAGETYPE_WEBP, 'uploads/product_images/', '300x400');
                    $image_array['small_image_name1'] = $small_fileName;
                    $image_array['image_name1'] = $fileName;
                }

                if (isset($_FILES['image2']['name']) && !empty($_FILES['image2']['name'])) {
                    $img2->move(ROOTPATH . 'uploads/product_images/', $img2name);
                    $fileName2 = $this->image_upload_dont_delete($img2name, IMAGETYPE_WEBP, 'uploads/product_images/', '500x667');
                    $small_fileName2 = $this->image_upload($img2name, IMAGETYPE_WEBP, 'uploads/product_images/', '300x400');
                    $image_array['small_image_name2'] = $small_fileName2;
                    $image_array['image_name2'] = $fileName2;
                }

                if (isset($_FILES['image3']['name']) && !empty($_FILES['image3']['name'])) {
                    $img3->move(ROOTPATH . 'uploads/product_images/', $img3name);
                    $fileName3 = $this->image_upload_dont_delete($img3name, IMAGETYPE_WEBP, 'uploads/product_images/', '500x667');
                    $small_fileName3 = $this->image_upload($img3name, IMAGETYPE_WEBP, 'uploads/product_images/', '300x400');
                    $image_array['small_image_name3'] = $small_fileName3;
                    $image_array['image_name3'] = $fileName3;
                }

                if (isset($_FILES['image4']['name']) && !empty($_FILES['image4']['name'])) {
                    $img4->move(ROOTPATH . 'uploads/product_images/', $img4name);
                    $fileName4 = $this->image_upload_dont_delete($img4name, IMAGETYPE_WEBP, 'uploads/product_images/', '500x667');
                    $small_fileName4 = $this->image_upload($img4name, IMAGETYPE_WEBP, 'uploads/product_images/', '300x400');
                    $image_array['small_image_name4'] = $small_fileName4;
                    $image_array['image_name4'] = $fileName4;
                }

                $this->db->table('product_images')->insert($image_array);
            } else {
                $error = array('error' => $this->upload->display_errors());
                $data['status'] = 400;
            }
        } else {
            if ($this->db->table('products')->where('id', $_POST['productid'])->update($array)) {
                $data['status'] = 200;
                $productid = $_POST['productid'];


                $image_array = array(
                    'product_id' => $productid,
                    'storage' => 'local'
                );

                $productinfo = $this->db->table('product_images')->where('product_id', $_POST['productid'])->get()->getResult();

                if (isset($productinfo[0]) && !empty($productinfo[0])) {
                    if (isset($_FILES['image1']['name']) && !empty($_FILES['image1']['name'])) {
                        $img1->move(ROOTPATH . 'uploads/product_images/', $img1name);
                        $fileName = $this->image_upload_dont_delete($img1name, IMAGETYPE_WEBP, 'uploads/product_images/', '500x667');
                        $small_fileName = $this->image_upload($img1name, IMAGETYPE_WEBP, 'uploads/product_images/', '300x400');
                        $image_array['image_name1'] = $fileName;
                        $image_array['small_image_name1'] = $small_fileName;

                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name1)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name1);
                        }
                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name1)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name1);
                        }
                    }

                    if (isset($_FILES['image2']['name']) && !empty($_FILES['image2']['name'])) {
                        $img2->move(ROOTPATH . 'uploads/product_images/', $img2name);
                        $fileName2 = $this->image_upload_dont_delete($img2name, IMAGETYPE_WEBP, 'uploads/product_images/', '500x667');
                        $small_fileName2 = $this->image_upload($img2name, IMAGETYPE_WEBP, 'uploads/product_images/', '300x400');
                        $image_array['image_name2'] = $fileName2;
                        $image_array['small_image_name2'] = $small_fileName2;

                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name2)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name2);
                        }
                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name2)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name2);
                        }
                    }

                    if (isset($_FILES['image3']['name']) && !empty($_FILES['image3']['name'])) {
                        $img3->move(ROOTPATH . 'uploads/product_images/', $img3name);
                        $fileName3 = $this->image_upload_dont_delete($img3name, IMAGETYPE_WEBP, 'uploads/product_images/', '500x667');
                        $small_fileName3 = $this->image_upload($img3name, IMAGETYPE_WEBP, 'uploads/product_images/', '300x400');
                        $image_array['image_name3'] = $fileName3;
                        $image_array['small_image_name3'] = $small_fileName3;


                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name3)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name3);
                        }
                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name3)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name3);
                        }
                    }

                    if (isset($_FILES['image4']['name']) && !empty($_FILES['image4']['name'])) {
                        $img4->move(ROOTPATH . 'uploads/product_images/', $img4name);
                        $fileName4 = $this->image_upload_dont_delete($img4name, IMAGETYPE_WEBP, 'uploads/product_images/', '500x667');
                        $small_fileName4 = $this->image_upload($img4name, IMAGETYPE_WEBP, 'uploads/product_images/', '300x400');
                        $image_array['image_name4'] = $fileName4;
                        $image_array['small_image_name4'] = $small_fileName4;

                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name4)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name4);
                        }
                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name4)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name4);
                        }
                    }
                } else {
                }

                $this->db->table('product_images')->where('product_id', $productid)->update($image_array);
            } else {
                $error = array('error' => $this->upload->display_errors());
                $data['status'] = 400;
            }
        }

        // $category_array['product_id'] = $productid;
        // $this->db->table('product_category')->insert($category_array);
        $category_array = $_POST['category'];

        if (isset($category_array) && !empty($category_array)) {
            $this->db->table('product_category')->where('product_id', $productid)->delete();
            foreach ($category_array as $row) {
                $cat  = array(
                    'product_id' => $productid,
                    'category_id' => $row,
                );
                $this->db->table('product_category')->insert($cat);
            }
        }

        $this->db->table('product_badge')->where('product_id', $productid)->delete();

        if ($_POST['badge'] != '') {
            $product_badge_array = array(
                'badge_text' => $_POST['badge'],
                'product_id' => $productid,
            );

            $this->db->table('product_badge')->insert($product_badge_array);
        }

        // echo '<pre>';
        // print_r($category_array);
        // exit;


        set_cache('cache', 'value_3');

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function delete_product($id)
    {
        $productinfo = $this->db->table('product_images')->where('product_id', $id)->get()->getResult();

        if ($productinfo) {
            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name1)) {
                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name1);
            }
            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name2)) {
                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name2);
            }
            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name3)) {
                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name3);
            }
            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name4)) {
                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name4);
            }

            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name1)) {
                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name1);
            }
            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name2)) {
                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name2);
            }
            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name3)) {
                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name3);
            }
            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name4)) {
                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name4);
            }
        }

        $this->db->table('products')->where('id', $id)->delete();
        $this->db->table('product_images')->where('product_id', $id)->delete();
        $this->db->table('product_category')->where('product_id', $id)->delete();

        set_cache('cache', 'value_3');

        return redirect()->to(base_url('Admin/products'));
    }

    public function bulk_product_varient_update()
    {
        $csv = array();
        $lines = file($_FILES['file']['tmp_name'], FILE_IGNORE_NEW_LINES);

        $i = 0;
        foreach ($lines as $key => $value) {
            if ($i != 0) {
                $csv = str_getcsv($value);
                // echo '<pre>';print_r($csv);exit;

                if ($csv[0] != '') {
                    $array = array(
                        'product_id' => $csv[0],
                        'option_name' => $csv[1],
                        'option_value' => $csv[2],
                        'option_price' => $csv[3],
                        'option_stock' => $csv[4],
                        'order' => $csv[5],
                    );

                    $count = $this->db->table('product_varient')->where('product_id', $csv[0])->where('option_name', $csv[1])->where('option_value', $csv[2])->countAllResults();
                    if ($count == 0) {
                        $this->db->table('product_varient')->insert($array);
                    } else {
                        $this->db->table('product_varient')->where('product_id', $csv[0])->where('option_name', $csv[1])->where('option_value', $csv[2])->update($array);
                    }
                }
            }
            $i++;
        }

        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function bulk_product_update_data()
    {
        helper('custom');

        $csv = array();
        $lines = file($_FILES['file']['tmp_name'], FILE_IGNORE_NEW_LINES);

        $i = 0;
        foreach ($lines as $key => $value) {
            if ($i != 0) {
                $csv = str_getcsv($value);
                // echo '<pre>';print_r($csv);exit;

                if ($csv[1] != '') {
                    $array = array(
                        'title' => $csv[1],
                        'desc' => $csv[2],
                        'discount' => $csv[4],
                        'price' => $csv[5],
                        'stock' => $csv[6],
                        'sku' => $csv[7],
                        'promote' => $csv[8],
                    );

                    if ($csv[9] == 'Y') {
                        $array['visibility'] = '1';
                    } else {
                        $array['visibility'] = '0';
                    }

                    if ($csv[0] == '') {
                        $array['product_slug'] = create_slug($csv[1]);

                        $this->db->table('products')->insert($array);
                        $productid = $this->db->insertID();
                        // echo $productid;exit;
                    } else {
                        if ($this->db->table('products')->where('id', $csv[0])->update($array)) {
                            $productid = $csv[0];
                        } else {
                            return;
                        }
                    }

                    $categories = trim($csv[3], '|');
                    $categories = explode('|', $csv[3]);

                    if (isset($categories) && !empty($categories)) {
                        if ($csv[0] != '') {
                            $this->db->table('product_category')->where('product_id', $csv[0])->delete();
                        }

                        foreach ($categories as $row) {
                            $array2 = array(
                                'product_id' => $productid,
                                'category_id' => $row,
                            );
                            $this->db->table('product_category')->insert($array2);
                        }
                    }
                }
            }
            $i++;
        }

        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function bulk_product_image_update()
    {
        helper('custom');

        $csv = array();
        $lines = file($_FILES['file']['tmp_name'], FILE_IGNORE_NEW_LINES);

        $i = 0;
        foreach ($lines as $key => $value) {
            if ($i != 0) {
                $csv = str_getcsv($value);

                if ($csv[1] != '') {
                    if ($csv[1] != '') {
                        $fileName = $this->temp_image_upload($csv[1], IMAGETYPE_WEBP, 'uploads/product_images/', '500x667');
                        $fileName2 = $this->temp_image_upload($csv[1], IMAGETYPE_WEBP, 'uploads/product_images/', '300x400');
                        $productinfo = $this->db->table('product_images')->where('product_id', $csv[0])->get()->getResult();
                        if (isset($productinfo[0]) && !empty($productinfo[0] && $productinfo[0]->image_name1 != '')) {
                            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name1)) {
                                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name1);
                            }
                        }
                        if (isset($productinfo[0]) && !empty($productinfo[0] && $productinfo[0]->small_image_name1 != '')) {
                            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name1)) {
                                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name1);
                            }
                        }
                        if (is_file(ROOTPATH . 'uploads/product_images_temp/' . $csv[1])) {
                            unlink(ROOTPATH . 'uploads/product_images_temp/' . $csv[1]);
                        }

                        $array['image_name1'] = $fileName;
                        $array['small_image_name1'] = $fileName2;
                    }

                    if ($csv[2] != '') {
                        $fileName = $this->temp_image_upload($csv[2], IMAGETYPE_WEBP, 'uploads/product_images/', '500x667');
                        $fileName2 = $this->temp_image_upload($csv[2], IMAGETYPE_WEBP, 'uploads/product_images/', '300x400');
                        $productinfo = $this->db->table('product_images')->where('product_id', $csv[0])->get()->getResult();
                        if (isset($productinfo[0]) && !empty($productinfo[0] && $productinfo[0]->image_name2 != '')) {
                            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name2)) {
                                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name2);
                            }
                        }
                        if (isset($productinfo[0]) && !empty($productinfo[0] && $productinfo[0]->small_image_name2 != '')) {
                            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name2)) {
                                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name2);
                            }
                        }
                        if (is_file(ROOTPATH . 'uploads/product_images_temp/' . $csv[2])) {
                            unlink(ROOTPATH . 'uploads/product_images_temp/' . $csv[2]);
                        }

                        $array['image_name2'] = $fileName;
                        $array['small_image_name2'] = $fileName2;
                    }

                    if ($csv[3] != '') {
                        $fileName = $this->temp_image_upload($csv[3], IMAGETYPE_WEBP, 'uploads/product_images/', '500x667');
                        $fileName2 = $this->temp_image_upload($csv[3], IMAGETYPE_WEBP, 'uploads/product_images/', '300x400');
                        $productinfo = $this->db->table('product_images')->where('product_id', $csv[0])->get()->getResult();
                        if (isset($productinfo[0]) && !empty($productinfo[0] && $productinfo[0]->image_name3 != '')) {
                            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name3)) {
                                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name3);
                            }
                        }
                        if (isset($productinfo[0]) && !empty($productinfo[0] && $productinfo[0]->small_image_name3 != '')) {
                            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name3)) {
                                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name3);
                            }
                        }
                        if (is_file(ROOTPATH . 'uploads/product_images_temp/' . $csv[3])) {
                            unlink(ROOTPATH . 'uploads/product_images_temp/' . $csv[3]);
                        }

                        $array['image_name3'] = $fileName;
                        $array['small_image_name3'] = $fileName2;
                    }

                    if ($csv[4] != '') {
                        $fileName = $this->temp_image_upload($csv[4], IMAGETYPE_WEBP, 'uploads/product_images/', '500x667');
                        $fileName2 = $this->temp_image_upload($csv[4], IMAGETYPE_WEBP, 'uploads/product_images/', '300x400');
                        $productinfo = $this->db->table('product_images')->where('product_id', $csv[0])->get()->getResult();
                        if (isset($productinfo[0]) && !empty($productinfo[0] && $productinfo[0]->image_name4 != '')) {
                            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name4)) {
                                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name4);
                            }
                        }
                        if (isset($productinfo[0]) && !empty($productinfo[0] && $productinfo[0]->small_image_name4 != '')) {
                            if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name4)) {
                                unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->small_image_name4);
                            }
                        }
                        if (is_file(ROOTPATH . 'uploads/product_images_temp/' . $csv[4])) {
                            unlink(ROOTPATH . 'uploads/product_images_temp/' . $csv[4]);
                        }

                        $array['image_name4'] = $fileName;
                        $array['small_image_name4'] = $fileName2;
                    }

                    $this->db->table('product_images')->where('product_id', $csv[0])->update($array);
                }
            }
            $i++;
        }

        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
