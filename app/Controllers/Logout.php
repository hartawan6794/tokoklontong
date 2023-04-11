<?php

namespace App\Controllers;

class Logout extends BaseController
{
    protected $loginModel;

    public function __construct()
    {
        $this->loginModel = new \App\Models\LoginModel();
    }

    public function process()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
