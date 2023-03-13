<?php

namespace app\Core;

class Validation
{

    public array $errors = [];

    public $input = '';
    protected $map = [
        'max',
        'min'
    ];

    public function validate($input,$array)
    {
        $this->input = $input;
        foreach ($array as $method)
        {

            foreach ($this->map as $methods)
            {
                if(str_contains($method,$methods))
                {
                    $array = explode(':',$method);
                    $mapMethod = $array[0];
                    $argument = $array[1];
                    call_user_func([$this,$mapMethod],$this->input,$argument);
                }elseif(method_exists($this,$method)) {

                        call_user_func([$this,$method],$this->input);
                }
            }
        }
        $this->input =  filter_var($this->input,FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }

    protected function email($email)
    {
        return filter_var($email,FILTER_VALIDATE_EMAIL) ? true : $this->errors['email'] = 'Please enter a valid email';
    }
    protected function required($input)
    {
        return strlen($input) > 0 ? true : $this->errors['required'] = 'Please enter required inputs';
    }
    protected function max($input,$arg)
    {
        return strlen($input) <= $arg ? true : $this->errors['max'] = "Max length is $arg";
    }
    protected function min($input,$arg)
    {
        return strlen($input) >= $arg ? true : $this->errors['min'] = "Input must be greater than $arg";
    }
}