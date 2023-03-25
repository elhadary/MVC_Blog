<?php

namespace app\Core;

use DI\Container;

class Application
{

    public Request $request;
    public Router $router;

    public function __construct(Container $c)
    {
        $this->request = $c->get(Request::class);
        $this->router = $c->get(Router::class);
    }
    public function run()
    {

        $this->router->resolve();
    }

}