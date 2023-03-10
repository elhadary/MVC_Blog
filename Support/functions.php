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