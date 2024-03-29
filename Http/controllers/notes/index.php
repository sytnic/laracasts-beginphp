<?php
// контроллер отображает все заметки

use Core\App;
use Core\Database;

//$config = require base_path('config.php');
//$db = new Database($config['database']);

$db = App::resolve(Database::class);

$heading = "My Notes";

$notes = $db->query('select * from notes where user_id = 1')->get();

// при загрузке вью будут доступны только перечисленные здесь переменные,
// т.е. без переменных, связанных с БД
view("notes/index.view.php", [
    'heading' => $heading,
    'notes' => $notes
]);

?>