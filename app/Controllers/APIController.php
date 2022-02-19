<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\API_Training_Model;


class APIController extends Controller
{

	protected $helpers = [];
	protected $version = '1';

	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		
		parent::initController($request, $response, $logger);
		$this->session = \Config\Services::session();
		$this->security = \Config\Services::security();

        // LOAD MODEL !!!
		$this->API_Training_Model = new API_Training_Model();
	}

	
	public function setRespon($data = '', $iferror = 0){
		$respo = array();
		$respo['data'] = $data;    
		
		$respo['status']['version'] = $this->version;
        $respo['status']['status'] = "Sukses";
		

		$this->response->setJSON($respo);
		return $this->response->send();
	}


	public function version(){
		return $this->version;
	}



}