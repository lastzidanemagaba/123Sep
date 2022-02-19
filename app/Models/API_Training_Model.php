<?php namespace App\Models;
use CodeIgniter\Model;

class API_Training_Model extends Model {

 

    public function insertDataToTbl($table_name, $data)
	{
        $builder = $this->db->table($table_name);
        $builder->insert($data);
        return $this->db->insertID();	
	}

    public function List()
	{
        $db = \Config\Database::connect();
        $builder = $this->db->table("cis_trainings");
        return $builder->get()->getResult();
	}


}

