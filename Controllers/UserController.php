<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\User;
use app\Models\Blog;
use DI\Container;

class UserController extends Controller
{
    public User $user;
    public Blog $blog;
    public function __construct(Container $c)
    {
        parent::__construct($c);
        $this->user = $c->get(User::class);
        $this->blog = $c->get(Blog::class);

    }



    public function index(){

        $blogs = $this->blog->select()->fetchAll();
        $this->render->view('User.index',['blogs' => $blogs]);
    }

}