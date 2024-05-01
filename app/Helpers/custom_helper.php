<?php

function get_categories($id)
{
    // $CI =& get_instance();
    $db = \Config\Database::connect();

    $data = $db->table('categories')->where('parent_category',$id)->get()->getResult();
    return $data;
    // header('Content-Type: application/json');
    // echo json_encode($data);
}

function website_settings(){
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