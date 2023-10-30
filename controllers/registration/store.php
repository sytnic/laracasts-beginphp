<?php

//dd($_POST);

use Core\Validator;
//use Core\App;


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

//$db = App::resolve(Database::class);

// check if the account already exists
    // if yes, redirect to a login page.
    // if not, cave one to the database, and then log the user in, and redirect.
