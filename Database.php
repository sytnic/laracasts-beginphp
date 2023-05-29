<?php

class Database {

    public $connection;

    public function __construct()
    {
        // $dsn будет перестроен под использование вспомогательного массива
        //$dsn = "mysql:host=localhost; port=3306; dbname=myapp; charset=utf8mb4";

        $config = [
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'myapp',
            'charset' => 'utf8mb4',
        ];

        dd(http_build_query($config, '', ';'));

        $dsn = "mysql:host={$config['host']}; port={$config['port']}; dbname={$config['dbname']}; charset={$config['charset']}";
        
        // PDO(connection, user, password, parameters)
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
