<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class DBComponent extends Component{

    public $table;
    public $query;
    public $where;

    public function table(String $table)
    {
        $this->table = $table;
        $this->query = TableRegistry::getTableLocator()->get($this->table);
        return $this;
    }

    public function where(Array $conditions)
    {
        $this->where = $conditions;
        return $this;
    }

    public function getAll()
    {
        $this->query = $this->query->find()->where($this->where);
        return $this->query;
    }

    public function find(Array $conditions)
    {
        return $this->query->find()->where($conditions)->first();
    }

    public function all(String $table)
    {
        return $this->table($table)->get();
    }
}
