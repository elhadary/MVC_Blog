<?php

use app\Core\Router;
use app\Controllers\GuestController;
use app\Controllers\AuthController;
use app\Controllers\UserController;

Router::get('/',[GuestController::class,'index']);
Router::get('/login',[AuthController::class,'login']);
Router::get('/register',[AuthController::class,'register']);

Router::get('/dashboard',[UserController::class,'dashboard']);

