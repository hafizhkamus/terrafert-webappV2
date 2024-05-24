<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\UserModel;
use App\Models\AlatModel;
use App\Models\MenuModel;

class BaseController extends Controller
{
    protected $helpers = ['cookie', 'date', 'security', 'menu', 'useraccess'];
    protected $data = [];
    protected $userModel;
    protected $alatModel;
    protected $session;
    protected $db;
    protected $validation;
    protected $encrypter;
    protected $menuModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
        $this->validation = \Config\Services::validation();
        $this->encrypter = \Config\Services::encrypter();
        $this->userModel = new UserModel();
        $this->alatModel = new AlatModel();
        $this->menuModel = new MenuModel();

        // Fetch the user
        $user = $this->userModel->getUser(username: session()->get('username'));

        // Get the URI object
        $uri = $request->getUri();
        
        // Get the total number of segments
        $totalSegments = $uri->getTotalSegments();

        // Retrieve segments safely
        $segment = $totalSegments >= 1 ? $uri->getSegment(1) : '';
        $subsegment = $totalSegments >= 2 ? $uri->getSegment(2) : '';

        // Set the data array
        $this->data = [
            'segment' => $segment,
            'subsegment' => $subsegment,
            'user' => $user,
            'MenuCategory' => $this->userModel->getAccessMenuCategory(session()->get('role'))
        ];
    }
}
