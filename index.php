<?php

require 'functions.php';
//require 'router.php';


// Получение данных из БД с помощью PDO

// connect to our MySQL database
$dsn = "mysql:host=localhost; port=3306; dbname=myapp; charset=utf8mb4";

$pdo = new PDO($dsn, 'root');

$statement = $pdo->prepare("select * from posts");

$statement->execute();

$posts = $statement->fetchAll();

dd($posts);

?>