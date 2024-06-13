<?php

namespace Php2\Exam\Models;

use Php2\Exam\Commons\Model;

class Category extends Model
{
    protected string $tableName = 'categories';

    public function all()
    {
        $queryBuilder = $this->conn->createQueryBuilder();

        return $queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->fetchAllAssociative();
    }

   
}