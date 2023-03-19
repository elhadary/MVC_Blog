<?php
session_start();

require '../vendor/autoload.php';

use app\Core\Application;
use app\Core\Request;
use app\Core\Router;

require '../Support/bootstrap.php';

$request = new Request();
$router = new Router();

$app = new Application($request,$router);



$app->run();