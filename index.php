<?php

require 'functions.php';
//require 'router.php';

class Database {

    public $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost; port=3306; dbname=myapp; user=root; charset=utf8mb4";
        $this->connection = new PDO($dsn);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

$db = new Database;

$posts = $db->query("select * from posts");
// $posts = $db->query("select * from posts where id > 1");

foreach ($posts as $post) {
    echo "<li>".$post['title']."</li>";
}

?>