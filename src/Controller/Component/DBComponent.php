<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class DBComponent extends Component{

    private $table;
    private $query;
    private $where;
    private $select;
    private $contain = [];

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

    public function select(...$columns)
    {
        $this->select = $columns;
        return $this;
    }

    public function get()
    {
        $result = $this->query->find();
        if($this->select != '')
        {
            $result = $result->select($this->select);
        }
        if($this->where != '')
        {
            $result = $result->where($this->where);
        }
        if($this->contain != [])
        {
            $result = $result->contain($this->contain);
        }

        return $result;
    }

    public function getAll()
    {
        $this->query = $this->query->find()->where($this->where);
        return $this->query;
    }

    public function find(Array $conditions)
    {
        $data = $this->query->find()->where($conditions);
        if($this->contain != [])
        {
            $data = $data->contain($this->contain);
        }
        $data = $data->first();
        if($data != null)
        {
            return $data;
        }
        return false;
    }

    public function all(String $table)
    {
        return TableRegistry::getTableLocator()->get($table)->find();
    }

    public function save($data)
    {
        if($this->query->save($data))
        {
            return $data;
        }
        return false;
    }

    public function update($id, $data)
    {
        $dataTable = TableRegistry::getTableLocator()->get($this->table);
        $updateData = $dataTable->get($id);
        $updateData = $dataTable->patchEntity($updateData, $data);
        $data = $dataTable->save($updateData);
        if ($data != false) {
            return $data;
        }
        return false;
    }

    public function with(...$models)
    {
        $this->contain = $models;
        return $this;
    }
}
