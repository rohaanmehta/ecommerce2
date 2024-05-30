<?php

function get_categories($id)
{
    // $CI =& get_instance();
    $db = \Config\Database::connect();

    $data = $db->table('categories')->where('parent_category', $id)->get()->getResult();
    return $data;
    // header('Content-Type: application/json');
    // echo json_encode($data);
}

function website_settings()
{
    $db = \Config\Database::connect();
    $data =  $db->table('general_settings')->where('name', 'website_settings')->get()->getResult();
    return $data;
}

function character_limiter($str, $n = 500, $end_char = '&#8230;')
{
    if (mb_strlen($str) < $n) {
        return $str;
    }

    // a bit complicated, but faster than preg_replace with \s+
    $str = preg_replace('/ {2,}/', ' ', str_replace(array("\r", "\n", "\t", "\v", "\f"), ' ', $str));

    if (mb_strlen($str) <= $n) {
        return $str;
    }

    $out = '';
    foreach (explode(' ', trim($str)) as $val) {
        $out .= $val . ' ';

        if (mb_strlen($out) >= $n) {
            $out = trim($out);
            return (mb_strlen($out) === mb_strlen($str)) ? $out : $out . $end_char;
        }
    }
}

function get_product_badge($id)
{
    // $CI =& get_instance();
    $db = \Config\Database::connect();

    $data = $db->table('product_badge')->where('product_id', $id)->get()->getResult();
    return $data;
    // header('Content-Type: application/json');
    // echo json_encode($data);
}

function get_categories_header()
{
    // $CI =& get_instance();
    $db = \Config\Database::connect();

    $data = $db->table('categories')->orderBy('category_order', 'ASC')->where('show_on_homepage', '1')->get()->getResult();
    return $data;
    // header('Content-Type: application/json');
    // echo json_encode($data);
}


function get_category_by_productid($id)
{
    // $CI =& get_instance();
    $db = \Config\Database::connect();

    $data = $db->table('product_category')->select('category_slug')->join('categories', 'categories.id = product_category.category_id')->orderBy('product_category.id', 'DESC')->limit(1)->where('show_on_homepage', '1')->where('product_id', $id)->get()->getResult();
    // print_r($data[0]->category_slug);exit;
    return $data;

    // header('Content-Type: application/json');
    // echo json_encode($data);
}

function get_sizechart_by_productid($id)
{
    // $CI =& get_instance();
    $db = \Config\Database::connect();

    $sizechart = $db->table('sizechart')->select('sizechart')->where('category_id', $id)->get()->getresult();
    if (isset($sizechart) && !empty($sizechart)) {
        $sizechart = $sizechart[0]->sizechart;
    } else {
        $sizechart = '';
    }

    return $sizechart;
}


function sidebar_image()
{
    // $CI =& get_instance();
    $db = \Config\Database::connect();

    $sidebar_image = $db->table('general_settings')->select('*')->where('name', 'website_settings2')->get()->getresult();
    if (isset($sidebar_image) && !empty($sidebar_image)) {
        $sidebar_image = $sidebar_image[0];
    } else {
        $sidebar_image = '';
    }

    return $sidebar_image;
}

function set_cache($name, $key)
{
    // $CI =& get_instance();
    $db = \Config\Database::connect();

    $array = array(
        $key => strtotime(date('Y-m-d H:i:s')),
        'name' => $name
    );

    $count = $db->table('general_settings')->select('id')->where('name', $name)->countAllResults();;
    if ($count > 0) {
        $db->table('general_settings')->set($array)->where('name', $name)->update();
    } else {
        $db->table('general_settings')->insert($array);
    }

    return 1;
}


function create_slug($data)
{
    $data = str_replace([' ', ',', '/', '.', '(', ')', '_', '`', '!', '@',], '-', $data);
    return $data;
}
