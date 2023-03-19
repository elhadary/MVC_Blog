<?php

namespace app\Models;

use app\Core\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    public static function find($id)
    {
        $blog = (new Blog)->select()->where('id','=',$id)->fetch();
        if ($blog)
        {
            return $blog;
        }
        return false;

    }

}