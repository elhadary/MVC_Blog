<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Core\Render;

class GuestController extends Controller
{
    public function index()
    {

        extract($array = []);
        $this->render->view('index',$array);
    }
}