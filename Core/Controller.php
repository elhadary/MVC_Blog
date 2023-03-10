<?php

namespace app\Core;

class Controller
{
    public Render $render;

    public function __construct()
    {
        $this->render = new Render();
    }

}