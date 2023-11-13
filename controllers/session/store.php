<?php

//dd('submit the form');

// log in the user if the credentials match.

use Core\Validator;
use Core\App;
use Core\Database;


// POST from form
$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);


// validate the form inputs
$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password.';
}


// view and errors
if (! empty($errors)) {
    return view("session/create.view.php", [
        'errors' => $errors
    ]);
}


// match the credentials
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

// Проверка пользователя.
// Если пользователь есть в БД, выдаст массив.
// Если пользователя нет в БД, выдаст false.
//dd($user);

// Если пользователя нет, выдаёт сообщение об ошибке.
if(! $user) {
    return view('session/create.view.php', [
            'errors' => [
                'email' => 'No matching account found for that email address.'
            ]
        ]
    );
}

// Если пользователь (логин) верный, 
// нужно проверить правильный ли предоставлен пароль

// Если пароль верный,
// то зарегистрировать пользователя как вошедшего
if (password_verify($password, $user['password'])) {
    // login
    login([
        'email' => $email
    ]);

    header('location: /');
    exit();
}

// Иначе, если пользователь не прошёл проверку,
// запустить вью и сообщение об ошибке
return view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password.'
    ]
]
);




