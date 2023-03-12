<?php

namespace app\Core;

class Session
{
    public function __construct()
    {
        session_start();
    }

}