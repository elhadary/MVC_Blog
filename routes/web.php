<?php

use app\Core\Router;
use app\Controllers\GuestController;
use app\Controllers\AuthController;
use app\Controllers\UserController;
use app\Controllers\AdminController;
use app\Controllers\QuestionController;

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
$router->get('/dashboard/DeleteUser',[AdminController::class,'deleteUser'])->only('admin');

// Questions
$router->get('/dashboard/questions',[QuestionController::class,'showQuestions'])->only('admin');
$router->get('/dashboard/questions/add',[QuestionController::class,'addQuestion'])->only('admin');
$router->post('/dashboard/questions/add',[QuestionController::class,'PostQuestion'])->only('admin');
