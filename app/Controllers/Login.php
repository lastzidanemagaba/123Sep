<?php
// error_reporting(0);

namespace App\Controllers;

use Google_Client;
use Google_Service;
use App\Models\login_model;

class Login extends BaseController
{
    protected $google_client = NULL;
    // protected $session;
    public function __construct()
    {
        $this->google_client = new Google_Client();
        $this->google_client->setClientId('191294154910-hrovm8c66b2oo6vju3t99p1k2gjm44il.apps.googleusercontent.com');
        $this->google_client->setClientSecret('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');
        $this->google_client->setRedirectUri('http://localhost:8080/login/loginWithGoogle');
        $this->google_client->addScope('email');
        $this->google_client->addScope('profile');
    }

    public function index()
    {
        // include_once APPPATH . "libraries/vendor/autoload.php";
        if (session()->get("userdata")) {
            session()->setFlashdata("Error", "You have already logged in");
            return redirect()->to('data');
        }

        $data['googleButton'] = '<a href="' . $this->google_client->createAuthUrl() . '" ><img src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';

        return view('login', $data);
    }

    public function loginWithGoogle()
    {

        $token = $this->google_client->fetchAccessTokenWithAuthCode($this->request->getVar("code"));
        if (!isset($token['error'])) {
            $this->google_client->setAccessToken($token['access_token']);
            session()->set("access_token", $token['access_token']);
            $googleService = new \Google_Service_Oauth2($this->google_client);
            $data = $googleService->userinfo->get();
            $current_datetime = date('Y-m-d H:i:s');
            $user_data = array(
                'user_fname' => $data['given_name'],
                'user_lname' => $data['family_name'],
                'user_email' => $data['email'],
                'user_path_profile' => $data['picture'],
                'user_create_at' => $current_datetime,
                'user_eauth_access_token' => $token['access_token'],
                'user_last_update_at' => $current_datetime
            );
            $model = new login_model();
            $model->Insert_user_data($user_data);
            session()->set("userdata", $user_data);
        } else {
            session()->setFlashdata("Error", "Login Gagal");
            return redirect()->to('/');
        }
        return redirect()->to('home');
    }

    public function logout()
    {
        session()->remove('userdata');
        session()->remove('AccessToken');

        return redirect()->to('login');
    }
}