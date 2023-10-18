<?php

use Core\App;
use Core\Database;

//$config = require base_path('config.php');
//$db = new Database($config['database']);

$db = App::container()->resolve('Core\Database');
dd($db);

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