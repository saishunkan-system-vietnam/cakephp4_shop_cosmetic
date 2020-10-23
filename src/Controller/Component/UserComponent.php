<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class UserComponent extends Component{

    public function renderListUser($params)
    {
        $config = [
            'params'=> $params,
            'selectColumns'=>['id','email','name','image','phone','address','gender','deleted'],
            'searchColumns'=>['email','name','address'],
        ];
        $sampleArr = [
            'id',
            'email',
            'name',
            ['function'=>'route','url'=>]
        ];
    }
}
