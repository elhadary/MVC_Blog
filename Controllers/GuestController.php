<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Core\Render;
use app\Core\Validation;
use app\Models\Blog;
use DI\Container;

class GuestController extends Controller
{
    public function __construct(Container $c)
    {
        parent::__construct($c);
    }

    public function index()
    {
        $blogs = $this->c->get(Blog::class)->select()->fetchAll();
        $this->render->view('index',['blogs' => $blogs]);
    }
}