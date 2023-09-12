<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = "Note";

$note = $db->query('select * from notes where id = :id', [
    'id'   => $_GET['id']
])->findOrFail();


$currentUserId = 1;

// если user_id из строки табицы по SQL-запросу не равен 1 - 403
if($note['user_id'] != $currentUserId){
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";

?>