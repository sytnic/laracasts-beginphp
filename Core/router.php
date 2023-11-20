<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router {

    public $routes = [];

    // после вызова соответствующего метода
    // будет заполнен массив $this->$routes

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];  
        // или как вариант:
        //$this->routes[] = compact('method','uri','controller');
        
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function route($uri, $method)
    {
        // перебираем заполненный массив $this->routes
        foreach ($this->routes as $route) {
            // если uri в записанном методе (get,post...)
            // совпадает с переданным $uri,
            // и метод из массива $this->routes
            // совпадает с переданным методом из запроса ($_SERVER)
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {

                // Элементы if ($route['middleware']
                // будут вынесены в отдельную папку Middleware
                
                // apply the middleware            
               
                    Middleware::resolve($route['middleware']);
                
            /*
                if ($route['middleware'] == 'guest') {
                    (new Guest)->handle();
                }

                // так не можем получить доступ к /notes,
                // если не вошли в систему
                if ($route['middleware'] == 'auth') {
                    (new Auth)->handle();
                }
            */
                        
                // то вызывать страницу контроллера
                // указанную в записанном методе (get,post...)
                return require base_path('Http/controllers/'.$route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }


    public function only($key)
    {
        //dd($key);
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        //dd($this->routes);
        return $this;
    }
}




//////
// Старая реализация до перезаписи маршрутизатора
//////

/**
 * Показ своей страницы ошибки (по умолч. 404)
 * 
 * @param int - по умолчанию 404
 * 
 */
/*
function abort($code = 404) {
    http_response_code($code);

    // Вызов своей страницы для ошибки 404
    require base_path("views/{$code}.php");

    // остановка загрузки страницы
    die();
}
*/
/**
 * Вызывает затребование страницы согласно маршруту
 * или 404
 * 
 * @param string $uri
 * @param array  $routes
 *  
 */
/*
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
*/

// Логика маршрутов:
// 2. Загружается массив из маршрутов 
// (до тех пор, пока маршруты созданы как массив)

/*
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
*/

?>