<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Core\Validation;
use app\Models\Blog;
use app\Models\Comment;
use app\Models\User;

class BlogController extends Controller
{

    public Blog $blog;
    public function __construct()
    {
        parent::__construct();
        $this->blog = new Blog();
    }

    public function showBlogs()
    {
        $blogs = $this->blog->select()->fetchAll();
        $this->render->view('blogs.blogs',['blogs' => $blogs]);
    }

    public function showBlog()
    {
        if(isset($_GET['id'])) {
            $blog = $this->blog->find($_GET['id']);
            if ($blog)
            {
                $comments = (new Comment)->getBlogComments($_GET['id']);
                $this->render->view('blogs.singleBlog',['blog' => $blog,'comments' => $comments]);
                exit();
            }
        }
        header("Location: ".HOMEPAGE);


    }

    public function showAdminBlog()
    {
        if(isset($_GET['id'])) {
            $blog = $this->blog->find($_GET['id']);
            if ($blog)
            {
                $comments = (new Comment)->getBlogComments($_GET['id']);
                $this->render->view('admin.adminSingleBlog',['blog' => $blog,'comments' => $comments]);
                exit();
            }
        }
        header("Location: ".HOMEPAGE);


    }

    public function addBlog()
    {
        $this->render->view('blogs.addBlog');
    }

    public function postBlog()
    {
        $blog = $_POST['text'];
        $blog = (new Validation)->validate($blog,['min:5']);
        if(!empty($blog->errors))
        {
            $this->render->view('blogs.addBlog',['dashAlert' => ['type' => 'danger', 'message' => reset($blog->errors)]]);
           exit();
        }
        $this->blog->insert(
           ['text' => $blog->input,
                  'user_id' => $_SESSION['id']
          ])->exec();
        header( "refresh:3;url=/dashboard" );

        $this->render->view('blogs.addBlog',['dashAlert' => ['type' => 'success', 'message' => 'blog added successfully, Forwarding to all blogs page' ]]);

    }



}