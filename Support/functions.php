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