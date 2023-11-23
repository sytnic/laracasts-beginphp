<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate($email, $password)
    {
        // validate the form inputs
        // эта переменная тут не нужна, 
        // если используется protected $errors;
        //$errors = [];

        if (! Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        // можно сократить пароль ради экспериментов
        // ($password, 1, 5)
        if (! Validator::string($password)) {
            $this->errors['password'] = 'Please provide a valid password.';
        }

        // вместо отправки вью отправим булево
        
        // view and errors
        /*if (! empty($errors)) {
            return view("session/create.view.php", [
                'errors' => $errors
            ]);
        } */
        
        // булево
        return empty($this->errors);
    }
    
    // геттер-метод, чтоб 
    // не манипулировать в коде переменной $errors в качестве public
    public function errors() {
        return $this->errors;
    }

}