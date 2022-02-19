<?php

namespace App\Controllers;

class Data extends BaseController
{
    protected $client;
    protected $request;

    public function __construct()
    {
        $this->client = service('curlrequest');
    }
    public function index()
    {
        // return redirect()->to('login/loginWithGoogle');
        // return view('login');
    }
   
}