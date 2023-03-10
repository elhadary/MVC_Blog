<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\User;
class UserController extends Controller
{
    public User $user;
    public function __construct()
    {
        $this->user = new User();

    }

    public function dashboard()
    {
        $test = $this->user->insert();
        dd($test);
    }
}