<?php

namespace app\Core;

class Request
{

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getPath()
    {
        $uri = $_SERVER['REQUEST_URI'];

        $route = explode('?',$uri)[0];
        if($route == '/')
        {
            return '/';
        }
        return rtrim($route,'/');

    }

}