<?php

namespace app\Core;
use app\Core\Validation;

class Controller
{
    public Render $render;
    public Validation $validation;

    public function __construct()
    {
        $this->render = new Render();
        $this->validation = new Validation();
    }

}