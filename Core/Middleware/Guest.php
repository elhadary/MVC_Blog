<?php

namespace app\Core\Middleware;

class Guest
{
    public function handle()
    {
       if(isset($_SESSION['email'])){
           header('Location: /dashboard');
       }
    }
}