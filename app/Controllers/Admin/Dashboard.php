<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function dashboard()
    {
        $data['total_products'] = $this->db->table('products')->countAllResults();
        $data['total_users'] = $this->db->table('users')->countAllResults();
        return view('Admin/Views/Dashboard/Dashboard', $data);
    }

    public function slider_view()
    {
        $data['sliders'] = $this->db->table('homepage_slider')->orderBy('order')->get()->getResult();
        return view('Admin/Views/Dashboard/slider_view', $data);
    }

    public function get_slider_data()
    {
        $data['data'] = $this->db->table('homepage_slider')->where('id', $_POST['id'])->get()->getresult();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function add_slider_data()
    {
        if ($_POST['edit-id'] == '') {
            $img = $this->request->getFile('slider_image');
            $img2 = $this->request->getFile('mobile_image');

            $fileName = date('dmyHis') . '.png';
            $fileName2 = 'mobile' . date('dmyHis') . '.png';

            $img2->move(ROOTPATH . 'uploads/slider/', $fileName2);

            if ($img->move(ROOTPATH . 'uploads/slider/', $fileName)) {
                $data['status'] = 200;
                $array = array(
                    'name' => $fileName,
                    'mobile_name' => $fileName2,
                    'order' => $_POST['order'],
                    'link' => $_POST['link'],
                    'storage' => 'local'
                );
                $this->db->table('homepage_slider')->insert($array);
            } else {
                $error = array('error' => $this->upload->display_errors());
                $data['status'] = 400;
            }
        } else {
            $edit_data = $this->db->table('homepage_slider')->where('id', $_POST['edit-id'])->get()->getresult();

            if ($edit_data[0]->name != '') {
                if (is_file(ROOTPATH . 'uploads/slider/' . $edit_data[0]->name)) {
                    unlink(ROOTPATH . 'uploads/slider/' . $edit_data[0]->name);
                }
            }

            if ($edit_data[0]->mobile_name != '') {
                if (is_file(ROOTPATH . 'uploads/slider/' . $edit_data[0]->mobile_name)) {
                    unlink(ROOTPATH . 'uploads/slider/' . $edit_data[0]->mobile_name);
                }
            }

            // echo'<pre>';print_r($_FILES['mobile_image']['name']);exit;
            $array = array(
                'order' => $_POST['order'],
                'link' => $_POST['link'],
                'storage' => 'local'
            );

            if ($_FILES['slider_image']['name'] != '') {
                $img = $this->request->getFile('slider_image');
                $fileName = date('dmyHis') . '.png';
                $img->move(ROOTPATH . 'uploads/slider/', $fileName);
                $array['name'] = $fileName;
            }

            if ($_FILES['mobile_image']['name'] != '') {
                $img2 = $this->request->getFile('mobile_image');
                $fileName2 = 'mobile' . date('dmyHis') . '.png';
                $img2->move(ROOTPATH . 'uploads/slider/', $fileName2);
                $array['mobile_name'] = $fileName2;
            }



            if ($this->db->table('homepage_slider')->where('id', $_POST['edit-id'])->update($array)) {
                $data['status'] = 200;
            } else {
                $error = array('error' => $this->upload->display_errors());
                $data['status'] = 400;
            }
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function delete_slider($id)
    {
        $img = $this->db->table('homepage_slider')->where('id', $id)->get()->getresult();
        if (is_file(ROOTPATH . 'uploads/slider/' . $img[0]->name)) {
            unlink(ROOTPATH . 'uploads/slider/' . $img[0]->name);
        }
        if (is_file(ROOTPATH . 'uploads/slider/' . $img[0]->mobile_name)) {
            unlink(ROOTPATH . 'uploads/slider/' . $img[0]->mobile_name);
        }

        $this->db->table('homepage_slider')->where('id', $id)->delete();
        return redirect()->to(base_url('Admin/slider-view'));
    }

    public function banner_view()
    {
        $data['Banners'] = $this->db->table('homepage_banner')->get()->getResult();
        return view('Admin/Views/Dashboard/banner_view', $data);
    }

    public function add_banner_data()
    {
        // echo '<pre>';
        // print_r($_FILES['banner_image']);
        // print_r($_POST['order']);
        // exit;

        $img = $this->request->getFile('banner_image');

        $fileName = date('dmyHis') . '.png';

        if ($img->move(ROOTPATH . 'uploads/banner/', $fileName)) {
            $data['status'] = 200;
            $array = array(
                'name' => $fileName,
                'order' => $_POST['order'],
                'link' => $_POST['link'],
                'type' => $_POST['type'],
                'storage' => 'local'
            );
            $this->db->table('homepage_banner')->insert($array);
        } else {
            $error = array('error' => $this->upload->display_errors());
            $data['status'] = 400;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function delete_banner($id)
    {
        $img = $this->db->table('homepage_banner')->where('id', $id)->get()->getresult();
        unlink(ROOTPATH . 'uploads/banner/' . $img[0]->name);

        $this->db->table('homepage_banner')->where('id', $id)->delete();
        return redirect()->to(base_url('Admin/banner-view'));
    }
}
