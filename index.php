<?php

require 'functions.php';

// парсинг url-строки с выдергиванием 
// главного пути без параметров запроса

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// or:
//$uri_request = $_SERVER['REQUEST_URI'];
//$uri_array = parse_url($uri_request);
//$uri = $uri_array['path'];

// маршруты
$routes = [
    '/'        => 'controllers/index.php',
    '/about'   => 'controllers/about.php',
    '/contact' => 'controllers/contact.php'
];

// направление
if (array_key_exists($uri, $routes)) {
    // если ключ есть в роутах, задействуй его
    require $routes[$uri];

} else {  // иначе
    http_response_code(404);

    // Вызов своего сообщения для ошибки 404
    // echo "Sorry. Not Found.";

    // Вызов своей страницы для ошибки 404
    require 'views/404.php';

    // остановка загрузки страницы
    die();
}


?>