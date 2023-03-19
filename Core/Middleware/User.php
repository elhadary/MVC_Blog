<?php

namespace app\Core\Middleware;

use app\Models\User as Model;

class User
{
    public function handle()
    {
        if((new Model)->Auth()['rank'] !== 0){
            header('Location: /login');
        }
    }
}