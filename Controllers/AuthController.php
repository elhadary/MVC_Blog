<?php

namespace app\Controllers;

use app\Core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        $this->render->view('Auth.login');
    }

    public function register()
    {
        $this->render->view('Auth.register');
    }
}