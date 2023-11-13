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

function abort($code=404)
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die;
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

// $user == array
function login ($user) {
    // mark that the user has logged in
    
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout() {
    // 1
    $_SESSION = [];
    // 2
    session_destroy(); 

    // 3
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time()-3600, $params['path'], $params['domain'],
        $params['secure'], $params['httponly']);
}

?>