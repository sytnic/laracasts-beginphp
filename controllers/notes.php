<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = "My Notes";

//$notes = [];
//dd($db);

$notes = $db->query('select * from notes where user_id = 1')->fetchAll();

//dd($notes);

require "views/notes.view.php";

?>