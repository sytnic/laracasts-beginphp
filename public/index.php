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

// Логика маршрутов:
// 1. Загружается страница Core/router.php
// В дальнейшем, любые внезапно требующиеся классы, 
// будут сразу загружены благодаря функции spl_autoload_register()

require base_path('Core/router.php');


?>