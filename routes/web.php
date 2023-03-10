<?php

use app\Core\Router;
use app\Controllers\GuestController;
use app\Controllers\AuthController;

Router::get('/',[GuestController::class,'index']);
Router::get('/login',[AuthController::class,'login']);
Router::get('/register',[AuthController::class,'register']);

