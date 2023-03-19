<?php

namespace app\Models;

use app\Core\Model;

class Comment extends Model
{
    protected $table = 'comments';


    public function getBlogComments($id)
    {
        return $this->select()->where('blog_id','=',$id)->fetchAll();
    }

}