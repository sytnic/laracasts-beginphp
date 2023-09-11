<?php

class Database {

    public $connection;
    public $statement;

    /**
     * @param array $config
     *
     **/ 
    public function __construct($config, $username='root', $password='')
    {                   
        // создаёт строку типа "mysql:host=localhost;port=3306;dbname=myapp;"
        $dsn = "mysql:".http_build_query($config, '', ';');
        
        // параметры: PDO(connection, user, password, parameters)
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    /**
     * @param array $params - ключ указывается в SQL-запросе, значение берётся из GET-параметра Url
     *
     **/ 
    public function query($query, $params=[])
    {
        $this->statement = $this->connection->prepare($query);
        
        $this->statement->execute($params);
        
        return $this;
    }

    public function fetch()
    {
        return $this->statement->fetch();
    }
}
