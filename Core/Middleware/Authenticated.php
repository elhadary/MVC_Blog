<?php

namespace app\Core\Middleware;

class Authenticated
{
    public function handle()
    {
        if (!isset($_SESSION['email'])) {
            header('Location: /');
        }
    }
}