<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$heading = "My Notes";

//$notes = [];
//dd($db);

$notes = $db->query('select * from notes where user_id = 1')->get();

//dd($notes);

// при загрузке вью будут доступны только перечисленные здесь переменные,
// т.е. без переменных, связанных с БД
view("notes/index.view.php", [
    'heading' => $heading,
    'notes' => $notes
]);

?>