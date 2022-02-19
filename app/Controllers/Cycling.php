<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CyclingModel;

class Cycling extends ResourceController
{
    use ResponseTrait;
    
    public function index()
    {
        $model = new CyclingModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    
    public function show($id = null)
    {
        $model = new CyclingModel();
        $data = $model->getWhere(['user_id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

    
    

}