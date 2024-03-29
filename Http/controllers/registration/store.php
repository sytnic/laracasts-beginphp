<?php

//dd($_POST);

use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs
$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters.';
}

//dd($errors);

if (! empty($errors)) {
    return view("registration/create.view.php", [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
// check if the account already exists
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

// 38.2 Find existing user
// dd($user);

if ($user) {
    // then someone with that email already exists and has an account
    // if yes, redirect to a login page.
    header('location: /');
    exit();
} else {
    // if not, save one to the database, 
    // and then log the user in, and redirect.
    $db->query('INSERT INTO users(email,password) VALUES(:email,:password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // $user == array
    login($user);

    header('location: /');
    exit();
}


    

    
