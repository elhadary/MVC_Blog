<?php

namespace app\Core\Middleware;

use app\Models\User;
use DI\Container;

class Guest
{
    public function handle()
    {
       if(isset($_SESSION['email'])){
           if(((new Container)->get(User::class))->Auth()['rank'] == 1){
               header('Location: /dashboard');
           }else{
               header('Location: /index');
           }
       }
    }
}