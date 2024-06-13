<?php

namespace Php2\Exam\Models;

use Php2\Exam\Commons\Model;

class Product extends Model
{
    protected string $tableName = 'products';

    public function all()
    {
        $queryBuilder = $this->conn->createQueryBuilder();

        return $queryBuilder
            ->select(
                'p.id','p.name','p.img_thumbnail','p.created_at','p.updated_at',
                'c.name as c_name',
            )
            ->from($this->tableName, 'P')
            ->join('p', 'categories', 'c', 'p.category_id = c.id')
            ->fetchAllAssociative();
    }

    public function find($id)
    {
        $queryBuilder = $this->conn->createQueryBuilder();

        return $queryBuilder
            ->select('*' )
            ->from($this->tableName, )
            ->where ('id=?')->setParameter(0, $id)
            ->fetchAssociative();
    }

    public function delete($id)
    {
        $queryBuilder = $this->conn->createQueryBuilder();

        return $queryBuilder
            ->delete($this->tableName)
            ->where ('id=?')->setParameter(0, $id)
            ->executeQuery();
    }
}