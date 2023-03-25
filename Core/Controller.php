<?php

namespace app\Core;

use DI\Container;

class Controller
{
    public Render $render;
    public Validation $validation;
    protected Container $c;

    public function __construct(Container $c)
    {
        $this->c = $c;
        $this->render = $c->get(Render::class);
        $this->validation = $c->get(Validation::class);
    }

}