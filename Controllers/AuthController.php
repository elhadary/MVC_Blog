<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Models\User;

class AuthController extends Controller
{
    public User $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    public function login()
    {
        $this->render->view('Auth.login');
    }

    public function postLogin()
    {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $email = $this->validation->validate($email,['email','max:30']);
        $emailInput = $email->input;
        $password = $this->validation->validate($password,['min:5','max:30']);
        $passwordInput = $password->input;

        if(!empty($email->errors) OR !empty($password->errors))
        {
            $array = $email->errors + $password->errors;
            $this->render->view('Auth.login',['errors' => $array]);
            exit();
        }

        $user = $this->user->select()->where('email','=',$emailInput)->fetch();
        if(!$user)
        {
            $this->render->view('Auth.login',['errors' => ['email' => 'Email doesn\'t exit in our database']]);
            exit();
        }


        if ($user['password'] == $passwordInput)
        {
            $this->render->view('Auth.login',['success' => ['password' => 'Correct Password']]);
        }else
        {
            $this->render->view('Auth.login',['errors' => ['password' => 'Wrong password']]);
        }
    }

    public function register()
    {
        $this->render->view('Auth.register');
    }

    public function postRegister()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $email = $this->validation->validate($email,['email']);
        $emailInput = $email->input;
        $password = $this->validation->validate($password,['min:5','max:30']);
        $passwordInput = $password->input;

        if(!empty($email->errors) OR !empty($password->errors))
        {
            $array = $email->errors + $password->errors;
            $this->render->view('Auth.login',['errors' => $array]);
            exit();
        }


        // Check if email already exist
        if($this->user->select()->where('email','=',$emailInput)->fetch())
        {
            $this->render->view('Auth.register',['errors' => ['email' => 'This email already exist in our database']]);
            exit();
        }

        $this->user->insert([
            'email' => $emailInput,
            'password' => $passwordInput
        ])->exec();
        $this->render->view('Auth.register',['success' => ['email' => 'Email registered successfully']]);
    }
}