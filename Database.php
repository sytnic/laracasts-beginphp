<?php

class Database {

    public $connection;

    public function __construct()
    {
        // строка dsn - изначальный вариант.
        // $dsn будет перестроен под использование вспомогательного массива.
        //$dsn = "mysql:host=localhost; port=3306; dbname=myapp; charset=utf8mb4";

        $config = [
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'myapp',
            'charset' => 'utf8mb4',
        ];

        // подбор нужной строки.
        // dd(http_build_query($config, '', ';'));
        
        // подбор нужной строки - 2 вариант.
        // dd("mysql:".http_build_query($config, '', ';'));

        // строка dsn - вариант с массивом.
        //$dsn = "mysql:host={$config['host']}; port={$config['port']}; dbname={$config['dbname']}; charset={$config['charset']}";

        // строка dsn - окончательный вариант.
        $dsn = "mysql:".http_build_query($config, '', ';');
        
        // параметры: PDO(connection, user, password, parameters)
        $this->connection = new PDO($dsn, 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        
        $statement->execute();
        
        return $statement;
    }
}
