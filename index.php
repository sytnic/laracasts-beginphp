<?php

require 'functions.php';
//require 'router.php';
require 'Database.php';

$config = require('config.php');
$db = new Database($config['database']);

// Возможность для SQL-инъекции,
// т.к. в параметре можно вбить всё, что угодно, любую строку.
$id = $_GET['id'];

// Теперь работает подстановочный знак ?, а не строка из запроса
$query = "select * from posts where id = ?";

// Для всех записей из БД
$posts = $db->query($query, [$id])->fetch();

dd($posts);


/*
foreach ($posts as $post) {
    echo "<li>".$post['title']."</li>";
}
*/

?>