<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Website_settings extends BaseController
{
    public function view()
    {
        $data['banner1'] = $this->db->table('general_settings')->where('name', 'bannersection1')->get()->getResult();
        $data['banner2'] = $this->db->table('general_settings')->where('name', 'bannersection2')->get()->getResult();

        $data['banner_section1name'] = $this->db->table('general_settings')->where('name', 'banner_section1name')->get()->getResult();
        $data['banner_section2name'] = $this->db->table('general_settings')->where('name', 'banner_section2name')->get()->getResult();
        $data['banner_section3name'] = $this->db->table('general_settings')->where('name', 'banner_section3name')->get()->getResult();
        $data['banner_section4name'] = $this->db->table('general_settings')->where('name', 'banner_section4name')->get()->getResult();

        return view('Admin/Views/Settings/Website_settings', $data);
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
}
