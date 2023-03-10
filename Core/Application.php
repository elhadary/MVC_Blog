<?php

namespace app\Core;

class Application
{
    public Request $request;
    public Router $router;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router();
    }
    public function run()
    {
        $this->router->resolve();
    }

}