<?php
session_start();

require '../vendor/autoload.php';

use app\Core\Application;
use app\Core\Request;
use app\Core\Router;
use DI\Container;

$c = new Container();

require '../Support/bootstrap.php';

$request = $c->get(Request::class);
$router = $c->get(Router::class);

$app = new Application($c);



$app->run();