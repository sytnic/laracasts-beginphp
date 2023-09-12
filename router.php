<?php

$routes = require('routes.php');


/**
 * Показ своей страницы ошибки (по умолч. 404)
 * 
 * @param int - по умолчанию 404
 * 
 */
function abort($code = 404) {
    http_response_code($code);

    // Вызов своей страницы для ошибки 404
    require "views/{$code}.php";

    // остановка загрузки страницы
    die();
}

/**
 * Вызывает затребование страницы согласно маршруту
 * или 404
 * 
 * @param string $uri
 * @param array  $routes
 * 
 */
function routeToController($uri, $routes) {
    // направление
    if (array_key_exists($uri, $routes)) {
        // если ключ есть в роутах, задействуй его
        require $routes[$uri];
    } else {  // иначе
        abort();
    }
}

// парсинг url-строки с выдергиванием 
// главного пути без параметров запроса
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// or:
//$uri_request = $_SERVER['REQUEST_URI'];
//$uri_array = parse_url($uri_request);
//$uri = $uri_array['path'];

routeToController($uri, $routes);


?>