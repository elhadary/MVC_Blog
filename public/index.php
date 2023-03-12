<?php
require '../vendor/autoload.php';
use app\Core\Application;
use app\Core\Model;
use app\Core\Controller;
use app\Core\Request;
use app\Core\Router;

require '../Support/bootstrap.php';

$app = new Application();



$app->run();