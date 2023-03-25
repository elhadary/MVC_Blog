<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\User;
use DI\Container;

class AuthController extends Controller
{
    public User $user;
    public array $variables = [];

    public function __construct(Container $c)
    {
        parent::__construct($c);
        $this->user = $c->get(User::class);
    }

    public function login()
    {
        $array = [
          'title' => 'Login'
        ];
        $this->render->view('Auth.login',$array);
    }

    public function postLogin()
    {
        $this->variables['title'] = 'Login';

        $email = $_POST['email'];
        $password = $_POST['password'];
        $email = $this->validation->validate($email,['email','max:50']);
        $emailInput = $email->input;
        $password = $this->validation->validate($password,['min:5','max:50']);
        $passwordInput = $password->input;

        if(!empty($email->errors) OR !empty($password->errors))
        {
            $this->variables['errors'] = $email->errors + $password->errors;
            $this->render->view('Auth.login',$this->variables);
            exit();
        }

        $user = $this->user->select()->where('email','=',$emailInput)->fetch();
        if(!$user)
        {
            $this->variables['errors'] = ['email' => 'Email doesn\'t exit in our database'];
            $this->render->view('Auth.login',$this->variables);
            exit();
        }


        if ($user['password'] == $passwordInput)
        {
            $_SESSION['email'] = $emailInput;
            $_SESSION['id'] = $user['id'];
            header('LOCATION: /dashboard');
        }else
        {
            $this->render->view('Auth.login',['errors' => ['password' => 'Wrong password']]);
        }
    }

    public function register()
    {
        $array = [
            'title' => 'Register'
        ];
        $this->render->view('Auth.register',$array);
    }

    public function postRegister()
    {
        $this->variables['title'] = 'Register';
        $email = $_POST['email'];
        $password = $_POST['password'];
        $email = $this->validation->validate($email,['email']);
        $emailInput = $email->input;
        $password = $this->validation->validate($password,['min:5','max:30']);
        $passwordInput = $password->input;

        if(!empty($email->errors) OR !empty($password->errors))
        {
            $this->variables['errors'] = $email->errors + $password->errors;
            $this->render->view('Auth.login',$this->variables);
            exit();
        }


        // Check if email already exist
        if($this->user->select()->where('email','=',$emailInput)->fetch())
        {
            $this->variables['errors'] = ['This email already exist in our database'];
            $this->render->view('Auth.register',$this->variables);
            exit();
        }

        $this->user->insert([
            'email' => $emailInput,
            'password' => $passwordInput
        ])->exec();
        $this->variables['success'] =  ['Email registered successfully'];
        $this->render->view('Auth.register',$this->variables);
    }

    public function logout()
    {
        session_destroy();
        header('LOCATION: /');
    }
}