<?php namespace App\Controllers;
use App\Models\API_Training_Model;

class Training extends APIController {


    public function index() {
        $this->GetList();
    }

    public function GetList() {
        
        $error = 0;
        $data = array();
        
        $data['trainings'] = $this->API_Training_Model->List();

        $this->setRespon($data, $error);
    }
    
    

}
