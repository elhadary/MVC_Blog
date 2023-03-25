<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\User;
use DI\Container;

class AdminController extends Controller
{
    public User $user;
    public function __construct(Container $c)
    {

        parent::__construct($c);
        $this->user = $c->get(User::class);
    }

    public function index()
    {
        $users = $this->user->select()->fetchAll();
        $this->render->view('Admin.index',['count' => count($users)]);
    }

    public function showUsers($array = null)
    {
        $users = $this->user->select()->fetchAll();
        $this->render->view('Admin.users',['users' => $users,'dashAlert' => $array]);
    }

    public function deleteUser()
    {
        if(isset($_GET['id']))
        {
            $this->user->delete()->where('id','=',$_GET['id'])->exec();
            if(!empty($this->user->error))
            {
                $this->showUsers(['type' => 'danger','message' => 'Please recheck id']);
                exit();
            }
            $this->showUsers(['type' => 'success','message' => 'user deleted successfully']);
        }else
        {
            header('LOCATION: /dashboard/users');
        }
    }

}