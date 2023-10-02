<?php

//var_dump("x hello");

return [
    // подключение к базе данных
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'myapp',
        'charset' => 'utf8mb4'
    ],

    // будущие возможные подключения
    'services' => [
        'prerender' => [
            'token' => '',
            'secret' => ''
        ]
    ]
];
