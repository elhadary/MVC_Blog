<?php

namespace app\Core\Middleware;

use app\Models\User as Model;
use DI\Container;

class User
{
    public function handle()
    {
        if((new Container)->get(Model::class)->Auth()['rank'] !== 0){
            header('Location: /login');
        }
    }
}