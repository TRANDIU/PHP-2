<?php

namespace Php2\Exam\Commons;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

class Model
{
    protected Connection|null $conn;
    
    protected string $tableName;

    public function __construct()
    {
        $connectionParams = [
            'dbname'    => $_ENV['DB_NAME'],
            'user'      => $_ENV['DB_USERNAME'],
            'password'  => $_ENV['DB_PASSWORD'],
            'host'      => $_ENV['DB_HOST'],
            'port'      => $_ENV['DB_PORT'],
            'driver'    => $_ENV['DB_DRIVER'],
        ];

        $this->conn = DriverManager::getConnection($connectionParams);
    }

    // public function all(){
    //     $queryBuilder = $this->conn->createQueryBuilder(); 

    //     return $queryBuilder->select('*')->from($this->tableName)->fetchAllAssociative();

    // }

    public function __destruct()
    {
        $this->conn = null;
    }
}
