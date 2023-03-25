<?php

namespace app\Core\Middleware;

use app\Models\User;
use DI\Container;

class Admin
{
    public function handle()
    {
        if((new Container)->get(User::class)->Auth()['rank'] !== 1){
            header('Location: /');
        }
    }
}