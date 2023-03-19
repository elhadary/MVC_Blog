<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\Blog;

class GuestController extends Controller
{
    public function index()
    {
        $blogs = (new Blog)->select()->fetchAll();
        $this->render->view('index',['blogs' => $blogs]);
    }
}