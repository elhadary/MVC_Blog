<?php

use app\Core\Router;
use app\Controllers\GuestController;
use app\Controllers\AuthController;
use app\Controllers\UserController;
use app\Controllers\AdminController;

$router = new Router();

$router->get('/',[GuestController::class,'index'])->only('guest');

$router->get('/login',[AuthController::class,'login'])->only('guest');
$router->post('/login',[AuthController::class,'postLogin'])->only('guest');
$router->get('/register',[AuthController::class,'register'])->only('guest');
$router->post('/register',[AuthController::class,'postRegister'])->only('guest');
$router->get('/logout',[AuthController::class,'logout']);

$router->get('/dashboard',[UserController::class,'dashboard'])->only('auth');



/// Admin
$router->get('/dashboard/users',[AdminController::class,'showUsers'])->only('admin');
