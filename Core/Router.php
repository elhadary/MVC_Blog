<?php

namespace app\Core;

use app\Core\Middleware\Middleware;
use DI\Container;

class Router
{
    public static array $routes = [];
    public Request $request;
    public Render $render;
    public Middleware $middleware;
    public array $lastRouter;
    public Container $c;

    public function __construct(Container $c)
    {
        $this->c = $c;
        $this->request = $c->get(Request::class);
        $this->render = $c->get(Render::class);
        $this->middleware = $c->get(Middleware::class);
    }

    public function only($rank)
    {
        // $routes['get']['/register'][$callback] = [$rank]
        self::$routes[$this->lastRouter['method']][$this->lastRouter['path']]['middleware'] = $rank;
    }

    protected function add($method,$path,$callback,$middleware = null)
    {
        self::$routes[$method][$path] = $callback;
        $this->lastRouter = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback
        ];
    }

    public function get($path, $callback)
    {
        $this->add('get',$path,$callback);
        return $this;
    }

    public function post($path,$callback)
    {
        $this->add('post',$path,$callback);
        return $this;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        $action = self::$routes[$method][$path] ?? false;
        if(isset(self::$routes[$method][$path]['middleware']))
        {

            $this->middleware->resolve(self::$routes[$method][$path]['middleware']);
        }

        if(!$action) {
            response(404);
            $this->render->view('_404');
            exit();
        }

        if(is_callable($action)) {

            call_user_func($action,[]);
        }

        if (is_array($action))
        {
            call_user_func([$this->c->get($action[0]),$action[1]]);
        }
    }

}