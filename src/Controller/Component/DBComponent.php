<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class DBComponent extends Component{

    private $table;
    private $query;

    public function table(String $table): object
    {
        $this->table = $table;
        return $this;
    }

    public function get(): object
    {
        $this->query = TableRegistry::getTableLocator()->get($this->table)->find();
        return $this;
    }



    public function find(Int $id): object
    {
        return TableRegistry::getTableLocator()->get($this->table)->get($id);
    }
}
