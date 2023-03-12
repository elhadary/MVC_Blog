<?php

namespace app\Core;

class Application
{
    public Request $request;
    public Router $router;
    public Session $session;

    public function __construct()
    {
        $this->session = new Session();
        $this->request = new Request();
        $this->router = new Router();
    }

    public function run()
    {
        $this->router->resolve();
    }
}