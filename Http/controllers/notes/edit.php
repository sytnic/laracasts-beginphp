<?php
// контроллер отображает форму для редактирования заметки

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;


  $note = $db->query('select * from notes where id = :id', [
      'id'   => $_GET['id']
  ])->findOrFail();

  authorize($note['user_id'] == $currentUserId);

$heading = "Edit Note";
// массив для сообщений об ошибках
$errors = [];


view("notes/edit.view.php", [
  'heading' => $heading,
  'errors' => $errors,
  'note' => $note
]);
