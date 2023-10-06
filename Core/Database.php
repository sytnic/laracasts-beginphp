<?php

namespace Core;

use PDO;

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
        
        // при пространстве имен можно указывать \PDO или use в начале файла
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

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        // если результат не найден по SQL-запросу - то 404
        if(!$result){
            abort();
        }

        return $result;
    }
}
