<?php

const BASE_PATH = __DIR__ . '/../';

//var_dump(BASE_PATH);

require BASE_PATH.'functions.php';

require base_path('Database.php');
require base_path('Response.php');
require base_path('router.php');


// Возможность для SQL-инъекции,
// т.к. в параметре можно вбить всё, что угодно, любую строку.
//$id = $_GET['id'];

// Теперь работает подстановочный знак ? или :id, а не строка из запроса
//$query = "select * from posts where id = :id";

// Для всех записей из БД.
// Не обязательно в ключе повторять идентично :id из select запроса
//$posts = $db->query($query, [':id' => $id])->fetch();

//dd($posts);


/*
foreach ($posts as $post) {
    echo "<li>".$post['title']."</li>";
}
*/

?>