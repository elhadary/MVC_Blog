<?php

namespace app\Core\Middleware;

use app\Models\User;

class Guest
{
    public function handle()
    {
       if(isset($_SESSION['email'])){
           if((new User)->Auth()['rank'] == 1){
               header('Location: /dashboard');
           }else{
               header('Location: /index');
           }
       }
    }
}