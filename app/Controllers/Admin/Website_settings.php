<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Website_settings extends BaseController
{
    public function view()
    {
        $data['banner1'] = $this->db->table('general_settings')->where('name', 'bannersection1')->get()->getResult();
        $data['banner2'] = $this->db->table('general_settings')->where('name', 'bannersection2')->get()->getResult();


        $data['productbanner1'] = $this->db->table('general_settings')->where('name', 'productbannersection1')->get()->getResult();
        $data['productbanner2'] = $this->db->table('general_settings')->where('name', 'productbannersection2')->get()->getResult();

        $data['banner_section1name'] = $this->db->table('general_settings')->where('name', 'banner_section1name')->get()->getResult();
        $data['banner_section2name'] = $this->db->table('general_settings')->where('name', 'banner_section2name')->get()->getResult();
        $data['banner_section3name'] = $this->db->table('general_settings')->where('name', 'banner_section3name')->get()->getResult();
        $data['banner_section4name'] = $this->db->table('general_settings')->where('name', 'banner_section4name')->get()->getResult();

        return view('Admin/Views/Settings/Website_settings', $data);
    }

    public function cache_view()
    {
        $data['cache'] = $this->db->table('general_settings')->where('name', 'cache')->get()->getResult();
       
        return view('Admin/Views/Settings/cache_settings', $data);
    }
    
    public function add_website_settings()
    {
        $array = array(
            'name' => 'bannersection1',
            'value_1' => $_POST['banner1name'],
            'value_2' => $_POST['banner1link'],
            'value_3' => $_POST['banner1slider'],
        );


        $this->db->table('general_settings')->where('name', 'bannersection1')->delete();

        if ($this->db->table('general_settings')->insert($array)) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
        }

        $array2 = array(
            'name' => 'bannersection2',
            'value_1' => $_POST['banner2name'],
            'value_2' => $_POST['banner2link'],
            'value_3' => $_POST['banner2slider'],
        );


        $this->db->table('general_settings')->where('name', 'bannersection2')->delete();

        if ($this->db->table('general_settings')->insert($array2)) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function add_website_settings_banner()
    {
        $array = array(
            'name' => 'banner_section1name',
            'value_1' => $_POST['banner_section1name']
        );

        $array2 = array(
            'name' => 'banner_section2name',
            'value_1' => $_POST['banner_section2name']
        );

        $array3 = array(
            'name' => 'banner_section3name',
            'value_1' => $_POST['banner_section3name']
        );

        $array4 = array(
            'name' => 'banner_section4name',
            'value_1' => $_POST['banner_section4name']
        );

        $this->db->table('general_settings')->where('name', 'banner_section1name')->delete();
        $this->db->table('general_settings')->insert($array);


        $this->db->table('general_settings')->where('name', 'banner_section2name')->delete();
        $this->db->table('general_settings')->insert($array2);

        $this->db->table('general_settings')->where('name', 'banner_section3name')->delete();
        $this->db->table('general_settings')->insert($array3);

        $this->db->table('general_settings')->where('name', 'banner_section4name')->delete();
        $this->db->table('general_settings')->insert($array4);

        $data['status'] = 200;

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function add_website_settings_product_page()
    {
        $array = array(
            'name' => 'productbannersection1',
            'value_1' => $_POST['banner1name'],
            'value_2' => $_POST['banner1count'],
            'value_3' => $_POST['banner1slider'],
        );


        $this->db->table('general_settings')->where('name', 'productbannersection1')->delete();

        if ($this->db->table('general_settings')->insert($array)) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
        }

        $array2 = array(
            'name' => 'productbannersection2',
            'value_1' => $_POST['banner2name'],
            'value_2' => $_POST['banner2count'],
            'value_3' => $_POST['banner2slider'],
        );


        $this->db->table('general_settings')->where('name', 'productbannersection2')->delete();

        if ($this->db->table('general_settings')->insert($array2)) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function visual_settings()
    {
        $data['info'] = $this->db->table('general_settings')->where('name', 'website_settings')->get()->getResult();
        $data['info2'] = $this->db->table('general_settings')->where('name', 'website_settings2')->get()->getResult();
        $data['category_settings'] = $this->db->table('general_settings')->where('name', 'scrolltotop')->get()->getResult();
        
        return view('Admin/Views/Settings/visual_settings',$data);
    }

    public function add_visual_settings()
    {
        $img1 = $this->request->getFile('image1');
        $img2 = $this->request->getFile('image2');
        $img3 = $this->request->getFile('image3');

        $img1name = '1' . date('dmyHis') . '.png';
        $img2name = '2' . date('dmyHis') . '.png';
        $img3name = '3' . date('dmyHis') . '.png';
        $image_array['name'] = 'website_settings';

        $info = $this->db->table('general_settings')->where('name', 'website_settings')->countAllResults();
        $info2 = $this->db->table('general_settings')->where('name', 'website_settings')->get()->getResult();

        if ($info == 0) {
            if (isset($_FILES['image1']['name']) && !empty($_FILES['image1']['name'])) {
                $img1->move(ROOTPATH . 'uploads/website/', $img1name);
                $image_array['value_1'] = $img1name;
            }

            if (isset($_FILES['image2']['name']) && !empty($_FILES['image2']['name'])) {
                $img2->move(ROOTPATH . 'uploads/website/', $img2name);
                $image_array['value_2'] = $img2name;
            }

            if (isset($_FILES['image3']['name']) && !empty($_FILES['image3']['name'])) {
                $img3->move(ROOTPATH . 'uploads/website/', $img3name);
                $image_array['value_3'] = $img3name;
            }
        } else {
            if (isset($_FILES['image1']['name']) && !empty($_FILES['image1']['name'])) {
                if ($info2[0]->value_1 != '') {
                    if (is_file(ROOTPATH . 'uploads/website/' . $info2[0]->value_1)) {
                        unlink(ROOTPATH . 'uploads/website/' . $info2[0]->value_1);
                    }
                }
                $img1->move(ROOTPATH . 'uploads/website/', $img1name);
                $image_array['value_1'] = $img1name;
            }
            if (isset($_FILES['image2']['name']) && !empty($_FILES['image2']['name'])) {
                if ($info2[0]->value_2 != '') {
                    if (is_file(ROOTPATH . 'uploads/website/' . $info2[0]->value_2)) {
                        unlink(ROOTPATH . 'uploads/website/' . $info2[0]->value_2);
                    }
                }
                $img2->move(ROOTPATH . 'uploads/website/', $img2name);
                $image_array['value_2'] = $img2name;
            }
            if (isset($_FILES['image3']['name']) && !empty($_FILES['image3']['name'])) {
                if ($info2[0]->value_3 != '') {
                    if (is_file(ROOTPATH . 'uploads/website/' . $info2[0]->value_3)) {
                        unlink(ROOTPATH . 'uploads/website/' . $info2[0]->value_3);
                    }
                }
                $img3->move(ROOTPATH . 'uploads/website/', $img3name);
                $image_array['value_3'] = $img3name;
            }
        }

        if($info == 0){
            $this->db->table('general_settings')->insert($image_array);
        }else{
            $this->db->table('general_settings')->where('name','website_settings')->update($image_array);
        }
        $data['status'] = 200;

        header('Content-Type: application/json');
        echo json_encode($data);
    }


    public function add_visual_settings2()
    {
        $img1 = $this->request->getFile('image1');
        $img2 = $this->request->getFile('image2');
        // $img3 = $this->request->getFile('image3');

        $img1name = '1' . date('dmyHis') . '.png';
        $img2name = '2' . date('dmyHis') . '.png';
        $img3name = '3' . date('dmyHis') . '.png';
        $image_array['name'] = 'website_settings2';
        $image_array['value_3'] = $_POST['link'];

        $info = $this->db->table('general_settings')->where('name', 'website_settings2')->countAllResults();
        $info2 = $this->db->table('general_settings')->where('name', 'website_settings2')->get()->getResult();

        if ($info == 0) {
            if (isset($_FILES['image1']['name']) && !empty($_FILES['image1']['name'])) {
                $img1->move(ROOTPATH . 'uploads/website/', $img1name);
                $image_array['value_1'] = $img1name;
            }

            if (isset($_FILES['image2']['name']) && !empty($_FILES['image2']['name'])) {
                $img2->move(ROOTPATH . 'uploads/website/', $img2name);
                $image_array['value_2'] = $img2name;
            }

            // if (isset($_FILES['image3']['name']) && !empty($_FILES['image3']['name'])) {
            //     $img3->move(ROOTPATH . 'uploads/website/', $img3name);
            //     $image_array['value_3'] = $img3name;
            // }
        } else {
            if (isset($_FILES['image1']['name']) && !empty($_FILES['image1']['name'])) {
                if ($info2[0]->value_1 != '') {
                    if (is_file(ROOTPATH . 'uploads/website/' . $info2[0]->value_1)) {
                        unlink(ROOTPATH . 'uploads/website/' . $info2[0]->value_1);
                    }
                }
                $img1->move(ROOTPATH . 'uploads/website/', $img1name);
                $image_array['value_1'] = $img1name;
            }
            if (isset($_FILES['image2']['name']) && !empty($_FILES['image2']['name'])) {
                if ($info2[0]->value_2 != '') {
                    if (is_file(ROOTPATH . 'uploads/website/' . $info2[0]->value_2)) {
                        unlink(ROOTPATH . 'uploads/website/' . $info2[0]->value_2);
                    }
                }
                $img2->move(ROOTPATH . 'uploads/website/', $img2name);
                $image_array['value_2'] = $img2name;
            }
            // if (isset($_FILES['image3']['name']) && !empty($_FILES['image3']['name'])) {
            //     if ($info2[0]->value_3 != '') {
            //         if (is_file(ROOTPATH . 'uploads/website/' . $info2[0]->value_3)) {
            //             unlink(ROOTPATH . 'uploads/website/' . $info2[0]->value_3);
            //         }
            //     }
            //     $img3->move(ROOTPATH . 'uploads/website/', $img3name);
            //     $image_array['value_3'] = $img3name;
            // }
        }

        if($info == 0){
            $this->db->table('general_settings')->insert($image_array);
        }else{
            $this->db->table('general_settings')->where('name','website_settings2')->update($image_array);
        }
        $data['status'] = 200;

        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function category_settings()
    {
        $info = $this->db->table('general_settings')->where('name', 'scrolltotop')->countAllResults();

        $array = array(
            'name' => 'scrolltotop',
            'value_1' => $_POST['scroll-to-top'],
            'value_2' => $_POST['color'],
            'value_3' => $_POST['font-color'],
        );

        if($info == 0){
            $this->db->table('general_settings')->insert($array);
        }else{
            $this->db->table('general_settings')->where('name','scrolltotop')->update($array);
        }
        $data['status'] = 200;

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
