<?php

namespace app\Models;
use app\Core\Model;
use DI\Container;

class User extends Model
{
    protected $table = 'users';


    public function Auth()
    {
        if(isset($_SESSION['email']))
            return $this->select()->where('email', '=', $_SESSION['email'])->fetch();
    }

    public static function find($id)
    {
        $c = new Container();
        $user = $c->get(User::class)->select()->where('id','=',$id)->fetch();
        if ($user)
        {
            return $user;
        }
        return false;

    }


    public static function is_admin($id)
    {
        if(self::find($id)['rank'] == 1)
        {
            return true;
        }
        return false;
    }
}