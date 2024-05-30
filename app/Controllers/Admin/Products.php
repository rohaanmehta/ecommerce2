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

    public function product_download()
    {
        $data['data'] = $this->db->table('products')->get()->getresult();

        if (isset($data) && !empty($data)) {
            foreach ($data['data'] as $key => $row) {
                $data['data'][$key]->title = str_replace(',',' ',$data['data'][$key]->title);
                $data['data'][$key]->desc = str_replace(',',' ',$data['data'][$key]->desc);

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
                }else{
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
        $data['products'] = $this->db->table('products')->join('product_category as pc', 'pc.product_id = products.id')->join('categories as c', 'c.id = pc.category_id')->get()->getResult();
        return view('Admin/Views/Products/view', $data);
    }

    public function add_products($id = '')
    {
        $data = array();

        if ($id != '') {
            $data['product'] =  $this->db->table('products')->join('product_category as pc', 'pc.product_id = products.id')->join('product_images as pi', 'pi.product_id = products.id')->where('products.id', $id)->get()->getresult();
        }

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

        $category_array['category_id'] = $_POST['category'];

        if ($_POST['productid'] == '') {
            if ($this->db->table('products')->insert($array)) {
                $data['status'] = 200;
                $productid = $this->db->insertID();

                $category_array['product_id'] = $productid;
                $this->db->table('product_category')->insert($category_array);

                $image_array = array(
                    'product_id' => $productid,
                    'storage' => 'local'
                );

                if (isset($_FILES['image1']['name']) && !empty($_FILES['image1']['name'])) {
                    $img1->move(ROOTPATH . 'uploads/product_images/', $img1name);
                    $image_array['image_name1'] = $img1name;
                }

                if (isset($_FILES['image2']['name']) && !empty($_FILES['image2']['name'])) {
                    $img2->move(ROOTPATH . 'uploads/product_images/', $img2name);
                    $image_array['image_name2'] = $img2name;
                }

                if (isset($_FILES['image3']['name']) && !empty($_FILES['image3']['name'])) {
                    $img3->move(ROOTPATH . 'uploads/product_images/', $img3name);
                    $image_array['image_name3'] = $img3name;
                }

                if (isset($_FILES['image4']['name']) && !empty($_FILES['image4']['name'])) {
                    $img4->move(ROOTPATH . 'uploads/product_images/', $img4name);
                    $image_array['image_name4'] = $img4name;
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

                $category_array['product_id'] = $productid;
                $this->db->table('product_category')->where('product_id', $productid)->update($category_array);

                $image_array = array(
                    'product_id' => $productid,
                    'storage' => 'local'
                );

                $productinfo = $this->db->table('product_images')->where('product_id', $_POST['productid'])->get()->getResult();

                if (isset($productinfo[0]) && !empty($productinfo[0])) {
                    if (isset($_FILES['image1']['name']) && !empty($_FILES['image1']['name'])) {
                        $img1->move(ROOTPATH . 'uploads/product_images/', $img1name);
                        $image_array['image_name1'] = $img1name;

                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name1)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name1);
                        }
                    }

                    if (isset($_FILES['image2']['name']) && !empty($_FILES['image2']['name'])) {
                        $img2->move(ROOTPATH . 'uploads/product_images/', $img2name);
                        $image_array['image_name2'] = $img2name;

                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name2)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name2);
                        }
                    }

                    if (isset($_FILES['image3']['name']) && !empty($_FILES['image3']['name'])) {
                        $img3->move(ROOTPATH . 'uploads/product_images/', $img3name);
                        $image_array['image_name3'] = $img3name;
                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name3)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name3);
                        }
                    }

                    if (isset($_FILES['image4']['name']) && !empty($_FILES['image4']['name'])) {
                        $img4->move(ROOTPATH . 'uploads/product_images/', $img4name);
                        $image_array['image_name4'] = $img4name;
                        if (is_file(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name4)) {
                            unlink(ROOTPATH . 'uploads/product_images/' . $productinfo[0]->image_name4);
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
}
