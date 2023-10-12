<?php




/**
 * Показ своей страницы ошибки (по умолч. 404)
 * 
 * @param int - по умолчанию 404
 * 
 */
function abort($code = 404) {
    http_response_code($code);

    // Вызов своей страницы для ошибки 404
    require base_path("views/{$code}.php");

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
//   5. И, наконец, если ключ (вбитое в адресную строку)
//   есть в массиве маршрутов,
//   то вызывается (require) на загрузку 
//   соответствующая страница php, указанная в массиве (контроллер).

    // направление
    if (array_key_exists($uri, $routes)) {
        // если ключ есть в роутах, задействуй его
        require base_path($routes[$uri]);
    } else {  // иначе
        abort();
    }
}

// Логика маршрутов:
// 2. Загружается массив из маршрутов 
// (до тех пор, пока маршруты созданы как массив)

$routes = require base_path('routes.php');

// 3. Анализатором php изучается, 
// что именно вбито в адресную строку.

// парсинг url-строки с выдергиванием 
// главного пути без параметров запроса
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// or:
//$uri_request = $_SERVER['REQUEST_URI'];
//$uri_array = parse_url($uri_request);
//$uri = $uri_array['path'];

// 4. Вызывается функция

routeToController($uri, $routes);


?>