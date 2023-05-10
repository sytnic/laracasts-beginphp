<?php

require 'functions.php';

// парсинг url-строки с выдергиванием главного пути без параметров запроса
//$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//dd($uri);
// or:
$uri_request = $_SERVER['REQUEST_URI'];
$uri_array = parse_url($uri_request);
$uri = $uri_array['path'];

// @return array
//dd(parse_url($uri));

//echo $uri;

if ($uri == '/') {
    require 'controllers/index.php';
} elseif ($uri == '/about') {
    require 'controllers/about.php';
} elseif ($uri == '/contact') {
    require 'controllers/contact.php';
}


?>