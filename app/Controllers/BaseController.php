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
    }

    public function image_upload($fileName,$format,$dir,$resize = null)
    {

        try {
            $tempname = explode('.',$fileName);
            $fileNamenew = '1'.$tempname[0].'.webp';

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
}
