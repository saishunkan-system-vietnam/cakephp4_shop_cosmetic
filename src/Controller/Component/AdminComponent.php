<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class AdminComponent extends Component{

    public $components = ['DB'];

    public function initialize(array $config): void
    {
        $this->DB;
    }

    public function getAll()
    {
        return $this->DB->table('Admin')->get();
    }
}
