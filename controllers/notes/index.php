<?php

use Core\Database;

$config = require base_path('config.php');
// использовать слэш Core\ или use в начале файла
//$db = new Core\Database($config['database']);
$db = new Database($config['database']);

$heading = "My Notes";

$notes = $db->query('select * from notes where user_id = 1')->get();

// при загрузке вью будут доступны только перечисленные здесь переменные,
// т.е. без переменных, связанных с БД
view("notes/index.view.php", [
    'heading' => $heading,
    'notes' => $notes
]);

?>