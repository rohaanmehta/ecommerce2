<?php
$csv2 = 'product_id,image_name1,small_image_name1,image_name2,small_image_name2,image_name3,small_image_name3,image_name4,small_image_name4';

foreach ($data as $row) {
    if ($row->image_name1 != '') {
        $img1 = base_url('uploads/product_images/' . $row->image_name1);
    } else {
        $img1 = '';
    }

    if ($row->small_image_name1 != '') {
        $small_img1 = base_url('uploads/product_images/' . $row->small_image_name1);
    } else {
        $small_img1 = '';
    }

    if ($row->image_name2 != '') {
        $img2 = base_url('uploads/product_images/' . $row->image_name2);
    } else {
        $img2 = '';
    }

    if ($row->small_image_name2 != '') {
        $small_img2 = base_url('uploads/product_images/' . $row->small_image_name2);
    } else {
        $small_img2 = '';
    }

    if ($row->image_name3 != '') {
        $img3 = base_url('uploads/product_images/' . $row->image_name3);
    } else {
        $img3 = '';
    }

    if ($row->small_image_name3 != '') {
        $small_img3 = base_url('uploads/product_images/' . $row->small_image_name3);
    } else {
        $small_img3 = '';
    }

    if ($row->image_name4 != '') {
        $img4 = base_url('uploads/product_images/' . $row->image_name4);
    } else {
        $img4 = '';
    }

    if ($row->small_image_name4 != '') {
        $small_img4 = base_url('uploads/product_images/' . $row->small_image_name4);
    } else {
        $small_img4 = '';
    }

    $csv2 = $csv2 . '
' . $row->product_id . ',' . $img1 . ',' . $small_img1 . ',' . $img2 . ',' . $small_img2 . ',' . $img3 . ',' . $small_img3 . ',' . $img4 . ',' . $small_img4;
}

header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=product_image_data" . Date('d-M') . '.csv');
echo $csv2;
exit;
