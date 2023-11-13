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
dd($user);

// login
login([
    'email' => $email
]);