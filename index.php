<?php

$heading = "Home";

// dump and die
function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

//dd($_SERVER);

require "views/index.view.php";

?>