<?php

namespace app\Core;

class Application
{


    public function __construct(public Request $request,public Router $router)
    {
        $this->request = new Request();
        $this->router = new Router();
    }
    public function run()
    {

        $this->router->resolve();
    }

}