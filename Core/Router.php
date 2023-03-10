<?php

namespace app\Core;

class Router
{
    protected static array $routers = [];
    public Request $request;
    public Render $render;

    public function __construct()
    {
        $this->request = new Request();
        $this->render = new Render();
    }
    protected function add($method,$path,$callback)
    {
        self::$routers[$method][$path] = $callback;
    }

    public static function get($path, $callback)
    {
        (new Router)->add('get',$path,$callback);
    }

    public static function post($path,$callback)
    {
        (new Router)->add('post',$path,$callback);
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        $action = self::$routers[$method][$path] ?? false;

        if(!$action) {
            $this->render->_404();
            exit();
        }
        //404 Handling -- Pending----

        if(is_callable($action)) {
            call_user_func($action,[]);
        }

        if (is_array($action))
        {
            call_user_func([new $action[0],$action[1]]);
        }
    }

}