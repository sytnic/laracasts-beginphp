<?php

$_SESSION['name'] = "Jeffrey";
$_SESSION['last'] = "Way";
$_SESSION['id'] = 54;

$heading = "Home";

view("index.view.php", [
    'heading' => $heading,
    // 'foo' => 'bar'
]);

?>