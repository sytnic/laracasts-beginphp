<?php
// контроллер удаляет заметку из БД

use Core\App;
use Core\Database;

//use Core\Database;

//$config = require base_path('config.php');
//$db = new Database($config['database']);

// вызывается контейнер
// (он уже задан и сохранён благодаря bootstrap,
//  в нем хранится привязка к подключению к БД )
// и запускается метод Container'a :

//$db = App::container()->resolve('Core\Database');
//dd($db);

//$db = App::container()->resolve(\Core\Database::class);

$db = App::resolve(Database::class);


$currentUserId = 1;

  // delete action 

  $note = $db->query('select * from notes where id = :id', [
      'id' => $_POST['id']
  ])->findOrFail();

  authorize($note['user_id'] === $currentUserId);

  $db->query('delete from notes where id = :id', [
      'id' => $_POST['id']
  ]);

  header('location: /notes');
  exit();



?>