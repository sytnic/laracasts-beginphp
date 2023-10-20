<?php

use Core\App;
use Core\Database;

//$config = require base_path('config.php');
//$db = new Database($config['database']);

$db = App::resolve(Database::class);

$heading = "Note";
$currentUserId = 1;

  // show action

  $note = $db->query('select * from notes where id = :id', [
      'id'   => $_GET['id']
  ])->findOrFail();

  authorize($note['user_id'] == $currentUserId);

  // вместо этого:
  // require "views/notes/show.view.php";
  // это:
  view("notes/show.view.php", [
      'heading' => $heading,
      'note' => $note
    ]);

?>