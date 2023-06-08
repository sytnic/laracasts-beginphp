<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = "Note";

$note = $db->query('select * from notes where user_id = :user and id = :id', [
    'user' => 1,
    'id'   => $_GET['id']
])->fetch();

if(!$note){
    abort();
}

require "views/note.view.php";

?>