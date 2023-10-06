<?php

use Core\Response;

// dump and die
function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}
//dd($_SERVER);

/**
 * Used in /views/partials for styling of navbar
 * 
 * @return bool
 */
function urlIs($value) {
    return $_SERVER['REQUEST_URI'] == $value;
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (!$condition) {
        abort($status);
    }
}

function base_path($path) {
    return BASE_PATH.$path;
}

function view($path, $attributes = []) {
    extract($attributes); // встроенная функция
    //dd($foo);
    //dd($heading);
    require base_path('views/'.$path);  // /views/index.view.php
}

?>