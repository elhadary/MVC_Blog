<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\User;

class GuestController extends Controller
{
    public function index()
    {
        $users = (new User())->select()->fetchAll();
        $this->render->view('index');
    }
}