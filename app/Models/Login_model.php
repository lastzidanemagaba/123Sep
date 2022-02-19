<?php namespace App\Models;

use CodeIgniter\Model;

class Login_model extends Model
{
    protected $tablesusers = 'cis_users';


    function Insert_user_data($data)
    {
        $builder = $this->db->table($this->tablesusers);
        return $builder->insert($data);
    }
}