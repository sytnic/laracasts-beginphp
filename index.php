<?php

require 'functions.php';

// парсинг url-строки с выдергиванием 
// главного пути без параметров запроса

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// or:
//$uri_request = $_SERVER['REQUEST_URI'];
//$uri_array = parse_url($uri_request);
//$uri = $uri_array['path'];


$routes = [
    '/'        => 'controllers/index.php',
    '/about'   => 'controllers/about.php',
    '/contact' => 'controllers/contact.php'
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
}


?>