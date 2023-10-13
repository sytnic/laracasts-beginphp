<?php

const BASE_PATH = __DIR__ . '/../';

//var_dump(BASE_PATH);

require BASE_PATH.'Core/functions.php';

// встроенная функция php будет пытаться найти 
// неназванный ранее, но запрашиваемый класс;
// по умолчанию выдаёт строку с именем класса ($class).
spl_autoload_register(function($class){
    //посмотреть строку с именем класса
    //dd($class);    
    // посмотреть строку с полным путём класса
    //var_dump(base_path($class.'.php'));


    // из-за загрузки класса из пространства имен
    // требуется достичь на выходе аналог Core\Database:

    // (search, replace DIRECTORY_SEPARATOR, class)
    $class = str_replace('\\', "/", $class);
    
    // запрашивание класса без пространства имен
    // require base_path("Core/{$class}.php");

    // запрашивание класса при пространстве имен
    require base_path("{$class}.php");
});

// Эти классы теперь запрашиваются через spl_autoload_register()
//require base_path('Database.php');
//require base_path('Response.php');

// Логика маршрутов (маршруты в массиве):
// 1. Загружается страница Core/router.php
// В дальнейшем, любые внезапно требующиеся классы, 
// будут сразу загружены благодаря функции spl_autoload_register()

//require base_path('Core/router.php');



// Логика маршрутов 2 (марщшруты в методах):

// 1. Загружается класс Маршрутизатор
$router = new \Core\Router;

// 2. Загружаются маршруты, основанные на методах (а не массиве).
// Методы сразу заполняют массив маршрутов $router->routes
$routes = require base_path('routes.php');
// dd($router->routes);

// 3. Анализируется текущая строка запроса
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// 4. Выясняется, какой метод был предоставлен.
// Созданный в формах html name="_method"
// может предоставить дополнительное значение (PUT,DELETE...)
// помимо стандартного POST и GET.
// В противном случае взять тот метод, который предоставлен по умолчанию.
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

// 5. Запустить метод объекта Router,
// в котором сравниваются переданные значения из запроса
// и значения маршрутов, хранящиеся в массиве $router->routes.
// При совпадении вызывается (require) соответствующая страница контроллера.
$router->route($uri, $method);


?>