<?php

class Database {

    public $connection;

    public function __construct($config)
    {                   
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
