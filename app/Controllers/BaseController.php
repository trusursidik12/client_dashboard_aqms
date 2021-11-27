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
class BaseController extends Controller
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
    protected $helpers = [];

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    // login check
    public function loginCheck()
    {
        if (empty(session('session_id'))) {
            echo "<script>window.location='" . base_url('/login') . "'</script>";
            exit();
        }
    }

    // admin check
    public function adminCheck()
    {
        if (session('session_level') == 1) {
            echo "<script>window.location='" . base_url('/') . "'</script>";
            exit();
        }
    }

    // saved info
    public function savedInfo()
    {
        $data['created_at']        = date('Y-m-d H:i:s');
        $data['created_by']        = session('session_email');
        $data['created_ip']        = $this->request->getIPAddress();

        return $data;
    }

    // updated info
    public function updatedInfo()
    {
        $data['updated_at']        = date('Y-m-d H:i:s');
        $data['updated_by']        = session('session_email');
        $data['updated_ip']        = $this->request->getIPAddress();

        return $data;
    }

    // deleted info
    public function deletedInfo()
    {
        $data['deleted_at']        = date('Y-m-d H:i:s');
        $data['deleted_by']        = session('session_email');
        $data['deleted_ip']        = $this->request->getIPAddress();

        return $data;
    }
}
