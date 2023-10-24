<?php

// Этот контроллер отвечает за отображение формы для создания заметки

$heading = "Create Note";
// массив для сообщений об ошибках
$errors = [];


view("notes/create.view.php", [
  'heading' => $heading,
  'errors' => $errors
]);