<?php

namespace app\Core\Middleware;

use app\Models\User;

class Admin
{
    public function handle()
    {
        if((new User)->Auth()['rank'] !== 1){
            header('Location: /');
        }
    }
}