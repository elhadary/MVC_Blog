<?php

namespace app\Models;
use app\Core\Model;
class User extends Model
{
    protected $table = 'users';

    public function Auth()
    {
        if(isset($_SESSION['email']))
        return $this->select()->where('email','=',$_SESSION['email'])->fetch();
    }
}