<?php

require 'functions.php';
//require 'router.php';
require 'Database.php';

$config = require('config.php');

$db = new Database($config);

// Для всех записей из БД
$posts = $db->query("select * from posts")->fetchAll();
dd($posts);

// Для одной записи из БД
//$post = $db->query("select * from posts where id > 1")->fetch(PDO::FETCH_ASSOC);
//dd($post['title']);

/*
foreach ($posts as $post) {
    echo "<li>".$post['title']."</li>";
}
*/

?>