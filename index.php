<?php

require 'functions.php';

$uri = $_SERVER['REQUEST_URI'];

//echo $uri;

if ($uri == '/') {
    require 'controllers/index.php';
} elseif ($uri == '/about') {
    require 'controllers/about.php';
} elseif ($uri == '/contact') {
    require 'controllers/contact.php';
}


?>