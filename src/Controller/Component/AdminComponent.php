<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class AdminComponent extends Component{

    public $components = ['DB','Curd'];

    public function initialize(array $config): void
    {
        $this->DB;
        $this->Curd;
    }

    public function getAll()
    {
        return $this->DB->table('Admin')->get();
    }

    public function show($condition)
    {
        return $this->DB->table('Admin')->find($condition);
    }

    public function update($admin, $id)
    {
        return $this->Curd->update('Admin',$admin, $id);
    }
}
