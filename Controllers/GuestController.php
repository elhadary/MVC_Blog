<?php

namespace app\Controllers;

use app\Core\Controller;

class GuestController extends Controller
{
    public function index()
    {
        $this->render->view('index',);
    }
}