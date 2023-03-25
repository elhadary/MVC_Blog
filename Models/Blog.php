<?php

namespace app\Models;

use app\Core\Model;
use DI\Container;
use function DI\get;

class Blog extends Model
{
    protected $table = 'blogs';


    public static function find($id)
    {
        $c = new Container();
        $blog = $c->get(Blog::class)->select()->where('id','=',$id)->fetch();
        if ($blog)
        {
            return $blog;
        }
        return false;

    }

}