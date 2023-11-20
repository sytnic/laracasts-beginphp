<?php
// контроллер сохраняет новую заметку в БД

use Core\App;
use Core\Validator;
use Core\Database;

//$config = require base_path('config.php');
//$db = new Database($config['database']);

$db = App::resolve(Database::class);

$heading = "Create Note";
$errors = [];

// если длина сообщения равна нулю или слишком большая, 
// то сообщение об ошибке 
if (! Validator::string($_POST['body'], 1, 140))  {
    $errors['body'] = 'A body of no more than 140 characters is required.';
}

// если ошибки есть, загрузится вью с массивом ошибок
if (!empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => $heading,
        'errors' => $errors
    ]);
}

// если ошибок нет, то делаем вставку в БД

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)',
[   'body' => $_POST['body'],
    'user_id' => 1
] ); 
    
header('location: /notes');
die;
  


