<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class TrademarkComponent extends Component{

    public $components = ['Curd'];

    public function initialize(array $config): void
    {
        $this->Curd;
    }

    public function show($trademark_id)
    {
        return $this->Curd->show('Trademark',$trademark_id);
    }

    public function addTrademark($trademark_name)
    {
        return $this->Curd->add('Trademark', ['name' => $trademark_name]);
    }

    public function update($trademark_name, $trademark_id)
    {
        return $this->Curd->update('Trademark', ['name' => $trademark_name], $trademark_id);
    }
}
