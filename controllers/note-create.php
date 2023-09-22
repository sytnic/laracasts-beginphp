<?php

require 'Validator.php';

$config = require('config.php');
$db = new Database($config['database']);

$heading = "Create Note";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // массив для сообщений об ошибках
    $errors = [];

    $validator = new Validator;

    // если длина сообщения равна нулю, то сообщение об ошибке
    if ($validator->string($_POST['body']))  {
      $errors['body'] = 'A body is required';
    }

    // если длина слишком большая
    if (strlen($_POST['body']) > 100) {
      $errors['body'] = 'A body is too long';
    }

    // если ошибок нет, то делаем вставку в БД
    if(empty($errors)) {
      $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)',
      [ 'body' => $_POST['body'],
        'user_id' => 1
      ] );  
    }    

    // если ошибки есть, загрузится вью с массивом ошибок
}

require 'views/note-create.view.php';