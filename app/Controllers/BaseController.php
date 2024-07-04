<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['custom'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();

        // print_r($this->input->get_request_header());exit;
        // E.g.: $this->session = \Config\Services::session();
        $this->image = \Config\Services::image();
        $this->image = \Config\Services::image('gd');
        $this->validation = \Config\Services::validation();


        // $this->upload = libra;
    }

    public function image_upload($fileName,$format,$dir,$resize = null)
    {

        try {
            $tempname = explode('.',$fileName);
            $fileNamenew = '1'.$tempname[0].'.webp';
            $fileNamenew = create_slug($fileNamenew);

            if($resize == null){
                $this->image->withFile(ROOTPATH .$dir . $fileName)
                ->convert($format)
                ->save(ROOTPATH .$dir . $fileNamenew);
            }else{
                $resize = explode('x',$resize);
                // print_r($resize);
                $this->image->withFile(ROOTPATH .$dir . $fileName)
                ->resize($resize[0], $resize[1], false, 'height')
                ->convert($format)
                ->save(ROOTPATH .$dir . $fileNamenew);
            }

            unlink(ROOTPATH .$dir . $fileName);
            $this->image->clear();
            return $fileNamenew;
        } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
            echo 'err' . $e->getMessage();
        }
    }

    public function image_upload_dont_delete($fileName,$format,$dir,$resize = null)
    {

        try {
            $tempname = explode('.',$fileName);
            $fileNamenew = '2'.$tempname[0].'.webp';
            $fileNamenew = create_slug($fileNamenew);

            if($resize == null){
                $this->image->withFile(ROOTPATH .$dir . $fileName)
                ->convert($format)
                ->save(ROOTPATH .$dir . $fileNamenew);
            }else{
                $resize = explode('x',$resize);
                // print_r($resize);
                $this->image->withFile(ROOTPATH .$dir . $fileName)
                ->resize($resize[0], $resize[1], false, 'height')
                ->convert($format)
                ->save(ROOTPATH .$dir . $fileNamenew);
            }

            // unlink(ROOTPATH .$dir . $fileName);
            $this->image->clear();
            return $fileNamenew;
        } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
            echo 'err' . $e->getMessage();
        }
    }

    public function temp_image_upload($fileName,$format,$dir,$resize = null)
    {
        $temp_directory = 'uploads/product_images_temp/';
        try {
            $tempname = explode('.',$fileName);
            $fileNamenew = '1'.rand(00000,99999).$tempname[0].'.webp';
            $fileNamenew = create_slug($fileNamenew);

            if($resize == null){
                $this->image->withFile(ROOTPATH .$temp_directory . $fileName)
                ->convert($format)
                ->save(ROOTPATH .$dir . $fileNamenew);
            }else{
                $resize = explode('x',$resize);
                // print_r($resize);
                $this->image->withFile(ROOTPATH .$temp_directory . $fileName)
                ->resize($resize[0], $resize[1], false, 'height')
                ->convert($format)
                ->save(ROOTPATH .$dir . $fileNamenew);
            }

            $this->image->clear();
            return $fileNamenew;
        } catch (\CodeIgniter\Images\Exceptions\ImageException $e) {
            echo 'err' . $e->getMessage();
        }
    }

    
    public function checkcoupon()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        
        $data['cart_items'] = $this->session->get('cart');

        //validate existing coupon
        if (isset($data['cart_items']['couponcode']) && !empty($data['cart_items']['couponcode'] && $data['cart_items']['couponcode'] != '')) {
            $couponcode = $data['cart_items']['couponcode'];
            $coupondata = $this->db->table('coupons')->where('code', $couponcode)->get()->getResult();
            $result = 400;
            if (isset($coupondata[0]) && !empty($coupondata[0])) {
                if ($coupondata[0]->start_date <= date('Y-m-d') && $coupondata[0]->end_date >= date('Y-m-d')) {
                    $cart_items = $this->session->get('cart');
                    $total_price = 0;
                    if (isset($cart_items['items']) && !empty($cart_items['items'])) {
                        foreach ($cart_items['items'] as $row) {
                            $total_price = $total_price + $row['price'];
                        }
                    }

                    if ($total_price >= $coupondata[0]->min_cart_value) {
                        if ($coupondata[0]->type == 'Fixed') {
                            $cart_items['discount'] = $coupondata[0]->discount;
                            $this->session->set('cart', $cart_items);
                            $result = 200;
                        } else {
                            $discount_percentage = $total_price * $coupondata[0]->discount / 100;
                            $cart_items['discount'] = $discount_percentage;
                            // echo $discount_percentage;exit;
                            $this->session->set('cart', $cart_items);
                            $result = 200;
                        }
                    } else {
                        $result = 400;
                    }
                } else {
                    $result = 400;
                }
            }
            
            if ($result == '400') {
                $updatecoupon = $this->session->get('cart');
                $updatecoupon['couponcode'] = '';
                $updatecoupon['discount'] = '';
                $this->session->set('cart', $updatecoupon);
                $data['cart_items'] = $this->session->get('cart');
            }
        }
    }
}
