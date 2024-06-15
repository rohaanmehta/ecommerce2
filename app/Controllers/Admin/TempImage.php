<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class TempImage extends BaseController 
{
    public function product_temp_image_upload()
    {
        $filename = $_FILES['images']['name'];
        $tempname = $_FILES['images']['tmp_name'];
        $i = 0;
        foreach($filename as $key =>$value)
        {
            $img_name = $i. date('dmyHis') . '.png';
            move_uploaded_file($tempname[$key],ROOTPATH . 'uploads/product_images_temp/'.$img_name);
            $i++;
        }

        $data['status'] = 200;
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function delete_temp_image($imagename){
        if (is_file(ROOTPATH . 'uploads/product_images_temp/' . $imagename)) {
            unlink(ROOTPATH . 'uploads/product_images_temp/' . $imagename);
        }
        return redirect('temp_image_view');
    }
}
