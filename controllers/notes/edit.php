<?php


$heading = "Edit Note";
// массив для сообщений об ошибках
$errors = [];


view("notes/edit.view.php", [
  'heading' => $heading,
  'errors' => $errors
]);
