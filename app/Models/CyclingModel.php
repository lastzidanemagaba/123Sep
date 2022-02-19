<?php namespace App\Models;

use CodeIgniter\Model;

class CyclingModel extends Model
{
    protected $table = 'cis_users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
    'user_email',
    'user_password',
    'user_fname',
    'user_lname',
    'user_hp',
    'user_address',
    'user_gender',
    'user_bod',
    'user_height',
    'user_weight',
    'user_signup_via',
    'user_eauth_access_token',
    'user_eauth_token_type',
    'user_eauth_expires_in',
    'user_eauth_refresh_token',
    'user_eauth_scope',
    'user_eauth_id_token',
    'user_club',
    'user_uci_no',
    'user_uci_expired',
    'user_dicipline',
    'user_create_at',
    'user_last_update_at',
    'user_is_banned',
    'user_deleted',
    'user_deleted_by',
    'user_deleted_at',
    'user_path_profile',
    'user_level_role'
];
}