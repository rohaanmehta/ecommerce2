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
