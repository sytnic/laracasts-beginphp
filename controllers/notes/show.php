<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$heading = "Note";
$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // delete action 

  $note = $db->query('select * from notes where id = :id', [
      'id' => $_GET['id']
  ])->findOrFail();

  authorize($note['user_id'] === $currentUserId);

  $db->query('delete from notes where id = :id', [
      'id' => $_GET['id']
]);

  header('location: /notes');
  exit();

} else {

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

}

?>