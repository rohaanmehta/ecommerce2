<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Products extends BaseController
{
    public function bulk_product_download_view(){
        return view('Admin/Views/Products/bulk_product_download_view');
    }
    public function bulk_product_badge_view(){
        return view('Admin/Views/Products/bulk_product_badge_view');
    }
    public function bulk_product_update_view(){
        return view('Admin/Views/Products/bulk_product_update_view');
    }

    public function bulk_product_delete_view(){
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
            'product_slug' => str_replace([' ',',','/'],'',$_POST['sku'] . rand(00000, 99999) . Date('dmyhis')),
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
        return redirect()->to(base_url('Admin/products'));
    }
}
