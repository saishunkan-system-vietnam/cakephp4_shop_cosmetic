<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class TransportComponent extends Component{

    public $components = ['DB'];

    public function initialize(array $config): void
    {
        $this->DB;
    }

    public function getAll()
    {
        return $this->DB->table('Transport')->get();
    }

    public function show($id)
    {
        return $this->DB->table('Transport')->find(['id'=>$id]);
    }
}
