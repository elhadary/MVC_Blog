<?php

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    die();
}

function basePath($path): string
{
    return dirname(__DIR__).'/'.$path;
}

define("ROOT", $_SERVER['HTTP_HOST'] . '/');

function response($code)
{
    http_response_code($code);
}

if(isset($_SESSION['id']))
{
    if(\app\Models\User::is_admin($_SESSION['id']))
    {
        define('HOMEPAGE','/dashboard');
    }else
    {
        define('HOMEPAGE','/index');
    }
}else{
    define('HOMEPAGE','/');
}
