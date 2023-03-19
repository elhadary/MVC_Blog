<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Core\Validation;
use app\Models\Comment;

class CommentController extends Controller
{
    public Comment $comment;
    public function __construct()
    {
        parent::__construct();
        $this->comment = new Comment();
    }

    public function addComment()
    {
        if(isset($_POST['comment'])  && isset($_POST['id'] ))
        {
            $validation = new Validation();
            $comment = $validation->validate($_POST['comment'],['min:5']);
            if(!empty($comment->errors))
            {
                dd('error with comment validation');
            }
        }
        $this->comment->insert([
            'comment' => $comment->input,
            'user_id' => $_SESSION['id'],
            'blog_id' => $_POST['id']
            ])->exec();
        header("Location: /blog?id=".$_POST['id']);
    }

}