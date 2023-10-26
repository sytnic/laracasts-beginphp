<?php
// контроллер покажет форму для создания новой заметки

$heading = "Create Note";
// массив для сообщений об ошибках
$errors = [];


view("notes/create.view.php", [
  'heading' => $heading,
  'errors' => $errors
]);