<?php

require 'Validator.php';

$config = require('config.php');
$db = new Database($config['database']);

$heading = "Create Note";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // массив для сообщений об ошибках
    $errors = [];



    // если длина сообщения равна нулю, то сообщение об ошибке
    // или длина слишком большая
    if (! Validator::string($_POST['body'], 1, 140))  {
      $errors['body'] = 'A body of no more than 140 characters is required.';
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