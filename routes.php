<?php

// маршруты
/*
return [
    '/'        => 'controllers/index.php',
    '/about'   => 'controllers/about.php',
    '/notes'   => 'controllers/notes/index.php',
    '/note'    => 'controllers/notes/show.php',
    '/notes/create'=> 'controllers/notes/create.php',
    '/contact' => 'controllers/contact.php'
];
*/

$router->get('/','controllers/index.php');

$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');

$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/register', 'controllers/registration/create.php')->only('foobar');
$router->post('/register', 'controllers/registration/store.php');
