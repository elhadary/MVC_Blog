<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\User;
use app\Models\Blog;

class UserController extends Controller
{
    public User $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }



    public function index(){

        $blogs = (new Blog)->select()->fetchAll();
        $this->render->view('User.index',['blogs' => $blogs]);
    }

}