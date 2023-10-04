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

    // запрашивание класса
    require base_path("Core/{$class}.php");
});

// Эти классы теперь запрашиваются через spl_autoload_register()
//require base_path('Database.php');
//require base_path('Response.php');
require base_path('Core/router.php');


?>