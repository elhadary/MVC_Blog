<?php

use app\Controllers\CommentController;
use app\Core\Router;
use app\Controllers\GuestController;
use app\Controllers\AuthController;
use app\Controllers\UserController;
use app\Controllers\AdminController;
use app\Controllers\BlogController;

$router = $c->get(Router::class);

$router->get('/',[GuestController::class,'index'])->only('guest');

$router->get('/login',[AuthController::class,'login'])->only('guest');
$router->post('/login',[AuthController::class,'postLogin'])->only('guest');
$router->get('/register',[AuthController::class,'register'])->only('guest');
$router->post('/register',[AuthController::class,'postRegister'])->only('guest');
$router->get('/logout',[AuthController::class,'logout']);



/// Admin
 $router->get('/dashboard',[AdminController::class,'index'])->only('admin');
$router->get('/dashboard/users',[AdminController::class,'showUsers'])->only('admin');
$router->get('/dashboard/DeleteUser',[AdminController::class,'deleteUser'])->only('admin');

// Blogs controller of admin
$router->get('/blog',[BlogController::class,'showBlog']);
$router->get('/dashboard/blogs',[BlogController::class,'showBlogs'])->only('admin');
$router->get('/dashboard/blogs/add',[BlogController::class,'addBlog'])->only('admin');
$router->post('/dashboard/blogs/add',[BlogController::class,'postBlog'])->only('admin');

$router->get('/dashboard/blog',[BlogController::class,'showAdminBlog'])->only('admin');


//User
$router->get('/index',[UserController::class,'index']);

// Comments

$router->post('/addComment',[CommentController::class,'addComment'])->only('auth');

