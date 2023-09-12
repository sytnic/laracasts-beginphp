<?php

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


?>